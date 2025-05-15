@extends('Admin.Sperto.layout')

@section('content')

<div class="card m-5" style="width: 18rem;">
    <img src="/imagesOfSperto/{{$sperto->picture}}" class="card-img-top" width="200px" height="200px">
    <div class="card-body">
        <h3 class="card-title">{{$sperto->name}}</h3>
        
        </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Concentration</b> : {{$sperto->concentration}} %</li>
                <li class="list-group-item"><b>Price</b> : {{$sperto->price}} ILS</li>
                <li class="list-group-item"><b>Size</b> : {{$sperto->size}} ml</li>
            </ul>
                <div class="card-body">
                    <a href="{{route('sperto.index')}}" role="button" class="card-link"><b>Back To Spertos Page</b></a>
        </div>
</div>
@endsection