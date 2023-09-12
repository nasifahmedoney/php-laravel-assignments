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
            <label for="input1">Enter temperature in Fahrenheit or Celsius</label>
            <input type="number" step="0.01" name="number1" id="" required>
            <select name="options" id="" required>
                <option value="">Convert To</option>
                <option value="cel">Celsius</option>
                <option value="far">Fahrenheit</option>
            </select><br>
            <button type="submit">Convert</button>
        </form>
        <div id="result">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $num1 = $_POST["number1"];
                    $options = $_POST["options"];

                    if($options == "far")
                    {
                        $fahrenheit = ($num1 * 9/5) + 32;
                        echo "Result: {$fahrenheit} deg fahrenheit";
                    }
                    else
                    {
                        $celsius = ($num1 - 32) * (5/9);
                        echo "Result: {$celsius} deg celsius";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>