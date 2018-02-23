<?php echo view('header', ['title' => $title]); ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php echo $tutorial->title ?></h1>
  </div>
</div>

<div class="container">
<div class="embed-responsive embed-responsive-16by9">
<?php echo $video_embed ?>
</div>
</div>

<?php echo view('footer'); ?>