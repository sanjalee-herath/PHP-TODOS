<?php require 'partials/header.php'; ?>
    <h1>Create An Account</h1>

    <form method= "POST" action="/PHPTODOS/users/">
        <input name="name"> </input>
        <input name = "password"> </input>
        <button type = "submit">Register</button>
    
    </form>


<?php require 'partials/footer.php'; ?>