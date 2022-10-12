<?php

use App\Models\gioitinh;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioitinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gioitinh', function (Blueprint $table) {
            $table->id();
            $table->string('gioitinh');
            $table->engine = 'InnoDB';
        });
        gioitinh::create([
			'gioitinh' => 'Nam',
		]);
        gioitinh::create([
			'gioitinh' => 'Nữ',
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gioitinh');
    }
}
