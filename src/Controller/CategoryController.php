<?php

namespace Controller;

use Model\Category;
use Model\CategoryManager;

class CategoryController extends AbstractController
{

    public function index()
    {
        $categoryManager = new CategoryManager($this->pdo);
        $categories = $categoryManager->selectAllCategories();
        return $this->twig->render('Category/category.html.twig', ['categories' => $categories]);
    }
    public function show(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneCategory($id);
        return $this->twig->render('Category/showCategory.html.twig', ['category' => $category]);
    }
    public function add()
    {
        if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Item et hydratation avec les données du formulaire
            $category = new Category();
            $category->setTitle($_POST['title']);
            $categoryManager = new CategoryManager($this->pdo);
            // l'objet $item hydraté est simplement envoyé en paramètre de insert()
            $categoryManager->insert($category);
            // si tout se passe bien, redirection
            header('Location: /');
            exit();
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('category/add.html.twig.twig');
    }

}
