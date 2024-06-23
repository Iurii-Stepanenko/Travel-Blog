<?php

declare(strict_types=1);

namespace Iuriis\Framework\View;

class PageResponse extends \Iuriis\Framework\Http\Response\Html
{
    /**
     * @var \Iuriis\Framework\View\Renderer $renderer
     */
    private \Iuriis\Framework\View\Renderer $renderer;

    /**
     * @param \Iuriis\Framework\View\Renderer $renderer
     */
    public function __construct(
        \Iuriis\Framework\View\Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlockClass
     * @param string $template
     * @return PageResponse
     */
    public function setBody(string $contentBlockClass, string $template = ''): PageResponse
    {
        return parent::setBody((string)$this->renderer->setContent($contentBlockClass, $template));
    }
}