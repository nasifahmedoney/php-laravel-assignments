<?php

    session_start();
    // echo $_SESSION['role'];
    
    if($_SESSION['role']!= "admin".PHP_EOL)
    {
        header('Location: login.php');
    }

    $editId = "";
    $lines = "";
    $role = "";

    if(isset($_GET['line'])){
        $editId = $_GET['line'];
        $lines = file("./data.txt");
        $role = explode(" ",$lines[$editId]);
    }

    $rolesFromFile = file("./role.txt");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_POST['newRole']))
        {
            $editId = $_POST['lineId'];
            $lines = file("./data.txt");
            $role = explode(" ",$lines[$editId]);

            $newRole = $_POST['newRole'].PHP_EOL;
            $lines[$editId] = $role[0]." ".$role[1]." ".$role[2]." ".$newRole;

            $fp = fopen("./data.txt","w");
            foreach($lines as $line){
                $fp = fopen("./data.txt","a+");
                fwrite($fp,$line);
            }
            header('Location: roleManagement.php');
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
        #userinfo{
            border: 2px solid;
            margin-top: 5px;
            margin-bottom: 5px;
            width: 400px;
            padding-left: 10px;
        }
        /* button{
            margin-right: 5px;
            margin-bottom: 10px;
            padding: 5px;
        } */
        button{
            margin-right: 5px;
            margin-bottom: 10px;
            padding: 9px;
            font-size: 12px;
            font-weight: 600;
            border: transparent;
            border-radius: 5px;
        }
        body{
            background-color: lightblue;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <a href="logout.php"><button>Logout</button></a>
    <a href="roleManagement.php"><button>Role Management Page</button></a>
    <h1>Edit Roles</h1>
    <form action="edit.php" method="POST">
        <label for="existingRole">Existing Role:</label>
        <input type="text" name="role" value="<?php echo str_replace("[SPACE]"," ",$role[3]); ?>">
        <label for="newRole"></label>
        <!-- <input type="text" name="newRole" required> -->
        <label for="newRole">Choose new role:</label>
        <select name="newRole" required>
            <?php foreach($rolesFromFile as $options){ ?>
            <option value="<?php echo str_replace(PHP_EOL,"",$options); ?>"><?php echo str_replace("[SPACE]"," ",$options); ?></option>
            <?php } ?>
        </select>
        <input type="hidden" name="lineId" value="<?php echo $editId; ?>">
        <button type="submit">Update</button>
    </form>
    
    <?php ?>
</body>
</html>