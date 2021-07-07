<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteed3743a82a197b0d59295db544cac90
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteed3743a82a197b0d59295db544cac90::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteed3743a82a197b0d59295db544cac90::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteed3743a82a197b0d59295db544cac90::$classMap;

        }, null, ClassLoader::class);
    }
}