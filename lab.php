<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php-17</title>
</head>
<body>
<?php
echo "<h2>пункт 1</h2>";
function makeSMTH($a, $b)
{
    if ($a >= 0 && $b >= 0){
        $res = $a-$b;
        echo "<h2>$res</h2>>";
    }
    elseif ($a < 0 && $b < 0){
        $res = $a*$b;
        echo "<h2>$res</h2>";
    }
    else{
        $res = $a+$b;
        echo "<h2>$res</h2>";
    }
}
$a = 1;
$b = 2;
makeSMTH($a, $b);


echo "<h2>пункт 2</h2>";

$a = mt_rand(0, 16);
switch ($a) {
    case 0:
        echo "0\n";
    case 1:
        echo "1\n";
    case 2:
        echo "2\n";
    case 3:
        echo "3\n";
    case 4:
        echo "4\n";
    case 5:
        echo "5\n";
    case 6:
        echo "6\n";
    case 7:
        echo "7\n";
    case 8:
        echo "8\n";
    case 9:
        echo "9\n";
    case 10:
        echo "10\n";
    case 11:
        echo "11\n";
    case 12:
        echo "12\n";
    case 13:
        echo "13\n";
    case 14:
        echo "14\n";
    case 15:
        echo "15\n";
        break;
}
echo "<br>";

//Пункт3
function sum($a, $b)
{
    return $a + $b;
}
function difference($a, $b)
{
    return $a - $b;
}
function multiplication($a, $b)
{
    return $a * $b;
}
function division($a, $b)
{
    return $a / $b;
}


echo "<h2>пункт 4</h2>";

function mathOperation($arg1, $arg2, $operation){
    switch ($operation){
        case 'сумма':
            return sum($arg1,$arg2);
        case 'разность':
            return difference($arg1,$arg2);
        case 'умножение':
            return multiplication($arg1,$arg2);
        case 'деление':
            return division($arg1,$arg2);
        default:
            return "Операция не определена!";
    }
}
$result_operation = mathOperation(10, 10, "умножение");
echo "<h2>$result_operation</h2>";


echo "<h2>пункт 5</h2>";
$one = date('Y');
echo "Способ 1: <h2>$one</h2>";
$two = localtime(null, true)['tm_year'] + 1900;
echo "Способ 2: <h2>$two</h2>";
$three = getdate()['year'];
echo "Способ 3: <h2>$three</h2>";

echo "<h2>пункт 6</h2>";
function power($val, $pow)
{
    if($pow == 1){
        return $val;
    }
    return $val * power($val, $pow-1);
}

$result_pow = power(2, 10);
echo "<h2>$result_pow</h2>";
?>
</body>
</html>