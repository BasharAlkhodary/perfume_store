@extends('Admin.Perfume.layout')

@section('content')

<div class="row align-items-center p-5">
    <div class="col">
        <a class="btn btn-primary" href="{{route('perfume.index')}}" role="button">All Perfumes</a>
    </div>
</div>

{{-- @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $item)
            <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form class="mb-3 p-5" action="{{route('perfume.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label @error('name') is-invalid @enderror">Name</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name Of perfume" value="{{ old('name', $perfume->name ?? '') }}">
        @error('name')
            <p class="text-danger"> {{$message}}</p>
        @enderror 
    </div>
    <div class="mb-3">
        <label for="formFileSm" class="form-label">Picture</label>
        <input class="form-control form-control-sm  @error('picture') is-invalid @enderror" id="picture" name="picture" type="file" value="{{ old('picture', $perfume->picture ?? '') }}">
        @error('picture')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    {{-- <div>
        <label for="exampleFormControlInput1" class="form-label">Concentration_Type</label>
        <input type="number" class="form-control" id="concentration_type" name="concentration_type" placeholder="concentration_type '%'">
    </div> --}}

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="number" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" placeholder="Price 'ILS'" value="{{ old('price', $perfume->price ?? '') }}">
        @error('price')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>
    

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Size</label>
        <input type="number" class="form-control  @error('size') is-invalid @enderror" id="size" name="size" placeholder="Size 'ml'" value="{{ old('size', $perfume->size ?? '') }}">
        @error('size')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender', $perfume->gender ?? '') }}">
            <option value="">-- Select Gender --</option>   
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="unisex" {{ old('gender') == 'unisex' ? 'selected' : '' }}>Unisex</option>
        </select>
        @error('gender')
            <p class="text-danger"> {{$message}}</p>
        @enderror
    </div>
    
    <div class="mb-3gender">
        <label for="exampleFormControlInput1" class="form-label">Description The Perfume</label>
        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description" cols="20" rows="5" placeholder="Description Of Perfume" >{{ old('description', $perfume->description ?? '') }}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-outline-success">Submit</button>
@endsection