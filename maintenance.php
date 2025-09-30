<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Under Maintenance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .maintenance-container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            font-size: 1.1em;
            margin-bottom: 20px;
        }
        .progress-container {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 25px;
            margin-bottom: 20px;
        }
        .progress-bar {
            height: 25px;
            width: 0;
            background-color: #4caf50;
            border-radius: 25px;
            transition: width 1s;
        }
        .countdown {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="maintenance-container">
        <h1>We're Currently Under Maintenance</h1>
        <p>Our website is undergoing some updates and will be back shortly. Please check back soon.</p>

        <!-- Countdown Timer -->
        <div class="countdown" id="countdown"></div>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>

        <!-- Try Again Button -->
        <button onclick="window.location.reload();">Try Again</button>
    </div>

    <script>
        // Countdown timer
        function countdownTimer() {
            var countdownElement = document.getElementById("countdown");
            var timeLeft = 5 * 60; // 5 minutes countdown (300 seconds)

            var interval = setInterval(function() {
                var minutes = Math.floor(timeLeft / 60);
                var seconds = timeLeft % 60;
                countdownElement.innerHTML = `Estimated time remaining: ${minutes}:${seconds < 10 ? "0" + seconds : seconds}`;
                timeLeft--;

                if (timeLeft < 0) {
                    clearInterval(interval);
                    countdownElement.innerHTML = "Maintenance completed. Please refresh.";
                    document.getElementById("progressBar").style.width = "100%";
                }
            }, 1000);
        }

        // Progress bar animation
        function progressBar() {
            var progressBar = document.getElementById("progressBar");
            var width = 0;
            var interval = setInterval(function() {
                if (width >= 100) {
                    clearInterval(interval);
                } else {
                    width++;
                    progressBar.style.width = width + "%";
                }
            }, 60); // Adjust the speed of the progress bar
        }

        // Start countdown and progress bar when the page loads
        window.onload = function() {
            progressBar();
        }
    </script>

</body>
</html>
