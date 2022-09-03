<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <link rel="stylesheet" href="layout.css">
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
            <h3> Recipe Selection Form</h3>
            <form action="recipeReport.php" method="POST">

           <?php
            include('./connection.php');   //database connection

            $records =$pdo->query('select e.id,e.title,e.author,e.preparationtime,e.cookingtime,e.complexity,e.serves,e.description,e.ratings,i.ingredient,n.kcal,n.fat,n.saturates,n.carbs,n.sugars,n.fibre,n.protein,n.salt,s.step from Recipes e left join Ingredients i on e.id=i.id left join nutritionperserving n on e.id=n.id left join Steps s on e.id=s.id');// query to select columns in the database  using join statement.
            echo '<table><tr><th>Check</th><th>Id</th><th>Title</th><th>Author</th><th>PreparationTime</th><th>CookingTime</th><th>Complexity</th><th>Serves</th><th>description</th><th>Ratings</th><th>Ingredient</th><th>Kcal</th><th>Fat</th><th>Saturates</th><th>carbs</th><th>Sugars</th><th>Fibre</th><th>Protein</th><th>Salt</th><th>Steps</th></tr>'; //display the table with head
            
            foreach ($records as $row){  //loops through the data and add it to the appropiate row
                echo '<tr><td><input type="checkbox"  name="check_list[]" value="'.$row['id'].'"/></td><td>'.$row['id'] .'</td><td>'.$row['title'].'</td><td>'.$row['author'].'</td>
                <td>'.$row['preparationtime'].'</td><td>'.$row['cookingtime'].'</td><td>'.$row['complexity'].'</td><td>'.$row['serves'].'</td><td>'.$row['description'].'</td><td>'.$row['ratings'].'</td><td>'.$row['ingredient'].'</td><td>'.$row['kcal'].'</td><td>'.$row['fat'].'</td><td>'.$row['saturates'].'</td><td>'.$row['carbs'].'</td><td>'.$row['sugars'].'</td>
                <td>'.$row['fibre'].'</td><td>'.$row['protein'].'</td><td>'.$row['salt'].'</td><td>'.$row['step'].'</td></tr>'; // display the tick box with the recipes in each row
            }
            echo '</table>';  // closes the table
            
            ?>
                <input type="submit" value="Create Recipe Report" />   <!--submit button-->
                       
            </form>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>     
            