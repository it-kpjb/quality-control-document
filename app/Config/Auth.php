<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use Myth\Auth\Config\Auth as AuthConfig;

class Auth extends AuthConfig
{
    /**
     * --------------------------------------------------------------------
     * Require Confirmation Registration via Email
     * --------------------------------------------------------------------
     *
     * When enabled, every registered user will receive an email message
     * with an activation link to confirm the account.
     *
     * @var string|null Name of the ActivatorInterface class
     */


    public $requireActivation = null;
    public $personalFields = ['fullname'];
    public $defaultUserGroup = 'enguser';
    public $viewLayout = '\App\Views\Auth\layout';

    public $views = [
        // 'login'         => 'Myth\Auth\Views\login',
        'login'        => '\App\Views\Auth\login',
        // 'register'       => 'Myth\Auth\Views\register',
        'register'      => '\App\Views\Auth\register',
        // 'forgot'       => 'Myth\Auth\Views\forgot',
        'forgot'          => '\App\Views\Auth\forgot',
        'reset'        => 'Myth\Auth\Views\reset',
        'emailForgot'    => 'Myth\Auth\Views\emails\forgot',
        'emailActivation' => 'Myth\Auth\Views\emails\activation',
    ];
}
