<?php 
require 'partials/header.php';
require 'partials/nav.php'; ?>

<h1>Delete Your Tasks</h1>


<form  method="GET" action="/PHPTODOS/delete-task">

    Task Id : <input name="id"></input>
    User Id : <input name="user_id"></input>
    <button type = "submit">DELETE</button>
</form>

<ul>

    


</ul>
        

<?php require 'partials/footer.php'; ?>