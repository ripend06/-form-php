<?php

//リダイレクト
//header("HTTP/1.1 301 Moved Permanently");
//header("Location: https://sppo-lp.net/");


if (isset($_POST["recaptchaResponse"]) && !empty($_POST["recaptchaResponse"]))
{
    $secret = "6LeZ3ZgaAAAAAC5CTOIKSZLPcGX-LT-uFhFeMS7B";
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$_POST["recaptchaResponse"]);
    $reCAPTCHA = json_decode($verifyResponse);
    if ($reCAPTCHA->success)
    {
      //echo "認証成功";
      session_start();
      include_once ('page-mail_user.php');
      include_once ('page-mail.php');
    }
    else
    {
      echo "認証エラー";
    }
}
else
{
    echo "エラーエラー";
}


?>