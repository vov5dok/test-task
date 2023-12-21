<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit201b3b5c54fe2cf451086a3594f60364
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit201b3b5c54fe2cf451086a3594f60364::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit201b3b5c54fe2cf451086a3594f60364::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit201b3b5c54fe2cf451086a3594f60364::$classMap;

        }, null, ClassLoader::class);
    }
}
