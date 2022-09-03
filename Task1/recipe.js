$(document).ready(               // ready function run  the page once the DOM is loaded(Eldaw M,2019)
    (function UpdateRecipes(){     //function updateRecipes is self-executing
        setTimeout(function() {
       $.ajax({                  //$.ajax function retrieve data from json file
        url: "recipe.json",       //location of the file
        type:"GET",                //method used in getting the data
        dataType:"json",            //type of object
        success: function(data){    //A call back function to run if the ajax request is successfull
            let text = "";                  //declaring a variable text 
            $("#recipedata").html(" ");
            $.each(data.recipes, function(index){
            text += "<tr><td>" + data.recipes[index].id + "</td>" +"<td>"+ data.recipes[index].title + "</td>"+"<td>"+     // text Stores data for each column in the table
               data.recipes[index].author + "</td>" +"<td>" + data.recipes[index].preparationtime + "</td>" +"<td>" +
                data.recipes[index].cookingtime + "</td>" +"<td>"+ data.recipes[index].complexity + "</td>"+"<td>"+
                 data.recipes[index].serves + "</td>" + "<td>" + data.recipes[index].description  + "</td>"+ "<td>"+ 
                 data.recipes[index].ratings +  "<td><ul><li>"  + "kcal:"+ data.recipes[index].nutritionperserving.kcal +"</li>"+ "<li>"
                  +  "fat(g):"+ data.recipes[index].nutritionperserving.fat +"</li>" + "<li>"
                 +  "saturates(g):"+ data.recipes[index].nutritionperserving.saturates + "<li>"  
                 +  "carbs(g):"+ data.recipes[index].nutritionperserving.carbs +"</li>" 
                +"</li>"+"<li>" +"sugars(g):"+ data.recipes[index].nutritionperserving.sugars + "<li>"
                +  "fibre(g):"+ data.recipes[index].nutritionperserving.fibre + "<li>"
                +  "protein(g):"+ data.recipes[index].nutritionperserving.protein +"</li>" + "<li>"
                +  "salt(g):"+ data.recipes[index].nutritionperserving.salt +"</li></td><td>"; //storing data for table 
                
                  for (let index=0; index<data.recipes[index].ingredients.length;index++){     //The for loop loops through the ingredients(array) data
                      text += "<ul><li>" + data.recipes[index].ingredients[index]  + "</li></ul>"    //concatenating the data and saving it to text
                  }
                  text += "</td><td>";
                  for(let index=0;index<data.recipes[index].steps.length; index++){           //The for loop loops through the steps(array) data
                    text += "<ul><li><b>" + "Step" + (index+1) + " :</b>" + data.recipes[index].steps[index] + "</li></ul>"   //concatenating the data and saving it to text
                  }
                  text+= "</td><td><img src='"+ data.recipes[index].image +"'> </td></tr>";
                 
            });
            $("#recipedata").append(text);  //attach the data to the div
           UpdateRecipes(); // updateRecipes called within itself
        },
        error: function(){    // call back funtion to run if the ajax request is not sucessful
            $("#updatemessage").html("<p> an error occurred</p>");
        }
        });
    }, 250);
})());      
