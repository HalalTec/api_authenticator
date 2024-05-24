you are welcome
<?php
session_start();
        
            $check = $_SESSION['$token'];
                    if(empty($check)){
                        header("location:login.php");
                    }
?>
<form action="../authentication/logout.php" method="post">
    <input type="submit" value="Logout" name="logout">
</form>