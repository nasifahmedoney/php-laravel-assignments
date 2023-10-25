<?php
session_start();

$lines = file("./data.txt");


$usernames = [];
$emails = [];
$passwords = [];
$roles = [];

foreach($lines as $userinfo){
    $arr = explode(" ",$userinfo);

    $usernames[] = $arr[0];
    $emails[] = $arr[1];
    $passwords[] = $arr[2];
    $roles[] = $arr[3];

}

// echo count($lines)."\n";
// echo"<pre>";
// print_r($lines);
// print_r($roles);
// foreach($roles as $role){
//     echo str_replace(PHP_EOL,"_",$role)."\n";
// }
// echo"</pre>";

// if($roles[2]=="admin".PHP_EOL){
//     echo "admin<br>";
//     echo str_replace(PHP_EOL,"_",$roles[2]);
// }
// else{
//     echo "user<br>";
//     echo str_replace(PHP_EOL,"_",$roles[2]);
// }

if(isset($_POST['email']) && isset($_POST['password'])){
    for($i = 0; $i < count($lines); $i++)
    {
        if($emails[$i] == $_POST['email'] && $passwords[$i] == md5($_POST['password']))
        {
            $_SESSION['role'] = $roles[$i];
            $_SESSION['id'] = $i;
            if($_SESSION['role'] ==="admin".PHP_EOL)
            {
                header('Location: roleManagement.php');
            }
            else{
                header('Location: user.php');
            }
        }
    }
    $error = "wrong id or password";
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
        #form{
            width: 350px;
            height: 250px;
            display: block;
            margin-inline: auto;
            padding: 20px;
            border: 2px solid teal;
            border-radius: 5px;
            margin-top: 10%;
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
    <h1 style="text-align: center;">User Authentication and Role Management System</h1>
    <div id="form">
        <form action="" method="POST">
            <h1>Login</h1>

            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>
            <br>
            <button type="submit">Login</button> Click here to <a href="registration.php">Sign Up!</a><br>
            <span style="color:brown"><?php echo $error??""; ?></span>
        </form>
    </div>
</body>
</html>