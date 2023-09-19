
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'nav.php';
    $conn = new PDO('mysql:host=localhost;dbname=noname','root','');
    $sql  = $conn->query("SELECT * FROM `student`");
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($data);
    ?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Age</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        <?php  
        foreach($data as $onerrow){?>

    <tr>
        <td><?= $onerrow['id']?></td>
        <td><?= $onerrow['nom']?></td>
        <td><?= $onerrow['prenom']?></td>
        <td>
        <span class="badge rounded-pill bg-success"><?= $onerrow['age']?></span></td>
        <td>
                <form >
                <a class="btn btn-primary" href="update.php?id=<?=$onerrow['id']?>" role="button">Modifer</a>        
                    <a class="btn btn-danger" href="delete.php?id=<?=$onerrow['id']?>" role="button">Supprimer</a>        
                          </form>
        </td>
    </tr>

    <?php    }?>
     

  </tbody>
</table>

</div>


</body>
</html>