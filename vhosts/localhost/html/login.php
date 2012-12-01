<?php
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            // ensure form is filled
            if (empty($_POST["email"]))
            {
                apologize("Please enter your email address");
            }           
            
            // ensure username is not a duplicate
            $result = query("INSERT INTO users (email) VALUES(?)", $_POST["email"]);
            
            if ($result === FALSE)
            {
                // the INSERT failed, presumably because username already existed
                apologize("You've already registered!");
            }
            
            // successfully registered -- go to password page!
            else
            {
                // find their ID
                $row = query("SELECT LAST_INSERT_ID() AS id");
		        $id = $row[0]["id"];
                
                // remember that user's now logged in by storing ID in session
                $_SESSION["id"] = $id;
                
                // remember user's username
                $_SESSION["email"] = $_POST["email"];
                
                // go to password page
                render("password_form.php", ["title" => "Make Password"]);          
            }           
    }
    else
    {
        // else render form
        render("login_form.php", ["title" => "Email Registration"]);
    }
    
?>
