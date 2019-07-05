@extends('layouts.app')

@section('content')
<div class="container">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="cover_image" class="col-md-4 col-form-label text-md-right">Cover Image</label>

                            <div class="col-md-6">
                                <input id="cover_image" type="file" accept="image/*" 
                                    class="form-control @error('cover_image') is-invalid @enderror" 
                                    name="cover_image" value="{{ old('cover_image') }}" />

                                @error('cover_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">Profile Image</label>

                            <div class="col-md-6">
                                <input id="profile_image" type="file" accept="image/*" 
                                    class="form-control @error('profile_image') is-invalid @enderror" 
                                    name="profile_image" value="{{ old('profile_image') }}" />

                                @error('profile_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">User Name</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>

                            <div class="col-md-6">
                                <textarea id="bio" type="text" 
                                    class="form-control @error('bio') is-invalid @enderror" 
                                    name="bio" value="{{ old('bio') }}"></textarea>

                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <select id="gender" 
                                    class="form-control @error('gender') is-invalid @enderror" 
                                    name="gender" required>
                                    <option disabled hidden {{ !old('gender') ? "selected":"" }}>Select Gender..</option>
                                    <option value="male" {{ (old('gender') == 'male') ? "selected":"" }}>Male</option>
                                    <option value="female" {{ (old('gender') == 'female') ? "selected":"" }}>Female</option>
                                </select>

                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" 
                                    class="form-control @error('location') is-invalid @enderror" 
                                    name="location" value="{{ old('location') }}" required />

                                @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>

                            <div class="col-md-6">
                                <input id="website" type="url" 
                                    class="form-control @error('website') is-invalid @enderror" 
                                    name="website" value="{{ old('website') }}" />

                                @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">Birth Date</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date" 
                                    class="form-control @error('birth_date') is-invalid @enderror" 
                                    name="birth_date" value="{{ old('birth_date') }}" required />

                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Create Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
