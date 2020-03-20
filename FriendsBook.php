<html lang="en">
<head>
    <title>My friend book</title>
</head>
<body>
<?php
include "html/header.html";
?>
<form method="post" action="FriendsBook.php" >
    Name: <input type="text" name="name">
    <input type="submit"><br>
    <h1>My best friends:</h1><br>
</form>
<?php
$name = $_POST["name"];
$filename = "html/friends.txt";

if (!empty($name)){
// appending to file
    $file = fopen( $filename, "a" );
    fwrite( $file, "<li>${name}</li>" );
}
$file = fopen( $filename, "r" );
while(!feof($file)) {
    echo fgets($file)."<br>";
}
include "html/footer.html";
?>
</body>


</html>
