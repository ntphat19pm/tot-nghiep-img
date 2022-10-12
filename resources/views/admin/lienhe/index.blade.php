@extends('layouts.admin')
@section('main')
<p><b><h4 class="text-center" style="color:rgb(255, 67, 67)">THÔNG TIN LIÊN HỆ</h4></b></p>
<div class="card" >
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Tên hệ thống</th>
            <th scope="col">Email</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Logo</th>
            <th class="text-right" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{$item->ten_hethong}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->diachi}}</td>
            <td>{{$item->sdt}}</td>
            <td><img src="{{url('public/uploads')}}/{{$item->logo}}" width="30px"></td>
            
            <td class="text-right">
              {{-- <a href="{{route('khuyenmai.show',$item->id)}}" class="btn btn-sm btn-warning">
                <i class="fas fa-eye"></i>              
              </a> --}}
              <a href="{{route('lienhe.edit',$item->id)}}" class="btn btn-sm btn-success">
                <i class="fas fa-edit"></i>              
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
