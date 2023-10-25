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
    <strong>Usage Instruction</strong>
    <p>
        For the assignment purpose a user with the role <q>admin</q> has already been created. Use the given id and password to log in as admin or user. Some other users with different roles are also saved as dummy data in the <q>data.txt</q> file all of them with the same password. Please check the file for ids or login as admin and create new users. By default a new user will be created with the role <q>user</q>. Only users with admin role will be able to see the admin page, other roles will be directed to user page.
    </p>
    <strong>Admin</strong>
    <p>
        Id: admin1@admin1.com<br>
        Password: abcd1234
    </p>
    <strong>User</strong>
    <p>
        Id: user1@user1.com<br>
        Password: abcd1234
    </p>
    <a href="login.php"><button>Go to Login</button></a>
</body>
</html>