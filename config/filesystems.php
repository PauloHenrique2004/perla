<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'storage_produtos' => [
            'driver' => 'local',
            'root' => storage_path('storage_produtos'),
            'url' => env('APP_URL'),
            'visibility' => 'public',
        ],

        'storage_topo_banners' => [
            'driver' => 'local',
            'root' => storage_path('storage_topo_banners'),
            'url' => env('APP_URL'),
            'visibility' => 'public',
        ],

        'storage_depoimentos' => [
            'driver' => 'local',
            'root' => storage_path('storage_depoimentos'),
            'url' => env('APP_URL'),
            'visibility' => 'public',
        ],


        'storage_slides' => [
            'driver' => 'local',
            'root' => storage_path('storage_slides'),
            'url' => env('APP_URL'),
            'visibility' => 'public',
        ],

        'storage_paginas' => [
            'driver' => 'local',
            'root' => storage_path('storage_paginas'),
            'url' => env('APP_URL'),
            'visibility' => 'public',
        ],

        'storage_produto_categorias' => [
            'driver' => 'local',
            'root' => storage_path('storage_produto_categorias'),
            'url' => env('APP_URL'),
            'visibility' => 'public',
        ],

        'storage_configuracoes' => [
            'driver' => 'local',
            'root' => storage_path('storage_configuracoes'),
            'url' => env('APP_URL'),
            'visibility' => 'public',
        ],



        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

//    'links' => [
//
//        public_path('storage_produtos') => storage_path('app/storage_produtos'),
//        public_path('storage_paginas') => storage_path('app/storage_paginas'),
//        public_path('storage_produto_categorias') => storage_path('app/storage_produto_categorias'),
//        public_path('storage_slides') => storage_path('app/storage_slides'),
//        public_path('livewire-tmp') => storage_path('app/livewire-tmp'),
//        public_path('storage_configuracoes') => storage_path('app/storage_configuracoes'),
//    ],


    'links' => [
        public_path('storage_produtos') => storage_path('app/storage_produtos'),
        public_path('storage_configuracoes') => storage_path('app/storage_configuracoes'),
        public_path('storage_paginas') => storage_path('app/storage_paginas'),
        public_path('storage_produto_categorias') => storage_path('app/storage_produto_categorias'),
        public_path('storage_slides') => storage_path('app/storage_slides'),
        public_path('livewire-tmp') => storage_path('app/livewire-tmp'),
        public_path('storage_topo_banners') => storage_path('app/storage_topo_banners'),
        public_path('storage_depoimentos') => storage_path('app/storage_depoimentos')
    ],

];
