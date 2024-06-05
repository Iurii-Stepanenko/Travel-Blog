<?php

declare(strict_types=1);

namespace Iuriis\Cms;

class Router implements \Iuriis\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === '') {
            return \Iuriis\Cms\Controller\Page::class;
        }

        return '';
    }
}