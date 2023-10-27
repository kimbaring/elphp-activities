<?php
if (isset($_POST['submit'])) {
    // Handle form submission
    $menuName = trim($_POST['menuName']);
    $menuDesc = trim($_POST['menuDesc']);
    $price = trim($_POST['price']);

    if (isset($_POST['updateID'])) {
        $id = $_POST['updateID'];
        updateMenu($menuName, $menuDesc, $price, $id);
    } else {
        addMenu($menuName, $menuDesc, $price);
    }
}

$rowToEdit = null;

if (isset($_POST['edit'])) {
    // Handle edit request
    $editId = trim($_POST['edit']);
    $editedMenu = findMenu($editId);
    $rowToEdit = $editedMenu;
}

if (isset($_POST['delete'])) {
    // Handle delete request
    $id = trim($_POST['delete']);
    deleteMenu($id);
}