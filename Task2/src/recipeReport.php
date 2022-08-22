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
            <h3>Recipe Report</h3>
            <?php
 if(isset($_POST['submit'])){           //if the submit button is clicked, it will save the data passed into database.
    $server = 'db';
    $username = 'root';
    $password = 'csym019';
    $schema = 'GoodFoodRecipes';    //The name of the database
    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
    [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
 


 }
?>
         
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>
