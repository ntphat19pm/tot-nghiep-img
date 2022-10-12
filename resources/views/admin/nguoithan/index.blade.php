@extends('layouts.admin')
@section('main')
<p><b><h4 class="text-center" style="color:rgb(255, 67, 67)">QUẢN LÝ HÌNH ẢNH NGƯỜI THÂN</h4></b></p>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">

        <button type="button" class="btn btn-outline-secondary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-plus-circle"></i>
            Thêm hình ảnh
        </button>
    
        <form action="{{route('nguoithan.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
          @csrf
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">THÊM HÌNH ẢNH BẠN BÈ</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                  <div class="form-group invalid">
                    <label for="tenhinh" class="form-label">Tên hình</label>
                    <input type="text" class="form-control" name="tenhinh" id="tenhinh" autocomplete="off" required >
                  </div>
                  <div class="form-group">
                    <label for="avatar">Hình ảnh <span class="text-danger font-weight-bold">*</span></label>
                    <img src="" alt="" id="image" width="200px">
                    <input id="file_uploads" type="file" class="form-control @error('avatar') is-invalid @enderror" name="file_uploads" value="{{ old('file_uploads') }}" required autocomplete="file_uploads" onchange="chooseFile(this)"/>
                  </div>
                  <div class="form-group invalid mt-3">
                    <label for="mota" class="form-label">Mô tả chi tiết</label>
                    <textarea class="form-control" name="mota" id="mota" cols="10" rows="5"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger">Thêm hình ảnh bạn bè</button>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>

    @foreach ($data as $item)
    <div class="modal fade" id="xemanh{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-body">
                <img src="{{url('public/uploads/nguoithan')}}/{{$item->avatar}}" width="100%">
            </div>
          </div>
        </div>
    </div>
    @endforeach
    <div class="card" >
    
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" scope="col">STT</th>
              <th class="text-center" scope="col">Tên hình ảnh</th>
              <th class="text-center" scope="col">Hình ảnh</th>
              <th class="text-center" scope="col">Mô tả</th>
              <th class="text-right" width="12%" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php 
            $i = 0;
            @endphp
            @foreach ($data as $item)
            @php 
            $i++;
            @endphp
            <tr>
              <td class="text-center"><i>{{$i}}</i></td>
              <td>{{$item->tenhinh}}</td>            
              <td >
                <img src="{{url('public/uploads/nguoithan')}}/{{$item->avatar}}" height="100px">
              </td>                 
              <td>{!!$item->mota!!}</td>                              
              <td class="text-right">
                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#xemanh{{$item->id}}">
                    <i class="fas fa-eye"></i> 
                </button>
                {{-- <a href="{{route('banbe.show',$item->id)}}" class="btn btn-sm btn-warning">
                  <i class="fas fa-eye"></i>              
                </a> --}}
                <a href="{{route('nguoithan.edit',$item->id)}}" class="btn btn-sm btn-success">
                  <i class="fas fa-edit"></i>              
                </a> 
                <a  href="{{route('nguoithan.destroy',$item->id)}}" class="btn btn-sm btn-danger btndelete">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
          
              </tr>
            @endforeach
          </tbody>
        </table>
        <form method="POST" action="" id="form-delete">
          @csrf @method('DELETE')
        <form>
      </div>
    </div>
    <hr>
{{-- <div class="pagination justify-content-center">{{$data->appends(request()->all())->links()}}</div> --}}
@endsection
@section('js')
<script>
  $('.btndelete').click(function(ev){
    ev.preventDefault();
    var _href=$(this).attr('href');
    $('form#form-delete').attr('action',_href);
   if(confirm('bạn có chắc muốn xóa nó không?')){
      $('form#form-delete').submit();
   }
    
  })
</script>

<script>
    function chooseFile(fileInput){
        if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
  </script>
@endsection
