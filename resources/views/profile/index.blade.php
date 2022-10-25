@extends('layouts.app')

@section('body')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-7 col-xl-5">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
                <img src="{{url('/img/profile.jpg')}}"
                  alt="Generic placeholder image" class="img-fluid"
                  style="width: 180px; border-radius: 10px;">
              </div>
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1">{{$user->name}}</h5>
                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                  style="background-color: #efefef;">
                  <div>
                    <p class="small text-muted mb-1">Product</p>
                    <p class="mb-0">{{$count_item}}</p>
                  </div>
                  <div class="px-3">
                    <p class="small text-muted mb-1">Rating</p>
                    <p class="mb-0">{{$avg_star}}</p>
                  </div>
                  <div>
                    <p class="small text-muted mb-1">Comment</p>
                    <p class="mb-0">{{$count_comment}}</p>
                  </div>
                </div>
                <div class="d-flex pt-1">
                    <a class="btn btn-outline-primary me-1 flex-grow-1" href="{{route('items.index')}}">My Items</a>
                    <a class="btn btn-primary flex-grow-1" href="{{route('ratings.index')}}">My Ratings</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection