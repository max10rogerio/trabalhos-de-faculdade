<?php 
  require_once('functions.php');
  $isEdit = false;

  if (isset($_GET['id'])) {
    $isEdit = true;
    edit();
  } else {
    add();
  }
?>

<?php include(HEADER_TEMPLATE); ?>

<h2><?php echo $isEdit ? 'Atualizar biblioteca' : 'Nova biblioteca' ?></h2>

<form action="form.php<?php echo $isEdit ? "?id={$bibliotecas['id']}" : ""; ?>" method="post">
  <hr />
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="name">Link da Biblioteca</label>
          <input type="text" id="link" class="form-control" name="bibliotecas['link']" value="<?php echo $isEdit ? $bibliotecas['link'] : ""; ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="name">Titulo</label>
          <input type="text" class="form-control" name="bibliotecas['titulo']" value="<?php echo $isEdit ? $bibliotecas['titulo'] : ""; ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="name">Versão</label>
          <input type="text" class="form-control" name="bibliotecas['versao']" value="<?php echo $isEdit ? $bibliotecas['versao'] : ""; ?>">
        </div>
      </div>
      <div id="actions" class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
      </div>
      </div>
    </div>
  </div>
</form>
<?php include(FOOTER_TEMPLATE); ?>