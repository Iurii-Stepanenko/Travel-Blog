<?php

declare(strict_types=1);

namespace Iuriis\Cms\Controller;

class Page implements \Iuriis\Framework\Http\ControllerInterface
{
    /**
     * @var \Iuriis\Framework\Http\Request $request
     */
    private \Iuriis\Framework\Http\Request $request;

    /**
     * @var \Iuriis\Framework\View\PageResponse $pageResponse
     */
    private \Iuriis\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Iuriis\Framework\Http\Request $request
     * @param \Iuriis\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request,
        \Iuriis\Framework\View\PageResponse $pageResponse
    ) {
        $this->request = $request;
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return \Iuriis\Framework\Http\Response\Raw
     */
    public function execute(): \Iuriis\Framework\Http\Response\Raw
    {
        return $this->pageResponse->setBody(
            \Iuriis\Framework\View\Block::class,
            '../src/Iuriis/Cms/view/' . $this->request->getParameter('page') . '.php'
        );
    }
}