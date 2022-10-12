@extends('layouts.admin')
@section('main')
    <div class="card-body">
        
        <form action="{{route('profile.update',Auth::user()->id)}}" method="POST">
            @csrf @method('PUT')

            <div class="form-group">
                <a>
                    <button type="submit" class="btn btn-sm btn-primary float-right mb-3">Lưu</button>
                </a>
                <a href="{{route('profile.index')}}" class="btn btn-sm btn-danger mt-3">
                    <i class="fas fa-sign-out-alt"> Quay về trang thông tin</i>     
                </a>
            </div>

            <p><b><h4 class="text-center" style="color:rgb(255, 67, 67)">THÔNG TIN CÁ NHÂN <br>----- *** -----</h4></b></p>

            <div class="row">

              <div class="col-lg-3">
                  <div class="mb-3">
                  <label for="TieuDe" class="form-label">Họ và tên</label>
                  <input type="text" value="{{Auth::user()->hovaten}}" class="form-control" id="hovaten" name="hovaten" required>
                  <div class="invalid-feedback">Họ và tên không được bỏ trống.</div>
                  </div>
              </div>
                  
              <div class="col-lg-2">
                <div class="form-group">
                    <label for="gioitinh_id">Giới tính<span class="text-danger font-weight-bold">*</span></label>
                    <select id="gioitinh_id" class="form-control custom-select @error('gioitinh_id') is-invalid @enderror" name="gioitinh_id" required autofocus>
                        <option value="">--Chọn giới tính--</option>
                        @foreach($gioitinh as $value)
                        <option value="{{ $value->id }}" {{(Auth::user()->gioitinh_id== $value->id)?'selected':'' }}>{{$value->gioitinh}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-lg-3">  
                  <div class="mb-3">
                      <label for="ngaysinh" class="form-label">Ngày sinh</label>
                      <input type="date" value="{{Auth::user()->ngaysinh}}" class="form-control" id="ngaysinh" name="ngaysinh" required>
                      <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                  </div>
              </div>
              <div class="col-lg-4"> 
                  <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" value="{{Auth::user()->email}}" class="form-control" id="email" name="email" required>
                      <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="mb-3">
                      <label for="diachi" class="form-label">Địa chỉ</label>
                      <input type="text" value="{{Auth::user()->diachi}}" class="form-control" id="diachi" name="diachi" required>
                      <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                  </div>
              </div>
              <div class="col-lg-2">
                  <div class="mb-3">
                  <label for="sdt" class="form-label">SĐT</label>
                  <input type="text" value="{{Auth::user()->sdt}}" class="form-control" id="sdt" name="sdt" required>
                  <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="mb-3">
                      <label for="cmnd" class="form-label">CMND</label>
                      <input type="text"value="{{Auth::user()->cmnd}}" class="form-control" id="cmnd" name="cmnd" required>
                      <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                  </div>
              </div>
              <div class="col-lg-2" hidden>
                <div class="mb-3">
                    <label for="chucvu_id" class="form-label">Chức vụ</label>
                    <input type="text"value="{{Auth::user()->chucvu_id}}" class="form-control" id="chucvu_id" name="chucvu_id" required>
                    <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                </div>
              </div>
              <div class="col-lg-4">   
                    <div class="mb-3">
                <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                <input type="text" value="{{Auth::user()->tendangnhap}}" class="form-control" id="tendangnhap" name="tendangnhap" required>
                <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
              </div>
              </div>
              <div class="col-lg-3" hidden>
                  <div class="mb-3">
                    <label for="matkhau" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                  </div>

                  <div class="form-check mb-3">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" onchange="SHPassword(this)">
                      Hiện mật khẩu
                    </label>
                  </div>
              </div>
              
            
            </div>


          </form>
          
    </div>
</div>

@endsection
