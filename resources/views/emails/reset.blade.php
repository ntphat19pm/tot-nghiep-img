<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ứng tuyển thành công - {{ config('app.name', 'ViettelSolutions') }}</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            @foreach ($lienhe as $item)
                Đây là email khôi phục mật khẩu {{$item->ten_hethong}}
                <hr>
            @endforeach            
          </a>
        </div>
    </nav>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    Xin chào {{$reset['hoten']}}!
                    <br>Bạn đã yêu cầu Admin hỗ trợ khôi phục mật khẩu
                    <br>Vui lòng anh/chị
                    <p>- Truy cập vào trang: http://viettel.solutions.com/admin</p>
                    <p>- Tên đăng nhập: {{$reset['tendangnhap']}}</p>
                    <p>- Mật khẩu: {{$reset['matkhau']}}</p>
                    <p>Lưu ý: <b>Sau khi đăng nhập. Anh/chị vui lòng đổi mật khẩu.</b></p>
                    <p>Xin lỗi anh/chị vì sự bất tiện này. Chúc anh/chị một ngày làm việc đầy năng lượng.</p>

                </div>
            </div>
        </div>
        <div class="card-footer">
            <small class="text-muted">
                <p>Trân trọng./.</p>
                   QUẢN TRỊ VIÊN {{$item->ten_hethong}}
            </small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>