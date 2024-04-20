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
