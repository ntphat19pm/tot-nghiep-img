@extends('layouts.site')
@section('main')

<div class="container-fluid" data-aos="fade" data-aos-delay="500">
  <div class="row">
    <div class="col-lg-4">

      <div class="image-wrap-2">
        <div class="image-info">
          <h2 class="mb-3">Cá nhân</h2>
          <a href="{{route('home.canhan')}}" class="btn btn-outline-white py-2 px-4">More Photos</a>
        </div>
        <img src="{{url('public/photosen')}}/images/img_1.jpg" alt="Image" class="img-fluid">
      </div>

    </div>
    <div class="col-lg-4">
      <div class="image-wrap-2">
        <div class="image-info">
          <h2 class="mb-3">Bạn bè</h2>
          <a href="{{route('home.banbe')}}" class="btn btn-outline-white py-2 px-4">More Photos</a>
        </div>
        <img src="{{url('public/photosen')}}/images/img_2.jpg" alt="Image" class="img-fluid">
      </div>
    </div>
    <div class="col-lg-4">
      <div class="image-wrap-2">
        <div class="image-info">
          <h2 class="mb-3">Người thân</h2>
          <a href="{{route('home.nguoithan')}}" class="btn btn-outline-white py-2 px-4">More Photos</a>
        </div>
        <img src="{{url('public/photosen')}}/images/img_3.jpg" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</div>
@endsection