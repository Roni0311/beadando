<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Az Ön oltásának időpontja</h1>
    <?php

//Start point of our date range.
$start = strtotime("1 May 2023");


$end = strtotime("31 July 2023");


$timestamp = mt_rand($start, $end);


echo date("Y-m-d", $timestamp);
?>
</body>
</html>