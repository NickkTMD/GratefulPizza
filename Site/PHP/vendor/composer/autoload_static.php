<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc49f1457ab844df844f29e70d9771b2
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sample\\' => 7,
        ),
        'P' => 
        array (
            'PayPalCheckoutSdk\\' => 18,
        ),
        'B' => 
        array (
            'BraintreeHttp\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sample\\' => 
        array (
            0 => __DIR__ . '/..' . '/paypal/paypal-checkout-sdk/samples',
        ),
        'PayPalCheckoutSdk\\' => 
        array (
            0 => __DIR__ . '/..' . '/paypal/paypal-checkout-sdk/lib/PayPalCheckoutSdk',
        ),
        'BraintreeHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/braintree/braintreehttp/lib/BraintreeHttp',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc49f1457ab844df844f29e70d9771b2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc49f1457ab844df844f29e70d9771b2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
