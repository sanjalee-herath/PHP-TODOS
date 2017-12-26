<?php
require 'partials/header.php';
 ?>
<h3><a href="/PHPTODOS/logout">LogOut</a></h3>
<h1>My TODOS</h1>



<ul>
    
    <?php foreach($tasks as $task) : ?>

            <li><a href="/PHPTODOS/task?id=<?= $task->id ; ?>"> <?=  $task->name    ;?> </a> </li>
            
    <?php endforeach; ?>

    


</ul>

 <form method="POST" action="/PHPTODOS/task">

    Title : <input name="name"> </input>
    Description : <input name="description"> </input>
    <button type="submit">ADD</button>


</form>   

<?php require 'partials/footer.php'; ?>













<!--<form method ="GET" action="/PHPTODOS/view-tasks">

    User id : <input name="user_id"> </input>

    <button type ="submit">View</button>

</form>-->