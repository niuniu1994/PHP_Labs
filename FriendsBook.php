<html lang="en">
<head>
    <title>My friend book 2</title>
</head>
<body>
<?php
include "html/header.html";
?>
<br>
<form method="post" action="FriendsBook.php">
    Name: <input type="text" name="name">
    <input type="submit"><br>
    <h1>My best friends:</h1><br>
</form>
<?php
//init
$filename = "html/friends.txt";
$nameFilter = "";
$startingWith = "";
$friendsArray = array();

if (!empty($_POST["startingWith"])) {
    $startingWith = $_POST["startingWith"];
}

if (isset($_POST['nameFilter'])) {
    $nameFilter = $_POST['nameFilter'];
}

//input
if (isset($_POST["name"]) && strlen($_POST["name"]) > 0) {
    $flag = true;
    $name = $_POST["name"];
    $file = fopen($filename, "a");
    if ($file) {
        fwrite($file, "$name\n");
        fclose($file);
    }
}

//delete
if (isset($_POST['delete'])) {
    //get all the names from the file and put it into the array
    $file = fopen($filename, "r");
    if ($file) {
        while (!feof($file)) {
            $fName = fgets($file);
            if (strlen($fName) > 0) {
                array_push($friendsArray, $fName);
            }
        }
        fclose($file);
    }

    $indexToBeRemoved = $_POST['delete'];
    unset($friendsArray[$indexToBeRemoved]);
    $friendsArray = array_values($friendsArray);

    //rewrite the file form the array
    $file = fopen($filename, "w");
    if ($file) {
        for ($i = 0; $i < count($friendsArray); $i++) {
            fwrite($file, "$friendsArray[$i]");
        }
        fclose($file);
    }
}

//output and selection
if (!isset($_POST["delete"])) {
    $file = fopen($filename, "r");
    if ($file) {
        while (!feof($file)) {
            $friendName = fgets($file);
            if ($startingWith !== 'TRUE') {
                if ($nameFilter == "" || strpos($friendName, $nameFilter) !== FALSE) {
                    if (!empty($friendName)) {
                        array_push($friendsArray, $friendName);
                    }
                }
            } else if ($startingWith === 'TRUE') {
                if (strpos($friendName, $nameFilter, 0) === 0) {
                        array_push($friendsArray, $friendName);
                }
            }
        }
        fclose($file);
    }
}
?>

<form method="post" action="FriendsBook.php">
    <?php
    //display
    for ($i = 0; $i < count($friendsArray); $i++) {
        echo "<li>$friendsArray[$i]<button type='submit' name='delete' value='$i'>Delete</button></li>";
    }
    ?>
</form>

<br>
<form method="post" action="FriendsBook.php">
    <input type="text" name="nameFilter" value="<?= $nameFilter ?>">
    <input type="checkbox" name="startingWith" <?php if ($startingWith == 'TRUE') echo "checked" ?> value="TRUE">Only
    names
    starting with</input>
    <input type="submit">
</form>
<?php
include "html/footer.html"
?>

</body>

</html>
