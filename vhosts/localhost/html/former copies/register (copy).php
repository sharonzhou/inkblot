<?php
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            // ensure form is filled
            if (empty($_POST["username"]))
            {
                apologize("Please enter a username");
            }           
            else if (empty($_POST["password"]))
            {
                apologize("Please enter a password!");
            }    
            
            // ensure password and confirmation are the same
            else if ($_POST["password"] != $_POST["confirmation"])
            {
                apologize("The passwords you entered don't match!");
            }
            
            // ensure username is not a duplicate
            $result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
            
            if ($result === FALSE)
            {
                // the INSERT failed, presumably because username already existed
                apologize("Alas, that username has already been taken!");
            }
            
            // successfully registered -- log user in!
            else
            {
                // find their ID
                $row = query("SELECT LAST_INSERT_ID() AS id");
		        $id = $row[0]["id"];
                
                // remember that user's now logged in by storing ID in session
                $_SESSION["id"] = $id;

                // redirect to portfolio
                redirect("/");            
            }           
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
?>
