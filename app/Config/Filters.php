<?php

namespace Config;

use App\Filters\AuthFilter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\AuthGuard;
use App\Filters\AuthGuardAdmin;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'authGuard'     => AuthGuard::class,
        'authGuardAdmin'=> AuthGuardAdmin::class,
        'authFilter'    => AuthFilter::class,
        // 'filteradmin' => FilterAdmin::class,
        // 'filterpeserta' => FilterPeserta::class,
        // 'filterpembimbing' => FilterPembimbing::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        // 'before' => [
        //     'auth' => ['except' => ['Home', 'Home/*', 'Registrasi', 'Registrasi/*', '', 'Home', 'AuthGoogle']],
        //     'filteradmin' => ['except' => ['Home', 'Home/*', 'Registrasi', 'Registrasi/*', '', 'Home', 'AuthGoogle']],
        //     'filterpembimbing' => ['except' => ['Home', 'Home/*', 'Registrasi', 'Registrasi/*', '', 'Home', 'AuthGoogle']],
        //     'filterpeserta' => ['except' => ['Home', 'Home/*', 'Registrasi', 'Registrasi/*', '', 'Home', 'AuthGoogle']],
        //     'honeypot',
        //     'csrf',
        //     'invalidchars',
        // ],
        // 'after' => [
        //     'filteradmin' => ['except' => ['Home', 'Home/*', 'Admin', 'Admin/*']],
        //     'filterpembimbing' => ['except' => ['Home', 'Home/*', 'Pembimbing', 'Pembimbing/*']],
        //     'filterpeserta' => ['except' => ['Home', 'Home/*', 'Peserta', 'Peserta/*']],
        //     'toolbar',
        //     'honeypot',
        //     'secureheaders',
        // ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
