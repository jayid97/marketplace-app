@extends('layouts.app')

@section('body')


<div class="container mt-2 mb-2">
    <div class="row">
        <div class="col-md-3 col-sm-2 col-xs-2">
            <div class="card">
                <img src="{{url('storage/images/items/'.$items->image_name)}}" class="card-img-top max-vw-80"/>
                <div class="card-body">
                    <h5 class="card-title">{{$rating->id}}</h5>
                    <p class="card-text">{{$rating->comment}}</p>
                    <button class="btn btn-primary">Buy</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection