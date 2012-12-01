<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>
    <?php
    // print table, iterating through each row of transactions
    foreach	($rows as $row)	
    {	
        print("<tr>");		
        print("<td>{$row["transaction"]}</td>");	
        print("<td>{$row["datetime"]}</td>");		
        print("<td>{$row["symbol"]}</td>");
        print("<td>{$row["shares"]}</td>");
        print("<td>" . "$" . "{$row["price"]}</td>");			
        print("</tr>");
    }
    ?>

    </tbody>

</table>

<div>
    <a href="index.php">Return to Portfolio</a>
</div>
