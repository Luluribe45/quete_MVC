<?php

namespace Controller;

// src/Controller/CategoryController.php
use Model\CategoryManager;

class CategoryController
{

    /**
     * @param $categoryManager
     */
    public function Index(){
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAllCategories();
        require __DIR__ . '/../View/category.php';
    }

    public function show(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneCategory($id);
        require __DIR__ . '/../View/showCategory.php';
    }
}
