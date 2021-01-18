# sw-sociallogin
sw-sociallogin
## Settings
```
    'google' => [
        'client_id' => '850734490501-4c7fvqt43ppnflfsv9unvmq0ca8a7ei4.apps.googleusercontent.com',
        'client_secret' => 'iK_7yX95L-7y2vWNG6CgJaS1',
        'redirect' =>  trim(Config('app.url'),'/').'/auth/google/callback',
    ],

    'vkontakte' => [
        'client_id' => '7701889',
        'client_secret' => 'JD0KCr7XswyH8a9TGsIj',
        'redirect' =>  trim(Config('app.url'),'/').'/auth/vk/callback',
    ],
	'facebook' => [
        'client_id' => '2879709802273298',
        'client_secret' => 'fc3388e8773f1369bcf5d0965020fe63',
        'redirect' =>  trim(Config('app.url'),'/').'/auth/fb/callback',
    ],

```
