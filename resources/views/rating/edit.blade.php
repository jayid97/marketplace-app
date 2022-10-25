@extends('layouts.app')

@section('body')
<style>
    /****** Style Star Rating Widget *****/
    .rating {
        border: none;
        float: left;
    }

    .rating>input {
        display: none;
    }

    .rating>label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating>input:checked~label,
    /* show gold star when clicked */
    .rating:not(:checked)>label:hover,
    /* hover current star */
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    /* hover previous stars in list */

    .rating>input:checked+label:hover,
    /* hover current star when changing rating */
    .rating>input:checked~label:hover,
    .rating>label:hover~input:checked~label,
    /* lighten current selection */
    .rating>input:checked~label:hover~label {
        color: #FFED85;
    }
</style>
@if($rating->buyer_id == auth()->user()->id)
<h2 class="text-center mt-1">Rate and Comment Seller</h2>
@else
<h2 class="text-center mt-1">Reply Buyer Comment</h2>
@endif
<form method="POST" action="{{route('ratings.update',['rating'=>$rating])}}">
    @csrf
    @method('PUT')
    <div class="col-md-12">
        @if($rating->buyer_id == auth()->user()->id)
        <div class="row">
            <div class="col-md-12">
                <h1>Rating</h1>
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                </fieldset>
            </div>
            <div class="col-md-12">
                <h1>Leave your comment</h1>
                <textarea rows="10" cols="20" cols="30" class="form-control my-2" placeholder="Comment" name="buyer_comment"></textarea>
                @if($errors->get('buyer_comment'))
                <div class="small text-danger">{{join('<br>', $errors->get('buyer_comment'))}}</div>
                @endif
            </div>
            @else
            <div class="col-md-12">
                <h1>Leave your comment</h1>
                <textarea rows="10" cols="20" cols="30" class="form-control my-2" placeholder="Comment" name="seller_comment"></textarea>
                @if($errors->get('seller_comment'))
                <div class="small text-danger">{{join('<br>', $errors->get('seller_comment'))}}</div>
                @endif
            </div>
            @endif
        </div>
        <button class="btn btn-primary">Post</button>
    </div>
  
</form>

@endsection