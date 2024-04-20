<style>
    /* CSS styles for the feedback form */
    #registerno, #feedback {
        color: black; /* Change text color to black */
    }

    /* Style for the submit button */
    input[type="submit"] {
        color: black; /* Change text color to black */
        background-color: #ffffff; /* Change background color to white */
        border: 1px solid black; /* Add a black border */
        padding: 5px 10px; /* Add padding to the button */
        cursor: pointer; /* Change cursor to pointer on hover */
    }

    input[type="submit"]:hover {
        background-color: #000000; /* Change background color to black on hover */
        color: #ffffff; /* Change text color to white on hover */
    }
</style>

<hr class="footerline"> <!--css modified horizontal line-->
<footer>
    <div class="container">
        <div class="row">
            <section>
                <div class="footerContent col-md-4"><!--left content-->
                    YOUNUS COLLEGE OF ENGG. AND TECHNOLOGY, <br />
                    VADAKKEVILA PO,<br />
                    KOLLAM DIST,<br />
                    KERALA, INDIA<br />
                    Pin: 691010.<br />
                </div>
            </section>
            <section>
                <div class="footcontent col-md-4"><!--middle content-->
                </div>
            </section>
            <section>
                <div class="footcontent col-md-4"><!--right content-->
                    Follow Us:<br>
                    <a href="https://www.facebook.com/ycetkollam10/"><img src="images/facebook.png" width="43px"></a>
                    <a href="https://www.instagram.com/younus_college_of_engineering/"><img src="images/instagram.png" width="50px"></a>
                    <a href="https://www.youtube.com/channel/UCPOxd7Y-RTM4Ye2-aREjIcA"><img src="images/youtube.png" width="50px"></a>

                    <!-- Feedback form -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="regno">Register No:</label><br>
                        <input type="text" id="regno" name="regno" required><br><br>

                        <label for="feedback">Feedback:</label><br>
                        <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br>

                        <input type="submit" value="Send">
                    </form>
                    <!-- End of Feedback form -->
                </div>
            </section>
        </div>
    </div>      

    <?php
// Assuming you have a database connection established already

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $regno = $_POST['regno'];
    $feedback = $_POST['feedback'];

    include 'classes/db1.php';

    $INSERT = "INSERT INTO feedback (regno,feedback) VALUES ('$regno','$feedback')";

    // Optionally, you can provide a confirmation message
    echo "Feedback submitted successfully!";


   /* if ($conn->query($INSERT) === True) {
        echo "<script>
                alert('Feedback send Successfully!');
                window.location.href='index.php';
                </script>";
    } else {
        echo "<script>
                alert(' Error sending data');
                window.location.href='index.php';
                </script>";
    } */

    $conn->close();

}
?>

</footer>
