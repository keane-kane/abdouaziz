<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '/opt/lampp/htdocs/portefolio/iPortfolio/vendor/autoload.php';
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'abdouazizk50@gamil.com';







    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->SMTPDebug=4;

    try {
          //Server settings
          //$mail->SMTPDebug = 2 ;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'abdouazizkane50@gmail.com';                     //SMTP username
          $mail->Password   = 'sam50SUNG';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
          $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      
          //Recipients
          // $mail->setFrom('from@example.com', 'Mailer');
          // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
          // $mail->addAddress('ellen@example.com');               //Name is optional
          // $mail->addReplyTo('info@example.com', 'Information');
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          //Attachments
          //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
          //Set PHPMailer to use the sendmail transport
          //Content
          $mail->isHTML(true); 
          //Set who the message is to be sent from
          $mail->setFrom($_POST['email'], $$_POST['name']);
          //Set an alternative reply-to address
          $mail->addReplyTo($_POST['email'], $_POST['name']);
          //Set who the message is to be sent to
          $mail->addAddress($receiving_email_address, 'John Doe');
          //Set the subject line
          $mail->Subject = $_POST['subject'];
          //Read an HTML message body from an external file, convert referenced images to embedded,
          //convert HTML into a basic plain-text alternative body
          //$mail->msgHTML(file_get_contents('content.html'), __DIR__);
          $mail->msgHTML($_POST['message']);
          //Replace the plain text body with one created manually
          $mail->AltBody = 'This is a plain-text message body';
          //Attach an image file
          //$mail->addAttachment('images/phpmailer_mini.png');
    
          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

 // var_dump($i, $x);

  if( file_exists($php_email_form = '/opt/lampp/htdocs/portefolio/iPortfolio/vendor/autoload.php' )) {
    //include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }
 

  // $contact = new PHPEmailForm;
 
  // //$contact->ajax = true;
  // $contact->setTo($receiving_email_address);
  // $contact->setFromName($_POST['name']);
  // $contact->setFromEmail($_POST['email']);
  // $contact->setSubject($_POST['subject']);
  // echo $contact->send();
 // var_dump($contact);
  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */


 // echo $contact->send();
?>
