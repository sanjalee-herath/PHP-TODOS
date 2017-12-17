<?php 
session_start();
ob_start();
require 'partials/header.php'; ?>

    <h1>Login Form</h1>

    <form method = "POST" action="/PHPTODOS/log/">
    
        <input name="userid"></input>

        <input type="password" name="password"> </input>

        <button type="submit" name="submit">Log-In</button>
    
    </form>
    
    <?php 
    
        

        if(isset($_POST['submit'])){

            $_SESSION['user_id'] = $_POST['userid'];
            
            
        }
        
        
    ?>

<?php require 'partials/footer.php'; ?>