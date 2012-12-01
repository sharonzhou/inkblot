<?php
    
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if no symbol entered, tell user
        if (empty($_POST["symbol"]))
        {
            apologize("Please enter a Ticker symbol.");
        }
        
        // lookup symbol    
        $stock = lookup($_POST["symbol"]);
        
        // if user didn't enter a valid symbol
        if ($stock == false)
        {
            apologize("Ticker symbol not found!");
        }
        
        // otherwise display quote
        else
        {
            render("quote_display.php", ["title" => "quote display", "price" => $stock["price"], "name" => $stock["name"], "symbol" => $stock["symbol"]]);
        }
    }
    
    // else render search form
    else
    {
        render("quote_form.php", ["title" => "quote form"]);
    }    
?>
