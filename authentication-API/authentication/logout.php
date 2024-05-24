<?php

    //logout  phase

		if(isset($_POST["logout"]))
		{
			
                session_unset();
				header('location:..\view\login.php');
		}
