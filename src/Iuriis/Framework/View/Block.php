<?php

declare(strict_types=1);

namespace Iuriis\Framework\View;

class Block
{
    /**
     * @var string $template
     */
    protected string $template = '';

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return $this
     */
    public function setTemplate(string $template): Block
    {
        $this->template = $template;

        return $this;
    }
}