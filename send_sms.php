<?php
require "twilio-php/Services/Twilio.php"; 


$AccountSid = "ACda3d248c4d59f35279b64b2432cd19d3"; 
$AuthToken = "2c234bbcc3fc9a13eef51d33d4daca84"; 

$client = new Services_Twilio($AccountSid, $AuthToken); 
try { 

    $number="09171481701"; 

    $msg="Success!!"; 

    $message = $client->account->messages->create(array( 

        "From" => "+17015440243", // Paste your phone number here(Refer Step 4) 
        "To" => $number, 
        "Body" => $msg, 
    )); 

} catch (Services_Twilio_RestException $e) { 
    echo $e->getMessage(); 
} 

?> 
?>
