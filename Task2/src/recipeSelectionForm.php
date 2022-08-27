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
            <form action="recipeReport.php" method="POST" class="addmore">

           <?php
            $server = 'db';
            $username = 'root';
            $password = 'csym019';
            $schema = 'GoodFoodRecipes';    //The name of the database
            $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
            [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

          
            ?>
                <input type="submit" value="Create Recipe Report" />
                <!--input type="reset" value="Cancel" /-->                
            </form>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>     
            