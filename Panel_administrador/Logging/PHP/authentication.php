<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry</title>
</head>
<body>
    <?php      
        include('connection.php');  
        $username = $_POST['user'];  
        $password = $_POST['pass'];  
        
            //to prevent from mysqli injection  
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);  
        
            $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            
            if($count == 1){  
                // redirect to the admin panel
                header('Location: http://localhost/Trabajo_final_curso/Panel_administrador/Panel/index.html');
                exit();
            }  
            else{  
                echo "<h1> Login failed. Invalid username or password, consult with administrator.</h1>";  
            }     
    ?>
</body>
</html>
