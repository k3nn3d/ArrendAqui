@extends('layouts.site.body')
@section('conteudo')
{{-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> --}}
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Contact Us</h1>
          </div>
        </div>
      </div>
    </section>
    
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="nome" class="col-form-label">cor:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
            <button  class="btn  btn-primary" id="ajaxSubmit" >Send message</button>
        </div>
    </form>

@endsection
