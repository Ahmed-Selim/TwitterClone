@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/commonStyle.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="width:1000px">
  <div class="row">
      <div class="col-8 bg-white px-0">
            <section class="">
                <tweet :tweet="" :profile=""> </tweet>
            </section>
      </div>

      {{-- <profile-sidebar
        :latest-profiles="{{ json_encode($latestProfiles) }}"
        :latest-tags="{{ json_encode($latestTags) }}">
    </profile-sidebar> --}}

  </div>
</div>
@endsection
