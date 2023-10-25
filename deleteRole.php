<?php
// replacement role for deleted role
// replace in data file 
    session_start();
    // echo $_SESSION['role'];

    if($_SESSION['role']!= "admin".PHP_EOL)
    {
        header('Location: login.php');
    }

    $roles = file("./role.txt");
    $lines = file("./data.txt");
    // echo str_replace(PHP_EOL,"_",$roles[1]);
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['deleteRole']))
        {

            $data_fp = fopen("./data.txt","w");
            fclose($data_fp);
            foreach($lines as $line)
            {
                $line = str_replace($roles[$_POST['deleteRole']],"No[SPACE]Role".PHP_EOL,$line);
                $data_fp = fopen("./data.txt","a+");
                fwrite($data_fp,$line);
                fclose($data_fp);
            }
            
            unset($roles[$_POST['deleteRole']]);
            $fp = fopen("./role.txt","w");
            
            foreach($roles as $role){
                $fp = fopen("./role.txt","a+");
                fwrite($fp,$role);
            }
            $roles = file("./role.txt");
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
    <a href="logout.php"><button>Logout</button></a>
    <a href="roleManagement.php"><button>Role Management Page</button></a>

    <form action="" method="POST">
        
        <h1>Delete Roles</h1>
        
        <label for="deleteRole">Choose a role:</label>
        <select name="deleteRole" required>
            <?php for($i = 0;$i<count($roles);$i++){ ?>
            <option value="<?php echo $i; ?>"><?php echo str_replace("[SPACE]"," ",$roles[$i]); ?></option>
            <?php } ?>
        </select>
        
        <button type="submit">Delete Role</button>
    </form>
    
    <?php ?>
</body>
</html>