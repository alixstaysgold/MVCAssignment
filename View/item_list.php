<?php

include ('View/header.php'); ?>


                <section id="list" class="list">
                    <header class ="list__row list__header">
                        <h1>To Do Items</h1>
                        <form action="." method="get" id="list__header__select" class="list__header__select">
                            <input type="hidden" name="action" value="list_items">
                            <select name="category_ID" required>
                                <option value="0"> VIew All</option>
                                <?php foreach ($categories as $category) :?>
                                <?php if( $category_ID == $category['categoryID']) {?>
                                    <option value="<? $category['categoryID'] ?>" selected>
                                <?php } else { ?>
                                    <option value="<? $category['categoryID'] ?>">
                                    <?php } ?>
                                        <?php $category['categoryName'] ?>
                                </option>
                                <?php endforeach; ?>
                                </select>
                                <button class="add-button">Go</button>
                            </form>
                        </header>
                        <?php if($items) { ?>
                            <?php foreach ($items as $item) : ?>
                            <div class="list__row">
                                <div class="list__item">
                                    <p class="bold"><?php $item['categoryName'] ?></p>
                                    <p><?php $item['Description'] ?></p>
                            </div>
                            <div class = "list__removeItem">
                                <form action="." method="post">
                                    <input type="hidden" name="action" value="delete_item">
                                    <input type="hidden" name="itemNum" value="<?php $item['ItemNum'] ?>">
                                    <button class="remove-button"> X </button>
                            </form>
                            </div>
                        </div>  
                                <?php endforeach; ?>
                                <?php } else { ?>
                                    <br>
                                    <?php if ($category_ID) { ?>
                                        <p> No Items</p>
                                    <?php } else { ?>
                                        <p>Nothing To Do..YET</p> 
                                    <?php } ?>
                                    <br>
                                    <?php } ?>
                                    
                </section>       



                <section id="add" class="add">
                        <h2> Add Item</h2>
                        <form action="." method="post" id="add__form" class="add__form">
                            <input type="hidden" name="action" value="add_item">
                            <div class="add_inputs">
                                <label>Category:</label>
                                <select name="category_ID" required>
                                        <option value=""> Please select </option>
                                        <?php foreach($categories as $category) : ?>
                                        <option value="<?php $category['categoryID']; ?>">
                                            <?php $category['categoryName']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                </select>
                                <label>Description:</label>
                                <input type="text" name="newdesc" maxlength="120" placeholder="Description" required>
                            </div>
                            <div class="add__addItem">
                                <button class="add-button">Add</button>
                            </div>  
                        </form>
                </section>      
                <br>


                <p><a href=".?action=category_list">View/Edit Categories</a></p>
        <?php include ('View/footer.php'); ?>
                

                                
           <!--      <?php foreach ($results as $result) : ?>
                
                <tr>
                    <td><?php echo $result['Title']; ?></td><br>
                    <td><?php echo $result['Description']; ?></td><br><br>
                </tr>
                <form class="delete" action="delete.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $result['ItemNum'] ?>">
                <button style="float:right" id ="deletebutton" type="deletebutton">X</button><br><br>
                </form>

                
                <?php endforeach; ?>
                </section>

                <?php if (!$results) {
                echo "Nothing in List";
            }  
            ?>
            <P>Click here for <a href ="categories.php">Categories</a>  </P><br>

            <?php include ('footer.php') ?>

            <section id="addItems">
            
            <h2> Add Items</h2>
        <form id ="submitform" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
            <label for="newitem">New Item:</label>
            <input type="text" id="newitem" name="newitem"  required><br>
            <label for="newdesc">Description:</label>
            <input type="text" id="newdesc" name="newdesc" required>
            <button id="submitbutton" type="submit"> + </button>
            <label>Category:</label>
            <select name="category_ID">
            <?php $query = 'SELECT *
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
            </select><br>
        </form> -->

      

       
   