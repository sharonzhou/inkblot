<?php

   // configuration
   require("../includes/config.php"); 		

   // if form was submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("Please select a stock to sell!");
        }     
        
        // lookup latest info on stock to sell
        $stock = lookup($_POST["symbol"]); 

        // if user didn't enter a valid symbol
        if ($stock == false)
        {
            apologize("Please enter a valid ticker symbol!");
        }
        
        // see number of shares held by user
        $shares = query("SELECT shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $stock["symbol"]);
                  
        // calculate revenue of shares, with current price
        $revenue = $stock["price"] * $shares[0]["shares"];
       
        // update revenue
        $update = query("UPDATE users SET cash = cash + ? WHERE id = ?", $revenue, $_SESSION["id"]);
        
        // update history
        $history = query("INSERT INTO history (id, transaction, datetime, symbol, shares, price) VALUES (?, 'SELL', NOW(), ?, ?, ?)", $_SESSION["id"], $stock["symbol"], $shares[0]["shares"], $stock["price"]);

        // delete stock from portfolio
        $delete = query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $stock["symbol"]);
        
        // redirect to portfolio
        redirect("/");
    }
    
    // else render sell form   
    else 
    {
        $symbols = query("SELECT symbol FROM portfolio WHERE id = ?", $_SESSION['id']);   
        render("sell_form.php", ["title" => "Sell", "symbols" => $symbols]);        
    }
?>
