const ctx = document.getElementById('myChart');

var categories = [];
var data = [];

$(document).ready(function () {
    $.ajax({
        url: 'home/pieData',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            for (var i = 0; i < response.length; i++) {
                categories.push(response[i].category_name);
                data.push(response[i].content_count);
            }
            console.log(categories);
            console.log(data);
            new Chart(ctx, { 
                type: 'pie',
                data:  { 
                  labels: categories,
                  datasets: [ { 
                    label: 'Number of Contents',
                    data: data,
                    borderWidth: 4,
                    hoverBorderColor: 'Black'
                   } ]
                 } 
             } );
        },
        error: function(error) {
            console.error("Error fetching data:", error);
        }
    });
 } );