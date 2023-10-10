<?php
    require_once('../Clases/Menu.php');

    // Instancia de la clase Menu
    $menu = new Menu();

    // Obtener el menú HTML
    $menuHTML = $menu->obtenerMenu();
?>
