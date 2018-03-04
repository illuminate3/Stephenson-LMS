{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
		<?php echo view('profile/sidebar-profile', ['user' => $user, 'isLoggedProfile' => $isLoggedProfile ]); ?>

		<div class="col s9" id="profile-content">
			<h2 class="profile-page-title">Seguidores</h2>
			<hr>
		</div>
		</div>
@endsection
