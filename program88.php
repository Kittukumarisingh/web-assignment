<?php
 $output = 0;

 if (isset($_GET['calculate'])) {
    $numA = $_GET['num1'];
    $numB = $_GET['num2'];
    $operator = $_GET['op'];
    switch($operator) {
        case '+':
            $output = $numA + $numB;
            break;
        case '-':
            $output = $numA - $numB;
            break;
        case '*':
            $output = $numA * $numB;
            break;
        case '/':
            $output = $numA / $numB;
            break;
        default:
            $output = 0;
    }
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PHP Calculator</title>
        <style>
            input {
            display: block;
            }
        </style>
    </head>
<body>
 <h1>Simple Calculator</h1>
 <form action="" method="GET">
 <label for="num1">Enter first number</label>
 <input type="text" id="num1" name="num1" value="0" required>

 <label for="num2">Enter second number</label>
 <input type="text" id="num2" name="num2" value="0" required>

 <label for="op">Choose operation</label>
 <select name="op" id="op">
 <option value="+">Addition</option>
 <option value="-">Subtraction</option>
 <option value="*">Multiplication</option>
 <option value="/">Division</option>
 </select>
 <input type="submit" value="calculate" name="calculate">
 </form>
 <h2>Result: <?php echo $output; ?></h2>
</body>
</html>