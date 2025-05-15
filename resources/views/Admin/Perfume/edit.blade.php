@extends('Admin.Perfume.layout')

@section('content')

<div class="row align-items-center p-5">
    <div class="col">
        <a class="btn btn-primary" href="{{ route('perfume.index') }}" role="button">All perfumes</a>
    </div>
</div>

{{-- @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form class="mb-3 p-5" action="{{route('perfume.update', $perfume->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name Of perfume" value="{{ old('name', $perfume->name ?? '') }}">
        @error('name')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="formFileSm" class="form-label ">Picture</label>
        <img src="/imagesOfPerfume/{{$perfume->picture}}" width="200px" height="200px">
        <input class="form-control form-control-sm @error('picture') is-invalid @enderror" id="picture" name="picture" type="file" >
        @error('picture')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    {{-- لو حبيت ترجع هذا الحقل، فقط فك التعليق --}}
    {{-- 
    <div class="mb-3">
        <label for="concentration_type" class="form-label">Concentration Type</label>
        <input type="number" class="form-control" id="concentration_type" name="concentration_type" placeholder="Concentration Type '%'">
    </div>
    --}}

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" placeholder="Price 'ILS'" value="{{ old('price', $perfume->price ?? '') }}">
        @error('price')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="size" class="form-label">Size</label>
        <input type="number" class="form-control  @error('size') is-invalid @enderror" id="size" name="size" placeholder="Size 'ml'" value="{{ old('size', $perfume->size ?? '') }}">
        @error('size')
            <p class="text-danger"> {{$message}}</p>
        @enderror</div>

    <div class="form-group mb-3">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" >
            <option value="">-- Select Gender --</option>
            <option value="male" {{ old('gender', $perfume->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $perfume->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="unisex" {{ old('gender', $perfume->gender ?? '') == 'unisex' ? 'selected' : '' }}>Unisex</option>
        </select>
        @error('gender')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label ">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="20" rows="5" placeholder="Description Of Perfume">{{ old('description', $perfume->description ?? '') }}</textarea>
        @error('description')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-outline-success">Submit</button>
</form>

@endsection
