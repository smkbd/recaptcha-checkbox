<?php

namespace Smkbd\RecaptchaCheckbox;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RecaptchaCheckboxServiceProvider extends ServiceProvider
{
    public static $jsLoaded = false;

    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/lang', 'recaptcha');
        $this->publishes([
            __DIR__.'/lang' => $this->app->langPath('vendor/recaptcha'),
        ], 'recaptcha');

        Blade::directive('recaptcha', function () {

            $html = '';
            if(!self::$jsLoaded) $html .= '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
            $html .= '<div class="g-recaptcha" data-sitekey="' . env('RECAPTCHA_SITE_KEY')  . '"></div>';

            self::$jsLoaded = true;
            return $html;
        });
    }
}
