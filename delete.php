<?php 
if(isset($_GET['id'])){
$id = $_GET['id'];
require_once 'conn.php';
$stmt = $conn->prepare("DELETE FROM `student` WHERE id =?");
$stmt->execute([$id]);
}
header("location:index.php");
?>