@extends('layouts.app')

@section('body')


<div class="container mt-2 mb-2">
    <div class="row">
        @foreach($items as $i)
        <div class="col-md-3 col-sm-2 col-xs-2">
            <div class="card">
                <img src="{{url('storage/images/items/'.$i->image_name)}}" class="card-img-top " style="height: 300px; object-fit:cover;" />
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
                    <p class="card-text">{{$i->description}}</p>
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