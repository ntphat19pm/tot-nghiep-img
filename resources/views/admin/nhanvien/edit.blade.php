@extends('layouts.admin')
@section('main')
    <div class="card-body">
        <form action="{{route('nhanvien.update',$data->id)}}" method="POST" class="needs-validation" novalidate>
            @csrf @method('PUT')
           
            <div class="row">

              <div class="col-lg-3">
                  <div class="mb-3">
                  <label for="TieuDe" class="form-label">Họ và tên</label>
                  <input type="text" value="{{$data->hovaten}}" class="form-control" id="hovaten" name="hovaten" required>
                  </div>
              </div>
                  
              <div class="col-lg-2">
                <div class="form-group">
                    <label for="gioitinh_id">Giới tính<span class="text-danger font-weight-bold">*</span></label>
                    <select id="gioitinh_id" class="form-control custom-select @error('gioitinh_id') is-invalid @enderror" name="gioitinh_id" required autofocus>
                        <option value="">--Chọn giới tính--</option>
                        @foreach($gioitinh as $value)
                        <option value="{{ $value->id }}" {{($data->gioitinh_id== $value->id)?'selected':'' }}>{{$value->gioitinh}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-lg-3">  
                  <div class="mb-3">
                      <label for="ngaysinh" class="form-label">Ngày sinh</label>
                      <input type="date" value="{{$data->ngaysinh}}" class="form-control" id="ngaysinh" name="ngaysinh" required>
                  </div>
              </div>
              <div class="col-lg-4"> 
                  <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" value="{{$data->email}}" class="form-control" id="email" name="email" required>
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="mb-3">
                      <label for="diachi" class="form-label">Địa chỉ</label>
                      <input type="text" value="{{$data->diachi}}" class="form-control" id="diachi" name="diachi" required>
                  </div>
              </div>
              <div class="col-lg-2">
                  <div class="mb-3">
                  <label for="sdt" class="form-label">SĐT</label>
                  <input type="text" value="{{$data->sdt}}" class="form-control" id="sdt" name="sdt" required>
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="mb-3">
                      <label for="cmnd" class="form-label">CMND</label>
                      <input type="text"value="{{$data->cmnd}}" class="form-control" id="cmnd" name="cmnd" required>
                  </div>
              </div>
              <div class="col-lg-2">
                  <div class="form-group">
                      <label for="chucvu_id">Chức vụ<span class="text-danger font-weight-bold">*</span></label>
                      <select id="chucvu_id" class="form-control custom-select @error('chucvu_id') is-invalid @enderror" name="chucvu_id" required autofocus>
                          <option value="">--Chọn chức vụ--</option>
                          @foreach($chucvu as $value)
                          <option value="{{ $value->id }}" {{($data->chucvu_id== $value->id)?'selected':'' }}>{{$value->tenchucvu}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-lg-2">   
                    <div class="mb-3">
                <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                <input type="text" value="{{$data->tendangnhap}}" class="form-control" id="tendangnhap" name="tendangnhap" required>
              </div>
              </div>
              <div class="col-lg-3">
                  <div class="mb-3">
                    <label for="matkhau" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>

                  <div class="form-check mb-3">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" onchange="SHPassword(this)">
                      Hiện mật khẩu
                    </label>
                  </div>
              </div>
                <div class="col-lg-2">
                  <div class="form-group">
                    <label for="trangthai">Status<span class="text-danger font-weight-bold">*</span></label>
                    <select id="trangthai" class="form-control custom-select @error('trangthai') is-invalid @enderror" name="trangthai" required autofocus>
                        <option value="0" {{($data->trangthai== 0)?'selected':'' }}>Kích hoạt</option>
                        <option value="1" {{($data->trangthai== 1)?'selected':'' }}>Vô hiệu hóa</option>
                    </select>
                  </div>
                </div>
            
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>

          </form>
    </div>
</div>

@endsection
