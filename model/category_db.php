<?php


function get_categories(){
    global $db;
    $query = 'SELECT * FROM categories
                ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closecursor();
    return $categories;
}


function get_category_name($category_ID){
    if (!$category_ID){
        return "All Courses";
    }
    global $db;
    $query = 'SELECT * FROM categories
            WHERE categoryID = :category_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_ID', $category_ID);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closecursor();
    $category_name = $category['categoryName'];
    return $category_name;
}

function add_category($newcat){
    global $db;
    $query = "INSERT INTO categories (categoryName)
                VALUES 
                (:newcat)";
    $statement = $db->prepare($query);
    $statement->bindValue(':newcat', $newcat);
    $statement->execute();
    $statement->closeCursor();
}


function delete_category($id){
    global $db;
    $query = 'DELETE FROM categories
    WHERE categoryID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $success = $statement->execute();
    $statement->closeCursor();

}
