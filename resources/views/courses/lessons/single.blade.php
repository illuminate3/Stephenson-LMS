<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css ") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/class-room.css ") }}">
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/class-room.js') }}"></script>
  <title>Class room</title>
</head>

<body>
  <header>

  </header>
  <nav id="navbar" class="">
      <div class="content-menu">
        <!-- options -->
        <ul class="nav nav-tabs d-flex" id="list-tab" role="tablist">
          <li class="nav-item op-side-menu" data-toggle="tooltip" data-placement="top" title="Grade">
            <a class="nav-link active" id="list-grid" data-toggle="list" href="#grid" role="tab" aria-controls="grid">
              <i class="far fa-edit"></i>
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
            <div class="row">
              @foreach($materials as $material)
              <div class="col s12">
                <div class="card">
                  <div class="card-content">
                    <span class="card-title">{{$material->title}}</span>
                    {{$material->content}}
                  </div>
                </div>
              </div>
              @endforeach
            </div>
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
      <div class="content-lesson  container-fluid">
        <div id="headerArticle" class="header-lesson row">
            <div class="btn-group justify-content-between col-3">
                <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Retroceder aula">
                  <i class="fas fa-angle-left"></i>
                </button>
                <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Avançar aula">
                  <i class="fas fa-angle-right"></i>
                </button>
            </div>
            <div class="col-6">
          <h1 id="test1" >{{ $lesson->title }}</h1>
        </div>
        <div class="col-3">
          <button id="btnnavbar" type="button" class="btn">
            <i class="fas fa-bars"></i>
            <i class="fas fa-times d-none"></i>
          </button>
        </div>
        </div>
        <div class="main-lesson">
          <!-- area of midia if available -->
          <div class="lesson-midia">
            {!!$video!!}
          </div>
          <!-- area of article -->
          {!!$lesson->content!!}
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
