<?php

$pass = '123456';
$salt = '123';
print (hash('sha512', $pass . $salt));
print ("\n");