<?php

use App\Models\nhanvien;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id();
            $table->string('hovaten');
            $table->foreignId('gioitinh_id')->constrained('gioitinh');
            $table->date('ngaysinh');
            $table->string('diachi');
            $table->string('sdt');
            $table->string('cmnd');
            $table->foreignId('chucvu_id')->constrained('chucvu');
            $table->string('tendangnhap');
            $table->string('password');
            $table->string('email');
            $table->double('trangthai');
            $table->string('token');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        nhanvien::create([
			'hovaten' => 'Nguyễn Tấn Phát',
			'gioitinh_id' => '1',
			'ngaysinh' => '2000-03-16',
			'diachi' => 'Long Xuyên',
			'sdt' => '0917663865',
			'cmnd' => '089200012792',
			'chucvu_id' => '1',
			'tendangnhap' => 'ql_ntphat',
			'password' => '$2y$10$/CCVzUqRDE5fJmgMLIpYWORzCy6r.qn.Kyr.EN8AK..BKsuoVIJtu',
			'email' => 'phatag852@gmail.com',
			'trangthai' => '0',
			'token' => 'w12gGEddyBjq7XwV',
			'created_at' => '2022-09-10',
			'updated_at' => '2022-09-10',
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
