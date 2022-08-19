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
            <h3>New Recipe Entery Form</h3>
            <form action="/newRecipe.php" method="POST">              <!--form tag for accepting data-->
                title:<p><input type="text" name="title"/></p>
                author:<p><input type="text" name="author"/></p>
                preparationTime:<p><input type="text" name="preparationtime"/></p>  
                cookingtime:<p><input type="text" name="cookingtime"/></p> 
                complexity:<p><input type="text" name="complexity"/></p> 
                serves:<p><input type="text" name="serves"/></p> 
                description:<p><input type="text" name="description"/></p>  
                ratings:<p><input type="text" name="ratings"/></p> 
                Kcal:<p><input type="text" name="kcal"/></p>
                fat:<p><input type="text" name="fat"/></p>
                Saturates:<p><input type="text" name="saturates"/></p>
                Carbs:<p><input type="text" name="carbs"/></p>
                Sugars:<p><input type="text" name="sugars"/></p>
                Fibre:<p><input type="text" name="fibre"/></p>  
                Protein:<p><input type="text" name="protein"/></p>
                Salt:<p><input type="text" name="salt"/> </p>  
                Ingredients:<p><input type="text" name="ingredients"/></p>
                Steps:<p><input type="text" name="steps"/> </p>        
                <input type="submit" value="Add recipe" name="submit"/>
            </form>
            <?php
            if(isset($_POST['submit'])){           //if the submit button is clicked, it will save the data passed into database.
            $server = 'db';
            $username = 'root';
            $password = 'csym019';
            $schema = 'GoodFoodRecipes';    //The name of the database
            $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
            [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
            $stmt = $pdo->prepare('INSERT INTO Recipes(title,author,preparationtime,cookingtime,complexity,serves,`description`,ratings)  
            VALUES (?,?,?,?,?,?,?,?)');   // preparing the query(inserting the passed value)

            $values = [
            $_POST['title'],                     //get the user input using the post
            $_POST['author'],
            $_POST['preparationtime'],
            $_POST['cookingtime'],
            $_POST['complexity'],
            $_POST['serves'],
            $_POST['description'],
            $_POST['ratings']
            ];
            $stmt->execute($values);
            $recipe_id = $pdo -> lastInsertId(); //get id and asign it to variable called recipe_id
            echo '<h2>' .'Form submitted'.'</h2>';
            // store ingredient
            $stmt = $pdo->prepare('INSERT INTO Ingredients(ingredient,recipe_id) VALUES (?,?)');
            $values = [ $_POST['ingredients'], $recipe_id];
            $stmt->execute($values); 
            // store step
            $stmt = $pdo->prepare('INSERT INTO Steps(step,recipe_id) VALUES (?,?)');
            $values= [ $_POST['steps'], $recipe_id];
            $stmt->execute($values); 
            // store nutritionperserving
            $stmt = $pdo->prepare('INSERT INTO nutritionperserving(kcal,fat,saturates,carbs,sugars,fibre,protein,salt,recipe_id) 
            VALUES (?,?,?,?,?,?,?,?,?)');
             $values = [
                $_POST['kcal'],                     //get the user input using the post
                $_POST['fat'],
                $_POST['saturates'],
                $_POST['carbs'],
                $_POST['sugars'],
                $_POST['fibre'],
                $_POST['protein'],
                $_POST['salt'],
                $recipe_id];
            $stmt->execute($values); 
           $steps_id = $stmt->id; //get id and asign it to variable called ingredient_id*/
            }
            
?>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>