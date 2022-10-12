@extends('layouts.site')
@section('main')
<div class="site-section"  data-aos="fade">
    <div class="container-fluid">

      <div class="row justify-content-center">

        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">LỄ TỐT NGHIỆP CỦA PHÁT</h2>
            </div>
          </div>
        </div>

      </div>
      <div class="row" id="lightgallery">
        @foreach($canhan as $item)
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="{{url('public/uploads/canhan')}}/{{$item->avatar}}" data-sub-html="<h4>{{$item->tenhinh}}</h4><p>{!!$item->mota!!}</p>">
          <a href="#"><img src="{{url('public/uploads/canhan')}}/{{$item->avatar}}" alt="IMage" class="img-fluid"></a>
        </div>
        @endforeach

      </div>
    </div>
  </div>
  @endsection