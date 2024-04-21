<?php
require_once 'utils/header.php';
require_once 'utils/styles.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usn = $_POST['usn'];

    include_once 'classes/db1.php';

    $result = mysqli_query($conn, "SELECT * FROM registered r, staff_coordinator s, event_info ef, student_coordinator st, events e WHERE e.event_id = ef.event_id AND e.event_id = s.event_id AND e.event_id = st.event_id AND r.usn = '$usn' AND r.event_id = e.event_id");
?>
<div class="content">
    <div class="container">
        <h1>Registered Events</h1>
        <?php if (mysqli_num_rows($result) > 0) { ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Student Coordinator</th>
                    <th>Staff Coordinator</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['event_title'] . '</td>';
                        echo '<td>' . $row['st_name'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['Date'] . '</td>';
                        echo '<td>' . $row['time'] . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        <?php } else {
            echo 'Not yet registered for any events.';
        } ?>

        <!-- Section for displaying participated events results -->
        <div class="content">
            <div class="container">
                <h1>Participated Events Results</h1>
                <?php
                // Read contents of winners.txt file
                $winners_file = 'winners.txt'; // Update this with the actual path to winners.txt
                if (file_exists($winners_file)) {
                    $winners_content = file_get_contents($winners_file);
                    echo nl2br(htmlspecialchars($winners_content)); // Display contents with line breaks and HTML special characters encoded
                } else {
                    echo 'Winners file not found.';
                }
                ?>
            </div>

            <!-- Button to download certificate -->
            <div class="text-right">
                <a href="certificate/download_certificate.php" class="btn btn-primary">Download Certificate</a>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-default btn-lg"><a href="index.php"><strong>Register events</strong></a></button>
        </div>
    </div>
</div>

<?php

} else {
    // If the form hasn't been submitted, redirect or display an error message
}
?>
