<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

$requestDispatcher = new \Iuriis\Framework\Http\RequestDispatcher([
    new \Iuriis\Cms\Router(),
    new \Iuriis\Blog\Router(),
    new \Iuriis\ContactUs\Router()
]);
$requestDispatcher->dispatch();

exit;
