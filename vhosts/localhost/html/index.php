<?php

    // configuration
    require("../includes/config.php"); 		
    
    // render portfolio, passing in the row of cash and rows of stocks
    render("portfolio.php", ["title" => "Portfolio"]);
    
?>
