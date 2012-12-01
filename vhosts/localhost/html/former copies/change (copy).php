<?php
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if no current password entered, tell user
        if (empty($_POST["current"]))
        {
            apologize("Please enter your current password.");
        }
        
        // get current hash 
        $hash = query("SELECT hash FROM users WHERE id = ?", $_SESSION["id"]);
        //$enc = crypt($_POST["password"], $hash[0]["hash"]);
        //dump($enc); 
        
        // if hash of entered password does not match actual hash
        if (crypt($_POST["current"], $hash[0]["hash"]) != $hash[0]["hash"])
        {
            apologize("The current password you entered does not match your ACTUAL current password.");
        }
        
        // if no new password entered, tell user
        if (empty($_POST["new"]))
        {
            apologize("Please enter a new password.");
        }
        
        // if new passwords entered don't match, tell user
        if ($_POST["new"] != $_POST["confirm"])
        {
            apologize("Your new passwords don't match!");
        }
        
        // if new password is the same as user's current password
        if ($_POST["new"] == $_POST["current"])
        {
            apologize("Please set a new password that is different from your previous one.");
        }
        
        // change to new password in users table      
        $update = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["new"]), $_SESSION["id"]);
        
        // render confirmation/congratulations page
        render("change_display.php", ["title" => "Password Changed"]);          
    }
    
    // else render change password form
    else
    {
        render("change_form.php", ["title" => "Change Password"]); 
    }
        
