<?php

$user= 'Ricardo1234';

$pass = hash('sha256', $user);

echo $pass;