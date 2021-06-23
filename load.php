<?php
$connection = new mysqli("localhost","root","","codingbirds");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
$filepath=$_FILES['file']['tmp_name'];
if ($_FILES['file']['error'] > 0) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
} else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name'])) {

        $filename = 'upload/' . $_FILES['file']['name'];
        $query = "INSERT INTO `picture` (`id`, `image`) VALUES (NULL, '$filename');";
        mysqli_query($connection, $query);
        echo $filename;
    }
}
?>