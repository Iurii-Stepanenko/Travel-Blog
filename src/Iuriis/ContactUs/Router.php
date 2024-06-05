<?php

declare(strict_types=1);

namespace Iuriis\ContactUs;

class Router implements \Iuriis\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === 'contact-us') {
            return \Iuriis\ContactUs\Controller\Form::class;
        }

        return '';
    }
}