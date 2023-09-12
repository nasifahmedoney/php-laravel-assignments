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
            <input type="number" step="0.01" name="number1" id="" required>
            <label for="input2">Enter Number 2</label>
            <input type="number" step="0.01" name="number2" id="" required>
            <select name="options" id="" required>
                <option value="">Select Oparation</option>
                <option value="add">Add</option>
                <option value="sub">Substract</option>
                <option value="divide">Divide</option>
                <option value="multiply">Multiply</option>
            </select><br>
            <button type="submit">Calculate</button>
        </form>
        <div id="result">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $num1 = $_POST["number1"];
                    $num2 = $_POST["number2"];
                    $oparation = $_POST["options"];

                    switch($oparation){
                        case "add":
                            $result = $num1 + $num2;
                            echo "Result: $result";
                            break;
                        case "sub":
                            $result = $num1 - $num2;
                            echo "Result: $result";
                            break;
                        case "divide":
                            if ($num2 != 0) {
                                $result = $num1 / $num2;
                                echo $result;
                            } else {
                                echo "Cannot divide by zero.";
                            }
                            break;
                        case "multiply":
                            $result = $num1 * $num2;
                            echo $result;
                            break;
                        
                    }
                    
                }
            ?>
        </div>
    </div>
</body>
</html>