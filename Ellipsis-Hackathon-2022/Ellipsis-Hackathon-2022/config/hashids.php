<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/laravel-hashids
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'salt' => env('HASHID_SECRET'),
            'length' => '6',
        ],

        'alternative' => [
            'salt' => 'your-salt-string',
            'length' => 'your-length-integer',
        ],

        \App\User::class => [
            'salt' => 'user'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\Reminder::class => [
            'salt' => 'reminder'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\Note::class => [
            'salt' => 'note'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\Industry::class => [
            'salt' => 'industry'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\File::class => [
            'salt' => 'file'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\Contact::class => [
            'salt' => 'contact'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\Company::class => [
            'salt' => 'company'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\Checklist::class => [
            'salt' => 'checklist'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\Approver::class => [
            'salt' => 'approver'.env('HASHID_SECRET'),
            'length' => '6',
        ],

        \App\Application::class => [
            'salt' => 'application'.env('HASHID_SECRET'),
            'length' => '6',
        ],


    ],

];
