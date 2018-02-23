<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo url('css/class-rom.css'); ?>">
    <script src="js/bootstrap-page.js"></script>
    <title>Class room</title>

</head>

<body>
    <header></header>
    <main>
        <aside>
            <div class="content-menu">
                <!-- options -->
                <ul class="nav nav-tabs d-flex" id="list-tab" role="tablist">
                    <li class="nav-item op-side-menu">
                        <a class="nav-link active" id="list-grid" data-toggle="list" href="#grid" role="tab" aria-controls="grid">
                            <i class="far fa-edit"></i>
                        </a>
                    </li>
                    <li class="nav-item op-side-menu" data-toggle="tooltip" data-placement="top" title="Arquivos">
                        <a class="nav-link" id="list-achive" data-toggle="list" href="#achive" role="tab" aria-controls="achive">
                            <i class="fas fa-archive"></i>
                            <span class="badge badge-primary"><?php echo count($lesson->getMaterials);?></span>
                        </a>
                    </li>
                    <li class="nav-item op-side-menu" data-toggle="tooltip" data-placement="top" title="Discussões">
                        <a class="nav-link" id="list-dicussion" data-toggle="list" href="#discussion" role="tab" aria-controls="discussion">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-primary">0</span>
                        </a>
                    </li>
                </ul>
                <!-- content options -->
                <div class="tab-content" id="nav-tabContent">
                    <div id="grid" class="tab-pane active" role="tabpanel" aria-labelledby="listgrid-">
                        <div id="gridLesson" class="list-group d-flex">
									<?php if(count($course->getModules) > 0){?>
										<div id="modules-list">
											<?php $modules = $course->getModules; foreach ($modules as $module) { ?>
												<div class="module">
													<div class="module-header">
														<div class="module-name">
															<i class="material-icons">folder</i><?php echo $module['name']; ?>
														</div>
													</div>

													<div class="module-body">
														<?php if(count($module->getLessons) > 0){ ?>
															<div class="lessons-list">
																<?php $lessons = $module->getLessons; foreach ($lessons as $lesson) { ?>
																	<div class="lesson">
																		<i class="material-icons">play_circle_outline</i><a href="<?php echo URL::route('lesson.view_lesson', ['course_id' => $course->id, 'lesson' => $lesson->id]);?>"><?php echo $lesson->title; ?></a>
																	</div>
																<?php }?>
															</div>
														<?php } else{ ?>
															<div class="no-lesson">Nenhuma aula cadastrada nesse módulo.</div>
														<?php }?>
													</div>
												</div>

											<?php } ?>
										</div>
									<?php } else { ?>

									<div class="no-module card">Nenhum módulo criado. Quem sabe mais tarde...</div>

									<?php }?>
                        </div>
                    </div>
                    <div id="achive" class="tab-pane fade" role="tabpanel" aria-labelledby="list-achive">
							<?php $materials = $lesson->getMaterials; if(count($materials) > 0){ ?>
								<div class="row">
									<?php foreach($materials as $material) { ?>
									<div class="col s12">
									<div class="card">
									<div class="card-content">
									  <span class="card-title"><?php echo $material->title;?></span>
										<?php echo $material->content;?>
									</div>
									 </div>
									 </div>
									<?php } ?>
								</div>
							<?php } else {?>
								<div class="row">
								<div class="col s12">
								Nenhum material disponível para esta aula.
								</div>
								</div>
							<?php } ?>
                    </div>
                    <div id="discussion" class="tab-pane fade" role="tabpanel" aria-labelledby="list-discussion">
                        <div class="alert alert-primary d-flex" role="alert">
                            Não há discussões.
                        </div>
                    </div>
                </div>
                <div class="bottom-menu d-flex">
                    <a class="btn btn-block btn-danger" href="<?php echo URL::route('courses.single', ['course' => $course->id]); ?>">Sair da sala</a>
                </div>
            </div>
        </aside>
        <article>
            <div class="content-lesson" data-spy="scroll" data-target="#gridLesson" data-offset="0">
                <div class="header-lesson">
                    <h1 id="test1" class="dsplay-4"><?php echo $lesson->title; ?></h1>
                    <div class="btn-group justify-content-between">
                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Retroceder aula">
                            <i class="fas fa-angle-left"></i>
                        </button>
                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Avançar aula">
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <div class="main-lesson">
                    <!-- area of midia if available -->
                    <div class="lesson-midia embed-responsive embed-responsive-21by9">
							  <?php echo $video; ?>
                    </div>
                    <!-- area of article -->
						 <?php echo $lesson->content; ?>

                </div>

        </article>
    </main>
    <footer></footer>

</body>

</html>
