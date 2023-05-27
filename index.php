<!DOCTYPE html>
<html>
<head>
    <title>Witch Exorcism Calculation</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Add Bootstrap JS and jQuery links -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src='js/jquery-2.1.3.min.js'></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fireworks.js"></script>
    <script src="js/core.js"></script>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container">
            <h2>Witch Exorcism Calculation</h2>
            <div id="inputFieldsContainer">
                <div class="input-fields">
                    <label for="year1">Year:</label>
                    <input type="text" id="year1" class="form-control" placeholder="Enter year">
                    <label for="age1">Age:</label>
                    <input type="text" id="age1" class="form-control" placeholder="Enter age">
                </div>
            </div>

            <div class="button-container">
                <button onclick="addInputFields()" class="btn btn-primary">Add More</button>
                <button onclick="calculatePattern()" class="btn btn-success" >Calculate</button>
                <button id="summonFireworks" style="display:none">Summon</button>
                <button id="destroyFireworks" style="display:none">Destroy</button>
            </div>

           

        </div>

        <div class="result-container" id="resultContainer" >
            <h3>Result</h3>
            <p id="summary"></p>
            <p id="description"></p>
            <p id="averageDesc"></p>
            <p id="average"></p>
            </div>
        </div>
    </div>

    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Counting result...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>BYE WITCH !!</h1>
                <h1><b> Our Average Count Is <b><label id="averageModal"></label></b></h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

</body>
</html>