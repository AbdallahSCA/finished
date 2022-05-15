<?php
include('connection.php');
session_start();
$_SESSION["Login"] ;

if(isset($_SESSION["Login"]) && $_SESSION["Login"]==True){
    header('Location: Account.php');
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username)or empty($password)){
        die("there is email or password Empty!");
    }else{
    $select = "select Email from users where Email = '$username'";
    $query = $conn->query($select); //check email
    if (!$query) {
        die($conn->error);
    }else{ 
        $array = $query->fetch_assoc();
        $email_from_db = $array['Email'];    
        if($email_from_db == $username) {
            $select = "select Password from users where Email = '$username'";
            $query = $conn->query($select);//connenction to mysqli
            if (!$query) {
                die($conn->error);
            } else { //check password
                $array = $query->fetch_assoc();
                $password_from_db = $array['Password'];
                if($password_from_db == $password) {
                    $select = "select * from users where Email = '$username'";
                    $query = $conn->query($select);
                    $row = $query->fetch_assoc();
                    $_SESSION["login"] = True; // adding session data
                    $_SESSION["user"] = $row; // adding session data
                    header('Location: Account.php');
                } else {
                    die("Password is wrong");
                    //die("$password");
                }
            }
        } else {
            die("Email doesn't exist");
        }
        header('Location: Login.php');
    }
    }
}

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <header>
        <nav class="navigation">
            <div>
                <a href="Home.html">
                    <img src="pictures/third logo.png" alt="logo" width="80px" height="80px">
                </a>
            </div>
            <div class="links_navigation">
                <a href="Home.html#contact">Contact</a>
                <a href="#about">About</a>
                <a href="SignUp.html">Sign Up</a>
                <a href="login.html">Login</a>
            </div>
        </nav>
    </header>
    <section class="main">
        <div class="main_section">
            <form action="#" method="post" class="allform">
                <label for="">User Name :</label>
                <br>
                <input type="email">
                <br>
                <label for="">password</label>
                <br>
                <input type="password">
                <br>
                <input type="submit" value="Login" id="submit_inform">
                <a href="SignUp.html">Forget Password ? </a>
            </form>
            <!-- <a href="">Forgot your password ?</a> -->
        </div>
    </section>

</body>

</html>