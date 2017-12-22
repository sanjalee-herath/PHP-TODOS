<?php 
session_start();
ob_start();
//session_reset();
require 'partials/header.php'; ?>

    <h1>Login Form</h1>

    <form method = "POST" action="/PHPTODOS/log/">
    
        userid : <input name="userid"></input>

        password : <input type="password" name="password"> </input>

        <button type="submit" name="submit">Log-In</button>
    
    </form>

    
    
    <?php 
    
        

        if(isset($_POST['submit'])){

            $_SESSION['user_id'] = $_POST['userid'];

        
            
            
        }
        
        
    ?>

<p>Don't have account ?</p> <a href="/PHPTODOS">Create an Acoount</a>

<?php require 'partials/footer.php'; ?>