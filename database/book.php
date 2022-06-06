<?php
require('connect.php');
require '../vendor/autoload.php';
define("SENDGRID_API_KEY", "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");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$location = $_POST['location'];
$theatre = $_POST['theatre'];
$seat = $_POST['nums'];
$snacks = $_POST['snacks'];
$amount = $_POST['amount'];
$moviename = $_POST['moviename'];
$price = $_POST['price'];
$query = "INSERT INTO `booking` (`id`, `fname`, `lastname`, `email`, `location`, `theatre`, `seat`, `snacks`, `amount`, `moviename`, `price`) 
VALUES (NULL, '$fname', '$lname', '$email', '$location', '$theatre', '$seat', '$snacks', '$amount', '$moviename', '$price') ";
if (mysqli_query($conn, $query)) {
} else {
    echo mysqli_error($conn);
}
$email = new \SendGrid\Mail\Mail();
$email->setFrom('no.reply.movieflix@gmail.com', 'MovieFlix');
$email->setSubject('Movie Receipt of ' . $_POST['moviename']);
$email->addTo($_POST['email'], $_POST['name']);
$email->addContent(
    "text/html",
    '<p>&nbsp; &nbsp; &nbsp; &nbsp;</p>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td align="center" bgcolor="#D2C7BA">
                    <table border="0" cellpadding="0" cellspacing="0" style="max-width: 600px;" width="100%">
                        <tbody>
                            <tr>
                                <td align="center" style="padding: 36px 24px;" valign="top">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#D2C7BA">
                    <table border="0" cellpadding="0" cellspacing="0" style="max-width: 600px;" width="100%">
                        <tbody>
                            <tr>
                                <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                                    <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Thank you for your order! ' . $_POST['fname'] . '</h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#D2C7BA">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<table border="0" cellpadding="0" cellspacing="0" style="max-width: 600px;" width="100%">
                        <tbody>
                            <tr>
                                <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                    <p style="margin: 0;">Here is a summary of your recent order. If you have any questions or concerns about your order, please <a href="https://movieflix2021.000webhostapp.com/contact.php">contact us</a>.</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="left" bgcolor="#D2C7BA" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="75%"><strong>&nbsp;' . $_POST['moviename'] . '</strong></td>
                                                <td align="left" bgcolor="#D2C7BA" style="padding: 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="25%"><strong>&nbsp;&nbsp;Details</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="75%">Location:</td>
                                                <td align="left" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="25%">' . $_POST['location'] . '</td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="75%">Theatre:</td>
                                                <td align="left" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="25%">' . $_POST['theatre'] . '</td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="75%">Seat Amount:</td>
                                                <td align="left" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="25%">' . $_POST['nums'] . '</td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="75%">' . $_POST['snacks'] . '</td>
                                                <td align="left" style="padding: 6px 12px;font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;" width="25%">' . $_POST['amount'] . '</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
            <td align="center" bgcolor="#D2C7BA">
                <table border="0" cellpadding="0" cellspacing="0" style="max-width: 600px;" width="100%">
                    <tbody>
                        <tr>
                            <td align="center" style="padding: 36px 24px;" valign="top">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>'
);
$sendgrid = new \SendGrid(SENDGRID_API_KEY);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
