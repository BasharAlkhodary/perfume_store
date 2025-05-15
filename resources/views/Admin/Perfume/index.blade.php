@extends('Admin.Perfume.layout')

@section('content')

<div class="container">
    <div class="container text-center p-1">
        <div class="row align-items-center">
            <div class="col">

                @auth
                <a class="btn btn-primary" href="{{route('perfume.create')}}" role="button">Create</a>
                <a class="btn btn-danger" href="{{ route('perfume.trash') }}" role="button">Trash</a>
                @endauth 
                <br>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mb-3 p-5" role="alert">
                {{$message}}
            </div>
        @elseif ($message = Session::get('delete'))
            <div class="alert alert-danger mb-3 p-5" role="alert">
                {{$message}}
            </div>
        @endif
    </div>
    <div>
        <table class="table table-bordered border-primary">
            <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Description</th>
                    <th scope="col">Size</th>
                    <th scope="col">Gender</th>
                    {{-- <th scope="col">concentration_type</th> --}}
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                    </tr>
            </thead>    
                <tbody class="table-group-divider">
                    @foreach ($perfume as $item)
                    <tr> 
                        <th scope="row">
                            {{ ($perfume->currentPage() - 1) * $perfume->perPage() + $loop->iteration }}
                        </th>
                        <td>{{$item->name}}</td>
                        <td><img src="/imagesOfPerfume/{{$item->picture}}" width="200px" height="200px"></td>
                        <td>{{$item->description}} </td>
                        <td>{{$item->size}} ml</td>
                        <td>{{$item->gender}} </td>
                        {{-- <td>{{$item->concentration_type}} %</td> --}}
                        <td>{{$item->price}} ILS</td>
                        <td>
                            @auth
                                <form action="{{route('perfume.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>

                                <a href="{{route('perfume.edit',$item->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('soft.delete',$item->id)}}" class="btn btn-outline-warning">softDelete </a>
                            @endauth
                    
                            <a href="{{route('perfume.show',$item->id)}}" class="btn btn-success">Show</a>
                            </form> 
                        </td>
                    </tr>
                    @endforeach 
            </tbody>
        </table>

        
    </div>
    {{ $perfume->links('pagination::simple-bootstrap-4') }}
</div>
@endsection