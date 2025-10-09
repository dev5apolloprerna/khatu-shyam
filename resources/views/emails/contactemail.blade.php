<?php
// dd('hello');
$root = $_SERVER['DOCUMENT_ROOT'];
$file = file_get_contents($root . '/khatushyam/mailers/contactemail.html', 'r');

//$file = file_get_contents("https://getdemo.in/mas_solutions/mailers/welcome-company.html", "r");

$file = str_replace('#name', $data['Name'], $file);
$file = str_replace('#email', $data['Email'], $file);
$file = str_replace('#mobile', $data['Mobile'], $file);
$file = str_replace('#message', $data['Message'], $file);
echo $file;
?>
