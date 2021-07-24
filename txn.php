
<?php


require_once("PaytmChecksum.php");

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

$name=$_POST['name'];
$contact=$_POST['contact'];
$upi=$_POST['upi'];
$choice=$_POST['choice'];



$paytmParams = array();

$paytmParams["body"] = array(
    "requestType"   => "Payment",
    "mid"           => "",
    "websiteName"   => "DEFAULT",
    "orderId"       => $ORDER_ID,
    "callbackUrl"   => "",
    "txnAmount"     => array(
        "value"     => $TXN_AMOUNT,
        "currency"  => "INR",
    ),
    "userInfo"      => array(
        "custId"    => $CUST_ID,
    ),
);


$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"],JSON_UNESCAPED_SLASHES), "");

$paytmParams["head"] = array(
    "signature"	=> $checksum
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

 $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=TlMSpq37956473460563&orderId=$ORDER_ID";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
$decod=json_decode($response, true);
$txntoken=$decod['body']['txnToken'];
include 'connection.php';
  

    $sql = "INSERT INTO playerinfo (name, contact, upi, choice, amount, orderid, txntoken, customerid, timestamp) VALUES ( '$name', '$contact', '$upi', '$choice', '$TXN_AMOUNT', '$ORDER_ID', '$txntoken', '$CUST_ID', '$time')";
    if (!mysqli_query($con, $sql)) {
       
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
mysqli_close($con);


?>

<html>
   <head>
      <title>Show Payment Page</title>
   </head>
   <body>
      <center>
         <h1>Please do not refresh this page...</h1>
      </center>
      <form method="post" action="https://securegw.paytm.in/theia/api/v1/showPaymentPage?mid=TlMSpq37956473460563&orderId=<?php echo $ORDER_ID; ?>" name="paytm">
         <table border="1">
            <tbody>
               <input type="hidden" name="mid" value="">
               <input type="hidden" name="orderId" value="<?php echo $ORDER_ID; ?>">
               <input type="hidden" name="txnToken" value="<?php echo $decod['body']['txnToken']; ?>">
            </tbody>
         </table>
         <script type="text/javascript"> document.paytm.submit(); </script>
      </form>
   </body>
</html>