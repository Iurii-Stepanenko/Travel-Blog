<?php

declare(strict_types=1);

namespace Iuriis\ContactUs\Controller;

class Form implements \Iuriis\Framework\Http\ControllerInterface
{
    /**
     * @return string
     */
    public function execute(): string
    {
        $page = 'contact-us.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}