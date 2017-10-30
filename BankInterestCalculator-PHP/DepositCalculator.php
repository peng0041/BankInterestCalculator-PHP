<?php
include 'help.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$principalAmount = $_POST['principalAmount'];
$interestRate = $_POST['interestRate'];
$depositDuration = $_POST['depositDuration'];
$name = $_POST['name'];
$postCode = $_POST['postCode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$preferredContact = $_POST['preferredContact'];
$contactTime = $_POST['contactTimeChoice'];

$principalErrorMsg = ValidatePrincipal($principalAmount);
$rateErrorMsg = ValidateRate($interestRate);
$postCodeErrorMsg = ValidatePostalCode($postCode);
$phoneErrorMsg = ValidatePhone($phone);
$emailErrorMsg = ValidateEmail($email);
$nameErrorMsg = ValidateName($name);

$Errs = array($principalErrorMsg,
    $rateErrorMsg,
    $postCodeErrorMsg,
    $phoneErrorMsg,
    $emailErrorMsg,
    $nameErrorMsg, $contactTimeErr, $preferredContactErr);


if (empty($preferredContact)) {
    $preferredContactErr = "    *    Please chose phone or Email.";
}
if (empty($contactTime) && ($preferredContact == "phone")) {
    $contactTimeErr = "   *    If you chose phone, please check contact time.";
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
        <title>Deposit Calculator</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>Deposit Calculator</h1>
            <form class="pure-form pure-form-aligned" action="DepositCalculator.php" method="post">

                <fieldset>
                    <div class="pure-control-group">
                        <label for="principalAmount">Principal Amount:</label>
                        <input id="principalAmount" name="principalAmount" type="text" value="<?php echo $principalAmount; ?>" >
                        <span class="error"> <?php echo $principalErrorMsg; ?></span>
                    </div>

                    <div class="pure-control-group">
                        <label for="interestRate">Interest Rate (%):</label>
                        <input id="interestRate" name="interestRate" type="text" value="<?php echo $interestRate; ?>" >
                        <span class="error"> <?php echo $rateErrorMsg; ?></span>
                    </div>

                    <div class="pure-control-group">
                        <label for="depositDuration">Years to deposit:</label>


                        <select id="depositDuration" name="depositDuration"  value="<?php echo $depositDuration; ?>">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>

                    <hr>

                    <div class="pure-control-group">
                        <label for="name">Name:</label>
                        <input id="name" name="name" type="text" value="<?php echo $name; ?>" >
                        <span class="error"> <?php echo $nameErrorMsg; ?></span>
                    </div>
                    <div class="pure-control-group">
                        <label for="postCode">Post Code:</label>
                        <input id="postCode" name="postCode" type="text" value="<?php echo $postCode; ?>" >
                        <span class="error"> <?php echo $postCodeErrorMsg; ?></span>
                    </div>

                    <div class="pure-control-group">
                        <label for="phone">Phone Number:</label>
                        <input id="phone" name="phone" type="tel" value="<?php echo $phone; ?>" >
                        <span class="error"> <?php echo $phoneErrorMsg; ?></span>
                    </div>

                    <div class="pure-control-group">
                        <label for="email">Email Address:</label>
                        <input id="email" name="email" type="text" value="<?php echo $email; ?>">
                        <span class="error"> <?php echo $emailErrorMsg; ?></span>
                    </div>

                    <div class="pure-control-group">
                        <label for="preferredContact">Preferred contact method:</label>
                        <input id="preferredContactPhone" name="preferredContact" type="radio" value="phone" <?php if ($preferredContact == "phone") echo 'checked=checked;'; ?>> Phone
                        <input id="preferredContactEmail" name="preferredContact" type="radio" value="email" <?php if ($preferredContact == "email") echo 'checked=checked;'; ?>> Email
                        <span class="error"> <?php echo $preferredContactErr; ?></span>
                    </div>

                    <div class="pure-control-group">
                        <label for="contactTimeChoice">Preferred contact time (check applicable):</label>
                        <input id="contactTimeMorning" name="contactTimeChoice[]" type="checkbox" value="Morning" <?php if ($contactTime == "Morning") echo'checked=checked'; ?>> Morning
                        <input id="contactTimeAfternoon" name="contactTimeChoice[]" type="checkbox" value="Afternoon" <?php if ($contactTime == "Afternoon") echo 'checked=checked;'; ?>> Afternoon
                        <input id="contactTimeEvening" name="contactTimeChoice[]" type="checkbox" value="Evening" <?php if ($contactTime == "Evening") echo 'checked=checked;'; ?>> Evening
                        <span class="error"> <?php echo $contactTimeErr; ?></span>
                    </div>

                    <div class="pure-controls">
                        <input type="submit" name="btnSubmit" value="Caulculate"/>
                        <!--<button type="submit" class="submit pure-button pure-button-primary">Calculate</button>-->
                        <input type="reset" value="Clear"/> 
                    </div>

                </fieldset>
            </form>
            <?php
            $success = true;
            for($i = 0; $i < sizeof($Errs); $i++){
                if ($Errs[$i] != null){
                    $success = FALSE;
                }
            }
            
            if ($success) {
                echo '<h1>Thank you ' . $name . ' for using our deposit calculation tool.</h1>';

                if ($preferredContact == 'email') {

                    echo '<p>An email about the details of our GIC has beem sent to' . $preferredContact . ' </p>';
                } else {
                    echo '<p>we will call you tomorrow  </p>';
                }
                echo' <table class="pure-table">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Principal at Year Start</th>
                                <th>Interest for the Year</th>
                            </tr>
                        </thead>';
                for ($i = 1; $i <= $depositDuration; $i++) {
                    $principalAmount += $interest;
                    $interest += round($principalAmount * ($interestRate / 100), 2);
                    echo ' <tr><td width="10%">' . $i . '</td><td width="45%"> ' . $principalAmount . '</td><td width="45%">' . $interest . ' </td></tr>';
                }
                echo '</table>';
            }
            ?>
        </div>

    </body>
</html>

