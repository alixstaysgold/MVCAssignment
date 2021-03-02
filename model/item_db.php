<?php 

function get_items_by_category($category_ID){
    global $db;
    if($category_ID){
    $query = 'SELECT * FROM todolist LEFT JOIN
                categories ON todoitems.categoryID=categories.categoryID
                WHERE todoitems.categoryID = :category_ID
                ORDER BY todoitems.categoryID'; }
    else {
        $query = 'SELECT * FROM todolist LEFT JOIN
                categories ON todoitems.categoryID=categories.categoryID
                ORDER BY categories.categoryID';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':category_ID', $category_ID);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items; }

// function get_item($itemNum){
//     global $db;
//     $query = 'SELECT * FROM todoitems';
//                 $statement = $db->prepare($query);
//                 $statement->execute();
//                 $results = $statement->fetchAll();
//                 $statement->closecursor(); 
//                 return $item; }

function add_item($newitem, $newdesc, $category_ID) {
    global $db;
    $query = "INSERT INTO todoitems
                (Title, Description, categoryID)
            VALUES 
                (:newitem, :newdesc, :category_ID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':newitem', $newitem);
    $statement->bindValue(':newdesc', $newdesc);
    $statement->bindValue(':category_ID', $category_ID);
    $statement->execute();
    $statement->closeCursor();
    return $count;
}
    

function delete_item($id){
    global $db;
    $query = 'DELETE FROM todoitems
    WHERE ItemNum = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->closeCursor();

}