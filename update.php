<?php 
  require_once 'nav.php';

$nom = "";
$prenom = "";
$age ="";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once 'conn.php';
    $stmt = $conn->prepare("SELECT * FROM `student` WHERE id=?");
    $stmt->execute([$id]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $nom = $data[0]['nom'];
    $prenom = $data[0]['prenom'];
    $age = $data[0]['age'];
}
if(isset($_POST['nom'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    require_once 'conn.php';
    $stmt = $conn->prepare("UPDATE `student` 
    SET nom=?,prenom=?,age=? WHERE id=?");
    $stmt->execute([$nom,$prenom,$age,$id]);
    header("location:index.php");
}?>
<div class="container">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form method="post" action="#">
<div class="container">
<div class="mb-3">
    <label for="text" class="form-label">nom</label>
    <input type="text" class="form-control" name="nom" value="<?=$nom?>">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">prenom</label>
    <input type="text" class="form-control" name="prenom" value="<?=$prenom?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Age</label>
    <input type="number" class="form-control" name="age" value="<?=$age?>">
    
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>