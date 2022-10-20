@extends('layouts.app')

@section('body')
<h2 class="text-center mt-1">Edit Item</h2>
<form method="POST" action="{{route('items.update',['item'=>$item])}}">
        @csrf
        @method('PUT')
      <div class="modal-body">
      <div class="col-md-12">
                <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control my-2" placeholder="Name" name="name" value="{{$item->name}}">
                    @if($errors->get('name'))
                    <div class="small text-danger">{{join('<br>', $errors->get('name'))}}</div>
                    @endif
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control my-2" placeholder="Location" name="location" value="{{$item->location}}">
                    @if($errors->get('location'))
                    <div class="small text-danger">{{join('<br>', $errors->get('location'))}}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control my-2" placeholder="Price" name="price" value="{{$item->price}}">
                    @if($errors->get('price'))
                    <div class="small text-danger">{{join('<br>', $errors->get('price'))}}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea rows="10" cols="20" cols="30" class="form-control my-2" placeholder="Description" name="description">{{$item->description}}</textarea>
                    @if($errors->get('description'))
                    <div class="small text-danger">{{join('<br>', $errors->get('description'))}}</div>
                    @endif
                </div>
            </div>
                
            </div>
      </div>
        <button class="btn btn-primary">Post</button>
</form>

@endsection