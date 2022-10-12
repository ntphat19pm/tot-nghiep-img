@extends('layouts.admin')
@section('main')
<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">

  <a href="{{route('nhanvien.create')}}" class="btn btn-outline-secondary mt-2"><i class="fas fa-plus-circle"></i> Thêm nhân viên</a>
  
</div>

<div class="card" >
 
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">SĐT</th>
            <th scope="col">Chức vụ</th>
            <th class="text-center" scope="col">Trạng thái</th>
            <th class="text-right" width="15%" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->hovaten}}</td>
            <td>
              @if ($item->gioitinh_id==0)
              <span class="badge bg-navy">{{$item->gioitinh->gioitinh}}</span>
                
            @elseif($item->gioitinh_id==1)
            <span class="badge bg-olive">{{$item->gioitinh->gioitinh}}</span>
            @endif
            </td>
            <td>{{$item->diachi}}</td>
            <td>{{$item->sdt}}</td>
            <td>
              @if ($item->chucvu_id==1)
                <span class="badge bg-danger">{{$item->chucvu->tenchucvu}}</span>
                  
              @elseif($item->chucvu_id==3)
              <span class="badge bg-fuchsia">{{$item->chucvu->tenchucvu}}</span>
              @endif
            </td>
            <td class="text-center">
              @if ($item->trangthai==0)
              <a href="{{ route('nhanvien.unactive',$item->id)}}"><i style="color:rgb(8, 253, 0)" class="far fa-check-circle fa-lg"></i> <a>    
              @elseif($item->trangthai==1)
              <a href="{{ route('nhanvien.active',$item->id)}}"><i style="color: red" class="far fa-times-circle fa-lg"></i></a>
              @endif
            </td>
            <td class="text-right">
              <a href="{{route('nhanvien.reset',$item->id)}}" class="btn btn-sm btn-info">
                <i class="fa fa-reply"></i>            
              </a>
              <a href="{{route('nhanvien.show',$item->id)}}" class="btn btn-sm btn-warning">
                <i class="fas fa-eye"></i>              
              </a>
              <a href="{{route('nhanvien.edit',$item->id)}}" class="btn btn-sm btn-success">
                <i class="fas fa-edit"></i>              
              </a> 
              <a href="{{route('nhanvien.destroy',$item->id)}}" class="btn btn-sm btn-danger btndelete">
                <i class="fas fa-trash"></i>
              </a>

              {{-- <a onclick="return confirm('Bạn có muốn xóa {{$item->hovaten}} ?')" href="{{route('nhanvien.destroy',$item->id)}}" class="btn btn-danger"><i class="align-middle" data-feather="trash"></i>Xóa</a> --}}
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

@endsection

@section('js')
<script>
  $('.btndelete').click(function(ev){
    ev.preventDefault();
    var _href=$(this).attr('href');
    $('form#form-delete').attr('action',_href);
   if(confirm('Bạn có chắc muốn xóa nhân viên này không?')){
      $('form#form-delete').submit();
   }
    
  })
</script>

@endsection
