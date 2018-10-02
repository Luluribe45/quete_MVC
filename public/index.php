<?php

// chargement de l'autoload en début de fichier
require __DIR__ . '/../vendor/autoload.php';

use Controller\ItemController;
$control = new ItemController();
$control->Index();

//require __DIR__ . '/../src/Controller/ItemController.php';

