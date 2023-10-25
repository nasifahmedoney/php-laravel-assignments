<?php
    session_start();
    // echo "this is the user page";
    // echo $_SESSION['role'];
    if(!$_SESSION['role']){
        header('Location: login.php');
    }else if($_SESSION['role']=="admin".PHP_EOL){
        session_destroy();
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightblue;
            font-family: monospace;
        }
        button{
            margin-right: 5px;
            margin-bottom: 10px;
            padding: 9px;
            font-size: 12px;
            font-weight: 600;
            border: transparent;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>User Authentication and Role Management System</h1>
    <h4>Welcome, <?php echo $_SESSION['role']; ?></h4>
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>