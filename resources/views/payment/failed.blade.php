@extends('layouts.app')

@section('body')
<div class="container p-4 mt-5" style="background-color: DodgerBlue; color:aliceblue;">
    <div class="row">
        <div class="col-md-12">
        <h1 class="font-weight-bold text-uppercase text-center">Payment Failed</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-12">
            <div class="contactform">
                <div class="row">
                <div class="col-md-6">
                    <label class="my-2" >Order Number : #{{$item->id}}</label>
                </div>
                <br>
                <div class="col-md-6">
                    <label class="my-2" >Name : {{$item->name}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="my-2" >Price : RM{{ number_format($item->price,2)}}</label>
                </div>
            </div>
                
            </div>
        </div>
    </div>
    
</div>

@endsection