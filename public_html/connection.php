<?php
//Database Credentials 
$user = "a1001239_user";
$password = "buddl0J@";
$dbname = "a1001239_SCP";

//Create Connection Object 
$connection = new mysqli('localhost', $user, $password, $dbname) or die($mysqli_error($connection));

//Grab Data From Database 
$result = $connection->query("select * from `subject`") or die($connection->error());

if(isset($_POST['item_no']))
{
    $item_no = $_POST['item_no'];
    $object_class = $_POST['object_class'];
    $subject_image = $_POST['subject_image'];
    $special_containment_procedures = $_POST['special_containment_procedures'];
    $procedures = $_POST['procedures'];
    $description = $_POST['description'];
    $reference = $_POST['reference'];
    $extra_1 = $_POST['extra_1'];
    $extra_2 = $_POST['extra_2'];
    $sql = "INSERT INTO `subject` (`item_no`, `object_class`, `subject_image`, `special_containment_procedures`, `procedures`, `description`, `reference`, `extra_1`, `extra_2`) VALUES ('$item_no', '$object_class', '$subject_image', '$special_containment_procedures', '$procedures', '$description', '$reference', '$extra_1', '$extra_2')";
    $connection->query($sql) or die($connection->error);

    header("index.php");
}

?>