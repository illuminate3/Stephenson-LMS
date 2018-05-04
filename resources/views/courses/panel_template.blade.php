{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent

    <div id="course-panel-header">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-align-left">
            <h2 class="course-title">{{ $course->title}}</h2>
          </div>

          <div class="col-md-6 text-right">
            <div class="progress mt-5 mb-4" style="height:30px;">
              <div class="progress-bar" role="progressbar" style="width: {{$percentual_completed}}%;" aria-valuenow="{{$percentual_completed}}" aria-valuemin="0" aria-valuemax="100">
                {{$percentual_completed}}%
              </div>
            </div>

            <form method="post" id="leave-course" action="{{ URL::route('courses.leave_course', ['course_id' => $user_joined->id])}}">
              <button type="button" class="btn btn-danger" onclick="confirmLeave();">Sair do Curso</button>
              <input type="hidden" name="_token" value="{{ csrf_token()}}">
            </form>

            <a href="{{URL::route('lesson.view_lesson', ['course' => $course->id, 'lesson' => $last_lesson_completed])}}" class="btn btn-primary">Continuar Curso</a>
          </div>
        </div>
      </div>
    </div>

    <div class="course-navigation">
    <div class="container">
      <ul class="nav nav-tabs course-navigation-tab">
        <li class="nav-item">
          <a class="nav-link {{ ($page == "single" ? 'active' : null)}}" href="{{ URL::route('courses.single', ['course_id' => $course->id])}}">Descrição</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($page == "content" ? 'active' : null)}}" href="{{ URL::route('courses.single_content', ['course_id' => $course->id, 'page' => 'content'])}}">Conteúdos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($page == "notices" ? 'active' : null)}}" href="{{ URL::route('courses.single_content', ['course_id' => $course->id, 'page' => 'notices'])}}">Avisos</a>
        </li>
      </ul>
    </div>
    </div>

    <div class="container">
      <div class="section">
        @section('courseContent')
          @show
      </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  function confirmLeave(){
    swal({
      title: "Você tem certeza?",
      text: "Caso saia do curso, todo seu progresso será perdido!",
      icon: "warning",
  buttons: ["Cancelar", "Sair!"],
      dangerMode: true,
    })

    .then((willDelete) => {
      if (willDelete) {
        document.getElementById("leave-course").submit();
      } else {
        swal.close();
      }
    });
  }
</script>
@endsection
