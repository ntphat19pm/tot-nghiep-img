<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;
use Toastr;

class captcha_admin implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET'));
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
        return $response->isSuccess();

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        Toastr::info('Vui lòng check vào Captcha','Captcha');
        return 'Bạn chưa check vào captcha';	//trả về thông báo khi lỗi không xác nhận captcha

    }
}
