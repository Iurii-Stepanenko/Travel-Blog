<?php

declare(strict_types=1);

namespace Iuriis\Framework\View;

class Renderer
{
    /**
     * @var string $contentBlockClass
     */
    private string $contentBlockClass;

    /**
     * @var string $contentBlockTemplate
     */
    private string $contentBlockTemplate;

    /**
     * @var \DI\FactoryInterface $factory
     */
    private \DI\FactoryInterface $factory;

    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(
        \DI\FactoryInterface $factory
    ) {
        $this->factory = $factory;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->contentBlockClass;
    }

    /**
     * @param string $contentBlockClass
     * @param string $template
     * @return $this
     */
    public function setContent(string $contentBlockClass, string $template = ''): Renderer
    {
        $this->contentBlockClass = $contentBlockClass;
        $this->contentBlockTemplate = $template;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentBlockTemplate(): string
    {
        return $this->contentBlockTemplate;
    }

    /**
     * @param string $blockClass
     * @param string $template
     * @return string
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function render(string $blockClass, string $template = ''): string
    {
        /** @var Block $block */
        $block = $this->factory->make($blockClass);

        if ($template) {
            $block->setTemplate($template);
        }

        ob_start();
        require_once $block->getTemplate();
        return (string) ob_get_clean();
    }

    /**
     * @return false|string
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function __toString()
    {
        return $this->render(Block::class, '../src/page.php');
    }
}