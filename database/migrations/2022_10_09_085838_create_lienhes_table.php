<?php

use App\Models\lienhe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLienhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lienhe', function (Blueprint $table) {
            $table->id();
            $table->string('ten_hethong');
            $table->string('email');
            $table->string('diachi');
            $table->string('sdt');
            $table->text('map');
            $table->string('logo');
            $table->text('fanpage');
            $table->text('zalo');
            $table->string('facebook');
            $table->text('mess');
            $table->engine = 'InnoDB';
        });
        lienhe::create([
			'ten_hethong' => 'Nguyễn Tấn Phát',
			'email' => 'ntphat_viettelsolutions@gmail.com',
			'diachi' => '269B, Nguyễn Thái Học, Phường Mỹ Hòa, Thành Phố Long Xuyên, Tỉnh An Giang.',
			'sdt' => '0385111603',
			'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d981.1238932167727!2d105.4268378291792!3d10.382157518684776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a7355d786126b%3A0xfb0fd4b59fd367d6!2sViettel%20An%20Giang!5e0!3m2!1svi!2s!4v1649821001758!5m2!1svi!2s" width="100%" height="410" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
			'logo' => '1646116179-logo.png',
			'fanpage' => '<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="OQFjB90s"></script>
            <div class="fb-page" data-href="https://www.facebook.com/viettelangiang" data-tabs="events" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/viettelangiang" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/viettelangiang">Viettel An Giang</a></blockquote></div>',
			'zalo' => '<div class="zalo-chat-widget" data-oaid="3623842424356090488" data-welcome-message="Shop rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="200"></div>
            <script src="https://sp.zalo.me/plugins/sdk.js"></script>',
			'facebook' => 'https://www.facebook.com/viettelangiang',
			'mess' => 'gdfgdfsgdfg',
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lienhe');
    }
}
