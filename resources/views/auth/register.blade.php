@extends('layouts.app')

@section('body')

<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Sign up now</h2>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example3" class="form-control" name="name" value="{{old('name')}}"/>
              <label class="form-label" for="form3Example3">Full Name</label>
              @if($errors->get('name'))
                <div class="small text-danger">{{join('<br>', $errors->get('name'))}}</div>
                @endif
            </div>
            

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control" name="email" value="{{old('email')}}"/>
              <label class="form-label" for="form3Example3">Email address</label>
              @if($errors->get('email'))
                        <div class="small text-danger">{{join('<br>', $errors->get('email'))}}</div>
                        @endif
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" name="password"/>
              <label class="form-label" for="form3Example4">Password</label>
              @if($errors->get('password'))
                        <div class="small text-danger">{{join('<br>', $errors->get('password'))}}</div>
                        @endif
            </div>

            <!-- Confirm Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" name="password_confirmation"/>
              <label class="form-label" for="form3Example4">Confirm Password</label>
              @if($errors->get('password_confirmation'))
                        <div class="small text-danger">{{join('<br>', $errors->get('password_confirmation'))}}</div>
                        @endif
            </div>

            <!-- Phone Number input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example4" class="form-control" name="phone_number"/>
              <label class="form-label" for="form3Example4">Phone Number</label>
              @if($errors->get('phone_number'))
                        <div class="small text-danger">{{join('<br>', $errors->get('phone_number'))}}</div>
                        @endif
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">
              Sign up
            </button>

            <!-- Register buttons -->
            <div class="text-center">
              <p>or sign up with:</p>
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
 @endsection
