<?php 
require 'partials/header.php'; ?>

    <h1>Login Form</h1>

    <form method = "POST" action="/PHPTODOS/login/">
    
        username : <input name="username"></input>

        password : <input type="password" name="password"> </input>

        <button type="submit" name="submit">Log-In</button>
    
    </form>

    
    


<p>Don't have account ?</p> <a href="/PHPTODOS/signup">Create an Acoount</a>

<?php require 'partials/footer.php'; ?>