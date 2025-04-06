<?php
$my_name=htmlspecialchars($_POST['my_name'],ENT_QUOTES);
$choices=htmlspecialchars($_POST['choixes'],ENT_QUOTES);
$number=htmlspecialchars($_POST['choixes'],ENT_QUOTES);

print "私の名前は、" . $my_name . "<br>";
