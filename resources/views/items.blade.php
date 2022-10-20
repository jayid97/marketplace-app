@extends('layouts.app')

@section('body')

@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger mt-2" role="alert">:message</div>')) !!}
@endif

<div class="container">
    <div class="row">
        <div class="card mb-3 mt-3 col-md-8">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{url('storage/images/items/'.$items->image_name)}}" class="img-fluid rounded-start" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$items->name}}</h5>
                        <p class="card-text">
                            {{$items->description}}
                        </p>
                        <p class="badge bg-primary text-wrap" style="width: 6rem">
                            RM{{number_format($items->price,2)}}
                        </p>
                        <p class="badge bg-info text-wrap" style="width: 6rem">
                            {{$items->location}}
                        </p>
                        <form action="{{route('payment')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$items->id}}" />
                            <button class="btn btn-primary">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 mt-3 col-md-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{url('storage/images/profile/user.png')}}" class="img-fluid mt-4" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Owner</h5>
                        <p class="card-text">
                            <i class="fas fa-user"></i> {{$items->user->name}}
                        </p>
                        <p class="card-text">
                            <i class="fas fa-location-arrow"></i> {{$items->user->address}}
                        </p>
                        <p class="card-text">
                            <i class="fas fa-phone"></i> {{$items->user->phone_number}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection