<?php
namespace Controller;

use Model\Item;
use Model\ItemManager;

class ItemController extends AbstractController
{
    public function index()
    {
        $itemManager = new ItemManager($this->getPdo());
        $items = $itemManager->selectAll();

        return $this->twig->render('Item/index.html.twig', ['items' => $items]);
    }

    public function show(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $item = $itemManager->selectOneById($id);

        return $this->twig->render('Item/show.html.twig', ['item' => $item]);
    }

    public function edit(int $id): string
    {
        $itemManager = new ItemManager($this->getPdo());
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item->setTitle($_POST['title']);
            $itemManager->update($item);
        }

        return $this->twig->render('Item/edit.html.twig', ['item' => $item]);
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemManager = new ItemManager($this->getPdo());
            $item = new Item();
            $item->setTitle($_POST['title']);
            $id = $itemManager->insert($item);
            header('Location:/item/' . $id);
        }

        return $this->twig->render('Item/add.html.twig');
    }

    public function delete(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $itemManager->delete($id);
        header('Location:/');
    }
}
