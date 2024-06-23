<?php

declare(strict_types=1);

namespace Iuriis\Framework\Http;

interface ControllerInterface
{
    /**
     * @return \Iuriis\Framework\Http\Response\Raw
     */
    public function execute(): \Iuriis\Framework\Http\Response\Raw;
}