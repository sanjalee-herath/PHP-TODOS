<?php
require 'partials/header.php';
require 'partials/nav.php';
 ?>

<h1>Your Tasks</h1>



<ul>
    
    <?php foreach($tasks as $task) : ?>

			<li><?= $task->id .' : '. $task->name . ' : ' . $task->description . ' : ' . $task->user_id ; ?> </li>

    <?php endforeach; ?>




</ul>
    

<?php require 'partials/footer.php'; ?>













<!--<form method ="GET" action="/PHPTODOS/view-tasks">

    User id : <input name="user_id"> </input>

    <button type ="submit">View</button>

</form>-->