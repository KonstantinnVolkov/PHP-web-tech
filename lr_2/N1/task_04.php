<?php
    $num = $argv[1];
    $num_str = strval($num);
    echo "your num: ";
    echo $num_str.PHP_EOL;
    $sum = 0;
    for($i=0;$i<strlen($num_str);$i++){
        $sum = $sum+intval($num_str[$i]);
    }
    echo "sum: ";
    echo $sum.PHP_EOL;
