@extends('layouts.admin')

@section('body')

<form action="{{route('admin.users.index')}}" class="d-flex my-4">
<input type="text" name="search" placeholder="search by id/email/name" class="flex-grow-1 form-control" value="{{request()->search}}">
<button class="btn btn-primary">Search</button>
<a class="btn" href="{{route('admin.users.index')}}">Reset</a>
</form>

<table class="table mt-2">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $u)
    <tr>
      <td>{{$u->id}}</td>
      <td>{{$u->name}}</td>
      <td>{{$u->email}}</td>
      <td>{{$u->phone_number}}</td>
      <td>{{$u->Address}}</td>
      <td></td>
    @endforeach
  </tbody>
</table>


@endsection