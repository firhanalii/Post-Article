<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc49807950553e8f68d80eb43bebbe7ea
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc49807950553e8f68d80eb43bebbe7ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc49807950553e8f68d80eb43bebbe7ea::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc49807950553e8f68d80eb43bebbe7ea::$classMap;

        }, null, ClassLoader::class);
    }
}
