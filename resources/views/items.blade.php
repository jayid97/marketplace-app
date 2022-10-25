@extends('layouts.app')

@section('body')

@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger mt-2" role="alert">:message</div>')) !!}
@endif

<style>
    .checked {
        color: orange;
    }
</style>

<div class="container">
    <div class="row">
        <div class="card mb-3 mt-3 col-md-8 shadow">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{url('storage/images/items/'.$items->image_name)}}" class="img-fluid rounded-start" width="200px;" height="200px;" />
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
                            <button class="btn btn-primary form-control">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 mt-3 col-md-4 shadow">
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title">Seller Info</h5>
                        <p class="card-text">
                            Name: {{$items->user->name}}
                        </p>
                        <p class="card-text">
                            @if(empty($items->user->address))
                            Location: No location from this seller
                            @else
                            Location: {{$items->user->address}}
                            @endif
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">
                                    @if(is_null($avg_star))
                                <div class="badge bg-danger text-wrap">There is no rating for this seller</div>
                                @else
                                Ratings: {{$avg_star}} stars
                                @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">
                                    @if($count_item == 0)
                                <div class="badge bg-danger text-wrap">There is no product by seller</div>
                                @else
                                Products: {{$count_item}}
                                @endif
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection