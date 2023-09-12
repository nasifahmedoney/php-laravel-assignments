<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        #form{
            width: 400px;
            height: 300px;
            display: block;
            margin-inline: auto;
            padding: 20px;
            border: 2px solid;
            margin-top: 10%;
        }

        input, label{
            display: flex;
            width: 100%;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        select,button{
            margin-top: 5px;
            margin-bottom: 5px;
        }
        #result{
            font-family: monospace;
            font-size: small;
            margin-top: 10px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div id="form">
        <form action="" method="POST">
            <label for="input1">Enter Number 1</label>
            <input type="number" name="number1" id="" required>
            <label for="input2">Enter Number 2</label>
            <input type="number" name="number2" id="" required>
            <br>
            <button type="submit">Check Large Number</button>
        </form>
        <div id="result">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $num1 = $_POST["number1"];
                    $num2 = $_POST["number2"];
                    // $status = ($age < 18) ? "minor" : "adult";
                    $result = ($num1>$num2)? "{$num1} large Number" : "{$num2} large Number";
                    echo $result;
                }
            ?>
        </div>
    </div>
</body>
</html>