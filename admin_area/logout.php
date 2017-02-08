<?php

session_start();

session_destroy();


echo "<script>window.open('login.php?logged_out=You Have Logged Out, Come Back Soon !','_self')</script>";





?>