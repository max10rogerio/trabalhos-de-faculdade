<?php require_once '../config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<h1>Painel do Cliente</h1>
<hr />

<?php if ($db) : ?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h3>Bem-vindo(a) <?php echo $_SESSION['nome']; ?></h3>
	</div>
<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>