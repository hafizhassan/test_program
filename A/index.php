<html>

<head>
    <title> Programming Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Programming Test</h5>

            <div class="row">
                <form>
                    <div class="mb-3">
                        <label for="numberofpeople" class="form-label">Number of people</label>
                        <input type="text" class="form-control" min=0 id="number_of_people" aria-describedby="Number of people">
                        <div id="noOfPeopleHelp" class="form-text">Please enter number of people to play.</div>
                    </div>

                    <div class="mb-3">
                        <label for="numberofcard" class="form-label">Number of card</label>
                        <input type="text" class="form-control" min=1 id="number_of_card" aria-describedby="Number of card">
                        <div id="noOfCardHelp" class="form-text">Please enter number of card given to the player.</div>
                    </div>

                    <button type="button" class="btn btn-primary" id="play">Lets Play!</button>
                    <button type="button" class="btn btn-danger" id="reset">Reset</button>

                </form>
            </div>
        </div>
    </div>

    <div class="card mt-3" id="displayDiv">
        <div class="card-body">
            <h5 class="card-title">Output</h5>

            <div class="row">
                <div class="mb-3" id="display">

                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        $('#displayDiv').hide();

    });

    $("#play").on("click", function() {

        $.post("api.php", {
                number_of_people: $('#number_of_people').val(),
                number_of_card: $('#number_of_card').val(),
            })
            .done(function(data) {
                $('#display').html(data.message);
                $('#displayDiv').show();
            })
            .fail(function(data) {
                let msg = data.responseJSON;
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: msg.message,
                });
            });
    });

    $("#reset").on("click", function() {

        $('#number_of_people').val();
        $('#number_of_card').val();

        $('#displayDiv').hide();
        $('#display').html(data.message);
    });
</script>

</html>