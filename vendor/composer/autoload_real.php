<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita9bf3a03f7c73c0f91545786f30f2707
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInita9bf3a03f7c73c0f91545786f30f2707', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita9bf3a03f7c73c0f91545786f30f2707', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita9bf3a03f7c73c0f91545786f30f2707::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}