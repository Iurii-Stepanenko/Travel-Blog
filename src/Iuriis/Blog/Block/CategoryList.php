<?php

declare(strict_types=1);

namespace Iuriis\Blog\Block;

class CategoryList extends \Iuriis\Framework\View\Block
{
    protected string $template = '../src/Iuriis/Blog/view/category-list.php';

    private \Iuriis\Blog\Model\Category\Repository $categoryRepository;

    /**
     * @param \Iuriis\Blog\Model\Category\Repository $categoryRepository
     */
    public function __construct(
        \Iuriis\Blog\Model\Category\Repository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Iuriis\Blog\Model\Category\Entity[]
     */
    public function getCategories()
    {
        return $this->categoryRepository->getList();
    }
}