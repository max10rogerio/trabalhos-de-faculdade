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

<h2><?php echo $isEdit ? 'Atualizar Curso' : 'Novo Curso' ?></h2>

<form action="form.php<?php echo $isEdit ? "?id={$curso['id']}" : ""; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="curso['nome']" value="<?php echo $isEdit ? $curso['nome'] : ""; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Valor</label>
      <input type="text" class="form-control" name="curso['valor']" value="<?php echo $isEdit ? $curso['valor'] : ""; ?>">
    </div>
    
  </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>