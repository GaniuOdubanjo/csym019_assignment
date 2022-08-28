<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <link rel="stylesheet" href="layout.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script type="text/javascript"></script>
    </head>
    <body>
        <header>
            <h3>CSYM019 - BBC GOOD FOOD RECIPES</h3>
        </header>
        <nav>
            <ul>
                <li><a href="./recipeSelectionForm.php">Recipe Report</a></li>
                <li><a href="./newRecipe.php">New Recipe</a></li>
            </ul>
        </nav>
        <main>
            <h3>Recipe Report</h3>
            <?php
 if(isset($_POST['check_list'])){           //if the submit button is clicked, it will save the data passed into database.
    include('./connection.php');
    $loadData=array();     //declaring and array
    foreach($_POST['check_list'] as $check) {
        $stmt = $pdo->prepare('select kcal, fat,saturates,carbs,sugars,fibre,protein,salt,recipe_id from nutritionperserving  where id = ?');
        $values = [$check];
        $stmt->execute($values);
        $records = $stmt->fetch();
        array_push($loadData, array(    // takes an array and multiple object
            'recipe_id'=> $records['recipe_id'],
            'fat' =>  $records['fat'],
            'kcal' =>  $records['kcal'],
            'saturates' => $records['saturates'],
            'carbs' =>  $records['carbs'],
            'fibre' =>  $records['fibre'],
            'sugars' =>  $records['sugars'],
            'protein' =>  $records['protein'],
            'salt' =>  $records['salt']
        ));
    }
    echo '<p>'. json_encode($loadData) .'</p>';  
    $number=0;    // declaring a variable $number

    file_put_contents('record.json', json_encode($loadData)); // adding the array to the json file 
    if(filesize("record.json")==$number){   //checks if there is a json data in the record.json, if not it creates one
            $initial_json= array($loadData);   //array holds json if this id the first data
            $save_json=$initial_json;
    }else{
        $old_json=json_decode(file_get_contents('record.json'));// checks if this is the first json data
        array_push($old_json,$array);   //adds new data to the array  
        $save_json=$old_json;      // assigns the data to $save_json variable
    }
    file_get_contents("record.json",json_encode($save_json,JSON_PRETTY_PRINT)); //stores the new data to record.json file

}
     echo '<table><tr><th>recipe_id</th><th>Fat</th><th>Kcal</th><th>Saturates</th><th>carbs</th><th>Sugars</th><th>protein</th><th>salt</th></tr>';
     echo '<tr><td>'.$records['recipe_id'].'</td><<td>'.$records['fat'].'</td><td>'.$records['kcal'].'</td><td>'.$records['saturates'].'</td>
     <td>'.$records['carbs'].'</td><td>'.$records['sugars'].'</td><td>'.$records['protein'].'</td><td>'.$records['salt'].'</td></tr>';

     echo '</table>';
?>
     <div>

     </div>    
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>
