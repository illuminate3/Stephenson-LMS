{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-users"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">{{count($users)}}</h2>
                            <p class="m-b-0">Usuários</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-pink p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-graduation-cap"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">{{count($courses)}}</h2>
                            <p class="m-b-0">Cursos</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-video"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">{{count($tutorials)}}</h2>
                            <p class="m-b-0">Tutoriais</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-comments"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">{{count($comments)}}</h2>
                            <p class="m-b-0">Comentários</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
