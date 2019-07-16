<?php 
  require_once('./crud/connection.php');
  require_once('./partials/header.php');

  $conn = connection();

  try{
    $result = $conn->query("SELECT * FROM candidatos ORDER BY id DESC");

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>
      <div class="row p-3">
        <div class="col-sm-2">
          <img src="data:<?php echo $row['TIPO_IMG'] . ';base64,' . base64_encode($row['IMAGEM']); ?>" id="thumb" class="img-thumbnail img-fluid img-size-form pointer">
        </div>
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-12">
              <b>NOME:</b> <?php echo $row['NOME']; ?>
            </div>
            <div class="col-sm-12">
              <b>QTDE VOTOS: </b> <?php echo $row['QTDE_VOTOS']; ?>
            </div>
            <div class="col-sm-12">
              <b>NÚMERO:</b> <?php echo $row['NUMERO']; ?>
              <b> - PARTIDO: </b> <?php echo $row['PARTIDO']; ?>
            </div>
            <div class="col-sm-12">
              <b>CARGO: </b> <?php echo $row['CARGO']; ?>
            </div>
            <div class="col-sm-12 mt-2">
              <a href="./crud/crud.php?action=votar&candidato=<?php echo $row['ID']; ?>" class="btn btn-success">
                VOTAR
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="col-sm-12">
            <a href="./cadastrar.php?candidato=<?php echo $row['ID']; ?>" class="btn btn-outline-primary">
              EDITAR
            </a>
          </div>
          <div class="col-sm-12 mt-5">
            <a href="./crud/crud.php?action=deletar&candidato=<?php echo $row['ID']; ?>" class="btn btn-outline-danger">
              EXCLUIR
            </a>
          </div>
        </div>
      </div>
      <hr>
<?php        
    }

  }catch(PDOException $e){
    echo 'Error: ' . $e->getMessage();
  }

?>

<?php require_once('./partials/footer.php');  ?>