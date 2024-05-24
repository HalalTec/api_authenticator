<?php

include ('../database/database_connection.php');

//forgot password
if(isset($_POST['change_password']))
{
					if(empty($_POST['email']))
					{
						$error = 'Please Enter Email Details';
					}
					else if(empty($_POST['password']))
					{
						$error = 'Please Enter Password Details';
					}
					else
					{
								$email		    =	trim($_POST['email']);
								$password	    =	trim($_POST['password']);

								$update	= "UPDATE user_registration SET password='$password' WHERE email='email'";

									if ($connect_db->query($update) === TRUE) {
										header('locatiion:..\view\login.php');
									} else {
										echo "Error updating record: " . $connect_db->error;
									}
								}
							}