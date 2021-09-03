<?php

/*
 |--------------------------------------------------------------------------
 | DO NOT EDIT THIS FILE DIRECTLY.
 |--------------------------------------------------------------------------
 | This file reads from your .env configuration file and should not
 | be modified directly.
*/


return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */

    'name' => env('SITE_NAME', 'srs manager'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Result Limit
    |--------------------------------------------------------------------------
    |
    | This value determines the max number of results to return, even if a higher limit
    | is passed in the API request. This is done to prevent server timeouts when
    | custom scripts are requesting 100k assets at a time.
    |
    */

    'max_results' => env('MAX_RESULTS', 500),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', true),
    'warn_debug' => env('WARN_DEBUG', true),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' =>  env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

     'timezone' => 'Asia/Kolkata',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' =>  env('APP_LOCALE', 'en'),

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY','SomeRandomStringSomeRandomString'),
    
    'cipher' =>  env('APP_CIPHER', 'AES-256-CBC'),

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    /*
    |--------------------------------------------------------------------------
    | Logging Max Files
    |--------------------------------------------------------------------------
    |
    | When using the daily log mode, Laravel will only retain 5
    | days of log files by default.
    |
    | To change this, set the APP_LOG_MAX_FILES option in your .env.
    |
    */

    'log_max_files' => env('APP_LOG_MAX_FILES', 5),

    /*
    |--------------------------------------------------------------------------
    | Logging Detail
    |--------------------------------------------------------------------------
    |
    | By default, Laravel writes all log levels to storage. However, in your 
    | production environment, you may wish to configure the minimum severity that 
    | should be logged by editing your APP_LOG_LEVEL env config.
    |
    | Laravel will log all levels greater than or equal to the specified severity.
    | For example, a default log_level of error will log error, critical, alert,
    | and emergency messages.
    |
    | APP_LOG_LEVEL options are:
    | "debug", "info", "notice", "warning", "error", "critical", "alert", "emergency"
    |
    */
    
    'log_level' => env('APP_LOG_LEVEL', 'error'),


    /*
    |--------------------------------------------------------------------------
    | Default Storage path for private uploads
    |--------------------------------------------------------------------------
    | This is the path for any uploaded files that have to be run through the
    | auth system to ensure they are not visible to the public. These should be
    | stored somewhere outside of the web root so that an unauthenticated user
    | cannot access them.
    |
    | For example: license keys, contracts, etc.
    |
    */

    'private_uploads' => storage_path().'/private_uploads',


    /*
   |--------------------------------------------------------------------------
   | ALLOW I-FRAMING
   |--------------------------------------------------------------------------
   |
   | Normal users will never need to edit this. This option lets you run
   | Snipe-IT within an I-Frame, which is normally disabled by default for
   | security reasons, to prevent clickjacking. It should normally be set to false.
   |
   */

    'allow_iframing' => env('ALLOW_IFRAMING', false),


    /*
    |--------------------------------------------------------------------------
    | ENABLE HTTP Strict Transport Security (HSTS)
    |--------------------------------------------------------------------------
    |
    | This is set to default false for backwards compatibilty but should be
    | set to true if the hosting environment allows it.
    |
    | See https://scotthelme.co.uk/hsts-the-missing-link-in-tls/
    |
    */

    'enable_hsts' => env('ENABLE_HSTS', false),

    /*
    |--------------------------------------------------------------------------
    | REFERRER-POLICY
    |--------------------------------------------------------------------------
    |
    | This is an additional security header that browsers use to determine
    | whether they should report back URL referrer information.
    |
    | Read more: https://www.w3.org/TR/referrer-policy/
    |
    */

    'referrer_policy' => env('REFERRER_POLICY', 'same-origin'),

    /*
    |--------------------------------------------------------------------------
    | CSP
    |--------------------------------------------------------------------------
    |
    | Disable the content security policy that restricts what scripts, images
    | and styles can load. (This should be left as false if you don't know
    | what this means.)
    |
    | Read more: https://www.w3.org/TR/CSP/
    | Read more: https://content-security-policy.com
    |
    */

    'enable_csp' => env('ENABLE_CSP', false),




    /*
    |--------------------------------------------------------------------------
    | Demo Mode Lockdown
    |--------------------------------------------------------------------------
    |
    | Normal users will never need to edit this. This option lets you run a
    | version of Snipe-IT with limited functionality to prevent demo abuse.
    |
    */

    'lock_passwords' => env('APP_LOCKED', false),


    /*
    |--------------------------------------------------------------------------
    | Minimum PHP version
    |--------------------------------------------------------------------------
    |
    | Do not change this variable.
    |
    */

    'min_php' => '7.2.5',


    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        Intervention\Image\ImageServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
        Spatie\Backup\BackupServiceProvider::class,
        Fideloper\Proxy\TrustedProxyServiceProvider::class,
        PragmaRX\Google2FALaravel\ServiceProvider::class,
        Laravel\Passport\PassportServiceProvider::class,
        Laravel\Tinker\TinkerServiceProvider::class,
        Unicodeveloper\DumbPassword\DumbPasswordServiceProvider::class,
        Tightenco\Ziggy\ZiggyServiceProvider::class, // Laravel routes in vue
        Eduardokum\LaravelMailAutoEmbed\ServiceProvider::class,
        //Barryvdh\DomPDF\ServiceProvider::class,

        /*
        * Application Service Providers...
        */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\SettingsServiceProvider::class,
        App\Providers\ValidationServiceProvider::class,


        /*
        * Custom service provider
        */
        App\Providers\MacroServiceProvider::class,
        App\Providers\LdapServiceProvider::class,
        App\Providers\SamlServiceProvider::class,
        

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
        'Form'      => Collective\Html\FormFacade::class,
        'Html'      => Collective\Html\HtmlFacade::class,
        'Google2FA' => PragmaRX\Google2FALaravel\Facade::class,
        'Image'     => Intervention\Image\ImageServiceProvider::class,
        'Carbon' => Carbon\Carbon::class,
        //'PDF' => Barryvdh\DomPDF\Facade::class,


    ],

];
