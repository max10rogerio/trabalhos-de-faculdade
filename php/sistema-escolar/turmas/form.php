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

<h2><?php echo $isEdit ? 'Atualizar Turma' : 'Nova Turma' ?></h2>

<form action="form.php<?php echo $isEdit ? "?id={$turma['id']}" : ""; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-5">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="turma['nome']" value="<?php echo $isEdit ? $turma['nome'] : ""; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="campo2">Turno</label>
      <select class="form-control" name="turma['turno']">
        <option value="MATUTINO">Matutino</option>
        <option value="VESPERTINO">Vespertino</option>
        <option value="NOTURNO">Noturno</option>
        <option value="INTEGRAL">Integral</option>
      </select>
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