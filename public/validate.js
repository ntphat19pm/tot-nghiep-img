
function getValue(id){
    return document.getElementById(id).value.trim();
}

function showError(key, mess)
{
    document.getElementById(key+'_error').innerHTML=mess;
}

function validate(){
    var flag=true;
    var hovaten = getValue('hovaten');
    if(hovaten==''){
        flag=false;
        showError('hovaten','Họ và tên không được bỏ trống');
    }else{
        flag=false;
        showError('hovaten','');
    }

    var password = getValue('password');
    var repassword = getValue('repassword');

    if(password==''){
        flag=false;
        showError('password','Mật khẩu không dc bỏ trống');
    }
    else if (password.length <8 ){
        flag=false;
        showError('password','Mật khẩu phải 8 ký tự trở lên');
    }
    else if (repassword==''){
        flag=false;
        showError('password','');
        showError('repassword','Nhập lại mật khẩu không bỏ trống');
    }
    else if (password != repassword){
        flag=false;
        showError('repassword','Nhập lại mật khẩu không khớp');
    }else{
        flag=false;
        showError('repassword','');
    }

    var sdt = getValue('sdt');
    if(sdt=='' || !/^[0-9]{10}$/.test(sdt)){
        flag=false;
        showError('sdt','Số điện thoại không đúng');
    }else{
        flag=false;
        showError('sdt','');
    }

    var cmnd = getValue('cmnd');
    if(cmnd=='' || !/^[0-9]{9}$/.test(cmnd)){
        flag=false;
        showError('cmnd','Vui lòng kiểm tra số CMND');
    }else{
        flag=false;
        showError('cmnd','');
    }

    var email = getValue('email');
    var mailformat=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!mailformat.test(email)){
        flag=false;
        showError('email','Vui lòng kiểm tra mail');
    }
    else{
        flag=false;
        showError('email','');
    }

    var diachi = getValue('diachi');
    var gioitinh = getValue('gioitinh');
    var tendangnhap = getValue('tendangnhap');
    var ngaysinh = getValue('ngaysinh');

    if(tendangnhap==''){
        flag=false;
        showError('tendangnhap','Vui lòng điền tên đăng nhập');
    }
    else{
        flag=false;
        showError('tendangnhap','');
    }
    if(diachi==''){
        flag=false;
        showError('diachi','Vui lòng điền địa chỉ');
    }
    else{
        flag=false;
        showError('diachi','');
    }
    if(ngaysinh==''){
        flag=false;
        showError('ngaysinh','Vui lòng chọn ngày sinh');
    }
    else{
        flag=false;
        showError('ngaysinh','');
    }
    if(gioitinh==''){
        flag=false;
        showError('gioitinh','Vui lòng chọn giới tính');
    }
    else{
        flag=false;
        showError('gioitinh','');
    }
    

    return flag;
}