<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
</head>
<body>
    <?php
        $id = $_SESSION["email_login"];
        $sql="delete from session where c_email='$id'";
        $result=mysqli_query($conn,$sql);
        unset($_SESSION["email_login"]);
        echo "<script>alert('Log Out Successful');
        document.location='index.php'</script>;";
    ?>
</body>
</html>