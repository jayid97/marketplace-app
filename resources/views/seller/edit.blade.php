@extends('layouts.app')

@section('body')
<h2 class="text-center mt-1">Edit Item</h2>
<form method="POST" action="{{route('items.update',['item'=>$item])}}">
    @csrf
    @method('PUT')

    
    <div class="text-center">
        <img src="{{url('storage/images/items/'.$item->image_name)}}" class="img-fluid border border-primary" width="300px;" height="300px;" />
    </div>


    <div class="form-outline mb-4">
        <input type="text" class="form-control my-2" placeholder="Name" name="name" value="{{$item->name}}" />
        <label class="form-label" for="form6Example3">Item Name</label>
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <input type="text" class="form-control my-2" placeholder="Location" name="location" value="{{$item->location}}" />
        <label class="form-label" for="form6Example4">Location</label>
    </div>

    <div class="form-outline mb-4">
        <input type="text" class="form-control my-2" placeholder="Price" name="price" value="{{$item->price}}" />
        <label class="form-label" for="form6Example5">Price</label>
    </div>


    <!-- Message input -->
    <div class="form-outline mb-4">
        <textarea class="form-control" id="form6Example7" rows="4" class="form-control my-2" name="description">{{$item->description}}</textarea>
        <label class="form-label" for="form6Example7">Description</label>
    </div>
    <!-- Submit button -->
    <button class="btn btn-primary btn-block mb-4">Place order</button>
</form>
@endsection