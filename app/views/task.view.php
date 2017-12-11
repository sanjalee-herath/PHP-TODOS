<?php require 'partials/header.php'; ?>

<h1>Your Tasks</h1>



<form method="GET" action="/PHPTODOS/add-task">

Title : <input name="name"> </input>
Description : <input name="description"> </input>
User Id : <input name="user_id"> </input>
<button type="submit">ADD</button>


</form>






<?php require 'partials/footer.php'; ?>