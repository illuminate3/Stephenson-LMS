{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
			 <h1 class="display-4">{{ __('messages.dashboard')}}</h1>
		  </div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card card-statistic">
						<div class="row">
							<div class="col-6 card-statistic-title">
								<i class="material-icons">people</i>
								<div>{{ __('messages.users')}}</div>
							</div>

							<div class="col-6"><p>{{count($users)}}</p></div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card card-statistic">
						<div class="row">
							<div class="col-6 card-statistic-title">
								<i class="material-icons">video_library</i>
								<div>{{ __('messages.tutorials')}}</div>
							</div>

							<div class="col-6"><p>{{count($tutorials)}}</p></div>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card card-statistic">
						<div class="row">
							<div class="col-6 card-statistic-title">
								<i class="material-icons">star</i>
								<div>{{__('messages.courses')}}</div>
							</div>

							<div class="col-6"><p>{{count($courses)}}</p></div>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card card-statistic">
						<div class="row">
							<div class="col-6 card-statistic-title">
								<i class="material-icons">insert_drive_file</i>
								<div>{{__('messages.pages')}}</div>
							</div>

							<div class="col-6"><p>{{count($pages)}}</p></div>
						</div>
					</div>
				</div>

			</div>
		</div>
@endsection
