<?php
  session_start();
  
  require_once 'config.php';
  require_once DBAPI;
  require_once ('./inc/database.php');

  $bibliotecas = find_all('bibliotecas');
  
?>
<?php require_once('./partials/header.php'); ?>
  <main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
      </div>
      <div class="container pt-lg-md">
        <div class="bg-secondary row">
          <?php foreach($bibliotecas as $item) { ?>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="text-center">
                    <?= $item['titulo'] . ' - ' . $item['versao'] ?>
                  </h4>
                </div>
                <div class="col-sm-12">
                  <p class="text-center">
                    <a href="<?= $item['link'] ?>"><?= $item['link'] ?></a>
                  </p>
                </div>
              </div>
            <hr>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </main>

<?php require_once('./partials/header.php'); ?>