<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>YCET</title>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
</head>
<body>
    <?php require 'utils/header.php'; ?>
    <div class ="content"><!--body content holder-->
        <div class = "container">
            <div class ="col-md-6 col-md-offset-3">
                <form method="POST">
                    <label>Register No:</label><br>
                    <input type="text" name="usn" class="form-control" required><br><br>

                    <!-- Include a select dropdown for selecting event -->
                    <label>Select Event:</label><br>
                    <select name="event_id" class="form-control" required>
                        <option value="1">Event 1 - CryptoHunt</option>
                        <option value="2">Event 2 - Search-it</option>
                        <option value="3">Event 3 - Technical Quiz</option>
                        <option value="4">Event 4 - Competitive coding</option>
                        <option value="5">Event 5 - Pubg</option>
                        <option value="6">Event 6 - Counter-strike</option>
                        <option value="7">Event 7 - Fashion-show</option>
                        <option value="8">Event 8 - Dance</option>
                        <option value="9">Event 9 - Singing</option>
                        <option value="10">Event 10 - Svit-Idol</option>
                        <option value="11">Event 11 - Cooking without fire</option>
                        <option value="12">Event 12 - Short-Movie</option>  

                        <!-- Add more options for other events -->
                    </select><br><br>

                    <button type="submit" name="register">Register for Event</button><br><br>
                    <a href="usn.php"><u>Already registered ?</u></a>
                </form>
            </div>
        </div>
    </div>
    <?php require 'utils/footer.php'; ?>
</body>
</html>

<?php
if (isset($_POST["register"])) {
    $usn = $_POST["usn"];
    $event_id = $_POST["event_id"];

    if (!empty($usn)) {
        include 'classes/db1.php';

        // Insert data into registered table
        $INSERT = "INSERT INTO registered (usn, event_id) VALUES ('$usn', $event_id)";

        if ($conn->query($INSERT) === true) {
            echo "<script>
                alert('Registered Successfully for the event!');
                window.location.href='usn.php';
                </script>";
        } else {
            echo "<script>
                alert('Already registered for this event');
                window.location.href='usn.php';
                </script>";
        }

        $conn->close();
    } else {
        echo "<script>
            alert('Register No (usn) is required');
            window.location.href='register.php';
            </script>";
    }
}
?>