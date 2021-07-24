<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="shortcut icon" href="pics/favicon.png" type="image/x-icon">   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <title>TryYourLuck</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="pics/cnw2logo.png" alt="chillnwin.co">
        </div>
        <nav >
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="result.php">Result</a></li>
            </ul>
        </nav>
        <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
    </header>
    <marquee >
        <p> <b>Tip:</b>Start with small amount </p>
        <p><b>Note:</b> Registration  close at 5.00 pm </p> 
         <p><b>Note:</b> Winners will anounce at 6.00pm</p>
         <p><b>Note:</b> New registration starts at 6.00pm</p>
     </marquee>
     <div class="box">
        <div class="boxx" id="step">
            <p><b>STEPS TO WIN:</b></p>
            <p>1.CLICK ON REGISTER</p> 
            <p>2.FILL THE DETAILS</p> 
            <p>3.PAY AMOUNT</p> 
            <p>4.SEE RESULT AT 6.00PM</p>
        </div>
        <div class="boxx" id="coin">
            <img src="/pics/coin.png" alt="TossCoin">
            <p>WINNING AMOUNT : 2x(YOUR AMOUNT)</p>
             <p>WINNING PROBABILITY : 1/2</p>
             <a href="coinform.php" class="button">Register</a>
        </div>
        <div class="boxx" id="dice">
            <img src="/pics/dice.png" alt="Dice" > 
            <p>WINNING AMOUNT : 6x(YOUR AMOUNT)</p>
             <p>WINNING PROBABILITY : 1/6</p>
            <a href="diceform.php" class="button">Register </a>
        </div>
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