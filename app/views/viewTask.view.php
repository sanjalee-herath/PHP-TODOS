<?php
require 'partials/header.php';
 ?>

<h1>My TODOS</h1>



<ul>
    
    <?php foreach($tasks as $task) : ?>

            <li><a href="/PHPTODOS/manage-task?id=<?= $task->id ; ?>"> <?=  $task->name    ;?> </a> </li>
            
    <?php endforeach; ?>

    


</ul>

 <form method="GET" action="/PHPTODOS/add-task">

    Title : <input name="name"> </input>
    Description : <input name="description"> </input>
    <button type="submit">ADD</button>


</form>   

<?php require 'partials/footer.php'; ?>













<!--<form method ="GET" action="/PHPTODOS/view-tasks">

    User id : <input name="user_id"> </input>

    <button type ="submit">View</button>

</form>-->