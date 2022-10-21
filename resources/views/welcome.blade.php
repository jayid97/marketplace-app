@extends('layouts.app')

@section('body')

<style>
.card-image {
  height: 300px
}
</style>

<form action="{{route('home')}}" class="d-flex my-4">
<input type="text" name="search" placeholder="search name" class="flex-grow-1 form-control" value="{{request()->search}}">
<button class="btn btn-primary"><i class="fas fa-search"></i></button>
<a class="btn" href="{{route('home')}}">Reset</a>
</form>

<div class="container mt-2 mb-2">
    <div class="row">
        @foreach($items as $i)
        <div class="col-md-3 col-sm-2 col-xs-2">
            <div class="card">
                <img src="{{url('storage/images/items/'.$i->image_name)}}" class="card-image"/>
                <div class="card-body">
                    <h5 class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">{{$i->name}}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="badge bg-info text-wrap"> RM{{number_format($i->price,2)}} </p>
                            </div>
                        </div>
                    </h5>
                    <p class="card-text">{{Str::limit($i->description, 15) }}</p>
                    <div class="row mt-2">
                        <a href="{{route('product', $i->id)}}" class="btn btn-primary">View</a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection