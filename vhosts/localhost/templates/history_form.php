<table class="table table-striped">

    <thead>
        <tr>
            <th>Date & Time</th>
        </tr>
    </thead>

    <tbody>
    <?php
    // print table
    foreach	($rows as $row)	
    {	
        //print("<a href="storage.php"");
        print("<tr>");			
        print("<td>{$row["datetime"]}</td>");					
        print("</tr>");
        //print("</a>");
    }
    ?>

    </tbody>

</table>

<div>
    <a href="index.php">Return to Portfolio</a>
</div>
