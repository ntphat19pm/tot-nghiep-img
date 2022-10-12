@extends('layouts.admin')
@section('main')

<div class="card" >
 
    <div class="card-body">
        <form action="{{route('nhanvien.store')}}" method="POST" class="needs-validation" novalidate>
            @csrf
           
            <div class="row">

              <div class="col-lg-3">
                <div class="mb-3">
                  <label for="TieuDe" class="form-label">Họ và tên</label>
                  <input type="text" class="form-control" id="hovaten" name="hovaten" autocomplete="off" required>
                </div>
              </div>
                  
              <div class="col-lg-2">
                <div class="form-group">
                  <label for="gioitinh_id">Giới tính<span class="text-danger font-weight-bold">*</span></label>
                  <select id="gioitinh_id" class="form-control custom-select @error('gioitinh_id') is-invalid @enderror" name="gioitinh_id" required autofocus>
                      <option value="">-- Chọn giới tính --</option>
                      @foreach($gioitinh as $value)
                          <option value="{{$value->id }}">{{ $value->gioitinh }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-3">  
                <label for="ngaysinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>

              </div>
              <div class="col-lg-4"> 
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>

              </div>
              <div class="col-lg-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" autocomplete="off" required>

              </div>
              <div class="col-lg-2">
                <div class="mb-3">
                  <label for="sdt" class="form-label">SĐT</label>
                  <input type="text" class="form-control" id="sdt" name="sdt" autocomplete="off" required>

              </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label for="cmnd" class="form-label">CMND</label>
                  <input type="text" class="form-control" id="cmnd" name="cmnd" autocomplete="off" required>

              </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <label for="chucvu_id">Chức vụ<span class="text-danger font-weight-bold">*</span></label>
                  <select id="chucvu_id" class="form-control custom-select @error('chucvu_id') is-invalid @enderror" name="chucvu_id" required autofocus>
                      <option value="">-- Chọn chức vụ --</option>
                      @foreach($chucvu as $value)
                          <option value="{{$value->id }}">{{ $value->tenchucvu }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-2">   
                <div class="mb-3">
                  <label for="matkhau" class="form-label">Mật khẩu</label>
                  <input type="password" class="form-control" id="password" name="matkhau" autocomplete="off" required>
              </div>

              <div class="form-check mb-3">
                <label class="form-check-label text-muted">
                  <input type="checkbox" class="form-check-input" onchange="SHPassword(this)">
                  Hiện mật khẩu
                </label>
              </div>
              </div>
              
            
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
</div>

@endsection
