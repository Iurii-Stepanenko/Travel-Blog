<?php

declare(strict_types=1);

namespace Iuriis\Framework\Http;

interface ControllerInterface
{
    /**
     * @return string
     */
    public function execute(): string;
}