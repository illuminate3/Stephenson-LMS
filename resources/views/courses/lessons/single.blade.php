<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link rel="stylesheet" href="{{ asset("assets/admin/css/material-icons.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/class-room.css") }}">

  <meta name="csrf-token" content="{{ csrf_token() }}">
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
              @php $modules = $course->getModules @endphp
              @foreach ($modules as $module)
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
                      @php $m_lessons = $module->getLessons @endphp
                      @foreach ($m_lessons as $m_lesson)
                      <li class="lesson list-group-item">
                        <a href="{{ URL::route('lesson.view_lesson', ['course_id' => $course->id, 'lesson' => $m_lesson->id])}}">
                          {{$m_lesson->title}}
                        </a> -
                        <span class="lesson-time">{{$m_lesson->time}}</span>
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
            @if(count($lesson->getMaterials) > 0)
            <div class="materials row">
              @php $materials = $lesson->getMaterials @endphp
              @foreach ($materials as $material)
              @php $material_meta = unserialize($material->meta) @endphp
                <div class="material col-12 mt-3">
                        <?php switch ($material_meta['material_type']){ case ("note"): ?>
                          <div class="card-body">
                            <div class="material-content">
                              {{$material_meta['content']}}
                            </div>
                            <h5 class="card-title"><i class="fa fa-sticky-note"></i> {{$material_meta['title']}}</h5>
                          </div>
                        <?php break; case ("file"): ?>
                          <a href="{{$material_meta['content']}}" class="btn btn-large btn-block btn-success btn-lg"><i class="fa fa-file"></i>{{$material_meta['title']}}</a>
                        <?php break; case ("image"): ?>
                          <div class="card-body">
                            <div class="material-content material-image">
                              <img src="{{$material_meta['content']}}">
                            </div>
                            <h5 class="card-title"><i class="far fa-images"></i> {{$material_meta['title']}}</h5>
                          </div>
                        <?php break; case ("video"): ?>
                          <div class="card-body">
                            <div class="material-content material-video">
                              {{$material_meta['content']}}
                            </div>
                            <h5 class="card-title"><i class="far fa-play-circle"></i> {{$material_meta['title']}}</h5>
                          </div>
                        <?php break; case ("link"): ?>
                          <a href="{{$material_meta['content']}}" class="btn btn-large btn-block btn-primary btn-lg"><i class="fa fa-link"></i>{{$material_meta['title']}}</a>
                        <?php break;} ?>
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
      <div id="headerArticle" class="header-lesson">
        <div class="container">
          <div class="row">
            <div class="col-2 text-left">
              @if ($prevLesson)
              <a class="btn" title="Retroceder aula" href="{{ URL::route('lesson.view_lesson', ['course_id' => $course->id, 'lesson' => $prevLesson])}}">
              @else
              <a class="btn" href="#">
              @endif
                <i class="fa fa-angle-left"></i>
              </a>
            </div>

            <div class="col-8">
              <h1>{{ $lesson->title }}</h1>
            </div>

            <div class="col-2 text-right">
              @if($is_completed)
                <button name="" class="btn lesson-completed"><i class="fa fa-check"></i></button>
              @else
                <form style="display:inline">
                  <button name="" class="btn" id="mark-as-completed"><i class="fa fa-check"></i></button>
                </form>
              @endif

              @if ($nextLesson)
              <a class="btn" title="Avançar aula" href="{{ URL::route('lesson.view_lesson', ['course_id' => $course->id, 'lesson' => $nextLesson])}}">
              @else
              <a class="btn" href="#">
              @endif
                <i class="fa fa-angle-right"></i>
              </a>
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

  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/class-room.js') }}"></script>

  <script type="text/javascript">
  $('#mark-as-completed').click(function(e){
      e.preventDefault();
      var course = {{$course->id}}
      var lesson = {{$lesson->id}}

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
          url: "{{URL::route('lesson.mark_as_completed')}}",
          type: "POST",
          data: {course:course, lesson:lesson},
          dataType: 'json',
          success:function(data){
             console.log(data.success);
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr);
          }
       });
  });
  </script>
</body>
</html>
