<?php
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            if (empty($_POST["password"]))
            {
                apologize("Please enter a password!");
            }    
            
            // ensure password and confirmation are the same
            else if ($_POST["password"] != $_POST["confirmation"])
            {
                apologize("The passwords you entered don't match!");
            }
            
            // ensure username is not a duplicate
            $result = query("INSERT INTO users (hash) VALUES (?)", crypt($_POST["password"]));
                        
            // redirect to portfolio
            redirect("/");                       
    }
    else
    {
        // else render form
        render("password_form.php", ["title" => "Register"]);
    }
    
?>
