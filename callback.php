<?php

require_once("PaytmChecksum.php");


$paytmParams = array();


$paytmParams["body"] = array(
     "mid" => "",
    "orderId" => $_GET['orderid'],
);


$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "");


$paytmParams["head"] = array(

    "signature"	=> $checksum
);


$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);


 $url = "https://securegw.paytm.in/v3/order/status";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
$response = curl_exec($ch);
$decod=json_decode($response, true);


$timestamp=$decod['head']['responseTimestamp'];
$version=$decod['head']['version'];
$signature=$decod['head']['signature'];
$status=$decod['body']['resultInfo']['resultStatus'];
$code=$decod['body']['resultInfo']['resultCode'];
$msg=$decod['body']['resultInfo']['resultMsg'];
$txnid=$decod['body']['txnId'];
$txndate=$decod['body']['txnDate'];
$refundamt=$decod['body']['refundAmt'];
$paymode=$decod['body']['paymentMode'];
$mid=$decod['body']['mid'];
$bankname=$decod['body']['bankName'];
$gwname=$decod['body']['gatewayName'];
$txntype=$decod['body']['txnType'];
$txnamount=$decod['body']['txnAmount'];
$orderid=$decod['body']['orderId'];
$banktxnid=$decod['body']['bankTxnId'];

include 'connection.php';

$sql ="INSERT INTO transactiondetails( ORDERID, time, STATUS, RESPMSG, RESPCODE, TXNAMOUNT, refundamt, TXNID, BANKTXNID, TxnType, GATEWAYNAME, BANKNAME, PAYMENTMODE, MID, version, timestamp, signature) VALUES ('$orderid','$txndate','$status','$msg','$code','$txnamount','$refundamt','$txnid','$banktxnid','$txntype','$gwname','$bankname','$paymode','$mid','$version','$timestamp','$signature')";
if (!mysqli_query($con, $sql)) {

	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PaymentStatus</title>
	<style>
		.box{
			background-color: #262626;
        	color: white;
            width: 50%;
            min-width: 280px;
    		margin: auto;
    		padding: 20px 20px;
    		border-radius: 12px;
		}
		a.button
        {
            text-decoration: none;
            color: white;
            padding: 2px;
            box-sizing: border-box;
            border: 1px solid;
            display: block;
            margin: 10px auto;
            text-align: center;
            width: 90px;
        }
    a.button:hover
    {
      font-weight: bold;
    }
	</style>
</head>
<body>
	<div class="box">
		<?php
        echo "<br/> TRANSACTION DETAILS";
		echo "<br/> ORDERID =".$orderid;
		if($status == "TXN_SUCCESS") 
        {
			
			   echo "<br><b>Transaction successfull</b>" ;
                echo "<br/> TXNAMOUNT =".$txnamount;
                if($txnid)
                echo "<br/> TXNID =".$txnid;
                if($bankname)
                echo "<br/> BANKNAME =".$bankname;
                if($banktxnid)
                echo "<br/> BANKTXNID =".$banktxnid;
                if($paymode)
                echo "<br/> PAYMENTMODE =".$paymode;
                if($gwname)
                echo "<br/> GATEWAYNAME =".$gwname;
                echo "<br/> TIME =".$txndate;
                ?>
				<p>GOOD LUCK SEE RESULT @6.00pm</p>
				<?php
				
		}
        else if($status == "TXN_FAILURE")
            {
                echo "<br><b>Transaction failed</b>" ;
                echo "<br/>".$msg;
				?>
				<a href="index.php" class="button">Try Again</a>
				<?php
            }
        else
            {
                echo "<br><b>Transaction Pending</b>" ;
                 echo "<br/>".$msg;
                echo "<br/> TXNAMOUNT =".$txnamount;
                if($txnid)
                echo "<br/> TXNID =".$txnid;
                if($bankname)
                echo "<br/> BANKNAME =".$bankname;
                if($banktxnid)
                echo "<br/> BANKTXNID =".$banktxnid;
                if($paymode)
                echo "<br/> PAYMENTMODE =".$paymode;
                if($gwname)
                echo "<br/> GATEWAYNAME =".$gwname;
                echo "<br/> TIME =".$txndate; 
            }
		
		?>
		<br>
		<a href="index.php" class="button">Close</a>


	</div>
	
	
</body>
</html>

    
        

