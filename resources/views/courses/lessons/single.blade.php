<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  	<link rel="stylesheet" href="<?php echo asset("assets/admin/css/material-icons.css"); ?>" >
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/class-room.css") }}">
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/class-room.js') }}"></script>
  <title>{{$title}}</title>
</head>

<body>
  <nav id="navbar" class="">
      <div class="content-menu">
        <!-- options -->
        <ul class="nav nav-tabs d-flex nav-fill" id="list-tab" role="tablist">
          <li class="nav-item op-side-menu" data-toggle="tooltip" data-placement="top" title="Grade">
            <a class="nav-link active" id="list-grid" data-toggle="list" href="#grid" role="tab" aria-controls="grid">
              <i class="fa fa-th-list"></i>
            </a>
          </li>
          <li class="nav-item op-side-menu" data-toggle="tooltip" data-placement="top" title="Arquivos">
            <a class="nav-link" id="list-achive" data-toggle="list" href="#achive" role="tab" aria-controls="achive">
              <i class="fas fa-archive"></i>
              <span class="badge badge-primary">{{count($lesson->getMaterials)}}</span>
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
          <div id="grid" class="tab-pane fade  show active" role="tabpanel" aria-labelledby="list-grid">
            <div id="modules-list" class="card">
              @php $modules = $course->getModules @endphp @foreach ($modules as $module)
              <div class="card module">
                <div class="card-header module-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link module-name" data-toggle="collapse" data-target="#module-{{$module->id}}" aria-expanded="true"
                      aria-controls="collapseOne">
                      {{$module->name}}
                    </button>
                  </h5>
                </div>

                <div id="module-{{$module->id}}" class="collapse" data-parent="#modules">
                  <div class="card-body">
                    @if(count($module->getLessons) > 0)
                    <ul class="list-group">
                      @php $lessons = $module->getLessons @endphp @foreach ($lessons as $lesson)
                      <li class="lesson list-group-item">
                        <a href="{{ URL::route('lesson.view_lesson', ['course_id' => $course->id, 'lesson' => $lesson->id])}}">
                          {{$lesson->title}}
                        </a> -
                        <span class="lesson-time">{{$lesson->time}}</span>
                      </li>
                      @endforeach
                    </ul>
                    @else
                    <div class="no-lesson">Nenhuma aula cadastrada nesse módulo.</div>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <div id="achive" class="tab-pane fade" role="tabpanel" aria-labelledby="list-achive">
            @php $materials = $lesson->getMaterials @endphp @if(count($materials) > 0)
              @foreach($materials as $material)
              <div class="material-content card mt-2 mb-2">
                  <?php switch ($material->type){ case ("note"): ?>
                    <div class="card-body">
                      <h5 class="card-title"><i class='material-icons'>note</i> {{$material->title}}</h5>
                      {{$material->content}}
                    </div>
                  <?php break; case ("file"): ?>
                    <div class="card-body">
                      <h5 class="card-title"><i class='material-icons'>file</i> {{$material->title}}</h5>
                      {{$material->content}}
                    </div>
                  <?php break; case ("image"): ?>
                    <img class="card-img-top" src="{{$material->content}}">
                    <div class="card-body">
                      <h5 class="card-title"><i class='material-icons'>photo</i> {{$material->title}}</h5>
                    </div>
                  <?php break; case ("video"): ?>
                    <div class="card-body">
                      <h5 class="card-title"><i class='material-icons'>play_arrow</i> {{$material->title}}</h5>
                      {{$material->content}}
                    </div>
                  <?php break;} ?>
              </div>
              @endforeach
            @else
            <div class="alert alert-primary d-flex" role="alert">
              Não há materiais para essa aula.
            </div>
            @endif
          </div>

          <div id="discussion" class="tab-pane fade" role="tabpanel" aria-labelledby="list-discussion">
            <div class="alert alert-primary d-flex" role="alert">
              Não há discussões.
            </div>
          </div>
        </div>

        <div class="bottom-menu d-flex">
          <a class="btn btn-block btn-danger" href="{{ URL::route('courses.single', ['course' => $course->id]) }}">Sair da sala</a>
        </div>
      </div>
  </nav>

  <main>
    <article>
      <div id="headerArticle" class="header-lesson">
        <div class="container">
          <div class="row">
            <div class="col-3 text-left">
              <button type="button" class="btn" title="Retroceder aula">
                <i class="fa fa-angle-left"></i>
              </button>
            </div>

            <div class="col-6">
              <h1>{{ $lesson->title }}</h1>
            </div>

            <div class="col-3 text-right">
              <button type="button" class="btn" title="Avançar aula">
                <i class="fa fa-angle-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="main-lesson mt-4">
        <div class="container">
          <div class="lesson-midia">
            <div class="embed-responsive embed-responsive-16by9">
              {!!$video!!}
            </div>
          </div>

          <div class="lesson-content pt-3">
            {!!$lesson->content!!}
          </div>
        </div>
      </div>
    </article>
    <!-- Quiz -->
    <article>
        <div class="content-lesson">
          <form action="#" method="post">

          </form>
        </div>
    </article>
  </main>

  <footer></footer>

</body>
</html>
