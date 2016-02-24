<?php
/**
 * Created by PhpStorm.
 * User: taixu
 * Date: 16/2/24
 * Time: 下午2:34
 */

return [
    // 加密密钥
    'key' => 'Qn9EmFunmlj32nsA',

    // 非常重要
    'client_prex_name' => 'pool',

    // 刷新redis过期时间
    'expire' => 1800,

    'server' => [

        'host' => env('ADMIN_HOST', 'http://www.tx1.com:8067'),

        'getRedisKeyUrl' => env('ADMIN_HOST', 'http://www.tx1.com:8067') . '/sso/getRedisKey',

        'syncSignin' => env('ADMIN_HOST', 'http://www.tx1.com:8067'),

        'signout' => env('ADMIN_HOST', 'http://www.tx1.com:8067') . '/signout',
    ],
];