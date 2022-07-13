<?php
    $s_string = "Mississippi Alabama Texas Massachusetts Kansas";
    $s = explode(" ", $s_string);
    $patterns = array('/xas$/', '/^k.*s$/i', '/^M.*s$/', '/a$/');
    $sList = [];
    
    function getState ($pattern, $s) {
        foreach ($s as $state) {
            if (preg_match($pattern, $state)) {
                return $state;
            }
        }
    }
    
    for ($i = 0; $i < count($patterns); $i++) {
        $sList[$i] = getState($patterns[$i], $s);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>9. States List</title>
</head>
<body>
    <p>Statement Is : <b><?=$s_string;?></b></p>
    <p>Name Ends With xas Is : <b><?=$sList[0];?></b></p>
    <p>Name Starts With k And Ends With s Is : <b><?=$sList[1];?></b></p>
    <p>Name Starts With M And Ends With s Is : <b><?=$sList[2];?></b></p>
    <p>Name Ends With a Is : <b><?=$sList[3];?></b></p></body>
</html>