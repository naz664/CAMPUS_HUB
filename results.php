<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>YCET</title>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
    <style>
        .participant-btn {
            display: inline-block;
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 8px;
        }

        .participant-btn:hover {
            background-color: #45a049;
        }

        .print-btn {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php require 'utils/adminHeader.php'; ?>

    <?php

    // Define arrays to store results for each event
    $results = array(
        "cryptohunt" => array(),
        "search-it" => array(),
        "technical-quiz" => array(),
        "competitive-coding" => array(),
        "pubg" => array(),
        "counter-strike" => array(),
        "fashion-show" => array(),
        "dance" => array(),
        "singing-show" => array(),
        "svit-idol" => array(),
        "cooking-without-fire" => array(),
        "short-movie" => array()
    );

    // Function to allocate positions for an event
    function allocateResults($event, $position, $participant)
    {
        global $results;
        $results[$event][$position] = $participant;
    }

    // Allocate results for each event
    // Example usage: allocateResults("event", 1, "participant_name");
    allocateResults("cryptohunt", 1, "winner1");
    allocateResults("cryptohunt", 2, "winner2");
    allocateResults("cryptohunt", 3, "winner3");

    allocateResults("search-it", 1, "winner1");
    allocateResults("search-it", 2, "winner2");
    allocateResults("search-it", 3, "winner3");

    // Continue allocating results for other events...

        // Allocate results for each event
allocateResults("technical-quiz", 1, "winner1");
allocateResults("technical-quiz", 2, "winner2");
allocateResults("technical-quiz", 3, "winner3");

allocateResults("competitive-coding", 1, "winner1");
allocateResults("competitive-coding", 2, "winner2");
allocateResults("competitive-coding", 3, "winner3");

allocateResults("pubg", 1, "winner1");
allocateResults("pubg", 2, "winner2");
allocateResults("pubg", 3, "winner3");

allocateResults("counter-strike", 1, "winner1");
allocateResults("counter-strike", 2, "winner2");
allocateResults("counter-strike", 3, "winner3");

allocateResults("fashion-show", 1, "winner1");
allocateResults("fashion-show", 2, "winner2");
allocateResults("fashion-show", 3, "winner3");

allocateResults("dance", 1, "winner1");
allocateResults("dance", 2, "winner2");
allocateResults("dance", 3, "winner3");

allocateResults("singing-show", 1, "winner1");
allocateResults("singing-show", 2, "winner2");
allocateResults("singing-show", 3, "winner3");

allocateResults("svit-idol", 1, "winner1");
allocateResults("svit-idol", 2, "winner2");
allocateResults("svit-idol", 3, "winner3");

allocateResults("cooking-without-fire", 1, "winner1");
allocateResults("cooking-without-fire", 2, "winner2");
allocateResults("cooking-without-fire", 3, "winner3");

allocateResults("short-movie", 1, "winner1");
allocateResults("short-movie", 2, "winner2");
allocateResults("short-movie", 3, "winner3");

    // Print results
    foreach ($results as $event => $participants) {
        echo "<h3>Event: $event</h3>";
        foreach ($participants as $position => $participant) {
            echo "<button class='participant-btn' data-event='$event' data-position='$position'>$participant</button>";
        }
        echo "<br><br>";
    }

    ?>

    <button class="print-btn">Print Winners</button>
    
   <script>
   document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.participant-btn');
    var winnersData = {}; // Object to store winner names for each event

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var event = this.getAttribute('data-event');
            var position = this.getAttribute('data-position');
            var newName = prompt("Enter new name:");
            if (newName !== null && newName !== "") {
                this.textContent = newName;
                // Store the entered name in the winnersData object
                if (!winnersData[event]) {
                    winnersData[event] = {};
                }
                winnersData[event][position] = newName;
            }
        });
    });

    // Print Winners Button Functionality
    var printBtn = document.querySelector('.print-btn');
    printBtn.addEventListener('click', function() {
        var results = <?php echo json_encode($results); ?>;
        var output = '';

        // Construct the output
        for (var event in results) {
            var eventOutput = '';
            var winnersOutput = '';
            
            for (var i = 0; i < results[event].length; i++) {
                // Check if a name is entered for each winner position
                var winnerName = winnersData[event] && winnersData[event][i + 1];
                if (winnerName) {
                    winnersOutput += "Position " + (i + 1) + ": " + winnerName + "\n";
                } else {
                    winnersOutput += "Position " + (i + 1) + ": Data Not Available\n";
                }
            }

            // Include details of winner1, winner2, winner3
            var winner1 = winnersData[event] && winnersData[event][1];
            var winner2 = winnersData[event] && winnersData[event][2];
            var winner3 = winnersData[event] && winnersData[event][3];
            eventOutput += "Event: " + event + "\n";
            eventOutput += winnersOutput;
            eventOutput += "Winner 1: " + (winner1 ? winner1 : "Data Not Available") + "\n";
            eventOutput += "Winner 2: " + (winner2 ? winner2 : "Data Not Available") + "\n";
            eventOutput += "Winner 3: " + (winner3 ? winner3 : "Data Not Available") + "\n\n";
            
            // Append the event details to the output
            output += eventOutput;
        }

        // Generate a Blob containing the text
        var blob = new Blob([output], { type: 'text/plain' });

        // Create a link to download the file
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'winners.txt';

        // Append the link to the body and click it programmatically
        document.body.appendChild(link);
        link.click();

        // Cleanup
        document.body.removeChild(link);
    });
});               
</script>
                
</body>
</html>
