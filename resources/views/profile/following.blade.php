{{-- Chama a template pré pronta --}}
@extends('profile.profile-template')

@section('profileContent')
    @parent
			<h2 class="profile-page-title">Seguindo ({{$user->user->getFollowed->count()}})</h2>
			<hr>

      @php $followers = $user->user->getFollowed @endphp

      <div class="row">
      @foreach($followers as $u)
        <div class="col-md-3 mb-4">
          <div class="people card">
            <div class="people-avatar">
              @if(is_null($u->followedInfo->avatar))
              <img src="{{asset('assets/images/avatar-default.png')}}" alt="">
              @else
              <img src="{{asset('uploads/avatars/' . $u->followedInfo->avatar)}}" alt="">
              @endif
            </div>

            <div class="people-name">
              <a href="{{URL::route('profile.profile', ['id' => $u->followedInfo->user])}}">
                {{$u->followedInfo->firstname . " " . $u->followedInfo->lastname}}
              </a>
              <span>{{"@". $u->followedInfo->user}}</span>
            </div>
          </div>
        </div>
      @endforeach
      </div>
@endsection
