<?php
require 'partials/header.php';
require 'partials/nav.php';
 ?>

<h1>Your Tasks</h1>

<ul>
    
    <?php foreach($tasks as $task) : ?>

         <li> 
            <?= $task->id .' : '.  $task->description    ; ?> 
            
            <a href="/PHPTODOS/delete-task?id=<?= $task->id ; ?> ">DELETE</a>
            
        </li>

    <?php endforeach; ?>




</ul>
    

<?php require 'partials/footer.php'; ?>
