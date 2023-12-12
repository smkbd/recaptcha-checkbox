# Google reCAPTCHA v2 Checkbox
This package allows you implement Google reCAPTCHA v2 Checkbox
in any form without any hassle.



## Version Support
| Laravel Version | Support     |
|-----------------|-------------| 
| Laravel 10      | ✔️          |
| Laravel 9       | Not tested  |
| Laravel 8       | Not tested  |
| Laravel 7       | Not tested  |
| Laravel 6       | Not tested  |

## Installation
    composer require smkbd/recaptcha-checkbox


## Configuration
Add the following environment values in your `.env` file
    
    RECAPTCHA_SITE_KEY=recaptcha_site_key_here
    RECAPTCHA_SECRET_KEY=recaptcha_secret_key_here

You can obtain these keys from [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin)

## Usage
To enable reCAPTCHA in a form, you need to make two changes, 
one in the `<form>` and one in the controller method which
accepts the form request.

### Form
Include the blade directive `@recaptcha` where you want the checkbox to appear.

### Controller
In the controller, all you need is to use `\Smkbd\RecaptchaCheckbox\RecaptchaRequest $request` 
instead of `\Illuminate\Http\Client\Request $request` as the
method argument.

For example, in `routes/web.php`


    Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

In `app/Http/Controllers/CommentController.php`

    
    use Smkbd\RecaptchaCheckbox\RecaptchaRequest;
    
    class CommentController extends Controller{
        ...

        public function store(RecaptchaRequest $request){
            
            // Your logic here
        
        }

        ...
    }

You can appply your own validation inside the controller as
you usually do. But `RecaptchaRequest` will first validate
the request if it comes with a valid captcha fulfillment.

## Translation
To translate the messages for captcha, you need to publish 
the vendor files first.

    php artisan vendor:publish --tag=recaptcha

This will publish the translation files in `resources/lang/vendor/recaptcha` directory.
