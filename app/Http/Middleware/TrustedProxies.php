<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustedProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array
     */
    // protected $proxies;
    protected $proxies = '*';

    /**
     * The current proxy header mappings.
     *
     * @var array
     */
    protected $headers = [
        Request::HEADER_FORWARDED => 'FORWARDED',
        Request::HEADER_X_FORWARDED_FOR => 'X_FORWARDED_FOR',
        Request::HEADER_X_FORWARDED_HOST => 'X_FORWARDED_HOST',
        Request::HEADER_X_FORWARDED_PORT => 'X_FORWARDED_PORT',
        Request::HEADER_X_FORWARDED_PROTO => 'X_FORWARDED_PROTO',
        Request::HEADER_X_FORWARDED_ALL => 'X_FORWARDED_ALL',
        Request:: HEADER_X_FORWARDED_AWS_ELB =>'X_FORWARDED_AWS_ELB',  //support for heruko and AWS platforms
    ];

    // protected $headers = Request::HEADER_X_FORWARDED_ALL;

}
