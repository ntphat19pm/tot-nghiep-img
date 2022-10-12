@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('lienhe.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <a>
                  <button type="submit" class="btn btn-sm btn-primary float-right mb-3">Thêm</button>
              </a>
              <a href="{{route('lienhe.index')}}" class="btn btn-sm btn-danger mb-3">
                  <i class="fas fa-sign-out-alt"> Quay về bảng khuyến mãi</i>     
              </a>
            </div>

            <div class="row">

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="hinhanh">Hình ảnh <span class="text-danger font-weight-bold">*</span></label>
                  <input id="file_uploads" type="file" class="form-control @error('hinhanh') is-invalid @enderror" name="file_uploads" value="{{ old('file_uploads') }}" required autocomplete="file_uploads" />
                </div>
              </div>
  
              <div class="col-lg-6">
                
                <div class="form-group invalid">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" name="email" id="email" required >
                </div>
                
                <div class="form-group invalid">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi" id="diachi" required >
                </div>

                <div class="form-group invalid">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" id="sdt" required >
                </div>

                <div class="form-group invalid">
                    <label for="map" class="form-label">Bản đồ</label>
                    <input type="text" class="form-control" name="map" id="map" required >
                </div>

                <div class="form-group invalid">
                    <label for="fanpage" class="form-label">Fanpage</label>
                    <input type="text" class="form-control" name="fanpage" id="fanpage" required >
                </div>

              </div>
                
            </div>

            
          </form>
    </div>
</div>

@endsection
