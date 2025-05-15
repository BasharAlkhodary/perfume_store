@extends('Admin.Order.layout')

@section('content')

<div class="container">
    <div class="container text-center p-5">
        <div class="row align-items-center">
            <div class="col">
                <a class="btn btn-primary" href="{{route('order.create')}}" role="button">Create</a>
                {{-- <a class="btn btn-danger" href="{{ route('soft.trash') }}" role="button">Trash</a> --}}
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
                    <th scope="col">Total Price</th>
                    <th scope="col">Delivery</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Actions</th>
                    </tr>
            </thead>    
                <tbody class="table-group-divider">
                    @foreach ($order as $item)
                    <tr> 
                        
                        <th scope="row">
                            {{ ($order->currentPage() - 1) * $order->perPage() + $loop->iteration }}
                        </th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->total_price}} ILS</td>
                        <td>{{$item->delivery}}</td>
                        <td>{{$item->notes}} </td>

                        <td>
                            <form action="{{route('order.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>

                            <a href="{{route('order.edit',$item->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('order.soft.delete',$item->id)}}" class="btn btn-outline-warning">SoftDelete</a>


                            <a href="{{route('order.show',$item->id)}}" class="btn btn-success">Show</a>
                            </form> 
                        </td>
                    </tr>
                    @endforeach
                    
                
            </tbody>
        </table>
    </div>
    {{ $order->links('pagination::simple-bootstrap-4') }}

</div>
@endsection