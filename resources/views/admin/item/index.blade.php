@extends('layouts.admin')

@section('body')
<form action="{{route('admin.items.index')}}" class="d-flex my-4">
<input type="text" name="search" placeholder="search by id/name" class="flex-grow-1 form-control" value="{{request()->search}}">
<button class="btn btn-primary">Search</button>
<a class="btn" href="{{route('admin.items.index')}}">Reset</a>
</form>
<table class="table mt-2">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Posted Date</th>
      <th scope="col">Location</th>
      <th scope="col">Status</th>
      <th scope="col">Buyer</th>
      <th scope="col">Seller</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($items as $i)
    <tr>
      <td>{{$i->id}}</td>
      <td>{{$i->name}}</td>
      <td><img src="{{url('storage/images/items/'.$i->image_name)}}" class="img-thumbnail"/></td>
      <td>{{$i->description}}</td>
      <td>{{$i->price}}</td>
      <td>{{$i->created_at}}</td>
      <td>{{$i->location}}</td>
      <td> 
      @if($i->status == "Paid")  
      <div class="badge bg-success text-wrap" style="width: 6rem">{{$i->status}}</div>
      @elseif($i->status == "Listing")
      <div class="badge bg-danger text-wrap" style="width: 6rem">{{$i->status}}</div>
      @else
      <div class="badge bg-primary text-wrap" style="width: 6rem">{{$i->status}}</div>
      @endif
      </td>
      <td>
      {{$i->user->name}}
      </td>
      <td>
        @if(empty($i->buyer->id) || $i->buyer->id == 0 )
        <div class="badge bg-primary text-wrap" style="width: 6rem">No Buyer</div>
        @else
      {{$i->buyer->name}}
      @endif
      </td>
    @endforeach
  </tbody>
</table>


@endsection