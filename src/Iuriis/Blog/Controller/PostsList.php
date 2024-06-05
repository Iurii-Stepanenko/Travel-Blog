<?php

declare(strict_types=1);

namespace Iuriis\Blog\Controller;

class PostsList implements \Iuriis\Framework\Http\ControllerInterface
{
    /**
     * @var \Iuriis\Framework\Http\Request $request
     */
    private \Iuriis\Framework\Http\Request $request;

    /**
     * @param \Iuriis\Framework\Http\Request $request
     */
    public function __construct(
        \Iuriis\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function execute(): string
    {
        $data = $this->request->getParameter('posts-list');
        $page = 'posts-list.php';

        ob_start();
        require_once "../src/page.php";

        return ob_get_clean();
    }
}