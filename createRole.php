<?php
    session_start();
    // echo $_SESSION['role'];

    if($_SESSION['role']!= "admin".PHP_EOL)
    {
        header('Location: login.php');
    }

    $roles = file("./role.txt");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['newRole'])){
            $newRole = str_replace(" ","[SPACE]",$_POST['newRole']);
            $roles[] = $newRole.PHP_EOL;

            $fp = fopen("./role.txt","w");
            foreach($roles as $role){
                $fp = fopen("./role.txt","a+");
                fwrite($fp,$role);
            }
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
        #userinfo{
            border: 2px solid;
            margin-top: 5px;
            margin-bottom: 5px;
            width: 400px;
            padding-left: 10px;
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
    <a href="logout.php"><button>Logout</button></a>
    <a href="roleManagement.php"><button>Role Management Page</button></a>
    <h4>Existing Roles</h4>
    <ul>
        <?php foreach($roles as $role){ ?>
        <li><?php echo str_replace("[SPACE]"," ",$role); ?></li>
        <?php } ?>
    </ul>
    <form action="createRole.php" method="POST">
        
        <h1>Create Roles</h1>
        
        <label for="newRole"></label>
        <input type="text" name="newRole" required>
        
        <button type="submit">Create Role</button>
    </form>
    
    <?php ?>
</body>
</html>