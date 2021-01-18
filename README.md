# sw-sociallogin
sw-sociallogin
## Settings
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
