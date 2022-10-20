@extends('layouts.app')

@section('body')
@if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger mt-2" role="alert">:message</div>')) !!}
@endif

@if (session('status'))
    <div class="alert alert-success mt-2">
        {{ session('status') }}
    </div>
@endif
<h1 class="text-center mt-1">My Items</h1>

<a class="btn btn-primary mb-1" data-mdb-toggle="modal" href="#exampleModalToggle1" role="button">Add Items</a>

<!-- First modal dialog -->
<div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel1">Post Selling Items</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{route('items.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <div class="col-md-12">
                <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control my-2" placeholder="Name" name="name" value="{{old('name')}}">
                    @if($errors->get('name'))
                    <div class="small text-danger">{{join('<br>', $errors->get('name'))}}</div>
                    @endif
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control my-2" placeholder="Location" name="location" value="{{old('location')}}">
                    @if($errors->get('location'))
                    <div class="small text-danger">{{join('<br>', $errors->get('location'))}}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control my-2" placeholder="Price" name="price" value="{{old('price')}}">
                    @if($errors->get('price'))
                    <div class="small text-danger">{{join('<br>', $errors->get('price'))}}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <input type="file" id="myfile" name="image_name" value="{{old('image_name')}}">
                @if($errors->get('image_name'))
                    <div class="small text-danger">{{join('<br>', $errors->get('image_name'))}}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea rows="10" cols="20" cols="30" class="form-control my-2" placeholder="Description" name="description" value="{{old('description')}}"></textarea>
                    @if($errors->get('description'))
                    <div class="small text-danger">{{join('<br>', $errors->get('description'))}}</div>
                    @endif
                </div>
            </div>
                
            </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-mdb-target="#exampleModalToggle22" data-mdb-toggle="modal" data-mdb-dismiss="modal">
          Add Items
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

<table class="table">
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
      <td> {{$i->status}}</td>
      <td>
      <div class="d-flex">
      <a class="btn btn-small btn-info m-1" href="{{ route('items.edit',['item'=> $i]) }}">
      <i class="far fa-edit"></i>
      </a> 
      <form method="POST" action="{{route('items.destroy',['item'=> $i])}}">
        @csrf
        @method('DELETE')
        <button class="btn btn-small btn-info m-1" onclick="return confirm('Are you sure want to delete the service?')">
        <i class="fas fa-trash-alt"></i>
        </button>
      </form>
      </div>
      </td>
    @endforeach
  </tbody>
</table>

  {{$items->links()}}
@endsection
