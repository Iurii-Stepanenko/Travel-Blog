<?php

declare(strict_types=1);

namespace Iuriis\Blog\Controller;
class Post implements \Iuriis\Framework\Http\ControllerInterface
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
     * @return string
     */
    public function execute(): string
    {
        return (string)$this->renderer->setContent(\Iuriis\Blog\Block\Post::class);
    }
}