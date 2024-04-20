<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>YCET</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google+Sans&display=swap">
    <style>
        body {
            font-family: 'Google Sans', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 300px;
            margin-bottom: 20px;
        }

        .form-container input[type="file"],
        .form-container button {
            margin-top: 10px; /* Adjust spacing between input and button */
        }

        .preview-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center items horizontally */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        .certificate-container {
            text-align: center;
            margin: 10px; /* Adjust spacing between certificate containers */
        }

        .certificate-container img {
            max-width: 200px;
            max-height: 200px;
        }

        .certificate-container button {
            margin-top: 5px; /* Adjust spacing between image and button */
        }

        .leftmost {
            margin-right: auto; /* Push the image to the left */
        }

        .rightmost {
            margin-left: auto; /* Push the image to the right */
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

    <!-- Section to display generated certificates -->
    <div class="preview-container">
        <?php
        // Display generated certificates
        $certificate_directory = "generated-certificates/";
        $certificate_files = glob($certificate_directory . "*.jpg");    
        foreach ($certificate_files as $certificate) {
            // Output the image and download button container
            echo '<div class="certificate-container">';
            echo '<a href="' . $certificate . '" download>';
            echo '<img src="' . $certificate . '" alt="Certificate">';
            echo '</a>';
            // Add a download button below the certificate image
            echo '<div>';
            echo '<a href="' . $certificate . '" download><button>Download Certificate</button></a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
