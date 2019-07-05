@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/commonStyle.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="width:1000px">
  <div class="row">  
    <follow-main :user="{{json_encode($user)}}"></follow-main>
    <profile-sidebar 
      :latest-profiles="{{ json_encode($latestProfiles) }}" 
      :latest-tags="{{ json_encode($latestTags) }}">
    </profile-sidebar>
  </div>
</div>
@endsection