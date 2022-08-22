 $(document).ready(
    (function UpdateRecipes(){     //function updateRecipes is self-executing
        setTimeout(function() {
       $.ajax({                  //$.ajax function retrieve data from json file
        url: "recipe.json",
        type:"GET",
        dataType:"json",
        success: function(data){
            let text = "";                  //declaring a variable text 
            $("#recipedata").html(" ");
            $.each(data.recipes, function(index){
            text += "<tr><td>" + data.recipes[index].id  +"<td>"+ data.recipes[index].title +"<td>"+     //Storing data for table using html tags.
               data.recipes[index].author +"<td>" + data.recipes[index].preparationtime  +"<td>" +
                data.recipes[index].cookingtime +"<td>"+ data.recipes[index].complexity +"<td>"+
                 data.recipes[index].serves + "<td>" + data.recipes[index].description + "<td>"+ 
                 data.recipes[index].ratings +  "<td><ul><li>"  + "kcal:"+ data.recipes[index].nutritionperserving.kcal +"</li>"+ "<li>"
                  +  "fat(g):"+ data.recipes[index].nutritionperserving.fat +"</li>" + "<li>"
                 +  "saturates(g):"+ data.recipes[index].nutritionperserving.saturates + "<li>"  
                 +  "carbs(g):"+ data.recipes[index].nutritionperserving.carbs +"</li>" 
                +"</li>"+"<li>" +"sugars(g):"+ data.recipes[index].nutritionperserving.sugars + "<li>"
                +  "fibre(g):"+ data.recipes[index].nutritionperserving.fibre + "<li>"
                +  "protein(g):"+ data.recipes[index].nutritionperserving.protein +"</li>" + "<li>"
                +  "salt(g):"+ data.recipes[index].nutritionperserving.salt +"</li></td><td>"; //storing data for table 
             
                  for (let index=0; index<data.recipes[index].ingredients.length;index++){     //The for loop loops through the ingredients(array) data
                      text += "<ul><li>" + data.recipes[index].ingredients[index]  + "</li></ul>"    //concatenating the data and saving it to txt
                  }
                  text += "</td><td>";
                  for(let index=0;index<data.recipes[index].steps.length; index++){           //The for loop loops through the steps(array) data
                    text += "<ul><li><b>" + "Step" + (index+1) + " :</b>" + data.recipes[index].steps[index] + "</li></ul>"   //concatenating the data and saving it to txt
                  }
                  text+= "</td><td><img src='"+ data.recipes[index].image +"'> </td></tr>";
                 
                  console.log(data.recipes[index].cookingtime);          


            });
            $("#recipedata").append(text);  //attach the data to the div
           UpdateRecipes(); // updateRecipes called within itself
        },
        error: function(){
            $("#updatemessage").html("<p> an error occurred</p>");
        }
        });
    }, 250);
})());      