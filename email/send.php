<?php
include '../bd/bd.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$body = '<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DPelos</title>

    <style type="text/css">
        /* Take care of image borders and formatting, client hacks */
        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        table {
            border-collapse: collapse !important;
        }

        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .backgroundTable {
            margin: 0 auto;
            padding: 0;
            width: 100% !important;
        }

        table td {
            border-collapse: collapse;
        }

        .ExternalClass * {
            line-height: 115%;
        }

        .container-for-gmail-android {
            min-width: 600px;
        }


        /* General styling */
        * {
            font-family: Helvetica, Arial, sans-serif;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            margin: 0 !important;
            height: 100%;
            color: #676767;
        }

        td {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #777777;
            text-align: center;
            line-height: 21px;
        }

        a {
            color: #171941;
            font-weight: bold;
            text-decoration: none !important;
        }

        .pull-left {
            text-align: left;
        }

        .pull-right {
            text-align: right;
        }

        .header-lg,
        .header-md,
        .header-sm {
            font-size: 32px;
            font-weight: 700;
            line-height: normal;
            padding: 35px 0 0;
            color: #4d4d4d;
        }

        .header-md {
            font-size: 24px;
        }

        .header-sm {
            padding: 5px 0;
            font-size: 18px;
            line-height: 1.3;
        }

        .content-padding {
            padding: 20px 0 30px;
        }

        .mobile-header-padding-right {
            width: 290px;
            text-align: right;
            padding-left: 10px;
        }

        .mobile-header-padding-left {
            width: 290px;
            text-align: left;
            padding-left: 10px;
        }

        .free-text {
            width: 100% !important;
            padding: 10px 60px 0px;
        }

        .block-rounded {
            border-radius: 5px;
            border: 1px solid #e5e5e5;
            vertical-align: top;
        }

        .button {
            padding: 30px 0 0;
        }

        .info-block {
            padding: 0 20px;
            width: 260px;
        }

        .mini-block-container {
            padding: 30px 50px;
            width: 500px;
        }

        .mini-block {
            background-color: #ffffff;
            width: 498px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 45px 75px;
        }

        .block-rounded {
            width: 260px;
        }

        .info-img {
            width: 258px;
            border-radius: 5px 5px 0 0;
        }

        .force-width-img {
            width: 480px;
            height: 1px !important;
        }

        .force-width-full {
            width: 600px;
            height: 1px !important;
        }

        .user-img img {
            width: 130px;
            border-radius: 5px;
            border: 1px solid #cccccc;
        }

        .user-img {
            text-align: center;
            border-radius: 100px;
            color: #ff6f6f;
            font-weight: 700;
        }

        .user-msg {
            padding-top: 10px;
            font-size: 14px;
            text-align: center;
            font-style: italic;
        }

        .mini-img {
            padding: 5px;
            width: 140px;
        }

        .mini-img img {
            border-radius: 5px;
            width: 140px;
        }

        .force-width-gmail {
            min-width: 600px;
            height: 0px !important;
            line-height: 1px !important;
            font-size: 1px !important;
        }

        .mini-imgs {
            padding: 25px 0 30px;
        }

    </style>

    <style type="text/css" media="screen">
        @import url(http://fonts.googleapis.com/css?family=Oxygen:400,700);

    </style>

    <style type="text/css" media="screen">
        @media screen {

            /* Thanks Outlook 2013! */
            * {
                font-family: \'Oxygen\', \'Helvetica Neue\', \'Arial\', \'sans-serif\' !important;
            }
        }

    </style>

    <style type="text/css" media="only screen and (max-width: 480px)">
        /* Mobile styles */
        @media only screen and (max-width: 480px) {

            table[class*="container-for-gmail-android"] {
                min-width: 290px !important;
                width: 100% !important;
            }

            table[class="w320"] {
                width: 320px !important;
            }

            img[class="force-width-gmail"] {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
            }

            td[class*="mobile-header-padding-left"] {
                width: 160px !important;
                padding-left: 0 !important;
            }

            td[class*="mobile-header-padding-right"] {
                width: 160px !important;
                padding-right: 0 !important;
            }

            td[class="mobile-block"] {
                display: block !important;
            }

            td[class="mini-img"],
            td[class="mini-img"] img {
                width: 150px !important;
            }

            td[class="header-lg"] {
                font-size: 24px !important;
                padding-bottom: 5px !important;
            }

            td[class="header-md"] {
                font-size: 18px !important;
                padding-bottom: 5px !important;
            }

            td[class="content-padding"] {
                padding: 5px 0 30px !important;
            }

            td[class="button"] {
                padding: 5px !important;
            }

            td[class*="free-text"] {
                padding: 10px 18px 30px !important;
            }

            img[class="force-width-img"],
            img[class="force-width-full"] {
                display: none !important;
            }

            td[class="info-block"] {
                display: block !important;
                width: 280px !important;
                padding-bottom: 40px !important;
            }

            td[class="info-img"],
            img[class="info-img"] {
                width: 278px !important;
            }

            td[class="mini-block-container"] {
                padding: 8px 20px !important;
                width: 280px !important;
            }

            td[class="mini-block"] {
                padding: 20px !important;
            }

            td[class="user-img"] {
                display: block !important;
                text-align: center !important;
                width: 100% !important;
                padding-bottom: 10px;
            }

            td[class="user-msg"] {
                display: block !important;
                padding-bottom: 20px;
            }
        }

    </style>
</head>

<body bgcolor="#f7f7f7">
    <table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
        <tr>
            <td align="left" valign="top" width="100%" style="background:repeat-x url(http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg) #ffffff;">
                <center>
                    <img src="http://s3.amazonaws.com/swu-filepicker/SBb2fQPrQ5ezxmqUTgCr_transparent.png" class="force-width-gmail">
                    <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" background="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" style="background-color:transparent">
                        <tr>
                            <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">
                                <!--[if gte mso 9]>
            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:80px; v-text-anchor:middle;">
              <v:fill type="tile" src="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" color="#ffffff" />
              <v:textbox inset="0,0,0,0">
            <![endif]-->
                                <center>
                                    <table cellpadding="0" cellspacing="0" width="600" class="w320">
                                        <tr>
                                            <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;">
                                                <h2><a href="https://www.dev-social.com">D\'PeloStudio</a></h2>
                                            </td>
                                            <td class="pull-right mobile-header-padding-right" style="color: #4d4d4d;">
                                                <a href=""><img width="44" height="47" src="http://s3.amazonaws.com/swu-filepicker/k8D8A7SLRuetZspHxsJk_social_08.gif" alt="twitter" /></a>
                                                <a href=""><img width="38" height="47" src="http://s3.amazonaws.com/swu-filepicker/LMPMj7JSRoCWypAvzaN3_social_09.gif" alt="facebook" /></a>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                                <!--[if gte mso 9]>
              </v:textbox>
            </v:rect>
            <![endif]-->
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
                <center>
                    <table cellspacing="0" cellpadding="0" width="600" class="w320">
                        <tr>
                            <td class="header-lg">
                                Recuerda que tienes una cita hoy!
                            </td>
                        </tr>
                        <tr>
                            <td class="mini-block-container">
                                <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                    <tr>
                                        <td class="mini-block">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0" width="100%">
                                                            <tr>
                                                                <td class="user-img">
                                                                    <a href=""><img class="user-img" src="https://cdn.pixabay.com/photo/2017/09/25/13/12/dog-2785074_960_720.jpg" alt="user img" /></a>
                                                                    <br /><a href="">@JaneDoe</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="user-msg">
                                                                    D\'Pelo Studio te recuerda que tienes una cita programada con una de nuestras veterinarias, ingresa a tu cuenta para verificar más detalles.
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="button">
                                                        <div>
                                                            <!--[if mso]>
                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#ff6f6f">
                              <w:anchorlock/>
                              <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">Sign Up</center>
                            </v:roundrect>
                          <![endif]--><a href="https://www.dev-social.com" style="background-color:#171941;border-radius:5px;color:#ffffff;display:inline-block;font-family:\'Cabin\', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Ingresar</a></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>

        <tr>
            <td align="center" valign="top" width="100%" style="background-color: #f7f7f7; height: 100px;">
                <center>
                    <table cellspacing="0" cellpadding="0" width="600" class="w320">
                        <tr>
                            <td style="padding: 25px 0 25px">
                                <strong>D\'Pelo Studio</strong><br />
                                San Salvador <br />
                                El Salvador <br /><br />
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>
</body>

</html>
';

$mail->isSMTP(true);
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->isHTML();
$mail->Username = "dpelostudio@gmail.com";
$mail->Password = "qw3rty1*";
$mail->Subject = "DPelos Te Recuerda De Tu Cita!";
$mail->setFrom("dpelostudio@gmail.com","DPelos");
$mail->Body = $body;

$result = mysqli_query($conn, 'SELECT id_cita, nombre, apellido, email, email_nuevascitas, email_nuevoscomentarios 
FROM citas AS c
INNER JOIN usuario AS u
ON c.id_usuario = u.id_usuario
INNER JOIN config_empresa AS ce
ON ce.id_usuario = c.id_usuario
WHERE estado = "Confirmada" AND fecha = curdate() AND email_nuevascitas = "Si";');

foreach ($result as $row) {
    try {
        $mail->addAddress($row['email']);
    } catch (Exception $e) {
        echo 'Invalid address skipped: ' . htmlspecialchars($row['email']) . '<br>';
        continue;
    }

    try {
        $mail->send();
        echo 'Message sent to :' . htmlspecialchars($row['full_name']) . ' (' . htmlspecialchars($row['email']) . ')<br>';
        //Mark it as sent in the DB
    } catch (Exception $e) {
        echo 'Mailer Error (' . htmlspecialchars($row['email']) . ') ' . $mail->ErrorInfo . '<br>';
        //Reset the connection to abort sending this message
        //The loop will continue trying to send to the rest of the list
        $mail->smtp->reset();
    }
    //Clear all addresses and attachments for the next iteration
    $mail->clearAddresses();
    $mail->clearAttachments();
}

?>