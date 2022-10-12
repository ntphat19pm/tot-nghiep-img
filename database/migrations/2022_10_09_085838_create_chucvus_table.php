<?php

use App\Models\chucvu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChucvusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chucvu', function (Blueprint $table) {
            $table->id();
            $table->string('tenchucvu');
            $table->engine = 'InnoDB';
        });
        chucvu::create([
			'tenchucvu' => 'Quản lý',
		]);
        chucvu::create([
			'tenchucvu' => 'Nhân viên',
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chucvu');
    }
}
