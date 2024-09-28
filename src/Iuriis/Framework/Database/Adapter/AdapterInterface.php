<?php

declare(strict_types=1);

namespace Iuriis\Framework\Database\Adapter;

interface AdapterInterface
{
    /**
     * @return mixed
     */
    public function getConnection();
}