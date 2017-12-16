<?php require 'partials/header.php'; ?>

    <h1>Login Form</h1>

    <form method = "POST" action="/PHPTODOS/log/">
    
        <input name="userid"></input>

        <input type="password" name="password"> </input>

        <button type="submit">Log-In</button>
    
    </form>
    

<?php require 'partials/footer.php'; ?>