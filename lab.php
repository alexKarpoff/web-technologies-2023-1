<?php
date_default_timezone_set('Asia/Yekaterinburg');
$title = 'php-16';
$h1 = "Заголовок для тега h1 главной страницы";
function getCorrectFormatTime($time): string
{
    $hour = $time['tm_hour'];
    $min = $time['tm_min'];

    if($hour>4 && $hour < 21){
        $str_hour = 'часов';
    }
    elseif ($hour%10==1){
        $str_hour = 'час';
    }
    else{
        $str_hour = 'часа';
    }

    if(($min>4 && $min < 21) || $min%10==0 || $min%10>4){
        $str_min = 'минут';
    }
    elseif ($min%10==1){
        $str_min = 'минута';
    }
    else{
        $str_min = 'минуты';
    }

    return "$hour $str_hour $min $str_min";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<?php
$current_time = localtime(time(), true);
$result = getCorrectFormatTime($current_time);
echo "<h1>$h1</h1>";
echo "<h2>$result</h2>";
?>
</body>
</html>