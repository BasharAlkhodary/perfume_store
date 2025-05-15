@extends('Admin.Perfume.layout')

@section('content')

<div class="card m-5" style="width: 18rem;">
    <img src="/imagesOfPerfume/{{$perfume->picture}}" class="card-img-top" width="200px" height="200px">
    <div class="card-body">
        <h3 class="card-title">{{$perfume->name}}</h3>
        
        </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Description</b> : {{$perfume->description}} </li>
                <li class="list-group-item"><b>Price</b> : {{$perfume->price}} ILS</li>
                <li class="list-group-item"><b>Gender</b> : {{$perfume->gender}} </li>
                <li class="list-group-item"><b>Size</b> : {{$perfume->size}} ml</li>
            </ul>
                <div class="card-body">
                    <a href="{{route('perfume.index')}}" role="button" class="card-link"><b>Back To Perfumes Page</b></a>
        </div>
</div>
@endsection