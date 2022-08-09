<!--Counts amount of every letter in input-->
<?php
$string = readline();
$count = [];
for ($i = 0; $i < strlen($string); $i++) {
    $letter = $string[$i];
    if (array_key_exists($letter, $count)) {
        $count[$letter]++;
    } else {
        $count[$letter] = 1;
    }
}
//print
foreach ($count as $key => $value) {
    echo "$key -> $value\n";
}