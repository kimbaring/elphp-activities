<?php

// Database connection function
function conn_db(){
    try {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=pointofsale', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $ex) {
        echo "Connection Error: ", $ex->getMessage();
    }
}

// Insert a new menu item
function addMenu($menuName, $menuDesc, $price){
    $db = conn_db();
    $sql = "INSERT INTO ref_menu (menu_name, menu_desc, price) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$menuName, $menuDesc, $price]);
    $db = null;
}

// Insert a new menu item
function findMenu($id){
    $db = conn_db();
    $sql = "SELECT * FROM ref_menu WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $menus = $stmt->fetch(PDO::FETCH_ASSOC);
    $db = null;
    return $menus;
}

// Retrieve all menu items
function viewMenus(){
    $db = conn_db();
    $sql = "SELECT * FROM ref_menu ORDER BY id ASC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $menus;
}

// Update a menu item
function updateMenu($menuName, $menuDesc, $price, $id){
    $db = conn_db();
    $sql = "UPDATE ref_menu SET menu_name=?, menu_desc=?, price=? WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$menuName, $menuDesc, $price, $id]);
    $db = null;
}

// Delete a menu item by ID
function deleteMenu($id){
    $db = conn_db();
    $sql = "DELETE FROM ref_menu WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $db = null;
}
