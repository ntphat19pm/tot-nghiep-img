@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
      <form action="{{route('lienhe.update',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
          <div class="form-group">
            <a href="{{route('lienhe.index')}}" class="btn btn-sm btn-danger mb-3">
                <i class="fas fa-sign-out-alt"> Quay về</i>     
            </a>

            <a>
              <button type="submit" class="btn btn-sm btn-primary float-right mb-3">Lưu</button>
          </a>
          </div>

            <div class="row">

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="hinhanh">Logo hệ thống <span class="text-danger font-weight-bold">*</span></label>
                  <img class="rounded mx-auto d-block mb-3" src="{{url('public/uploads')}}/{{$data->logo}}"  width="200px"/>
                  <input id="file_uploads" type="file" class="form-control @error('file_uploads') is-invalid @enderror" name="file_uploads" value="{{ $data->logo }}" autocomplete="hinhanh" />
                </div>

                <div class="form-group invalid">
                  <label for="zalo" class="form-label">Zalo</label>
                  <textarea type="text" style="resize: none" rows="7" class="form-control" name="zalo" id="zalo" required >{{$data->zalo}}</textarea>
                </div>

                <div class="form-group invalid">
                  <label for="facebook" class="form-label">Link Facebook</label>
                  <input type="text" value="{{$data->facebook}}" class="form-control" name="facebook" id="facebook" required >
                </div>

                <div class="form-group invalid">
                  <label for="map" class="form-label">Bản đồ</label>
                  <textarea type="text" style="resize: none" rows="12" class="form-control" name="map" id="map" required >{{$data->map}}</textarea>
                </div>

              </div>
  
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group invalid">
                      <label for="ten_hethong" class="form-label">Tên hệ thống</label>
                      <input type="text" value="{{$data->ten_hethong}}" class="form-control" name="ten_hethong" id="ten_hethong" required >
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group invalid">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" value="{{$data->email}}" class="form-control" name="email" id="email" required >
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group invalid">
                      <label for="sdt" class="form-label">Số điện thoại</label>
                      <input type="text" value="{{$data->sdt}}" class="form-control" name="sdt" id="sdt" required >
                    </div>
                  </div>
                </div>
                
                <div class="form-group invalid">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" value="{{$data->diachi}}" class="form-control" name="diachi" id="diachi" required >
                </div>

                

                

                <div class="form-group invalid">
                    <label for="fanpage" class="form-label">Fanpage</label>
                    <textarea type="text" style="resize: none" rows="13" class="form-control" name="fanpage" id="fanpage" required >{{$data->fanpage}}</textarea>
                </div>

                <div class="form-group invalid">
                  <label for="mess" class="form-label">Messager Facebook</label>
                  <textarea type="text" style="resize: none" rows="25" class="form-control" name="mess" id="mess" required >{{$data->mess}}</textarea>
                </div>

              </div>
                
            </div>

            
          </form>
    </div>
</div>

@endsection
