<?php require 'partials/header.php'; ?>
    <h1>Create An Account</h1>

    <form method= "POST" action="/PHPTODOS/signup/">
       username : <input name="name"> </input>
       Password : <input type ="password" name = "password"> </input>
        <button type = "submit">Register</button>
    
    </form>


<?php require 'partials/footer.php'; ?>