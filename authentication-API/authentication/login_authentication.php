<?php

include ('../database/database_connection.php');
use Firebase\JWT\JWT;
require_once('../vendor/autoload.php');
include ('secreteKey.php');
session_start();

if(isset($_POST["login"]))
{
        
    if(empty($_POST["email"])){
        $error = 'Please Enter Email Details';
    } else if(empty($_POST["password"])){
        $error = 'Please Enter Password Details';
    } else {

        $email = $_POST['email'];
        $sql = "SELECT password FROM user_registration WHERE email='$email'";
        $result= $connect_db->query($sql);
        

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            if($row['password'] ===  $_POST['password']){
                
                $token = JWT::encode(
                    array(
                        'iat'		=>	time(),
                        'nbf'		=>	time(),
                        'exp'		=>	time() + 3600,
                        'data'	=> array(
                            'user_id'	=>	$row['id'],
                            'user_name'	=>	$row['username'],
                            'key' => $secret_key
                        )
                    ),
                    $key = $secret_key,
                    'HS256'
                );
                    $_SESSION['$token'] = $token;
                    header('location:../view/welcome.php');

            } else {
                $error = 'Wrong Password';
            }
        }
        } else {
            $error = 'Wrong Email Address';
        }
    }
}
