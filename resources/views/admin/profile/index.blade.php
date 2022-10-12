@extends('layouts.admin')
@section('main')
    <div class="card-body">
        <form action=""> 
            <p><b><h4 class="text-center" style="color:rgb(255, 67, 67)">THÔNG TIN CÁ NHÂN <br>----- *** -----</h4></b></p>
        <div class="row">

            <div class="col-lg-3">
                <div class="mb-3">
                <label for="TieuDe" class="form-label">Họ và tên</label>
                <input type="text" value="{{Auth::user()->hovaten}}" class="form-control" id="hovaten" name="hovaten" required disabled>
                <div class="invalid-feedback">Họ và tên không được bỏ trống.</div>
                </div>
            </div>
                
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="gioitinh_id">Giới tính<span class="text-danger font-weight-bold">*</span></label>
                    <select id="gioitinh_id" class="form-control custom-select @error('gioitinh_id') is-invalid @enderror" name="gioitinh_id" required disabled>
                        <option value="">--Chọn giới tính--</option>
                        @foreach($gioitinh as $value)
                        <option value="{{ $value->id }}" {{(Auth::user()->gioitinh_id== $value->id)?'selected':'' }}>{{$value->gioitinh}}</option>
                        @endforeach
                    </select>
                    @error('baohanh_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">  
                <div class="mb-3">
                    <label for="ngaysinh" class="form-label">Ngày sinh</label>
                    <input type="date" value="{{Auth::user()->ngaysinh}}" class="form-control" id="ngaysinh" name="ngaysinh" required disabled>
                    <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                </div>
            </div>
            <div class="col-lg-4"> 
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" value="{{Auth::user()->email}}" class="form-control" id="email" name="email" required disabled>
                    <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" value="{{Auth::user()->diachi}}" class="form-control" id="diachi" name="diachi" required disabled>
                    <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mb-3">
                <label for="sdt" class="form-label">SĐT</label>
                <input type="text" value="{{Auth::user()->sdt}}" class="form-control" id="sdt" name="sdt" required disabled>
                <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="cmnd" class="form-label">CMND</label>
                    <input type="text"value="{{Auth::user()->cmnd}}" class="form-control" id="cmnd" name="cmnd" required disabled>
                    <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="chucvu_id">Chức vụ<span class="text-danger font-weight-bold">*</span></label>
                    <select id="chucvu_id" class="form-control custom-select @error('chucvu_id') is-invalid @enderror" name="chucvu_id" required disabled >
                        <option value="">--Chọn chức vụ--</option>
                        @foreach($chucvu as $value)
                        <option value="{{ $value->id }}" {{(Auth::user()->chucvu_id== $value->id)?'selected':'' }}>{{$value->tenchucvu}}</option>
                        @endforeach
                    </select>
                    @error('baohanh_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">   
                  <div class="mb-3">
              <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
              <input type="text" value="{{Auth::user()->tendangnhap}}" class="form-control" id="tendangnhap" name="tendangnhap" required disabled>
              <div class="invalid-feedback">Tên đăng nhập không được bỏ trống.</div>
            </div>
            </div>
        </div>
        </form>
        <a href="{{route('profile.edit',Auth::user()->id)}}" class="btn btn-sm btn-success float-right mt-3">
            <i class="fas fa-edit"> Sửa</i>              
        </a>
        <a href="{{route('admin.index')}}" class="btn btn-sm btn-danger mt-3">
            <i class="fas fa-sign-out-alt"> Quay về trang quản lý</i>     
        </a>
    </div>
</div>

@endsection

@section('js')
<script>
  $('.btndelete').click(function(ev){
    ev.preventDefault();
    var _href=$(this).attr('href');
    $('form#form-delete').attr('action',_href);
   if(confirm('Bạn có chắc muốn xóa tài khoản?')){
      $('form#form-delete').submit();
   }
    
  })
</script>

@endsection
