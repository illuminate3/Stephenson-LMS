{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="container">

      <form method="post" id="leave-course" action="{{ URL::route('courses.leave_course', ['course_id' => $user_joined->id])}}">
        <button type="button" class="btn btn-danger btn-block" onclick="confirmLeave();">Sair do Curso</button>
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
      </form>

      <h2 class="course-title">{{ $course->title}}</h2>

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link {{ ($page == "single" ? 'active' : null)}}" href="{{ URL::route('courses.single', ['course_id' => $course->id])}}">Descrição</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($page == "content" ? 'active' : null)}}" href="{{ URL::route('courses.single_content', ['course_id' => $course->id, 'page' => 'content'])}}">Conteúdos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($page == "notices" ? 'active' : null)}}" href="{{ URL::route('courses.single_content', ['course_id' => $course->id, 'page' => 'notices'])}}">Avisos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($page == "rating" ? 'active' : null)}}" href="{{ URL::route('courses.single_content', ['course_id' => $course->id, 'page' => 'rating'])}}">Avaliações</a>
        </li>
      </ul>

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
