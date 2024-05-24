
<?php

    include ('../database/database_connection.php');
    use Firebase\JWT\JWT;
    require_once('../vendor/autoload.php');
	include ('secreteKey.php');
	session_start();

if(isset($_POST['register']))
{

	if(empty($_POST['username']))
	{
		$error = 'Please Enter Name Details';
	}
	else if(empty($_POST['email']))
	{
		$error = 'Please Enter Email Details';
	}
	else if(empty($_POST['password']))
	{
		$error = 'Please Enter Password Details';
	}
	else
	{
                $username		=	trim($_POST['username']);                
                $email		    =	trim($_POST['email']);
                $password	    =	trim($_POST['password']);

			
				

            $insert = "INSERT INTO user_registration (username, email, password) 
                        VALUES ('$username', '$email', '$password')";
                    
			if ($connect_db->query($insert) === TRUE) {
                echo "New record created successfully";
				$key = $secret_key;
				$sig_input = array(
					'email'		=>	trim($_POST['email'])
				);

				$token = JWT::encode($sig_input, $key, 'HS256');

						$_SESSION['$token'] = $token;
						header('location:..\view\welcome.php');
                }	
		}
	}




       

				


					





		
?>



