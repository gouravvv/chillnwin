function validte()                                    
{ 
    var name = document.forms["diceform"]["name"];               
    var contact = document.forms["diceform"]["contact"];    
    // var upi = document.forms["diceform"]["upi"];  
    var choice =  document.forms["diceform"]["choice"];  
    var TXN_AMOUNT = document.forms["diceform"]["TXN_AMOUNT"];  
    // var address = document.forms["RegForm"]["Address"];  
   
    if (name.value == "")                                  
    { 
        window.alert("Please enter your name."); 
        name.focus(); 
        return false; 
    } 
   
    if (contact.value == "")                               
    { 
        window.alert("Please enter your contact."); 
        contact.focus(); 
        return false; 
    } 
       
    // if (upi.value == "")                                   
    // { 
    //     window.alert("Please enter a upi id."); 
    //     upi.focus(); 
    //     return false; 
    // } 
   
    if (choice.value == "")                           
    { 
        window.alert("Please enter your choice."); 
        choice.focus(); 
        return false; 
    } 
   
    if (TXN_AMOUNT.value == "")                        
    { 
        window.alert("Please enter a valid amount"); 
        TXN_AMOUNT.focus(); 
        return false; 
    } 
   
   
   
    return true; 
}