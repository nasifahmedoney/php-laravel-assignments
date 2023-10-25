<?php

if( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) )
{

    $fp = fopen("./data.txt", "a");
    $write = fwrite($fp, str_replace(" ","[SPACE]",$_POST['username'])." ".$_POST['email']." ".md5($_POST['password'])." ".$_POST['role'].PHP_EOL);
    if($write){
        header('Location: login.php');
    }
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
        #form{
            width: 400px;
            height: 300px;
            display: block;
            margin-inline: auto;
            padding: 20px;
            border: 2px solid teal;
            border-radius: 5px;
            margin-top: 10%;
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
        input, label{
            display: flex;
            width: 100%;   
        }
        input{
            margin-bottom: 10px;
        }
        label{
            margin-top: 10px;
        }
        select,button{
            margin-top: 5px;
            margin-bottom: 5px;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="form">
        <form action="" method="POST">
            <h1>Register Account</h1>
            <label for="username">User Name</label>
            <input type="text" name="username" required>

            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <input type="hidden" name="role" value = "user">
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>