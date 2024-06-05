<?php

declare(strict_types=1);

return [
    \Iuriis\Framework\Http\RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Iuriis\Cms\Router::class),
            \DI\get(\Iuriis\Blog\Router::class),
            \DI\get(\Iuriis\ContactUs\Router::class),
        ]
    )
];