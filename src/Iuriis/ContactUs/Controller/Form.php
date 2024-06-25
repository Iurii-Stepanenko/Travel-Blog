<?php

declare(strict_types=1);

namespace Iuriis\ContactUs\Controller;

class Form implements \Iuriis\Framework\Http\ControllerInterface
{
    /**
     * @var \Iuriis\Framework\View\PageResponse $pageResponse
     */
    private \Iuriis\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Iuriis\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Iuriis\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return \Iuriis\Framework\Http\Response\Raw
     */
    public function execute(): \Iuriis\Framework\Http\Response\Raw
    {
        return $this->pageResponse->setBody(
            \Iuriis\Framework\View\Block::class,
            '../src/Iuriis/ContactUs/view/contact-us.php'
        );
    }
}