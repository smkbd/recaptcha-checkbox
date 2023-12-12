<?php

namespace Smkbd\RecaptchaCheckbox;

use Illuminate\Foundation\Http\FormRequest;
use Smkbd\RecaptchaCheckbox\RecaptchaRule;

class RecaptchaRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'g-recaptcha-response' => ['required', new RecaptchaRule()]
        ];
    }

    public function attributes()
    {
        return [
            'g-recaptcha-response' => trans('recaptcha::form.recaptcha')
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => trans('recaptcha::form.recaptcha_verification_required')
        ];
    }

}
