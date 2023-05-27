
var fieldIndex = 1;

function addInputFields() {
    fieldIndex++;
    var inputFieldsHTML =
        `<div class="input-fields">
            <label for="year${fieldIndex}">Year:</label>
            <input type="text" id="year${fieldIndex}" class="form-control" placeholder="Enter year">
            <label for="age${fieldIndex}">Age:</label>
            <input type="text" id="age${fieldIndex}" class="form-control" placeholder="Enter age">
            <button class="btn btn-danger delete-btn" style="margin:5px;" onclick="deleteInputFields(this)">Delete</button>
        </div>`;

    $('#inputFieldsContainer').append(inputFieldsHTML);
}

function deleteInputFields(button) {
        $(button).closest('.input-fields').remove();
    }

function calculatePattern() {
     // Hide the result container initially
     $('#resultContainer').hide();

    var inputFields = $('.input-fields');
    var data = [];

    var validInput = true; // Flag to track input validity

    // Retrieve the values from all input fields
    inputFields.each(function() {
        var year = $(this).find('input[type="text"]').eq(0).val();
        var age = $(this).find('input[type="text"]').eq(1).val();

        // Validate input
        if (year.trim() === '' || age.trim() === '') {
            alert('Please enter both year and age.');
            validInput = false;
            return;
        }

        // Validate negative numbers
        if (year < 0 || age < 0) {
            alert('Year and age must be positive numbers.');
            validInput = false;
            return;
        }


        // Convert year and age to numbers
        year = parseInt(year);
        age = parseInt(age);

        // Validate age
        if (isNaN(year) || isNaN(age) || age >= year) {
            alert('Invalid age value for year ' + year + '. Age must be less than year.');
            validInput = false;
            return;
        }

        data.push({
            year: year,
            age: age
        });
    });

    if (!validInput) {
        return; // Exit the function if input is invalid
    }

    // Perform the calculation
       // Send AJAX request to calculation.php
       $.ajax({
            url: 'Action/calculate.php',
            method: 'POST',
            data: { data: JSON.stringify(data) },
            success: function(response) {
                var result = response;
                //var result = JSON.parse(response);
                if (result.success) {
                    var summary  = result.summary ;
                    var description  = result.description ;
                    var average = result.average;
                    var averageDesc = result.averageDesc;

                    // Display the result
                    $('#summary').html(summary);
                    $('#description').html(description);
                    $('#averageDesc').html(averageDesc);
                    $('#average').html('Average: <b>' + average + '</b>');
                    $('#averageModal').html(average);
                    $('#resultContainer').show();
                    $('#exampleModal').modal('show');

                    
                    $(document).ready(function() {
                        $('#summonFireworks').click();
                        setTimeout(function() {
                            $('#destroyFireworks').click();
                        }, 2000); // 3000 milliseconds = 3 seconds
                    });

                } else {
                    alert('An error occurred during the calculation.');
                }
            },
            error: function() {
                alert('An error occurred during the AJAX request.');
            }
        });
}