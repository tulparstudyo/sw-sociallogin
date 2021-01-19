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

    Route::get('/auth/vk','SocialController@index')->name('vk.auth');
    Route::get('auth/vk/callback','SocialController@callback');
```
