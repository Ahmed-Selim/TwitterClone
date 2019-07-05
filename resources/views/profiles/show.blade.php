@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/commonStyle.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="width:1000px">
  <div class="row">
      <div class="col-8 bg-white px-0">
          <section class="">
                <div>
                    <div style="height:400px;background-image: url({{ $user->profile->cover_image }})"
                        class="app-bg">
                    </div>
                    <div class="d-flex w-100 justify-content-between" style="height: 80px">
                        <div style="background-image: url({{ $user->profile->profile_image }})"
                            class="app-bg rounded-circle ml-2" id="profile_image">
                        </div>
                        @can ('update', $user->profile)
                            <a href="{{ route('profiles.edit',['profile' => $user->profile]) }}"
                                class="btn btn-outline-primary w-25 mt-3 font-weight-bolder rounded-pill mr-3"
                                style="font-size: larger;height: 42px">
                                Edit profile
                            </a>
                        @else
                            <!-- <a href="#"
                                class="btn btn-outline-primary w-25 mt-3 font-weight-bolder rounded-pill mr-3"
                                style="font-size: larger;height: 42px">
                                + Follow
                            </a> -->
                            <follow-btn
                                :user-id="{{ $user->id }}"
                                follow="{{ $follows }}"
                                class="mt-3 mr-3">
                            </follow-btn>
                        @endcan
                    </div>
                </div>
            </section>
            <div class="px-4">
               {{-- @php
                    echo '<pre>' . json_encode(Auth::user(), JSON_PRETTY_PRINT) . '</pre>' ;
                    echo '<br><br><br>' ;
                    echo '<pre>' . json_encode($profile, JSON_PRETTY_PRINT) . '</pre>' ;
                @endphp --}}

                <div class="h3 m-0 font-weight-bold">{{ $user->profile->name }}</div>
                <div class="text-muted"><span>@</span>{{ $user->profile->username }}</div>
                <div class="text-muted">{{ $user->profile->bio }}</div>
                <div class="d-flex justify-content-around h5 font-weight-bold">
                    <div class="">{{ $user->profile->location }}</div>
                    <div class="">Born {{ Carbon\Carbon::parse($user->profile->birth_date)->format('F j, Y') }}</div>
                    <div class="">Joined {{ Carbon\Carbon::parse($user->profile->created_at)->format('F Y') }}</div>
                </div>
                <div class="d-flex justify-content-around h5">
                    <div class=""><strong>{{ ($user->profile->tweets) ? count($user->profile->tweets) : 0 }}</strong> Tweets</div>
                    <a href="{{ route('followlist', ['user' => $user]) }}" class="">
                        <strong>{{ ($user->following) ? count($user->following) : 0 }}</strong> Following
                    </a>
                    <a href="{{ route('followlist', ['user' => $user]) }}" class="">
                        <strong>{{ ($user->profile->followers) ? count($user->profile->followers) : 0 }}</strong> Followers
                    </a>
                </div>
            </div>

            <div>
            </div>

            <profile-main :user="{{ json_encode($user) }}"></profile-main>

      </div>

      <profile-sidebar
        :latest-profiles="{{ json_encode($latestProfiles) }}"
        :latest-tags="{{ json_encode($latestTags) }}">
    </profile-sidebar>

  </div>
</div>
@endsection
