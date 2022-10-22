<?php 

namespace assets\vendor\phpemailform;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




   class PHPEmailForm  { 
      
   
      private $to;
      private $from_email;
      private $from_name;
      private $subject;
      private $message;

      function __construct() { 
      } 

      /**
       * Get the value of to
       */
      public function getTo()
      {
            return $this->to;
      }

      /**
       * Set the value of to
       */
      public function setTo($to): self
      {
            $this->to = $to;

            return $this;
      }

      /**
       * Get the value of from_email
       */
      public function getFromEmail()
      {
            return $this->from_email;
      }

      /**
       * Set the value of from_email
       */
      public function setFromEmail($from_email): self
      {
            $this->from_email = $from_email;

            return $this;
      }

      /**
       * Get the value of from_name
       */
      public function getFromName()
      {
            return $this->from_name;
      }

      /**
       * Set the value of from_name
       */
      public function setFromName($from_name): self
      {
            $this->from_name = $from_name;

            return $this;
      }

      /**
       * Get the value of subject
       */
      public function getSubject()
      {
            return $this->subject;
      }

      /**
       * Set the value of subject
       */
      public function setSubject($subject): self
      {
            $this->subject = $subject;

            return $this;
      }

      /**
       * Get the value of from
       */
      public function getMessage()
      {
            return $this->message;
      }

      /**
       * Set the value of from
       */
      public function setMessage($message): self
      {
            $this->message = $message;

            return $this;
      }
   

   	
      
   public function index() { 
	
      $this->load->helper('form'); 
      $this->load->view('email_form'); 
   } 

  
  public function send() { 
      require '/opt/lampp/htdocs/portefolio/iPortfolio/vendor/autoload.php';

      //Create an instance; passing `true` enables exceptions
      $mail = new PHPMailer(true);
      $mail->SMTPDebug=4;

      try {
            //Server settings
            //$mail->SMTPDebug = 2 ;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'conctactsarr@gmail.com';                     //SMTP username
            $mail->Password   = 'Conctactsarr89';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
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
            $mail->setFrom($this->getFromEmail(), $this->getFromName());
            //Set an alternative reply-to address
            $mail->addReplyTo($this->getFromEmail(), $this->getFromName());
            //Set who the message is to be sent to
            $mail->addAddress($this->getTo(), 'John Doe');
            //Set the subject line
            $mail->Subject = $this->getSubject();
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('content.html'), __DIR__);
            $mail->msgHTML($this->getMessage());
            //Replace the plain text body with one created manually
            $mail->AltBody = 'This is a plain-text message body';
            //Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');
      
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

  }


   public function send_mail() { 
      $from_email = "your@example.com"; 
      $to_email = $this->input->post('email'); 

      //Load email library 
      $this->load->library('email'); 

      $this->email->from($from_email, 'Your Name'); 
      $this->email->to($to_email);
      $this->email->subject('Email Test'); 
      $this->email->message('Testing the email class.'); 

      //Send mail 
      if($this->email->send()) 
      $this->session->set_flashdata("email_sent","Email sent successfully."); 
      else 
      $this->session->set_flashdata("email_sent","Error in sending Email."); 
      $this->load->view('email_form'); 
   } 

}
?>