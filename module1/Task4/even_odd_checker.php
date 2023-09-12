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
            <label for="input1">Enter Number</label>
            <input type="number" name="number1" id="" required>
            <br>
            <button type="submit">Check Odd or Even</button>
        </form>
        <div id="result">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $num1 = $_POST["number1"];
                    if($num1==0){
                        echo "Invalid Number";
                    }
                    else if(($num1 % 2) == 0)
                    {
                        echo "Even Number";
                    }
                    else{
                        echo "Odd Number";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>