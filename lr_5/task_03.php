<!--Convert matrix to simple array and delete duplicates-->
<?php

$matrix = array(
    array(0, 1, 2),
    array(3, 4, 7),
    array(0, 7, 1)
);

//comver matrix to simple array
$simpleArray = array_reduce($matrix, function ($result, $item) {
    return array_merge($result, $item);
}, array());
//delete duplicates
$simpleArray = array_unique($simpleArray);
//print
echo implode(', ', $simpleArray).PHP_EOL;
