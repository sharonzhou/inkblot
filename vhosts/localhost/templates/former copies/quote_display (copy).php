<form action="quote.php" method="post">
    
    <fieldset>
    
        A share of <b><?php echo $name; ?></b> (<b><?php echo $symbol; ?></b>) costs $<b><?php echo number_format($price, 2, '.', ''); ?></b>.
    
    </fieldset>
    
</form>

<a href="javascript:history.go(-1);">Back</a>

