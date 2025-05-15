@extends('Admin.Perfume.layout')

@section('content')

{{-- <div class="row align-items-center p-5">
    <div class="col">
        <a class="btn btn-primary" href="{{ route('perfume.index') }}" role="button">All perfumes</a>
    </div>
</div> --}}

{{-- @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form class="mb-3 p-5" action="{{route('perfume.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name Of perfume" value="{{ old('name', $user->name ?? '') }}">
        @error('name')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email ?? '') }}">
        @error('email')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="profile_photo" class="form-label ">Profile Photo</label>
        <img src="/imagesOfPerfume/{{$perfume->picture}}" width="200px" height="200px">
        <input class="form-control form-control-sm @error('profile_photo') is-invalid @enderror" id="profile_photo" name="profile_photo" type="file" >
        @error('profile_photo')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-outline-success">Submit</button>
</form>

@endsection
