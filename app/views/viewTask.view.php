<?php
require 'partials/header.php';
require 'partials/nav.php';
 ?>

<h1>Your Tasks</h1>



<ul>
    
    <?php foreach($tasks as $task) : ?>

            <li><a href="/PHPTODOS/manage-task?id=<?= $task->id ; ?>"> <?= $task->id .' : '.  $task->name    ;?> </a> </li>
        
    <?php endforeach; ?>




</ul>
    

<?php require 'partials/footer.php'; ?>













<!--<form method ="GET" action="/PHPTODOS/view-tasks">

    User id : <input name="user_id"> </input>

    <button type ="submit">View</button>

</form>-->