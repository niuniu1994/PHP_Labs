<html>
<head>
    <title>Hello World</title>
</head>
<body>
<?php
include("html/header.html");
$name = $_GET["name"];
echo "<h1>Hello, $name!</h1>";
include("html/footer.html");
?>

</body>
</html>