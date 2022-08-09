<?php
    echo "Enter elements:".PHP_EOL;
    $input = explode(' ', readline());
    foreach ($input as $item){
        if (is_numeric($item)){
            $int = (int)$item;
            $double = (double)$item;
            $val = ($int == $double) ? $int : $double;
            echo "Type of ".$item." is: ".gettype($val).PHP_EOL;
        }
        else {
            echo "Type of ".$item." is: ".gettype($item).PHP_EOL;
        }
    }
