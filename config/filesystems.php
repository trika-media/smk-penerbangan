<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'homepage' => [
            'driver' => 'local',
            'root' => public_path('app/homepage'),
            'url' => env('APP_URL').'/app/homepage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'news' => [
            'driver' => 'local',
            'root' => public_path('app/news'),
            'url' => env('APP_URL').'/app/news',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'biodata' => [
            'driver' => 'local',
            'root' => public_path('app/biodata'),
            'url' => env('APP_URL').'/app/biodata',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'slider' => [
            'driver' => 'local',
            'root' => public_path('app/slider'),
            'url' => env('APP_URL').'/app/slider',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'profile' => [
            'driver' => 'local',
            'root' => public_path('app/profile'),
            'url' => env('APP_URL').'/app/profile',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        'fasilitas' => [
            'driver' => 'local',
            'root' => public_path('app/fasilitas'),
            'url' => env('APP_URL').'/app/fasilitas',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],
        
        'fotonya' => [
            'driver' => 'local',
            'root' => public_path('app/fotonya'),
            'url' => env('APP_URL').'/app/fotonya',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
