<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fdd1441df11655e7a852992247553ea
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fdd1441df11655e7a852992247553ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fdd1441df11655e7a852992247553ea::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0fdd1441df11655e7a852992247553ea::$classMap;

        }, null, ClassLoader::class);
    }
}
