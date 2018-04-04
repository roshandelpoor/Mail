<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Language" content="fa"/>
    <title> ارسال فرم آزمایشی</title>
    <style type="text/css">
        html, body {
            direction: rtl;
            font: .9em/1.6em tahoma;
        }
    </style>
</head>
<body>
<?php
//دریافت اطلاعات از فرم و ذخیره سازی در متغیرها
$name = $_POST['Name'];
$from = $_POST['E-Mail'];
$subject = $_POST['Subject'];
$message = $_POST['Message'];

// فراخوانی فایلهای PHPmailer
require("phpmailer/class.phpmailer.php");
include("phpmailer/class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;

// شروع قسمتی که باید ویرایش کنید
$mail->Host = "mail.YOURDomain.com";
$mail->Username = "YourMail@Domain.com";
$mail->Password = "Your EMail Password";
$mail->AddAddress('YourMail@example.com', "Your Name");

// پایان قسمتی که باید ویرایش کنید
$mail->SetFrom($from, $name);
$mail->AddReplyTo($from, $name);
$mail->Subject = $subject;
$mail->IsHTML(true);
$body = '<html><body>';
$body .= '<p style="direction:rtl;font-family:tahoma;">' . $message . '</p>';
$body .= "</body></html>";
$mail->MsgHTML($body);
$mail->AltBody = $message;

if (!$mail->Send()) {
    echo "خطا:پیام شما ارسال نشد » " . $mail->ErrorInfo;
} else {
    echo "پیام ارسال شد!";
}
?>
</body>
</html>

