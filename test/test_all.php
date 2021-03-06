<?php

require 'test_login.php';
require 'test_register.php';
require 'test_show.php';
require 'test_update.php';
require 'test_search.php';
require 'utils.php';

$baseurl =  'http://localhost:80';

echo "[+] Testing Registration - Login - Show Profile\n<br>";

echo "[*] Generating random user\n<br>";

echo "---\n<br>";
$email = generate_random_email();
$pass = generate_random_password();
$first_name = generate_random_name();
$last_name = generate_random_name();
$birthday = "2020-10-03";

echo "Email: $email\n<br>";
echo "Pass: $pass\n<br>";
echo "First name: $first_name\n<br>";
echo "Last name: $last_name\n<br>";
echo "---\n<br>";



echo "[-] Calling register.php\n<br>";

register($email, $pass, $first_name, $last_name, $birthday, $baseurl);

echo "[-] Calling login.php\n<br>";
login($email, $pass, $baseurl);

echo "[-] Calling show_profile.php\n<br>";

echo check_correct_user($email, $first_name, $last_name, show_logged_user($baseurl))
    ? "[*] <b>Success!</b>\n<br>"
    : "[*] Failed\n<br>";

echo "------------------------\n<br>";

echo "[+] Testing Update - Show Profile\n<br>";

echo "[*] Generating new random user\n<br>";
$first_name = generate_random_name();
$last_name = generate_random_name();

echo "---\n<br>";
echo "First name: $first_name\n<br>";
echo "Last name: $last_name\n<br>";
echo "Birthday: $birthday\n<br>";
echo "---\n<br>";

echo "[-] Calling update_profile.php\n<br>";
update($first_name, $last_name, $baseurl);

echo "[-] Calling show_profile.php\n<br>";

echo check_correct_user($email, $first_name, $last_name, show_logged_user($baseurl))
    ? "[*] <b>Success!</b>\n<br>"
    : "[*] Failed\n<br>";

  echo "------------------------\n<br>";

  echo "[+] Testing Search \n<br>";
  //$search = generate_random_search();
  $search="p";
  echo "---\n<br>";
  echo "Search name: $search\n<br>";
  echo "---\n<br>";

  echo "[-] Calling search.php\n<br>";

  $prova=search($search ,$baseurl);
  echo check_search_found($search,$prova )
      ? "[*] <b>Success!</b>\n<br>"
      : "[*] Failed\n<br>";

  //exit(var_dump($prova));
