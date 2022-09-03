<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <link rel="stylesheet" href="layout.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script> <!--library for chartjs-->
        <link rel="stylesheet" href="layout.css"> <!--calls the layout.css-->
        <script src="script.js"></script>
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
        foreach($_POST['check_list'] as $check) {  //loops through the checked boxes
        $stmt = $pdo->prepare('select n.kcal, n.fat,n.saturates,n.carbs,n.sugars,n.fibre,n.protein,n.salt,r.title from nutritionperserving n left join Recipes r on n.id=r.id where r.id = ?'); // query to select the checked recipe(s)
        $stmt->execute([$check]);  //execute it
        $records = $stmt->fetch();  //variable $records holds the fetch item
        array_push($loadData, array(    //array_push takes an array and multiple object i want to store
            'title'=> $records['title'],
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
    file_put_contents('record.json', json_encode($loadData)); // adds the array to the json file 
    echo '<table><tr><th>Title</th><th>Fat</th><th>Kcal</th><th>Saturates</th><th>carbs</th><th>Fibre</th><th>Sugars</th><th>protein</th><th>salt</th></tr>'; //creates a table for the recipes
    
    foreach($loadData as $row){  //foreach loops through the data and add the data to the table
     echo '<tr><td>'.$row['title'].'</td><td>'.$row['fat'].'</td><td>'.$row['kcal'].'</td><td>'.$row['saturates'].'</td>
      <td>'.$row['carbs'].'</td><td>'.$row['fibre'].'</td><td>'.$row['sugars'].'</td><td>'.$row['protein'].'</td><td>'.$row['salt'].'</td></tr>'; 
    }
    echo '</table>';
  
}
   
?>

     
         
        </main>
        
    </body>
</html>
