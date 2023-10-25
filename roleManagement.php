<?php
    session_start();
    // echo "this is the role management page<br>";
    // echo $_SESSION['role'];
    if($_SESSION['role']!= "admin".PHP_EOL)
    {
        header('Location: login.php');
    }
    
    $lines = file("./data.txt");

    // echo $_SESSION['role'];
    // echo $_SESSION['id'];
    // $error = "";

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

// delete user
    if(isset($_POST['deleteUser'])){
        unset($lines[$_POST['deleteUser']]);
        $fp = fopen("./data.txt","w");
        fclose($fp);
        foreach($lines as $line){
            $fp = fopen("./data.txt","a+");
            fwrite($fp,$line);
            fclose($fp);
        }

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
        echo "<pre>";
        print_r($usernames);echo "<br>";
        print_r($emails);echo "<br>";
        print_r($passwords);echo "<br>";
        print_r($roles);echo "<br>";
        echo "</pre>";
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
        #userinfo{
            border: 2px solid teal;
            border-radius: 10px;
            margin-top: 15px;
            margin-bottom: 5px;
            width: 400px;
            padding-left: 10px;
            display: block;
            margin-inline: auto;
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
        form{
            display: inline-flex;
        }
    </style>
</head>
<body>
    <h1>User Authentication and Role Management System</h1>
    <h4>Welcome, <?php echo $_SESSION['role']; ?></h4>
    <form action="createRole.php" method="POST"><button type="submit">Create New Role</button></form>
    <form action="deleteRole.php" method="POST"><button type="submit">Delete Role</button></form>
    <a href="registration.php" target="_blank"><button>Create New User</button></a>
    <a href="logout.php"><button>Logout</button></a>
    
    <h1 style="text-align: center;">User List</h1>
    <?php
    for($i = 0; $i<count($lines);$i++)
    {
    ?>
        <div id="userinfo">
            <h4>User Name: <?php echo str_replace("[SPACE]"," ",$usernames[$i]); ?></h4>
            <h4>Email: <?php echo $emails[$i]; ?></h4>
            <h4>Role: <?php echo str_replace("[SPACE]"," ",$roles[$i]); ?></h4>
            <form action="roleManagement.php" method="POST"><input type="hidden" name="deleteUser" value="<?php echo $i; ?>"><button type="submit">Delete User</button></form>
            <a href="edit.php?line=<?php echo $i; ?>"><button>Edit Role</button></a>
        </div>
    <?php
    }
    ?>
</body>
</html>