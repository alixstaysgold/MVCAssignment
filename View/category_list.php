<?php include ('view/header.php'); ?>


<?php if($categories) { ?>
    <section id="list" class="list">
        <header class="list__row list__header">
            <h1>Category List</h1>
        </header>
    <?php foreach ($categories as $category) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"> <?php $category['categoryName'] ?>
        </div>
        <div class="list__remove">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_category">
                <input type="hidden" name="category_ID" value="<?php $category['categoryID'] ?>">
                <button class="remove-buttoon">X</button>
            </form>
        </div>
    </div>
    <?php endforeach ?>
</section>


<?php } else {?>
    <p>No Categories Exist Yet</P>

<?php } ?>

<section id="add" class="add">
    <h2> Add Category </h2>
    <form action="." method="post" id="add__form" class="add__form">
    
        <input type="hidden" name="action" value="add_category">
        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="categoryName" maxlength="50" placeholder="Name" autofocus required>
    </div>
    <div class="add_addItem">
        <button class="add-button" >Add</button>
    </div>
    </form>
</section>

<br>

<p><a href=".">View and Add Items</a></p>








<?php include ('view/footer.php'); ?>







<!-- HOT GARBAGE BELOW HERE -->
















<!-- 
<h1>Categories</h1> <?php $query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor(); ?>
            <?php foreach ($results as $result) : ?>
                <option value="<?php echo $result['categoryID']; ?>">
                    <?php echo $result['categoryName']; ?>
                </option>
            <?php endforeach; ?>
       
       <section id="categories">             
       <?php foreach ($results as $result) : ?>              
       <tr>
           <td><?php echo $result['categoryName']; ?></td><br>
       </tr>    
       <form class="delete" action="delete.php" method="POST">
       <input type="hidden" name="id" value="<?php echo $result['categoryID'] ?>">
       <button style="float:right" id ="deletebutton" type="deletebutton">X</button><br><br>
       </form>
       <?php endforeach; ?>
       </section>



<section id="addcat">
<form id ="submitform" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
   <label for="newcat">New Category:</label>
   <input type="text" id="newcat" name="newcat"  required><br>
   <button id="submitbutton" type="submit"> + </button>
</form>
</section>

<hr>

       <p> Click to go back to <a href="index.php"> List </a> -->










<?php include ('footer.php') ?>