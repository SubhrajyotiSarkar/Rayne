<?php
    include("connection.php");

//sign up
    if(isset($_POST["signup"])){
        $category= "user";
        $UserName=$_POST["Username"];
        $Email=$_POST["Email"];
        $Phone=$_POST["Phone"];
        $pass = $_POST["Password"];  
        $Password=password_hash($pass, PASSWORD_DEFAULT);
        $sql1= "select * from customer_details where c_email='$Email'";
        $row=mysqli_query($conn,$sql1);
        $row_no=mysqli_num_rows($row);
        if($row_no==0){
            $sql="insert into customer_details (c_name,c_phone,c_email,c_password,category) values ('$UserName','$Phone','$Email','$Password','$category')";
            $result=mysqli_query($conn,$sql);
            echo "<script>document.location='login.html'</script>";
        }
        else{
            echo "<script>alert('Account Already Exists')</script>";
            echo "<script>document.location='login.html'</script>";
        }
    }
//ip address 

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ip_address = get_client_ip();

// login 

    if(isset($_POST["login"])){
        $Email=$_POST["login_username"];
        $password_given = $_POST["login_password"];
        $sql1= "select * from customer_details where c_email='$Email'";
        $result=mysqli_query($conn,$sql1);
        $row_no=mysqli_num_rows($result);
        if($row_no > 0){
            if($new_row=mysqli_fetch_assoc($result)){
                $password_have = $new_row["c_password"];
                $category = $new_row["category"];
                if(password_verify($password_given,$password_have) && $category=="user"){
                    ini_set('session.gc_maxlifetime', 2592000); //
                    // session_set_cokkie_params(2592000); //
                    session_start();
                    if(!isset($_SESSION['initiated'])){ //
                        session_regenerate_id(); //
                        $_SESSION['initiated']=true; //
                    } //
                    $_SESSION["email_login"]=$Email; //
                    $sql2="insert into session (c_email,category,ip_address) values ('$Email','$category','$ip_address')";
                    $result=mysqli_query($conn,$sql2);
                    echo "<script>document.location='login_index.php'</script>";
                }
                else{
                    echo "<script>alert('password is wrong. please check your password')</script>";
                    echo "<script>document.location='login.html'</script>";
                }
                // if(password_verify($password_given,$password_have) && $category=="admin"){
                // ini_set('session.gc_maxlifetime', 2592000); //
                // session_set_cokkie_params(2592000); //
                // session_start();
                // if(!isset($_SESSION['initiated'])){ //
                //     session_regenerate_id(); //                    
                //     $_SESSION['initiated']=true; //
                // } //
                //     $_SESSION["admin_login"]=$Email;
                //     // $sql2="insert into session (Email,Password,Category,Img) values ('$id','$pass','$x','$link')";
                //     // $result=mysqli_query($conn,$sql);
                //     echo "<script>document.location='admin.php'</script>";
                // }
                // else{
                //     echo "<script>alert('password is wrong. please check your password')</script>";
                //     echo "<script>document.location='login.html'</script>";
                // }
            }
        }
        else{
            echo "<script>alert('user name is wrong. please check your user name')</script>";
            echo "<script>document.location='login.html'</script>";
        }
    }
?>
