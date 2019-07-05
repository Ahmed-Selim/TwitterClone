@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/commonStyle.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="width:1000px">
<div class="bg-white font-weight-bold h1 rounded-pill text-center"
    style="margin-top: -10px; margin-bottom: 10px; font-size: 50px">
    #{{ $tag }}
</div>
  <div class="row">
      <div class="col-8 bg-white px-0">
            <section class="">
                @foreach ($tweets as $tweet)
                    <tweet
                        :tweet="{{ $tweet }}"
                        :profile="{{ $tweet->profile }}">
                    </tweet>
                @endforeach
            </section>
      </div>

      <profile-sidebar
        :latest-profiles="{{ json_encode($latestProfiles) }}"
        :latest-tags="{{ json_encode($latestTags) }}">
    </profile-sidebar>

  </div>
</div>
@endsection
