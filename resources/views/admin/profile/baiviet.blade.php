@extends('layouts.admin')
@section('main')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
        <i class="fa fa-newspaper"></i>
        QUẢN LÝ BÀI VIẾT CÁ NHÂN ({{Auth::user()->hovaten}})
        </h3>
        <div class="card-tools">
        <button class="btn btn-tool" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        
        </div>
    </div>
     
    <div class="collapse" id="collapseExample">
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button type="button" class="btn btn-outline-secondary mt-2" data-toggle="modal" data-target="#modal-secondary" href="#nhap"> <i class="fas fa-plus-circle"></i> Thêm bài viết</button>
            </div>
            <form action="{{ route('home.postbaiviet') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="modal-secondary">
                  <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                            <h4 class="modal-title">Nhập đặc điểm file Excel</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-0">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="avatar">Hình ảnh <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="file_uploads" type="file" class="form-control @error('avatar') is-invalid @enderror" name="file_uploads" value="{{ old('file_uploads') }}" required autocomplete="file_uploads" />
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                    
                                        <div class="form-group invalid">
                                            <label for="tenbai" class="form-label">Tên bài</label>
                                            <input type="text" class="form-control" name="tenbai" id="tenbai" autocomplete="off" required >
                                        </div>
                                        
                                        <div class="form-group invalid">
                                            <label for="mota" class="form-label">Mô tả</label>
                                            <textarea class="form-control" name="mota" id="mota" cols="10" rows="1"></textarea>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="phanloai_id">Lĩnh vực<span class="text-danger font-weight-bold">*</span></label>
                                                    <select id="phanloai_id" class="form-control custom-select @error('phanloai_id') is-invalid @enderror" name="phanloai_id" required autofocus>
                                                        <option value="">--Chọn lĩnh vực--</option>
                                                        <option value="0">Tin sự kiện</option>
                                                        <option value="1">Tin công nghệ</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="binhluan_id">Cho phép bình luận<span class="text-danger font-weight-bold">*</span></label>
                                                    <select id="binhluan_id" class="form-control custom-select @error('binhluan_id') is-invalid @enderror" name="binhluan_id" required autofocus>
                                                        <option value="">--Chọn--</option>
                                                        <option value="0">Từ chối</option>
                                                        <option value="1">Cho phép</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group invalid">
                                            <label for="tags" class="form-label">Tags bài viết</label>
                                            <input type="text" class="form-control" name="tags" id="tags" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noidung" class="form-label">Nội dung</label>
                                    <textarea class="form-control" name="noidung" id="noidung" cols="10" rows="1"></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success">Upload file Excel</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
            </form> 
            <div class="tab-content p-0">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th class="text-center" scope="col">STT</th>
                        <th class="text-center" scope="col">Tên bài</th>
                        <th class="text-center" scope="col">Trạng thái</th>
                        <th class="text-center" scope="col">hình</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 0;
                        @endphp
                        @foreach ($baiviet_canhan as $item)
                        @php 
                        $i++;
                        @endphp
                        <tr>
                        <td class="text-center"><i>{{$i}}</i></td>
                        <td>{{$item->tenbai}}</td>
                        <td class="text-center">
                            @if($item->trangthai==1)
                            <i style="color: red" class="far fa-times-circle fa-lg"></i>
                            @elseif($item->trangthai==0)
                            <i style="color:rgb(8, 253, 0)" class="far fa-check-circle fa-lg"></i>
                            @endif
                        </td>     
                        <td><img src="{{url('public/uploads/baiviet')}}/{{$item->avatar}}" width="100px"></td>         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <hr>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
        <i class="fa fa-video"></i>
        QUẢN LÝ VIDEO CÁ NHÂN ({{Auth::user()->hovaten}})
        </h3>
        <div class="card-tools">
        <button class="btn btn-tool" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="true" aria-controls="collapseExample">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        
        </div>
    </div>
     
    <div class="collapse" id="collapseExample1">
        
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button type="button" class="btn btn-outline-secondary mt-2" data-toggle="modal" data-target="#modal-secondary1" href="#nhap"> <i class="fas fa-plus-circle"></i> Thêm video</button>
            </div>
            <form action="{{ route('home.postvideo') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="modal-secondary1">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                            <h4 class="modal-title">ĐĂNG VIDEO CÁ NHÂN</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-0">
                                <div class="row">

                                    <div class="col-lg-6">
                                    <div class="form-group invalid">
                                        <label for="tenvideo" class="form-label">Tên video</label>
                                        <input type="text" class="form-control" name="tenvideo" id="tenvideo" autocomplete="off" required >
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                    <div class="form-group invalid">
                                        <label for="link" class="form-label">Đường dẫn</label>
                                        <input type="text" class="form-control" name="link" id="link" required >
                                    </div>
                                    </div>

                                    <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="mota" class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="mota" id="mota" cols="10" rows="1"></textarea>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success">Upload file Excel</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form> 
            <div class="tab-content p-0">
                <table id="example11" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th class="text-center" scope="col">STT</th>
                        <th class="text-center" scope="col">Tên video</th>
                        <th class="text-center" scope="col">Trang thái</th>
                        <th class="text-center" scope="col">Video</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i = 0;
                        @endphp
                        @foreach ($video_canhan as $item)
                        @php 
                        $i++;
                        @endphp
                        <tr>
                        <td class="text-center"><i>{{$i}}</i></td>
                        <td class="text-center">{{$item->tenvideo}}</td>
                        <td class="text-center">
                            @if($item->status==0)
                                <i style="color: red" class="far fa-times-circle fa-lg"></i>
                            @elseif($item->status==1)
                                <i style="color:rgb(8, 253, 0)" class="far fa-check-circle fa-lg"></i>
                            @endif
                        </td>
                        <td class="text-center"><iframe width="300" height="169" src="https://www.youtube.com/embed/{{$item->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                 
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
{{-- <div class="pagination justify-content-center">{{$data->appends(request()->all())->links()}}</div> --}}
@endsection
@section('js')
<script>
  $('#tags').tagsinput({
    tagClass: 'label label-warning'
});
</script>
@endsection