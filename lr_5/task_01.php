<!--Counts user's age-->
<?php
echo "Date format: dd.mm.yyyy".PHP_EOL;
while (true) {
try {
    $bDay = new DateTime(readline());
} catch (Exception $e) {
    echo "Wrong date format!".PHP_EOL;
    continue;
}
$now = new DateTime(date('d.m.y'));
$difference = $now->diff($bDay);
$age = $difference -> y;
echo $age.PHP_EOL;
break;
}