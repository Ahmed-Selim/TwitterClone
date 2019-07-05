@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/commonStyle.css') }}">
@endsection

@section('content')
<div class="container-fluid" style="width:1000px">
<div class="row">
        <div class="col-8 bg-white px-0">
            <section class="">
                <ul class="list-unstyled">
                    @foreach ($profiles as $pro)
                        <follow-list-item
                            :profile="{{$pro}}"
                            :follow="true"
                            class="py-3 px-5">
                        </follow-list-item>
                    @endforeach
                </ul>
            </section>
        </div>

    <profile-sidebar
      :latest-profiles="{{ json_encode($latestProfiles) }}"
      :latest-tags="{{ json_encode($latestTags) }}">
    </profile-sidebar>
  </div>
</div>
@endsection
