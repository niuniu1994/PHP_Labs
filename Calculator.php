<?php
class calculator
{
    function sum($x, $y) {
        return $x + $y;
    }

    function subtract($x,$y){
        return $x-$y;
    }

    function multiply($x,$y){
        return $x*$y;
    }

    function divide($x,$y){
        if ($y == 0){
            return 0;
        }
        return $x / $y;
    }
}
//
//$calculator= new calculator();
//echo $calculator->sum(5, 7);
//echo $calculator->subtract(8, 2);
//echo $calculator->multiply(2, 5);
//echo $calculator->divide(20, 4);

?>