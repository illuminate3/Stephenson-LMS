{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Biblioteca</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Biblioteca</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->

		<iframe src="/laravel-filemanager?type=file" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
@endsection
