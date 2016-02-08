<!DOCTYPE html>
<html>
<head>
    <title>Defuse the BOM</title>
</head>
<body>
    <h2 id="message">This BOM will self destruct in <span id="timer">5</span> seconds...</h2>

    <button id="defuser">Defuse the BOM</button>

    <script>
        var detonationTimer = 5;
        var interval = 1000;
        var delay = 3000;


        // TODO: This function needs to be called once every second

        function updateTimer()
        {
            // console.log('Inside update');
            if (detonationTimer == 0) {
                alert('EXTERMINATE!');
                document.body.innerHTML = '';
                clearInterval(intervalID);
            } else if (detonationTimer > 0) {
                document.getElementById('timer').innerHTML = detonationTimer;
            }

            detonationTimer--;
        }

        var intervalID = setInterval(updateTimer, interval);
        // var timeoutID = setTimeout(updateTimer, delay);

        // TODO: When this function runs, it needs to
        // cancel the interval/timeout for updateTimer()
        function defuseTheBOM()
        {
            clearInterval(intervalID);
            alert('You saved us all !!!!!!!!');
        }

        // Don't modify anything below this line!
        //
        // This causes the defuseTheBOM() function to be called
        // when the "defuser" button is clicked.
        // We will learn about events in the DOM lessons
        var defuser = document.getElementById('defuser');
        defuser.addEventListener('click', defuseTheBOM, false);
    </script>
</body>
</html>
