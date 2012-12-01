<?php

    // configuration
    require("../includes/config.php"); 		
    
    // determine user's cash
    $row_cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);

    // get rows of symbols and their shares number from portfolio table 
    $row_symbol = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);
    
    // for every stock
    for ($i = 0; $i < count($row_symbol); $i++) 
    {
        // lookup latest stock quote
        $stock = lookup($row_symbol[$i]["symbol"]); 
        
        // store values (price, name, and total value) looked up in array
        $row_symbol[$i]["price"] = $stock["price"];
        $row_symbol[$i]["name"] = $stock["name"];
        $row_symbol[$i]["total"] = $row_symbol[$i]["shares"] * $stock["price"];
    }        
    
    // render portfolio, passing in the row of cash and rows of stocks
    render("portfolio.php", ["title" => "Portfolio", "row_cash" => $row_cash, "rows" => $row_symbol]);
    
?>
