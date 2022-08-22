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
            <form action="./recipeReport.php" class="addmore">

           <?php
            $server = 'db';
            $username = 'root';
            $password = 'csym019';
            $schema = 'GoodFoodRecipes';    //The name of the database
            $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
            [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            $records =$pdo->query('select e.title,e.author,e.preparationtime,e.cookingtime,e.complexity,e.serves,e.description,e.ratings,i.ingredient,n.kcal,n.fat,n.saturates,n.carbs,n.sugars,n.fibre,n.protein,n.salt,s.step from Recipes e left join Ingredients i on e.id=i.id left join nutritionperserving n on e.id=n.id left join Steps s on e.id=s.id');
            echo '<table><tr><th>CHECK</th><th>Title</th><th>Author</th><th>PreparationTime</th><th>CookingTime</th><th>Complexity</th><th>Serves</th><th>description</th><th>Ratings</th><th>Ingredient</th><th>Kcal</th><th>Fat</th><th>Saturates</th><th>carbs</th><th>Sugars</th><th>Fibre</th><th>Protein</th><th>Salt</th><th>Steps</th></tr>';
            
            foreach ($records as $row){
                echo '<tr><td><input type="checkbox" value="'.$row['title'].'"name=recipe[]"/></td><td>'.$row['title'].'</td><td>'.$row['author'].'</td>
                <td>'.$row['preparationtime'].'</td><td>'.$row['cookingtime'].'</td><td>'.$row['complexity'].'</td><td>'.$row['serves'].'</td><td>'.$row['description'].'</td><td>'.$row['ratings'].'</td><td>'.$row['ingredient'].'</td><td>'.$row['kcal'].'</td><td>'.$row['fat'].'</td><td>'.$row['saturates'].'</td><td>'.$row['carbs'].'</td><td>'.$row['sugars'].'</td>
                <td>'.$row['fibre'].'</td><td>'.$row['protein'].'</td><td>'.$row['salt'].'</td><td>'.$row['step'].'</td></tr>';
            }
            echo '</table>';
            
            ?>
                <input type="submit" value="Create Recipe Report" />
                <!--input type="reset" value="Cancel" /-->                
            </form>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>     
            