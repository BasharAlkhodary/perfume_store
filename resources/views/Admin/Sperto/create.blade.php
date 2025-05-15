@extends('Admin.Sperto.layout')

@section('content')

<div class="row align-items-center p-5">
    <div class="col">
        <a class="btn btn-primary" href="{{route('sperto.index')}}" role="button">All Spertos</a>
        <a class="btn btn-primary" href="{{route('sperto.trash')}}" role="button">Trash</a>

    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $item)
            <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="mb-3 p-5" action="{{route('sperto.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name Of Sperto">
    </div>
    <div class="mb-3">
        <label for="formFileSm" class="form-label">Picture</label>
        <input class="form-control form-control-sm" id="picture" name="picture" type="file">
    </div>

    <div>
        <label for="exampleFormControlInput1" class="form-label">Concentration</label>
        <input type="number" class="form-control" id="concentration" name="concentration" placeholder="Concentration '%'">
    </div>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Price 'ILS'">
    </div>
    

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Size</label>
        <input type="number" class="form-control" id="size" name="size" placeholder="Size 'ml'">
    </div>
    
    <button type="submit" class="btn btn-outline-success">Submit</button>
@endsection