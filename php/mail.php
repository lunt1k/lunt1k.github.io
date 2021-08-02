<?php
ini_set("SMTP","ssl://smtp.gmail.com");
ini_set("smtp_port","465");
$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

    $project_name = trim($_POST["project_name"]);
    $admin_email  = trim($_POST["admin_email"]);
    $form_subject = trim($_POST["form_subject"]);

    // $admin_email = "pi59_lmo@student.ztu.edu.ua";

    foreach ( $_POST as $key => $value ) {
        if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
            $message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
        }
    }
} else if ( $method === 'GET' ) {

    $project_name = trim($_GET["project_name"]);
    $admin_email  = trim($_GET["admin_email"]);
    $form_subject = trim($_GET["form_subject"]);

    foreach ( $_GET as $key => $value ) {
        if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
            $message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
        }
    }
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
    return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "Content-Type: text/html; charset=utf-8" . PHP_EOL .
$headers .= "From: EcoMebli@ukr.net\r\n";
$headers .= "Reply-To: hodakivskijmaks586@gmail.com\r\n";
$headers .= "Return-Path: hodakivskijmaks586@gmail.com\r\n";
$headers .= "CC: sombodyelse@example.com\r\n";
$headers .= "BCC: hidden@example.com\r\n";


// mail("meblivsem@.zt@gmail.com", adopt($form_subject), $message, $headers );
mail("pi59_lmo@student.ztu.edu.ua", adopt($form_subject), $message, $headers );
// mail("maks_88@meta.ua", adopt($form_subject), $message, $headers );



