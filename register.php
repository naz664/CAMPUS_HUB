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

                <label>Student Name:</label><br>
                <input type="text" name="name" class="form-control" required><br><br>
                
                <label>Password:</label><br>
                <input type="text" name="reg_password" class="form-control" required><br><br>

                <label>Branch:</label><br>
                <input type="text" name="branch" class="form-control" required><br><br>

                <label>Semester:</label><br>
                <input type="text" name="sem" class="form-control" required><br><br>

                <label>Email:</label><br>
                <input type="text" name="email"  class="form-control" required ><br><br>

                <label>Phone:</label><br>
                <input type="text" name="phone"  class="form-control" required><br><br>

                <label>College:</label><br>
                <input type="text" name="college"  class="form-control" required><br><br>

                <button type="submit" name="update" required>Submit</button><br><br>
                <a href="usn.php" ><u>Already registered ?</u></a>
            </form>
        </div>
    </div>
</div>

<?php require 'utils/footer.php'; ?>

<?php

if (isset($_POST["update"])) {
    $usn = $_POST["usn"];
    $name = $_POST["name"];
    $reg_password = $_POST["reg_password"];
    $branch = $_POST["branch"];
    $sem = $_POST["sem"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $college = $_POST["college"];

    if (!empty($usn) || !empty($name) || !empty($reg_password) || !empty($branch) || !empty($sem) || !empty($email) || !empty($phone) || !empty($college)) {

        include 'classes/db1.php';
        
        // Validate USN (Register No)
        if(strlen($usn) != 10) {
            echo "<script>
                    alert('Register No (USN) must be 10 digits');
                    window.location.href='register.php';
                  </script>";
            exit(); // Stop further execution
        }

        // Validate phone number
        if(strlen($phone) != 10 || !ctype_digit($phone)) {
            echo "<script>
                    alert('Phone number must be 10 digits and contain only numbers');
                    window.location.href='register.php';
                  </script>";
            exit(); // Stop further execution
        }

        // Validate email
        if (!preg_match('/@(gmail|yahoo)\.com$/', $email)) {
            echo "<script>
                    alert('Please enter a valid Email address');
                    window.location.href='register.php';
                  </script>";
            exit(); // Stop further execution
        }
        
        $INSERT = "INSERT INTO participent (usn,name,reg_password,branch,sem,email,phone,college) VALUES('$usn','$name','$reg_password','$branch',$sem,'$email','$phone','$college')";

        if ($conn->query($INSERT) === True) {
            echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='usn.php';
                    </script>";
        } else {
            echo "<script>
                    alert(' Already registered this usn');
                    window.location.href='usn.php';
                    </script>";
        }

        $conn->close();

    } else {
        echo "<script>
            alert('All fields are required');
            window.location.href='register.php';
                    </script>";
    }
}

?>
</body>
</html>
