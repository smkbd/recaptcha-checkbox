<?php

namespace Smkbd\RecaptchaCheckbox;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RecaptchaRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!$value) $fail(__('recaptcha::form.recaptcha_verification_required'));

        if(!env('RECAPTCHA_SECRET_KEY')) $fail(__('recaptcha::form.recaptcha_private_key_missing'));

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='. env('RECAPTCHA_SECRET_KEY') . '&response=' . $value;

        $response = file_get_contents($url);
        $response = json_decode($response);

        if (!$response->success) $fail(__('recaptcha::form.recaptcha_verification_failed'));
    }
}
