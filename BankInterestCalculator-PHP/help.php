<?php
function ValidateEmail($email) {
    if (empty($email)) {
        $emailErrorMsg = '*   Email can not be blank;';
        return $emailErrorMsg;
    } else {
        
        if (!preg_match("/^[^@]+@[^@]+$/", $email)) {
            $emailErrorMsg = ' *  Email should be like aa@aaa.aaa ';
        }
        return $emailErrorMsg;
    }  
    
}
function ValidatePhone($phone) { 
    if (empty($phone)) {
        $phoneErrorMsg = '*   Phone number can not be blank;';
        return $phoneErrorMsg;
    } else {
        
        if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/i", $phone)) {
            $phoneErrorMsg = ' *  Phone Number should be like xxx-xxx-xxxx';
        } 
        return $phoneErrorMsg;
    }  
    
    
}
function ValidatePostalCode($postalCode) {
    if (empty($postalCode)) {
        $postalCodeErrorMsg = '*   Post Code can not be blank;';
        return $postalCodeErrorMsg;
    } else {
       
        if (!preg_match("/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/", $postalCode)) {
            $postalCodeErrorMsg = ' *  Post Code should be like A1A 1A1';
        } 
        return $postalCodeErrorMsg;
    }  
    
}
function ValidateRate($interestRate){
  if (empty($interestRate)) {
        $rateErrorMsg = '*   Interest can not be blank;';
        return $rateErrorMsg;
    } else {
        
        if (!preg_match("/^[1-9]*$/", $interestRate)) {
            $rateErrorMsg = ' *  Interest should be  positive intege';
        } 
        return $rateErrorMsg;
    }  
}
function ValidateName($name) { 
    $Pricipal=htmlspecialchars($Pricipal);
   if (empty($name)) {
        $nameErrorMsg = '*   Pricipal can not be blank;';
        return $nameErrorMsg;

}
function ValidatePrincipal($principalAmount){
    if (empty($principalAmount)) {
        $principalErrorMsg = '*    Pricipal can not be blank;';
        return $principalErrorMsg;
    } else {
        
        if (!preg_match("/^[1-9*$]/", $principalAmount)) {
            $principalErrorMsg = ' *  Pricipal should be  positive intege';
        } 
        return $principalErrorMsg;
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
