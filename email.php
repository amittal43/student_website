<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;

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

?>