<?php
namespace Controller;

// src/Controller/ItemController.php
use Model\ItemManager;

class ItemController
{

    public function Index(){
        $itemManager = new ItemManager();
        $items = $itemManager->selectAllItems();
        require __DIR__ . '/../View/item.php';
    }

}