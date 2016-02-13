<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;
?>

<!DOCTYPE html>
<html>
    <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    
    </head>
    <body>
    

    <?php $studentname = $_GET['student']; ?>
    <h1><?php echo "Connect to: " . $studentname;?></h1>

<form method="post">
    <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" placeholder="Subject" name="subject">
      </div>
      <div class="form-group">
        <label>Message</label>
        <input type="text" class="form-control"  placeholder="Message" id="lg">
      </div>   
      <div class="checkbox">
        <label>
          <input type="checkbox"> Check me out
        </label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php

if(isset($_POST['button_pressed']))
{

    # Instantiate the client.
    $mgClient = new Mailgun('key-8805cceea6746f1f7d789bac77dd069b');
    $domain = "sandbox22828b0e7fd94199b9096f094ca1a834.mailgun.org";

    # Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from'    => 'Excited User <mailgun@sandbox22828b0e7fd94199b9096f094ca1a834.mailgun.org>',
        'to'      => 'Baz <amittal43@gatech.edu>',
        'subject' => 'Hello',
        'text'    => 'Testing some Mailgun awesomness!'
    ));

    /* $to = 'mittaladitya13@gmail.com';
    $from = 'mittaladitya13@gmail.com';
    $subject = 'the subject';

    $message = $_GET['query'];

    $headers = "From: {$from}\n";
    $headers .= "Reply-To: {$from}\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\n";
    //$headers .= "Cc: {$to}\n";
    //$headers .= "Bcc: {$to}\n";
    mail($to, $subject, $message, $headers);
    echo 'Email Sent.';*/
}

?>


    </body>
</html>