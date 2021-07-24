<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <title>Diceform</title>
</head>
<body>
    <div class="container">
        <?php
    date_default_timezone_set("Asia/Kolkata");
    $time=date("Y-m-d H:i:s");
    if(date("H")>=17&&date("H")<18)
    {
?>
<p>Registration is closed for today's result</p>
<p><b>Please come back after 6.00pm to register yourself for tommorrow</b></p>
<p>Please refresh the page if it is already 6.00pm</p>
<p>Thank you for your interest</p>
<?php

    }
    else
    {   
   
?>
    <form name="diceform" action="txn.php" onsubmit="return validte()" method="post">

    <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="11"   name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
    <input type="hidden" id="CUST_ID" tabindex="1" maxlength="20" size="11"  name="CUST_ID" autocomplete="off"
    value="<?php echo  "CUST" . rand(10000,99999999)?>">
        <label for="name">name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="contact">contact:[format '1234567890']</label><br>
        <input type="tel" id="contact" name="contact"  pattern="[0-9]{10}" required><br>
        <label for="choice">choice:</label><br>
        <input type="number" id="choice" name="choice" min="1" max="6"><br>
        <label for="amount">amount:</label><br>
        <input type="number" id="amount" name="TXN_AMOUNT"  min="5" max="1000"><br>
        <label for="upi">upi id:</label><br>
        <input type="text" id="upi" name="upi"><br>
        <p>For security and privacy reasons we don't ask and store bank details on our server. If you dont have upi id don't worry if u will win we would contact you through your contact numbers for payment</p>
  
        <input id="submit" type="submit" name="submit" value="Submit">

    </form>
    <?php
    }
    ?>
    </div>

    

    <script src="validate.js"></script>
</body>
</html>