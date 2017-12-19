<?php
require 'partials/header.php';
 ?>
    
    <form action="/PHPTODOS/edit-task" method ="POST">

        <?php foreach($tasks as $task): ?>

        <h3><a href="/PHPTODOS/manage-task?id=<?= $task->id ?>">Back</a></h3>

        <input type="text" name="name" value = "<?= $task->name ; ?>"><br>
        <input type="text" name="description" value = "<?= $task->description ; ?>"><br>
        
        <?php endforeach ;?>
        <input type="submit" name="submit" value="Update">

    </form>

    


<?php require 'partials/footer.php'; ?>