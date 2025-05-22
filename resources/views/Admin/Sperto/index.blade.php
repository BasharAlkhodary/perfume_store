@extends('Admin.Sperto.layout')

@section('content')

<div class="container">
    <div class="container text-center p-5">
        <div class="row align-items-center">

            <div class="col">
                <a class="btn btn-primary" href="{{route('sperto.create')}}" role="button">{{__('Create')}}</a>
                <a class="btn btn-danger" href="{{route('sperto.trash')}}" role="button">{{__('Trash')}}</a>
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
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Picture')}}</th>
                    <th scope="col">{{__('Concentration')}}</th>
                    <th scope="col">{{__('Price')}}</th>
                    <th scope="col">{{__('Size')}}</th>
                    <th scope="col">{{__('Actions')}}</th>
                    </tr>
            </thead>    
                <tbody class="table-group-divider">
                    @foreach ($sperto as $item)
                    <tr> 
                        
                        <th scope="row">
                            {{ ($sperto->currentPage() - 1) * $sperto->perPage() + $loop->iteration }}
                        </th>
                        <td>{{$item->name}}</td>
                        <td><img src="/imagesOfSperto/{{$item->picture}}" width="200px" height="200px"></td>
                        <td>{{$item->concentration}} %</td>
                        <td>{{$item->price}} ILS</td>
                        <td>{{$item->size}} ml</td>
                        <td>
                            <form action="{{route('sperto.destroy',$item->id)}}" method="POST">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>

                            <a href="{{route('sperto.edit',$item->id)}}" class="btn btn-info">{{__('Edit')}}</a>
                            <a href="{{route('sperto.soft.delete',$item->id)}}" class="btn btn-outline-warning">{{__('SoftDelete')}}</a>

                            <a href="{{route('sperto.show',$item->id)}}" class="btn btn-success">{{__('Show')}}</a>
                            </form> 
                        </td>
                    </tr>
                    @endforeach
                    
                
            </tbody>
        </table>
    </div>
    {{ $sperto->links('pagination::simple-bootstrap-4') }}

</div>
@endsection