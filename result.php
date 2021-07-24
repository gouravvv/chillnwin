<?php
 $todaydate="28-08-2020";
 $luckyface="head"; //head
 $luckyno=3;
 $timestamp1="2020-08-25 18:00:00";
 $timestamp2="2020-08-26 17:00:00";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="liststyle.css" type="text/css">
    <link rel="shortcut icon" href="pics/favicon.png" type="image/x-icon">   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <title>Winners</title>
    
</head>
<body>
<header>
        <div class="logo">
            <img src="pics/cnw2logo.png" alt="chillnwin.co">
        </div>
        <nav >
            <ul>
                <li><a href="index.php" >Home</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#" class="active">Result</a></li>
            </ul>
        </nav>
        <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
</header>
<div class="container">
    <h2 id="he">Winners</h2>
   <div class="up">
       <h4  id="da">Date: <?php echo $todaydate; ?></h4>
    <h4  id="lf">Lucky Face: <?php echo $luckyface; ?></h4>
    <h4  id="ln">Lucky No: <?php echo $luckyno; ?></h4>
   </div> 
   <table id="winners">
       <thead>
        <tr>
            <th>Name</th>
            <th>Choice</th>
            <th>Paid</th>
            <th>Won</th>
        </tr>
       </thead>
       <tbody>
           <?php
           include 'connection.php';
           $sq="SELECT DISTINCT name ,choice,amount,2*amount from playerinfo,transactiondetails WHERE TIMESTAMP(playerinfo.timestamp) BETWEEN '$timestamp1' and '$timestamp2' AND playerinfo.orderid=transactiondetails.ORDERID AND playerinfo.amount=transactiondetails.TXNAMOUNT AND choice='$luckyface' AND STATUS='TXN_SUCCESS'";
           $squery=mysqli_query($con, $sq);
           while($res=mysqli_fetch_array($squery))
           {
               ?>
               <tr>
                   <td><?php echo $res['name']; ?> </td>
                   <td><?php echo $res['choice']; ?> </td>
                   <td><?php echo $res['amount']; ?> </td>
                   <td><?php echo $res['2*amount']; ?> </td>
               </tr>
               
            <?php
           }
           $sq="SELECT DISTINCT name ,choice,amount,6*amount from playerinfo,transactiondetails WHERE TIMESTAMP(playerinfo.timestamp) BETWEEN '$timestamp1' and '$timestamp2' AND playerinfo.orderid=transactiondetails.ORDERID AND playerinfo.amount=transactiondetails.TXNAMOUNT AND choice='$luckyno' AND STATUS='TXN_SUCCESS'";
           $squery=mysqli_query($con, $sq);
           while($res=mysqli_fetch_array($squery))
           {
               ?>
                <tr>
                   <td><?php echo $res['name']; ?> </td>
                   <td><?php echo $res['choice']; ?> </td>
                   <td><?php echo $res['amount']; ?> </td>
                   <td><?php echo $res['6*amount']; ?> </td>
               </tr>
               
            <?php
           }
           mysqli_close($con);
           ?>
           
       </tbody>
       
   </table>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('.menu-toggle').click(function (){
                $('nav').toggleClass('active')
            })
        })
</script> 
</body>
</html>