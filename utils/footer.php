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

<footer>
    <div class="container">
        <div class="row">
            <section class="footerContent col-md-4">
                <!-- Left content -->
                YOUNUS COLLEGE OF ENGG. AND TECHNOLOGY, <br />
                VADAKKEVILA PO,<br />
                KOLLAM DIST,<br />
                KERALA, INDIA<br />
                Pin: 691010.<br />
            </section>
            <section class="footcontent col-md-4">
                <!-- Middle content -->
            </section>
            <section class="footcontent col-md-4">
                <!-- Right content -->
                Follow Us:<br>
                <a href="https://www.facebook.com/ycetkollam10/"><img src="images/facebook.png" width="43px" alt="Facebook"></a>
                <a href="https://www.instagram.com/younus_college_of_engineering/"><img src="images/instagram.png" width="50px" alt="Instagram"></a>
                <a href="https://www.youtube.com/channel/UCPOxd7Y-RTM4Ye2-aREjIcA"><img src="images/youtube.png" width="50px" alt="YouTube"></a>

                <form method="post" action="" onsubmit="return validateForm()">
                    <label for="registerno">Reg No:</label><br>
                    <input type="text" id="registerno" name="registerno"><br>
                    <label for="feedback">Feedback:</label><br>
                    <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br><br>
                    <input type="submit" value="Submit">
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $registerno = $_POST['registerno'];
                    $feedback = $_POST['feedback'];

                    if (!empty($feedback)) {
                        include 'classes/db1.php';
                        $sql = "INSERT INTO feedback (registerno, feedback) VALUES (?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ss", $registerno, $feedback);
                        if ($stmt->execute()) {
                         //   echo "<p>Feedback submitted successfully!</p>";
                        } else {
                            echo "<p>Error: " . $stmt->error . "</p>";
                        }
                        $stmt->close();
                        $conn->close();
                    } else {
                        echo "<p>Please provide feedback before submitting!</p>";
                    }
                }
                ?>

                <script>
                    function validateForm() {
                        var registerNo = document.getElementById("registerno").value;
                        if (registerNo.length !== 10) {
                            alert("Registration number should be 10 digits long.");
                            return false;
                        }
                        return true;
                    }
                </script>
            </section>
        </div>
    </div>
</footer>
