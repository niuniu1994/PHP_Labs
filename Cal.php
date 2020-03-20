<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Calculator</title>
        <style>
            body{
                width: 1000px;
                height: 500px;
            }
            h1{
                text-align: center;
                width: 500px;
                height: 250px;
                font-size: 50px;
                font-weight: bold;
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                margin: auto;
            }
        </style>
    </head>
    <body>
    <?php
        require_once "Calculator.php";
        $op = $_GET["op"];
        $x = $_GET["x"];
        $y = $_GET["y"];
        if (!$x || !$y){
            echo "<h1>Incorrect or incomplete data</h1>";
        }else{
            $flag = true;
            $sym="+";
            $res = 0;
            $cal = new calculator();
            switch ($op){
                case "sum":
                    $res = $cal->sum($x,$y);
                    break;
                case "subtract":
                    $res = $cal->subtract($x,$y);
                    $sym="-";
                    break;
                case "multiply":
                    $res = $cal->multiply($x,$y);
                    $sym="*";
                    break;
                case "divide":
                    $res = $cal->divide($x,$y);
                    $sym="/";
                    break;
                default:
                    $flag = false;
                    echo "<h1>Unrecognized operation $op</h1>";
            }

            if ($flag){
                echo "<h1>${x}${sym}${y}=${res}</h1>";
            }
        }
    ?>
    </body>
</html>
