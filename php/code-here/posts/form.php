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

<h2><?php echo $isEdit ? 'Atualizar posts' : 'Novo Posts' ?></h2>

<form action="form.php<?php echo $isEdit ? "?id={$posts['id']}" : ""; ?>" method="post">
  <hr />
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <?php if ($isEdit) { ?>
          <img id="link_here" style="height: 200px !important;" src="<?php echo $isEdit ? $posts['img_link'] : ""; ?>" class="img-fluid col-md-12" alt="Responsive image" style="width=80%">
        <?php } else { ?>
          <img class="img-fluid col-md-12" id="link_here" style="height: 200px !important;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16761b5a711%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16761b5a711%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.2421875%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E">
        <?php } ?>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="name">Imagem Link</label>
          <input type="text" id="img_link" class="form-control" on-blur="setImagem()" name="posts['img_link']" value="<?php echo $isEdit ? $posts['img_link'] : ""; ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="name">Titulo</label>
          <input type="text" class="form-control" name="posts['titulo']" value="<?php echo $isEdit ? $posts['titulo'] : ""; ?>">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="editor">Texto:</label>
          <textarea class="form-control" rows="5" id="descricao" name="posts['descricao']" placeholder="Digite aqui..."><?php echo $isEdit ? $posts['descricao'] : ""; ?></textarea>
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