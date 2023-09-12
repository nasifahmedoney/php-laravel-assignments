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
            <label for="input1">Enter Score not exceding 100 in each field</label>
            <label for="test1">Test 1</label>
            <input type="number" step="0.01" name="number1" id="" required>
            <label for="test2">Test 2</label>
            <input type="number" step="0.01" name="number2" id="" required>
            <label for="test3">Test 3</label>
            <input type="number" step="0.01" name="number3" id="" required>
            <br>
            <button type="submit">Calculate Grade</button>
        </form>
        <div id="result">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $num1 = $_POST["number1"];
                    $num2 = $_POST["number2"];
                    $num3 = $_POST["number3"];

                    $avg = ($num1 + $num2 + $num3)/3;

                    if($avg >= 80)
                    {
                        echo "Average Score: {$avg} Grade: A";
                    }
                    else if($avg <= 79 && $avg >= 60)
                    {
                        echo "Average Score: {$avg} Grade: B";
                    }
                    else if($avg <= 59 && $avg >= 50)
                    {
                        echo "Average Score: {$avg} Grade: C";
                    }
                    else if($avg <= 49 && $avg >= 40)
                    {
                        echo "Average Score: {$avg} Grade: D";
                    }
                    else{
                        echo "Average Score: {$avg} Grade: F";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>