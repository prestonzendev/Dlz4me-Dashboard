

<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("./sendgrid-php.php");
// If not using Composer, uncomment the above line
$API_KEY = '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';
$email = new \SendGrid\Mail\Mail();
$email->setFrom("mohit.jajani@dotsquares.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("deep.gupta@dotsquares.com", "Example User");
$email->addContent(
    "text/plain", "and easy to do anywhere, even with PHP"
);
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);

//optional (seems to be bullet proof, pdf,  png, etc) to attach a file<START>
$att1 = new \SendGrid\Mail\Attachment();
$att1->setContent(file_get_contents("out.pdf"));
$att1->setType("application/octet-stream");
$att1->setFilename(basename("out.pdf"));
$att1->setDisposition("attachment");
$email->addAttachment($att1);

$sendgrid = new \SendGrid($API_KEY);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    echo "<br>";
    print_r($response->headers());
    echo "<br>";
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

