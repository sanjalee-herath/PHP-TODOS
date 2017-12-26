<?php
require 'partials/header.php';
require 'partials/nav.php';
?>



<ul>
    
    <?php foreach($tasks as $task) : ?>

        <h1><?= $task->name ; ?></h1>

         <li> 
            <?= $task->description    ; ?> <br><br>
            
            <a href="/PHPTODOS/update">Edit</a>
            <a href="/PHPTODOS/delete/task?id=<?= $task->id ; ?> ">Delete</a>
            
            <?php $_SESSION['taskid'] = $task->id ; ?>
            
        </li>

    <?php endforeach; ?>




</ul>
    

<?php require 'partials/footer.php'; ?>
