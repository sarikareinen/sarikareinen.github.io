<? php
  if (isset($_POST['name']))
    $name = $_POST['name'];
  if (isset($_POST['email']))
    $email = $_POST['email'];
  if (isset($_POST['message']))
    $message = $_POST['message'];
  if (isset($_POST['subject']))
    $subject = $_POST['subject'];
  if ($name === '') {
    echo "Nimi -kenttä ei voi olla tyhjä.";
    die();
  }
  if ($email === '') {
    echo "Sähköposti -kenttä ei voi olla tyhjä.";
    die();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Tarkista sähköpostiosoite.";
      die();
    }
  }
  if ($subject === '') {
    echo "Aihe -kenttä ei voi olla tyhjä.";
    die();
  }
  if ($message === '') {
    echo "Viesti -kenttä ei voi olla tyhjä.";
    die();
  }
  $content = "From: $name \nEmail: $email \nMessage: $message";
  $recipient = "sari.kareinen@gmail.com";
  $mailheader = "From: $email \r\n";
  mail($recipient, $subject, $content, $mailheader) or die("Virhe!");
  echo "Viesti lähetetty!";
?>