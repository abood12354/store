<?php

// function invalidEmail($email) {
//     if(str_ends_with($email,'@email.com'))
//   return $email; 
// }

function isGmail(string $email): bool 
{
  return str_ends_with($email, '@gmail.com');
}

?>