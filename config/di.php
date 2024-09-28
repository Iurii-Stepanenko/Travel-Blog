<?php

declare(strict_types=1);

return [
    \Iuriis\Framework\Database\Adapter\AdapterInterface::class => DI\get(
        \Iuriis\Framework\Database\Adapter\MySQL::class
    ),
    \Iuriis\Framework\Database\Adapter\MySQL::class => DI\autowire()->constructorParameter(
        'connectionParams',
        [
            \Iuriis\Framework\Database\Adapter\MySQL::DB_NAME => 'iuriis_travel_blog',
            \Iuriis\Framework\Database\Adapter\MySQL::DB_USER => 'iuriis_travel_blog_user',
            \Iuriis\Framework\Database\Adapter\MySQL::DB_PASSWORD => '45Ya!$""sT&P*C%RNSEhr',
            \Iuriis\Framework\Database\Adapter\MySQL::DB_HOST => 'mysql',
            \Iuriis\Framework\Database\Adapter\MySQL::DB_PORT => '3306'
        ]
    ),
    \Iuriis\Framework\Http\RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Iuriis\Cms\Router::class),
            \DI\get(\Iuriis\Blog\Router::class),
            \DI\get(\Iuriis\ContactUs\Router::class),
            \DI\get(\Iuriis\Install\Router::class),
        ]
    )
];