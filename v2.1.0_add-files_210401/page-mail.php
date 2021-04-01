<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- ビューポート -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Googleフォント読み込み-->
    <!-- ファビコン -->
    <link rel="icon" type="" href="http://dev-ac.heteml.net/mino/2022/jyounetu/img/f-icon.png">
    <!-- OGP -->
    <meta name="description" content="フルオーダーメイド×独自メソッドでずっと活躍し続ける新入社員を——">
    <!--<meta name="keywords" content="コンサルティング,ASP,EC,MONKEY,IT,広告,代理店,インターネット">-->
    <!-- SNS用OGT設定 -->
    <meta property="og:url" content="http://dev-ac.heteml.net/mino/2022/jyounetu/">
    <meta property="og:title" content="情熱 新入社員研修">
    <meta property="og:site_name" content="情熱 新入社員研修">
    <meta property="og:type" content="website">
    <meta property="og:description" content="フルオーダーメイド×独自メソッドでずっと活躍し続ける新入社員を——">
    <meta property="og:image" content="http://dev-ac.heteml.net/mino/2022/jyounetu/img/ogp-j.png">
    <meta property="fb:app_id" content="情熱 新入社員研修">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="情熱 新入社員研修">
    <meta name="twitter:description" content="フルオーダーメイド×独自メソッドでずっと活躍し続ける新入社員を——">
    <meta name="twitter:image" content="http://dev-ac.heteml.net/mino/2022/jyounetu/img/ogp-j.png">
    <!-- CSS読み込み -->
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <link href="./css/reset.css" rel="stylesheet" type="text/css">
    <link href="./css/animation.css" rel="stylesheet" type="text/css">
    <!-- jQuery読み込み -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- js読み込み -->
    <script type="text/javascript" src="./JS/script.js"></script>
    <!-- lazyload -->
    <!--<script type="text/javascript" src="./JS/jquery.lazyload.min.js"></script>-->
    <script type="text/javascript" src="./JS/lazysizes.min.js"></script>
    <!-- Lazy Loadを起動する -->
    <!--<script>$(function($){$("img.lazy").lazyload();});</script>-->
        <!-- <?/*php wp_head(); */?> -->
</head>
<body>
<?php
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  /* ヘッダ作成 */
  $headers = "MIME-Version: 1.0\n";
  $headers .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
  $headers .= "From: info@actest.work";
  $headers.= "\n";
  $headers.= "Cc:".mb_encode_mimeheader("")."<makoto6760@icloud.com>"; /* CC作成 */
  
  //$from = "";
  //$headers .= "Return-Path: ";
  $pfrom   = "-f info@actest.work";

  $to = 'info@actest.work';
  $title = 'XXXXよりお申し込みがありました。';

  $auto_reply_text2 .= '内容：'. $_POST['option']. "\n";
  $auto_reply_text2 		 .= '企業名：'. $_POST['kai']. "\n";
  $auto_reply_text2 		 .= 'お名前：'. $_POST['name']. "\n";
  $auto_reply_text2 		 .= 'メールアドレス：'. $_POST['mail']. "\n";
  $auto_reply_text2 		 .= '電話番号：'. $_POST['tel']. "\n";
  $auto_reply_text2 		 .= '添付ファイル①：'. $_FILES['attachment_file']['name']. "\n";
  $auto_reply_text2 		 .= '添付ファイル②：'. $_FILES['attachment_file2']['name']. "\n";
  $auto_reply_text2 		 .= 'その他ご質問：'. $_POST['content']. "\n";

  // テキストメッセージをセット
	$message2 = "--__BOUNDARY__\n";
	$message2 .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
	$message2 .= $auto_reply_text2 . "\n";
  $message2 .= "--__BOUNDARY__\n";

  // ファイルを添付
	if( !empty($clean['attachment_file']) ) {
		$message2 .= "Content-Type: application/octet-stream; name=\"{$clean['attachment_file']}\"\n";
		$message2 .= "Content-Disposition: attachment; filename=\"{$clean['attachment_file']}\"\n";
		$message2 .= "Content-Transfer-Encoding: base64\n";
		$message2 .= "\n";
		$message2 .= chunk_split(base64_encode(file_get_contents(FILE_DIR.$clean['attachment_file'])));
		$message2 .= "--__BOUNDARY__\n";
  }
  // ファイルを添付2
	if( !empty($clean2['attachment_file2']) ) {
		$message2 .= "Content-Type: application/octet-stream; name=\"{$clean2['attachment_file2']}\"\n";
		$message2 .= "Content-Disposition: attachment; filename=\"{$clean2['attachment_file2']}\"\n";
		$message2 .= "Content-Transfer-Encoding: base64\n";
		$message2 .= "\n";
		$message2 .= chunk_split(base64_encode(file_get_contents(FILE_DIR2.$clean2['attachment_file2'])));
		$message2 .= "--__BOUNDARY__\n";
	}

  if(mb_send_mail($to, $title, $message2, $headers, $pfrom))
  {
    /*echo '<div class="thanks-back">
    <div class="thanks pc">
          <p class="th-p1">お問い合わせ承りました。<br>このたびは、当社へお問い合わせいただき有難うございます。</p>
          <p class="th-p1">メールフォームにご記入いただいたメールアドレスへ、<br>お問い合わせ内容の確認メールをお送りいたしましたので、お手数でもご確認お願い致します。</p>
          <p class="th-p1">弊社でお問い合わせ内容を確認の上、3営業日以内にお返事いたします。</p>
          <p class="th-p1">なお、お急ぎの場合は電話でもご相談を受け付けております。</p>
          <p class="th-p1">03-6407-0388までご遠慮なくご相談ください。</p>
      </div>
      <div class="thanks sp">
                <p class="th-p1">お問い合わせ承りました。<br>このたびは、当社へお問い合わせいただき有難うございます。</p>
                <p class="th-p1">メールフォームにご記入いただいたメールアドレスへ、お問い合わせ内容の確認メールをお送りいたしましたので、お手数でもご確認お願い致します。</p>
                <p class="th-p1">弊社でお問い合わせ内容を確認の上、3営業日以内にお返事いたします。</p>
                <p class="th-p1">なお、お急ぎの場合は電話でもご相談を受け付けております。</p>
                <p class="th-p1">03-6407-0388までご遠慮なくご相談ください。</p>
            </div>
    </div>';*/
    echo "メール送信成功です-m";
  }
  else
  {
    echo "メール送信失敗です-m";
  }
 ?>

<!-- <?/*php wp_footer(); */?> -->
</body>
</html>

<!--
<div class="thanks-back">
<div class="thanks">
        <p class="th-p1">お問い合わせ承りました。<br>このたびは、当社へお問い合わせいただき有難うございます。</p>
        <p class="th-p1">メールフォームにご記入いただいたメールアドレスへ、<br>お問い合わせ内容の確認メールをお送りいたしましたので、お手数でもご確認お願い致します。</p>
        <p class="th-p1">弊社でお問い合わせ内容を確認の上、3営業日以内にお返事いたします。</p>
        <p class="th-p1">なお、お急ぎの場合は電話でもご相談を受け付けております。</p>
        <p class="th-p1">00-0000-0000までご遠慮なくご相談ください<br>営業時間：</p>
    </div>
</div>-->