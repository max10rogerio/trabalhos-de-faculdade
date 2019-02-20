<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Bibliotecas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="form.php"><i class="fa fa-plus"></i> Nova Biblioteca</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="30%">Título</th>
		<th width="30%">Versão</th>
	</tr>
</thead>
<tbody>
<?php if ($bibliotecas) : ?>
<?php foreach ($bibliotecas as $item) : ?>
	<tr>
		<td><?php echo $item['id']; ?></td>
		<td>
			<a href="<?php echo $item['link']; ?>" target="_blank"><?php echo $item['titulo']; ?></a>
		</td>
		<td><?php echo $item['versao']; ?></td>
		
		<td class="actions text-right">
			<a href="form.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $item['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>