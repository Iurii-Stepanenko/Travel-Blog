<?php

declare(strict_types=1);

namespace Iuriis\Cms;

class Router implements \Iuriis\Framework\Http\RouterInterface
{
    /**
     * @var \Iuriis\Framework\Http\Request $request
     */
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
//        Add any more CMS pages in array
        $cmsPage = [
            ''
        ];

        if (in_array($requestUrl, $cmsPage)) {
            $this->request->setParameter('page', $requestUrl ?: 'home');

            return \Iuriis\Cms\Controller\Page::class;
        }

        return '';
    }
}