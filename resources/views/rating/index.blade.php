@extends('layouts.app')

@section('body')
<style>
    .checked {
        color: orange;
    }
</style>

<div class="container mt-2 mb-2">
    @foreach($rating as $r)
    <div class="row g-0">
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
                                <h5>Rating</h5>
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
                        <h5>Comment</h5>
                        <p class="card-text">
                            @if(empty($r->comment))
                        <div class="badge bg-danger text-wrap">No comment yet from buyer</div>
                        @else
                        {{$r->comment}}
                        @endif
                        </p>
                        @if(empty($r->comment))
                        <a href="{{route('ratings.edit', ['rating' => $r])}}" class="btn btn-primary">View</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endforeach
</div>
{{$rating->links()}}



@endsection