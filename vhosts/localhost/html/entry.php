<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["entry"]))
        {
            apologize("You didn't write anything!");
        }
                
        // save entry and date & time into user's history
        $history = query("INSERT INTO history (id, datetime, entry) VALUES (?, NOW(), ?)", $_SESSION["id"], $_POST["entry"]);
        
        // redirect to portfolio
        redirect("/");
    } 
    
    // else render buy form
    else
    {
        render("entry_form.php", ["title" => "Entry"]);
    }  
    
?>
