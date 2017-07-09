<?php
$headers = 'From: hello@camagru.com' . "\r\n" .
    'Reply-To: hello@camagru.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

var_dump(mail('roche.damiengabriel@gmail.com', 'sujet','test', $headers));
phpinfo();

 ?>
