<form action="sell.php" method="post">
    <fieldset>
        <div class="control-group">
            <select name="symbol">
                <option value=''></option>               
                <? 
                foreach($symbols as $symbol)
                {
                    echo "<option value=" . $symbol["symbol"] . ">" . $symbol["symbol"] . "</option>";
                }
                ?>
                </select>
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Sell!</button>
        </div>
    </fieldset>
</form>
