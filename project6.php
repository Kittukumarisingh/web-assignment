<?php 
    $h = fopen("visitors.txt", "r") or die("Unable to open file");
    $cnt = fread($h, 16);
    fclose($h);
    $h = fopen("visitors.txt", "w") or die("Unable to open file");
    fwrite($h, ++$cnt);
    fclose($h);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor count</title>
    <style>
        h1, h2 {
        text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome To The Website</h1>
    <h2>Total Visitors : <?php echo $cnt ?></h2>
</body>
</html>