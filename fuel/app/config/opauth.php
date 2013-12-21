<?php
/**
 * Opauth
 * Multi-provider authentication framework for PHP
 * FuelPHP Package by Andreo Vieira <andreoav@gmail.com>
 *
 * @copyright    Copyright © 2012 U-Zyn Chua (http://uzyn.com)
 * @link         http://opauth.org
 * @package      Opauth
 * @license      MIT License
 */

namespace Opauth;

/**
 * Opauth configuration file with advanced options.
 * 
 * Copy this file to fuel/app/config and tweak as you like.
 */
return array(
    /**
     * Path whre Fuel-Opauth is accessed.
     * 
     * Begins and ends with /.
     * eg. if Opauth is reached via http://example.org/auth/, path is '/auth/'.
     * if Opauth is reached via http://auth.example.org/, path is '/'.
     */
    'path' => '/auth/go/',
     //'debug' => true,
    'callback_url'  => '/auth/callback/',

    /**
     * Callback transport, for sending of $auth response.
     * 'session' - Default. Works best unless callback_url is on a different domain than Opauth.
     * 'post'    - Works cross-domain, but relies on availability of client side JavaScript.
     * 'get'     - Works cross-domain, but may be limited or corrupted by browser URL length limit
     *             (eg. IE8/IE9 has 2083-char limit).
     */
    'callback_transport' => 'session',
    'security_salt' => 'Yd{^5DC82(bXwG-Hga^/@%G} 0qj#?^W:`asig`$>Hw0skFz|o_mi7GV! {+8dfR',
    'security_iteration' => 300,
    'security_timeout' => '2 minutes',

    'auto_registration' => true,

    'Strategy' => array(
        // Define strategies and their respective configs here
        'OAuth' => array(
            'client_id' => getenv('FUEL_OPAUTH_CLIENTID'),
            'client_secret' => getenv('FUEL_OPAUTH_CLIENTSECRET'),

	        'redirect_uri' => 'http://lan.staffsvgs.co.uk/auth/go/oauth/oauth2callback',
	        'scope' => 'read',

            'request_token_url' => 'http://staffsvgs.co.uk/api/oauth/authorize?client_id=Th0G46y0b0jNfA43aZ0tejcDhl707770&response_type=code&scope=read',
            'access_token_url' => 'http://staffsvgs.co.uk/api/oauth/token',
	        'api_user_endpoint' => 'http://staffsvgs.co.uk/api/users/me',
        )
    ),
);
