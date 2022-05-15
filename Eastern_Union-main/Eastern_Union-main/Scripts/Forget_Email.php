//forgetemail

<?php
if(isset($_POST['forgot'])){
    if(empty($_POST['email']) or empty($_POST['phone'])){
        die("there is one or more field are empty!");
    }
    else{
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $select = "select EMAIL from user where EMAIL = '$email'";
        $querey=$conn->querey($select);
        if(!$querey){
            die($conn->error);
                    }
            else
            {
            $array=$querey->fectch_assoc();
            $email_from_db=$array['EMAIL'];
            if($email_from_db==$email){
                $select="select PHONE from user where PHONE='$phone'";
                $querey=$conn->querey($select);
                if(!$querey){
                    die($conn->error);
                }else{
                    $array=$querey->fectch_assoc();
                    $phone_from_db=$array['PHONE'];
                    if($phone_from_db==$phone){
                        $select="select *from user where EMAIL='$email'";
                        $querey=$conn->querey($select);
                        $row=$querey->fetch_assoc();
                        $_SESSION['login']=true;
                        $_SESSION['user']=$row;
                        $send=rand(1,999999);
                        $send=$_POST['phone'];
                        if(isset($send==$confirm)){
                            $password=$_POST['password'];
                            if(empty($password)){
                                die($conn->error);
                            }
                            else{
                                $insert_1="INSERT INTO `user`( `Password` ) VALUES ( $password)";
                                $querey=$conn->querey($insert_1);
                            }
                        }
                    }
                }
            }
            
            
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
    <title>FORGET PSSWORD</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"></form>
    EMAIL:<input type="text" name="email">;
    PHOne:<input type="number" name="phone">;
</body>
</html>
