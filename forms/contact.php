<?php

    // $filenameee =  $_FILES['file']['name'];
    // $fileName = $_FILES['file']['tmp_name']; 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $usermessage = $_POST['message'];
    
    $message ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $usermessage; 
    
    $subject ="My email subject";
    $fromname ="My Website Name";
    $fromemail = 'ch.tejaswi2002@gmail.com';  //if u dont have an email create one on your cpanel

    $mailto = 'chebrolu.tejaswi2019@vitstudent.ac.in';  //the email which u want to recv this email




    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // // attachment
    // $body .= "--" . $separator . $eol;
    // $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    // $body .= "Content-Transfer-Encoding: base64" . $eol;
    // $body .= "Content-Disposition: attachment" . $eol;
    // $body .= $content . $eol;
    // $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo "mail send ... OK"; // do what you want after sending the email
        
        
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }
?>
<!-- 
// Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'chebrolu.tejaswi2019@vitstudent.ac.in';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send(); -->