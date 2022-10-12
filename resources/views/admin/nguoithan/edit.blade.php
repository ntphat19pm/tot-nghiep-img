@extends('layouts.admin')
@section('main')
<div class="card" >
    <div class="card-body">
        <form action="{{route('nguoithan.update',$data->id)}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf @method('PUT')
              <div class="form-group">
                <a href="{{route('nguoithan.index')}}" class="btn btn-sm btn-danger mb-3">
                    <i class="fas fa-sign-out-alt"> Quay về bảng hình ảnh</i>     
                </a>
    
                <a>
                  <button type="submit" class="btn btn-sm btn-primary float-right mb-3">Lưu</button>
              </a>
              </div>

            <div class="row">

                <div class="col-lg-3">
                  <div class="form-group">
                    <img class="rounded mx-auto d-block mb-2" src="{{url('public/uploads/nguoithan')}}/{{$data->avatar}}" id="image"  width="250px"/>
                    <input id="file_uploads" type="file" class="form-control @error('file_uploads') is-invalid @enderror" name="file_uploads" value="{{ $data->avatar }}" autocomplete="avatar" onchange="chooseFile(this)" />
                  </div>
                </div>
    
                <div class="col-lg-9">
                  
                  <div class="form-group invalid">
                    <label for="tenhinh" class="form-label">Tên hình</label>
                    <input type="text" value="{{$data->tenhinh}}" class="form-control" name="tenhinh" id="tenhinh" required >
                  </div>
                  
                  <div class="form-group invalid">
                      <label for="mota" class="form-label">Mô tả</label>
                      <textarea type="text" class="form-control" name="mota" id="mota" required >{{$data->mota}}</textarea>
                  </div>
                </div>
                  
            </div>            
          </form>
    </div>
</div>

@endsection

@section('js')
<script>
  $('#tags').tagsinput({
    tagClass: 'label label-warning'
});
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