<div>
    <ul class="nav nav-pills">
        <li><a href="quote.php">Get Quote</a></li>
        <li><a href="buy.php">Buy Shares</a></li>
        <li><a href="sell.php">Sell Shares</a></li>
        <li><a href="history.php">History</a></li>
        <li><a href="change.php">Change Password</a></li>
        <li><a href="logout.php"><strong>Log Out</strong></a></li>
    </ul>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>

    <tbody>   
    <?php
    // print table, iterating through the rows
    foreach	($rows as $row)	
    {	
        print("<tr>");		
        print("<td>{$row["symbol"]}</td>");	
        print("<td>{$row["name"]}</td>");		
        print("<td>{$row["shares"]}</td>");       
        $row["shares"] = number_format($row["shares"], 2, '.', '');
        print("<td>" . "$" . "{$row["price"]}</td>");
        $row["total"] = number_format($row["total"], 2, '.', '');
        print("<td>" . "$" . "{$row["total"]}</td>");	
        print("</tr>");
    }
    ?>

    <tr>
        <td colspan="4">Cash Balance</td>
        <?php 
        
        // make row for user's cash
        print("<td>" . "$" . "{$row_cash[0]["cash"]}</td>"); 
        
        ?>	
    </tr>
    </tbody>

</table>

    <div>
        <a href="logout.php">Log Out</a>
    </div>
</div>
