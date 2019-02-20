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

<h2><?php echo $isEdit ? 'Atualizar Usuário' : 'Novo Usuário' ?></h2>

<form action="form.php<?php echo $isEdit ? "?id={$usuario['id']}" : ""; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-5">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="usuario['nome']" value="<?php echo $isEdit ? $usuario['nome'] : ""; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="name">RA</label>
      <input type="text" class="form-control" name="usuario['RA']" value="<?php echo $isEdit ? $usuario['RA'] : ""; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">CPF</label>
      <input type="text" class="form-control" id="CPF" name="usuario['cpf']" value="<?php echo $isEdit ? $usuario['cpf'] : ""; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Cidade</label>
      <input type="text" class="form-control" name="usuario['cidade']" value="<?php echo $isEdit ? $usuario['cidade'] : ""; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="campo1">Estado</label>
      <input type="text" class="form-control" name="usuario['estado']" value="<?php echo $isEdit ? $usuario['estado'] : ""; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Telefone</label>
      <input type="text" class="form-control" name="usuario['telefone']" value="<?php echo $isEdit ? $usuario['telefone'] : ""; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Permissão</label>
      <select class="form-control" name="usuario['permissao']">
        <?php 
          if($isEdit) {
            echo "<option selected value='{$usuario['permissao']}'>{$usuario['permissao']}</option>";
            echo $usuario['permissao'] == 'ADMINISTRADOR' ? "<option value='ALUNO'>Aluno</option>" : "<option value='ADMINISTRADOR'>Adminsitrador</option>";
          } else { 
        ?>
          <option value="ALUNO">Aluno</option>
          <option value="ADMINISTRADOR">Administrador</option>
        <?php } ?>
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