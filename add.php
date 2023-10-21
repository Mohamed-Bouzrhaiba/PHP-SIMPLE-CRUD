<?php
   require_once 'nav.php';
   if(isset($_POST['nom'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    if(!empty ($nom) && !empty ($prenom) && !empty ($age)){
      require_once 'conn.php';
      $stmt = $conn->prepare("INSERT INTO `student`(`id`, `nom`, `prenom`, `age`) 
      VALUES (NULL,?,?,?)"); 
      $stmt->execute([$nom,$prenom,$age]);
      header("location:index.php");
    } 
    else{ ?>
    <div class="alert alert-danger" role="alert">
    Required ..... !
</div>
<?php
    }
 

}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form method="post" action="#">
<div class="container">
<div class="mb-3">
    <label for="text" class="form-label">nom</label>
    <input type="text" class="form-control" name="nom">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">prenom</label>
    <input type="text" class="form-control" name="prenom">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Age</label>
    <input type="number" class="form-control" name="age" >
    
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div> 
