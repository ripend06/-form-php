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
/*
if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "files/" . $_FILES["upfile"]["name"])) {
    chmod("files/" . $_FILES["upfile"]["name"], 0644);
    echo $_FILES["upfile"]["name"] . "をアップロードしました。";
    $path = $_FILES["upfile"]["name"];
 
    //file_get_contentsで画像のパスを指定
    $img = file_get_contents($path);
    
    //タイプをimage/jpegで指定
    //header('Content-type: image/jpeg') ;
    
    //echo $img;
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}*/
define( "FILE_DIR", "files/");
define( "FILE_DIR2", "files2/");

//$FILE_DIR2 = "files2/";

// 変数の初期化
$page_flag = 0;
$clean = array();
$clean2 = array();
$error = array();

// サニタイズ
if( !empty($_POST) ) {

	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	} 
}

// ファイルのアップロード
if( !empty($_FILES['attachment_file']['tmp_name']) ) {

  $upload_res = move_uploaded_file( $_FILES['attachment_file']['tmp_name'], FILE_DIR.$_FILES['attachment_file']['name']);

  if( $upload_res !== true ) {
    $error[] = 'ファイルのアップロードに失敗しました。';
  } else {
    $clean['attachment_file'] = $_FILES['attachment_file']['name'];
  }
}
/* 2つ目 */
if( !empty($_FILES['attachment_file2']['tmp_name']) ) {

  $upload_res2 = move_uploaded_file( $_FILES['attachment_file2']['tmp_name'], FILE_DIR2.$_FILES['attachment_file2']['name']);

  if( $upload_res2 !== true ) {
    $error[] = 'ファイルのアップロードに失敗しました。';
  } else {
    $clean2['attachment_file2'] = $_FILES['attachment_file2']['name'];
  }
}
?>
<?php
if( !empty($clean['attachment_file']) ): ?>
	<div class="element_wrap">
		<label>画像ファイルの添付</label>
		<p><img src="<?php echo FILE_DIR.$clean['attachment_file']; ?>"></p>
	</div>
  <?php endif; ?>
  
<?php 
if( !empty($clean2['attachment_file2']) ): ?>
<div class="element_wrap">
  <label>画像ファイルの添付</label>
  <p><img src="<?php echo FILE_DIR2.$clean2['attachment_file2']; ?>"></p>
</div>
<?php endif; ?>

<?php
  //日本語の使用宣言
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  /* ヘッダ作成 */
  $header = "MIME-Version: 1.0\n";
  $header .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
	//$header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
  //$header .= "Content-Transfer-Encoding: 7bit\n";
  $from = "info@actest.work";
  $from_name		= "管理者XXX";
	if($from_name != ""){
		$from_name = str_replace(array("\r\n","\r","\n"), '', $from_name);
    $header .= "From: " . mb_encode_mimeheader(mb_convert_encoding($from_name,"ISO-2022-JP","AUTO")) . "<" . $from . ">";
  }

  /* 本文作成 */
  $to = $_POST['mail'];
  $title = "お申し込みありがとうございます。";
  /*$message = $_POST['message'];*/
  $auto_reply_text = "--__BOUNDARY__\n";
  $auto_reply_text 		 .=  $_POST['name']. "様"."\n";
  $auto_reply_text  .= "この度は、XXXにお申し込みいただきまして、誠にありがとうございます。\n";
  $auto_reply_text .= "\n";
  $auto_reply_text  .= "下記の内容でエントリーを受け付けました。\n";
  $auto_reply_text .= "──────────────────────────\n";
	$auto_reply_text .= "ご登録いただいた情報\n";
	$auto_reply_text .= "──────────────────────────\n";
  $auto_reply_text.= '内容：'. $_POST['option']. "\n";
  $auto_reply_text 		 .= '企業名：'. $_POST['kai']. "\n";
    $auto_reply_text 		 .= 'お名前：'. $_POST['name']. "\n";
    $auto_reply_text 		 .= 'メールアドレス：'. $_POST['mail']. "\n";
    $auto_reply_text 		 .= '電話番号：'. $_POST['tel']. "\n";
    $auto_reply_text 		 .= '添付ファイル①：'. $_FILES['attachment_file']['name']. "\n";
    $auto_reply_text 		 .= '添付ファイル②：'. $_FILES['attachment_file2']['name']. "\n";
    $auto_reply_text 		 .= 'その他ご質問：'. $_POST['content']. "\n";
    //$message 		 .= '添付ファイル①：'. $upload_file. "\n";
    //$message 		 .= '添付ファイル②：'. $_POST['file2']. "\n";

// テキストメッセージをセット
	$message = "--__BOUNDARY__\n";
	$message .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
	$message .= $auto_reply_text . "\n";
  $message .= "--__BOUNDARY__\n";
  
  // ファイルを添付
	if( !empty($clean['attachment_file']) ) {
		$message .= "Content-Type: application/octet-stream; name=\"{$clean['attachment_file']}\"\n";
		$message .= "Content-Disposition: attachment; filename=\"{$clean['attachment_file']}\"\n";
		$message .= "Content-Transfer-Encoding: base64\n";
		$message .= "\n";
		$message .= chunk_split(base64_encode(file_get_contents(FILE_DIR.$clean['attachment_file'])));
		$message .= "--__BOUNDARY__\n";
  }
  // ファイルを添付2
	if( !empty($clean2['attachment_file2']) ) {
		$message .= "Content-Type: application/octet-stream; name=\"{$clean2['attachment_file2']}\"\n";
		$message .= "Content-Disposition: attachment; filename=\"{$clean2['attachment_file2']}\"\n";
		$message .= "Content-Transfer-Encoding: base64\n";
		$message .= "\n";
		$message .= chunk_split(base64_encode(file_get_contents(FILE_DIR2.$clean2['attachment_file2'])));
		$message .= "--__BOUNDARY__\n";
	}
  //$headers = "From: info@actest.work";

  if(mb_send_mail($to, $title, $message, $header, $pfrom))
  {
    echo "メール送信成功です-mu";
  }
  else
  {
    echo "メール送信失敗です-mu";
  }
 ?>

<!-- <?/*php wp_footer(); */?> -->
</body>
</html>