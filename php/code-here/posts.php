<?php
  session_start();
  
  require_once 'config.php';
  require_once DBAPI;
  require_once ('./inc/database.php');

  $posts = find_all('posts');
  
?>
<?php require_once('./partials/header.php'); ?>
  <main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
      </div>
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="bg-secondary">
            <?php foreach($posts as $post) { ?>
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <img src="<?= $post['img_link'] ?>" class="col-sm-12 img-fluid" style="height: 200px !important;" />
                    <div class="col-sm-12">
                      <h4 class="text-center"><?= $post['titulo'] ?></h4>
                    </div>
                    <div class="col-sm-12 text-center">
                      <?= $post['descricao'] ?>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php require_once('./partials/header.php'); ?>