<?php

namespace Core\Auth;

class Email
{
  private $email;
  private $username;

  public function __construct($email, $username)
  {
    $this->email = $email;
    $this->username = $username;
  }

  public function sendConfirmation()
  {
    $content = 'Hello {$this->username}. Activate camagru registration'
    $this->send($this->email, $content);
  }

  private function send($email, $content)
  {
    $headers = 'From: hello@camagru.dev' . "\r\n" .
    'Reply-To: hello@camagru.dev' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($email, $content, $headers);
  }
}

?>
