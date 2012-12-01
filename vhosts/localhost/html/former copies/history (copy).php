<?php
    
    // configuration
    require("../includes/config.php");
    
    // get all values from table history in rows
    $rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]); 
    
    // render history form, passing the values in rows from the table
    render("history_form.php", ["title" => "History", "rows" => $rows]);
    
?>
