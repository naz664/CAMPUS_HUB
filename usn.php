<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>YCET</title>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->

    <!-- JavaScript for form validation -->
    <script>
        function validateForm() {
            var regNo = document.getElementById("usn").value;
            if (regNo == "") {
                alert("Please enter your Registration No.");
                return false;
            }
        }
    </script>
</head>
<body>
<?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->

<div class="content"><!--body content holder-->
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form action="RegisteredEvents.php" class="form-group" method="POST" onsubmit="return validateForm();">

                <div class="form-group">
                    <label for="usn">Registration No:</label>
                    <input type="text" id="usn" name="usn" class="form-control">
                </div>

                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>