<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("Please enter the Ticker symbol of the stock you wish to buy!");
        }
        else if (empty($_POST["shares"]))
        {
            apologize("Please enter the number of shares you wish to buy!");
        }       
        else if (preg_match("/^\d+$/", $_POST["shares"]) == FALSE)
        {
            apologize("Please enter a valid number of shares.");
        }
        
        // lookup latest info on stock to sell
        $stock = lookup($_POST["symbol"]);
        // if user didn't enter a valid symbol
        if ($stock == false)
        {
            apologize("Please enter valid ticker symbol!");
        }

        // calculate payment
        $payment = $_POST["shares"] * $stock["price"];
        
        // check user's cash
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // if not enough cash to buy stock, apologize
        if ($payment > $cash)
        {
            apologize("You do not have enough cash to buy this stock.");
        }
        
        // add stock to portfolio
        $update_stock = query("INSERT INTO portfolio (id, symbol, shares) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
        
        // subtract user's cash
        $update_cash = query("UPDATE users SET cash = cash - ? WHERE id = ?", $payment, $_SESSION["id"]); 

        // update history
        $history = query("INSERT INTO history (id, transaction, datetime, symbol, shares, price) VALUES (?, 'BUY', NOW(), ?, ?, ?)", $_SESSION["id"], $stock["symbol"], $_POST["shares"], $stock["price"]);
        
        // redirect to portfolio
        redirect("/");
    } 
    
    // else render buy form
    else
    {
        render("buy_form.php", ["title" => "Buy"]);
    }  
    
?>
