<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>YCET</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google+Sans&display=swap">
    <style>
        body {
            font-family: 'Google Sans', sans-serif; /* Apply Google Sans font to the entire page */
            display: flex;
            justify-content: center; /* Center contents horizontally */
            align-items: center; /* Center contents vertically */
            height: 100vh; /* Set the height of the body to full viewport height */
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center contents horizontally within the form container */
            width: 300px; /* Set a fixed width for the form container */
        }

        .form-container input[type="file"],
        .form-container button {
            width: 100%; /* Make the input field and button fill the width of the container */
            box-sizing: border-box; /* Include padding and border in the element's total width */
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="col-md-12">
        <h1>Certificate Menu</h1> 
        <!-- Form for uploading a file -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-container">
                <input type="file" name="name_data_file"> <!-- File input field -->
                <button type="submit" name="generate_certificate"><strong>Generate certificate</strong></button> <!-- Submit button -->
            </div>
        </form>
    </div>

    <?php
    // PHP code to handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate_certificate"])) {
        // Check if a file has been uploaded
        if ($_FILES['name_data_file']['error'] === UPLOAD_ERR_OK) {
            // Get the temporary location of the uploaded file
            $tmp_name = $_FILES['name_data_file']['tmp_name'];

            // Execute the Python script to generate certificates, passing the temporary location of the uploaded file
            $output = exec("python run.py {$tmp_name}");

            // Output the result of the Python script execution
            echo "<p>$output</p>";
        } else {
            // Display an error message if there's an issue with the uploaded file
            echo "<p>Error uploading file.</p>";
        }
    }
    ?>
</body>
</html>
