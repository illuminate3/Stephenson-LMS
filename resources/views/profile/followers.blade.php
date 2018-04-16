{{-- Chama a template pré pronta --}}
@extends('profile.profile-template')

@section('profileContent')
    @parent
			<h2 class="profile-page-title">Seguidores ({{$user->user->getFollower->count()}})</h2>
			<hr>
      @php $followers = $user->user->getFollower @endphp
      <div class="row">
        @foreach($followers as $u)
          <div class="col-md-3 mb-4">
            <div class="people card">
              <div class="people-avatar">
                @if(is_null($u->followerInfo->avatar))
                <img src="{{asset('assets/images/avatar-default.png')}}" alt="">
                @else
                <img src="{{asset('uploads/avatars/' . $u->followerInfo->avatar)}}" alt="">
                @endif
              </div>

              <div class="people-name">
                <a href="{{URL::route('profile.profile', ['id' => $u->followerInfo->user])}}">
                  {{$u->followerInfo->firstname . " " . $u->followerInfo->lastname}}
                </a>
                <span>{{"@". $u->followedInfo->user}}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>

@endsection
