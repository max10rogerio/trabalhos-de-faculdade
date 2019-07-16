<?php 
  require_once('./partials/header.php');
  require_once('./crud/connection.php');
  $row = null;
  
  if(isset($_GET['candidato']) && !empty($_GET['candidato'])){
    $conn = connection();

    $result = $conn->query("SELECT * FROM candidatos WHERE ID = {$_GET['candidato']}");
    $row = $result->fetch(PDO::FETCH_ASSOC);

  }

?>
  <form class="p-2" method="POST" action="./crud/crud.php" enctype="multipart/form-data">
    <div class="row">
      <?php if(!$row){ ?>
        <div class="col-sm-2 pointer">
          <figure class="figure">
            <label>
              <img src="./assets/images/200x200.png" id="thumb" class="img-thumbnail img-fluid img-size-form pointer">
              <figcaption class="figure-caption text-center pointer">Adicionar imagem</figcaption>
              <input type="file" id="imagem" required name="imagem" class="display-hidden" value="">
            </label>
          </figure>
        </div>
      <?php } else {
        echo "<input type='hidden' name='id' value='{$row['ID']}'>";
      } ?>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-2">
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="number" required class="form-control" name="numero" id="numero" placeholder="Número" value="<?php echo $row['NUMERO'] ? $row['NUMERO'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-8">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" required class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $row['NOME'] ? $row['NOME'] : '' ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <label for="partido">Partido</label>
              <input type="text" required class="form-control" id="partido" name="partido" placeholder="Partido" value="<?php echo $row['PARTIDO'] ? $row['PARTIDO'] : '' ?>">
            </div>
          </div>
          <div class="col-sm-7">
            <div class="form-group">
              <label for="cargo">Cargo</label>
              <input type="text" required class="form-control" id="cargo" name="cargo" placeholder="Cargo"  value="<?php echo $row['CARGO'] ? $row['CARGO'] : '' ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <button type="submit" name="<?php echo !$row ? 'cadastrar' : 'editar'; ?>" class="btn btn-primary">
              <?php echo !$row ? 'CADASTRAR' : 'EDITAR'; ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
<?php require_once('./partials/footer.php'); ?>