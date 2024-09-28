<?php

declare(strict_types=1);

namespace Iuriis\Install;

class Router implements \Iuriis\Framework\Http\RouterInterface
{
    private \Iuriis\Framework\Http\Request $request;

    /**
     * @param \Iuriis\Framework\Http\Request $request
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($this->request->getRequestUrl() === 'install') {
            return \Iuriis\Install\Controller\Index::class;
        }

        return '';
    }
}