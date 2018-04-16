<div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">{{$course->title}}</h3>
    </div>

    <div class="col-md-7">
      <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/courses/*/manage') ? 'active' : '' }}" href="{{URL::route('courses.manage', ['course' => $course->id])}}">Gerenciar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/courses/*/messages') ? 'active' : '' }}" href="{{URL::route('courses.messages', ['course' => $course->id])}}" >Mensagens</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/courses/*/statistics') ? 'active' : '' }}" href="{{URL::route('courses.statistics', ['course' => $course->id])}}" >Estatísticas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('admin/courses/*/edit') ? 'active' : '' }}" href="{{URL::route('courses.edit', ['course' => $course->id])}}">Editar</a>
        </li>
      </ul>
    </div>
</div>
