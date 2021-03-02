<?php
require ('model/database.php');
require ('model/item_db.php');
require ('model/category_db.php');


$newitem = filter_input(INPUT_POST, "newitem", FILTER_SANITIZE_STRING);
$newdesc = filter_input(INPUT_POST, "newdesc", FILTER_SANITIZE_STRING);
$newcat = filter_input(INPUT_POST, "newcat", FILTER_SANITIZE_STRING);

$category_ID = filter_input(INPUT_POST, 'category_ID', FILTER_VALIDATE_INT);
if (!$category_ID){
    $category_ID = filter_input(INPUT_GET,'category_ID', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET,'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'get_items';
        }
    }
}

$newitem = filter_input(INPUT_POST, "newitem", FILTER_SANITIZE_STRING);
if (!$newitem) {
    $newitem = filter_input(INPUT_GET,"newitem", FILTER_SANITIZE_STRING);
}



$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);


    
switch($action){
    case "get_categories":
        $categories= get_categories();
        include ('view/course_list.php');
        break;
    case "add_category":
        add_cateogry($newcat);
        header("Location: .?action=get_categories");
        break;
    case "add_item":
        if ($category_ID && $newdesc) {
            add_item($category_ID, $newdesc);
            header ("Location: .?category_ID=$category_ID");
            break;

        } else {
            $error = "Invalid Item Data. Check all fields and try again.";
            include ('view/error.php');
            exit();
        }
        break;
    case "delete_category":
        if($category_ID){
            try{
                delete_category($category_ID);
            } catch (PDOException $e) {
                $error = "You cannot delete a category if items exist in the category";
                include ('view/error.php');
                exit();
            }
            header ("Location: .?action=get_categories");
        }
        break;
    case "delete_item":
        if($ItemNum) {
            delete_item($ItemNum);
            header ("Location: .?category_ID=$category_ID");
        } else {
            $error = "Missing or incorrect category ID";
            include ('view/error.php');
        }
        break;   
    default:
        $category_name = get_category_name($category_ID);
        $categories = get_categories();
        $items = get_items_by_category($category_ID);
        include ('view/item_list.php');

}
    
?>