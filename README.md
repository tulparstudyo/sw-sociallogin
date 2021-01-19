# sw-sociallogin
sw-sociallogin
## Settings
### config/services.php
```
    'google' => [
        'client_id' => '***',
        'client_secret' => '***',
        'redirect' =>  trim(Config('app.url'),'/').'/auth/google/callback',
    ],

    'vkontakte' => [
        'client_id' => '***',
        'client_secret' => '***',
        'redirect' =>  trim(Config('app.url'),'/').'/auth/vk/callback',
    ],
    'facebook' => [
        'client_id' => '***',
        'client_secret' => '***',
        'redirect' =>  trim(Config('app.url'),'/').'/auth/fb/callback',
    ],
```
### routes/web.php
```
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');
Route::get('auth/fb', 'FacebookController@index')->name('fb.auth');
Route::get('auth/fb/callback', 'FacebookController@callback');
Route::get('auth/vk','VkController@index')->name('vk.auth');
Route::get('auth/vk/callback','VkController@callback');
```
### app/Providers/EventServiceProvider.php
```
protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // ... other providers
        'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
    ],
];
```
## Using
```
<?php App\Http\Controllers\SocialLoginBase::button('google')?>
<?php App\Http\Controllers\SocialLoginBase::button('facebook')?>
<?php App\Http\Controllers\SocialLoginBase::button('vkontakte')?>
```
