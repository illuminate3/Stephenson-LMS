<?php echo view('header', ['title' => $title]); ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php echo $page->title ?></h1>
  </div>
</div>

<div class="container">
<?php echo $page->content ?>
</div>

<?php echo view('footer'); ?>