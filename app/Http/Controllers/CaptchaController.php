<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;

class CaptchaController extends Controller
{
    public function generateCaptchaImage()
    {
        $captcha['number_one'] = rand(10,99);
        $captcha['number_two'] = rand(10,99);

        $captchaText = $captcha['number_one'] . ' + ' . $captcha['number_two'];

        $image = Image::canvas(80, 40, '#ccc');
        $image->text($captchaText, 40, 20, function ($font) {
            $font->file(public_path('static/fonts/Manrope-Bold.ttf'));
            $font->size(18); // Установите желаемый размер шрифта здесь
            $font->color('#000');
            $font->align('center');
            $font->valign('middle');
        });

        session(['captcha' => $captcha['number_one']+ $captcha['number_two']]);

        return $image->response('png');
    }
}
