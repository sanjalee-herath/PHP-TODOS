<?php require 'partials/header.php';
require 'partials/nav.php'; ?>

<h1>Add Your Tasks</h1>



<form method="GET" action="/PHPTODOS/add-task">

Title : <input name="name"> </input>
Description : <input name="description"> </input>
<button type="submit">ADD</button>


</form>






<?php require 'partials/footer.php'; ?>