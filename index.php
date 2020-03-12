<?php
require 'vendor/autoload.php';

use BugApp\Controllers\bugController;
//require 'Controllers/bugController.php';

$controller = new BugController();

$url = explode("/", $_SERVER["REQUEST_URI"]);
/*
echo '<pre>';
var_dump($url);
echo '</pre>';
 */
switch ($url[4]) {
    case "":
        header("Location: list");
        break;
    case "list":
        return $controller->list();
        break;
    case "show":
        $id = $url[5];
        return $controller->Show($id);
        break;
    case "add":
        return $controller->add();
        break;
    case "update" or "edit":
        $id = $url[5];
        $controller->update($id);
        break;
    default:
        http_response_code(404);
        echo 'Page non trouvé !';
}
?>