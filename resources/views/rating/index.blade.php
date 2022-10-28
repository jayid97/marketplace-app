@extends('layouts.app')

@section('body')
<style>
    .checked {
        color: orange;
    }
</style>

<div class="container mt-4 mb-2 d-flex justify-content-center">
    @if(empty($rating))
    <div class="row g-0">
        <div class="alert alert-info" role="alert">
            There is no item buy by this user ...
        </div>
    </div>
    @else
    <div class="row g-0">
    @foreach($rating as $r)
        <div class="card mb-3 mt-3 col-md-8">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{url('storage/images/items/'.$r->item->image_name)}}" class="card-img-top" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Rating for {{$r->item->name}}</h5>
                        <div class="row">
                            <div class="col-md-12">
                                @if($r->star == 5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                @elseif($r->star == 4)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                @elseif($r->star == 3)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @elseif($r->star == 2)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @elseif($r->star == 1)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @else
                                <div class="badge bg-danger text-wrap">No rating yet from buyer</div>
                                @endif
                            </div>
                        </div>
                        <h5>Comment : </h5>
                        <p class="card-text">
                        @if(empty($r->buyer_comment))
                        <div class="badge bg-danger text-wrap">No comment yet from buyer</div>
                        @else
                        {{$r->buyer_comment}}
                        @endif
                        </p>
                        <h5>Seller Comment : </h5>
                        @if(empty($r->seller_comment))
                        <div class="badge bg-danger text-wrap">No comment yet from buyer</div>
                        @else
                        <p class="badge bg-success text-wrap">
                        {{$r->seller_comment}}
                        </p> 
                        @endif
                        <div class="row">
                            <div class="col">
                            @if(empty($r->buyer_comment))
                            <a href="{{route('ratings.edit', ['rating' => $r])}}" class="btn btn-primary">View</a>
                            </div>
                            <div class="col">
                            @elseif(empty($r->seller_comment))
                        <a href="{{route('ratings.edit', ['rating' => $r])}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                        
                       
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    @endif
</div>
{{$rating->links()}}



@endsection