@extends('layouts.admin')
@section('main')

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
  <button type="button" class="btn btn-outline-info mt-2" data-toggle="modal" data-target="#modal-secondary" href="#nhap"> <i class="fa fa-upload"></i>Upload file</button>
</div>

    <div class="card" >
    
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" scope="col">STT</th>
              <th class="text-center" scope="col">Tên công việc</th>
              <th class="text-center" scope="col">Người phụ trách</th>
              <th class="text-center" scope="col">Hạn chót</th>
              <th class="text-center" scope="col">Ngày nộp</th>
              <th class="text-center" scope="col">Trạng thái</th>
            </tr>
          </thead>
          <tbody>
            @php 
            $i = 0;
            @endphp
            @foreach ($giaoviec_nv as $item)
            @php 
            $i++;
            @endphp
            <tr>
              <td class="text-center"><i>{{$i}}</i></td>
              <td>{{$item->ten_congviec}}</td>            
              <td>{{$item->nhanvien->hovaten}}</td>            
              <td>{{date("d-m-Y",strtotime($item->hanchot))}}</td>            
              <td>
                @if($item->ngaynop=="")
                Chưa nộp
                @else
                {{date("d-m-Y H:i:s",strtotime($item->ngaynop))}}
                @endif
              </td>          
              <td class="text-center">
                @if($item->trangthai==0)
                <i style="color: red" class="far fa-times-circle fa-lg"></i>
                @elseif($item->trangthai==1)
                  <i style="color:rgb(8, 253, 0)" class="far fa-check-circle fa-lg"></i>
                @endif
              </td>            
          
              </tr>
            @endforeach
          </tbody>
        </table>

        <form action="{{route('nop_file.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal fade" id="modal-secondary">
            <div class="modal-dialog">
              <div class="modal-content bg-secondary">
                <div class="modal-header">
                  <h4 class="modal-title">Nộp file công việc</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                    <label for="congviec_id">Công việc<span class="text-danger font-weight-bold">*</span></label>
                    <select id="congviec_id" class="form-control custom-select @error('congviec_id') is-invalid @enderror" name="congviec_id" required autofocus>
                        <option value="">--Chọn công việc cần nộp--</option>
                        @foreach($nop_file as $value)
                            <option value="{{ $value->id }}">{{ $value->ten_congviec}}</option>
                        @endforeach
                    </select>
                  </div>

                  {{-- <div class="form-group">
                    <label for="file">File cần nộp <span class="text-danger font-weight-bold">*</span></label>
                    <input id="file_uploads" type="file" class="form-control @error('file') is-invalid @enderror" name="file_uploads" value="{{ old('file_uploads') }}" required autocomplete="file_uploads" />
                  </div> --}}
                  <div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fas fa-paperclip"></i> Upload file
                      <input type="file" name="file_uploads">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline-success">Upload file</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </form>

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

@endsection
