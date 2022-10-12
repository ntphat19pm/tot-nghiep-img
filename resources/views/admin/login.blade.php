
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Đăng nhập Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{url('public/spica')}}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{url('public/spica')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('public/spica')}}/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('public/spica')}}/images/favicon.png" />
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

  <script>
    function SHPassword(x)
    {
      var chbox=x.checked;
      if(chbox)
      {
        document.getElementById("password").type="text";
      }
      else{
        document.getElementById("password").type="password";
      }
      
    }
  </script>

</head>

<body>
  <form action="{{route('nhanvien.quenmatkhau')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Khôi phục tài khoản bằng email</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Để giữ an toàn cho tài khoản của bạn, Viettel Solutions muốn đảm bảo rằng bạn chính là người đang cố đăng nhập.</p>
            <hr>
            <h4 class="text-center"><b>Nhận mã xác minh</b></h4>
            <p> Để nhận mã xác minh, trước tiên hãy xác nhận địa chỉ email khôi phục bạn đã thêm vào tài khoản của mình.</p>
            <div class="form-group invalid">
              <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email khôi phục mật khẩu" autocomplete="off" required >
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Gửi</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                
                <a href="{{route('home.index')}}">
                  @foreach ($lienhe as $item)
                  <img src="{{url('public/uploads')}}/{{$item->logo}}" alt="logo" width="80px">
                  @endforeach
                </a>
              </div>
              <h4>Xin chào!</h4>
              <h6 class="font-weight-light">Chúng tôi rất hân hạnh được phục vụ bạn!</h6>
              <form class="pt-3 needs-validation" action="{{route('post.dangnhap')}}" method="post" novalidate>
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="tendangnhap" placeholder="Username" id="validationTooltip03" required>
                    <div class="invalid-tooltip">
                    Bạn chưa điền tên đăng nhập.
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input id="password" type="password" class="form-control form-control-lg border-left-0" name="password" placeholder="Password" id="validationTooltip03" required>                        
                    <div class="invalid-tooltip">
                    Bạn chưa điền mật khẩu.
                    </div>
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" onchange="SHPassword(this)">
                      Hiện mật khẩu
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">Forgot password?</a>
                </div>

                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <br/>
                @if($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" style="display:block">
                  <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                </span>
                @endif
                
                <div class="my-3">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                {{-- <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
                </div> --}}
                {{-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                </div> --}}

                

              </form>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center justify-content-center" style="background-color: rgb(54, 124, 124)">
              <img src="{{url('public/uploads')}}/comp.png" class="img-fluid animated d-block rounded mx-auto mt-3" style="width:650px; height:650px" alt="">  
          </div>
          {{-- <p class="font-weight-medium text-center flex-grow align-self-end" style="color: rgb(102, 0, 102)">Copyright &copy; Nguyễn Tấn Phát  All rights reserved.</p> --}}
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{url('public/spica')}}/vendors/js/vendor.bundle.base.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{url('public/spica')}}/js/off-canvas.js"></script>
  <script src="{{url('public/spica')}}/js/hoverable-collapse.js"></script>
  <script src="{{url('public/spica')}}/js/template.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- endinject -->
<script>
  (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
  {!! Toastr::message() !!}
</body>

</html>
