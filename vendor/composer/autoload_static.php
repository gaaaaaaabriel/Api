<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8497d33d40e82f5b99e13b2bff56cc71
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Api\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Api',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8497d33d40e82f5b99e13b2bff56cc71::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8497d33d40e82f5b99e13b2bff56cc71::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8497d33d40e82f5b99e13b2bff56cc71::$classMap;

        }, null, ClassLoader::class);
    }
}
