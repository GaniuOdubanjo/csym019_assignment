window.onload = makeAjaxRequest;           //window object 
function makeAjaxRequest(){                // function makeAjaxRequest checks if the the browser support XMLHttpRequest
    if(window.XMLHttpRequest){              // if the the brower support it, it will create XMLHttpRequest
        xhr = new XMLHttpRequest();          // creates the XMLHttpRequest() which is passed to an object
    } else {
        if (window.ActiveXObject){                   // it checks if it support ActiveXObject
            xhr = new ActiveXObject("Mircrosoft.XMLHTTP");      // creates ACtiveXobject which is handled by an object
        }
    }
    if(xhr){
        xhr.open("GET","recipe.json",true);             //Open function takes three parameter which are method, URl and synchronous and asynchronous.it is used to configure an XMLHTTpRequest object to connect the action with server. 
        xhr.send();                           //send function is used to send the configured XMLHttpRequest          
        xhr.onreadystatechange = showContents;    // onreadystatechange is used to check readyState change in property and showContents function is used to display the table.
    }else{
        document.getElementById("updatemessages").innerHTML = "Could not perform stated Request";  //it returns error in the table 
    }
    function showContents(){     //function showContents displays the data read from the json file
        if(xhr.readyState ==4){     // xhr.readyState checks if the ready state is equal to 4
            if(xhr.status ==200){    //xhr.status checks is the status is equal to 200 before 
                let data = JSON.parse(xhr.responseText);          // variable data holds the read file
                let text = "";                                       //declaring a variable txt 
                for(let i=0;i<data.recipes.length;i++){           //declares a for loop that reads the json file(array)
                    text += "<tr><td>" + data.recipes[i].id  +"<td>"+ data.recipes[i].title +"<td>"+     //Storing data for table using html tags.
                     data.recipes[i].author +"<td>" + data.recipes[i].preparationtime  +"<td>" +
                      data.recipes[i].cookingtime +"<td>"+ data.recipes[i].complexity +"<td>"+
                       data.recipes[i].serves + "<td>" + data.recipes[i].description + "<td>"+ 
                       data.recipes[i].ratings +  "<td><ul><li>"  + "kcal:"+ data.recipes[i].nutritionperserving.kcal +"</li>"+ "<li>"
                        +  "fat(g):"+ data.recipes[i].nutritionperserving.fat +"</li>" + "<li>"
                       +  "saturates(g):"+ data.recipes[i].nutritionperserving.saturates + "<li>"  
                       +  "carbs(g):"+ data.recipes[i].nutritionperserving.carbs +"</li>" 
                      +"</li>"+"<li>" +"sugars(g):"+ data.recipes[i].nutritionperserving.sugars + "<li>"
                      +  "fibre(g):"+ data.recipes[i].nutritionperserving.fibre + "<li>"
                      +  "protein(g):"+ data.recipes[i].nutritionperserving.protein +"</li>" + "<li>"
                      +  "salt(g):"+ data.recipes[i].nutritionperserving.salt +"</li></td><td>"; //storing data for table 
                        
                        for (let i=0; i<data.recipes[i].ingredients.length;i++){     //The for loop loops through the ingredients(array) data
                            text += "<ul><li>" + data.recipes[i].ingredients[i]  + "</li></ul>"    //concatenating the data and saving it to txt
                        }
                        text += "</td><td>";
                        for(let i=0;i<data.recipes[i].steps.length; i++){           //The for loop loops through the steps(array) data
                          text += "<ul><li><b>" + "Step" + (i+1) + " :</b>" + data.recipes[i].steps[i] + "</li></ul>"   //concatenating the data and saving it to txt
                        }
                        text+= "</td><td><img src='"+ data.recipes[i].image +"'> </td></tr>";
                       
                        console.log(data.recipes[i].cookingtime);         //prints cookingtime in the console
                }
                document.getElementById("recipedata").innerHTML = text;     // it attach the datas to the columns
            } else {
                document.getElementById("updatemessage").innerHTML = "An error occured: " + xhr.status;
            }
        }
    }

}

(function update() {             //update function is a self executing function that keeps calling itself
    setTimeout(function (){     //function setTimeout execute makeAjaxRequest 
        makeAjaxRequest();
        update(); 
    }, 2500)
})();