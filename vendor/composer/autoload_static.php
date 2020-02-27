<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a1f35c6b186801f337def4f74bd0534
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a1f35c6b186801f337def4f74bd0534::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a1f35c6b186801f337def4f74bd0534::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
