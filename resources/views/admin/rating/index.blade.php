@extends('layouts.admin')

@section('body')

<style>
   .checked {
  color: orange;
    }
</style>
<form action="{{route('admin.ratings.index')}}" class="d-flex my-4">
<input type="text" name="search" placeholder="search by id/rating" class="flex-grow-1 form-control" value="{{request()->search}}">
<button class="btn btn-primary">Search</button>
<a class="btn" href="{{route('admin.ratings.index')}}">Reset</a>
</form>
<table class="table mt-2">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Comment</th>
            <th scope="col">Star</th>
            <th scope="col">Buyer</th>
            <th scope="col">Seller</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rating as $r)
        <tr>
            <td>{{$r->id}}</td>
            <td>{{$r->comment}}</td>
            <td>
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
                <div class="badge bg-danger text-wrap" style="width: 6rem">No rating yet from buyer</div>
                @endif
            </td>
            <td>
                {{$r->buyer->name}}
            </td>
             <td>
                {{$r->seller->name}}
            </td>
            @endforeach
    </tbody>
</table>


@endsection