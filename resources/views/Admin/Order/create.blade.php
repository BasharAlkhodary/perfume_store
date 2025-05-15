@extends('Admin.Order.layout')

@section('content')

<div class="row align-items-center p-5">
    <div class="col">
        <a class="btn btn-primary" href="{{route('order.index')}}" role="button">All Orders</a>
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

<form class="mb-3 p-5" action="{{route('order.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name Of order">
    </div>
    <div class="mb-3">
        <label for="formFileSm" class="form-label">Total Price</label>
        <input class="form-control form-control-sm" id="total_price" name="total_price" type="number">
    </div>

    <div class="form-group mb-3">
        <label for="delivery">Delivery Status</label>
        <select name="delivery" id="delivery" class="form-control" required>
            <option value="">-- Select Status --</option>
            <option value="yes" {{ old('Yes') == 'yes' ? 'selected' : '' }}>Yes</option>
            <option value="no" {{ old('no') == 'no' ? 'selected' : '' }}>No</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Notes</label>
        <textarea name="notes" class="form-control" id="notes" cols="20" rows="5" placeholder="Notes Of order"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-outline-success">Submit</button>
@endsection