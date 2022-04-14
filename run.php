<?php

function curl($nomor = []) {
  $_post = [
    'mobile' => $nomor,
    'country' => 'ID'
  ];
  $post = http_build_query($_post);
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'http://t.bosbospartner.com/trade/sendMobileCode');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
  $response = curl_exec($curl);
  curl_close($curl);

  return json_decode($response, true);
}

print "\033[0;32m
**************************************
*                                    *
*      ____            _____         *
*     / __ \__  ______/ /   |____    *
*    / /_/ / / / / __  / /| /_  /    *
*   / _, _/ /_/ / /_/ / ___ |/ /_    *
*  /_/ |_|\__,_/\__,_/_/  |_/___/    *
*                                    *
**************************************
\n \n ";

echo "\033[0;31m [TARGET] :";
$target = trim(fgets(STDIN));
$respon = curl($target);

if ($respon['msg'] === 'format nomor HP salah, silakan coba lagi') {
  print "Target salah!\n";
} else {
  print "\033[0;35m Sukes kirim!\n\n";
}