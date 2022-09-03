function loadchart() {
    $.getJSON("record.json", function (data) {
        for (let index = 0; index < data.length; index++) { // The for loop loops through the item in the json file
            let test = {  
                data: [data[index].fat, data[index].saturates, data[index].carbs, data[index].fibre, data[index].sugars, data[index].protein, data[index].salt], // reads the data  
               
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'

                ],
                borderColor: [
                     'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
                ],
                borderWidth: (index + 1) //produce the number of index
            };
           
            var container = document.createElement('div'); //creates an element named div
            container.className="container";//assigns a classname in the css 
            var myElement = document.createElement('canvas');  //creates an element canvas
            container.appendChild(myElement); //adds the created element to the container
            var kcal = document.createElement('p');  //creates an element paragraph
            kcal.innerHTML = "Kcal: "+ data[index].kcal;// set the text to be the value am passing
            container.appendChild(kcal); //adds the created element to the container
            document.getElementsByTagName("main")[0].appendChild(container); // returns an element with the given tag name
            const ctx = myElement.getContext('2d');  //looks for myelement in the html and reads it in javascript. getcontent('2d') draws in the canverse tag the parameter provided
            const myChart = new Chart(ctx, {
            type: 'pie',   //type of chart which is pie chart
            data: {
                labels: ['fat','saturates', 'carbs', 'fibre', 'sugars','protein','salt'],  // labels for the data 
                datasets: [test]
            },
            options: {
                responsive: true,
                plugins: {
                  title: {
                    display: true,
                    text: data[index].title
                  }
                }
              }
        });
        }
        
        if(data.length > 1){

            var payload = [];
            for (let index = 0; index < data.length; index++) { // using for loop to loop through the data stored in the json
                let test = {  
                    data: [data[index].fat, data[index].saturates, data[index].carbs, data[index].fibre, data[index].sugars, data[index].protein, data[index].salt], // reads the data 
                   
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
    
                    ],
                    borderColor: [
                         'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: (index + 1)
                };
                payload.push(test);
            }

            var container = document.createElement('div'); //creates an element named div
            container.className="container";  //assigns a classname
            var myElement = document.createElement('canvas'); // var myElemnt holds the created element
            container.appendChild(myElement); //attach myElement to the container
            document.getElementsByTagName("main")[0].appendChild(container);  //returns an element with the given tag name
            const ctx = myElement.getContext('2d');  //looks for myelement in the html and reads it in javascript. getcontent('2d') draws in the canverse tag the parameter provided
            const myChart = new Chart(ctx, {
                type: 'bar',   //type of chart which is bar chart
                data: {
                    labels: ['fat','saturates', 'carbs', 'fibre', 'sugars','protein','salt'],  // labels for the data 
                    datasets: payload
                },
            });
    
        }
    });


    
};
document.addEventListener('DOMContentLoaded', loadchart); // loads the function after the page is loaded


