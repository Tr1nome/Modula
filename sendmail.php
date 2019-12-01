<?php
$captchaSuccess = false;
// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdWZMUUAAAAALhF7voOJA3jWnwo0Q5uZuL_AM9E',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        ?>Veuillez confirmer que vous n'êtes pas un robot en cliquant sur le reCaptcha !
<?php    
} else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        //echo '<br><p>CAPTCHA was completed successfully!</p><br>';
        $captchaSuccess = true;
    }
} else { ?>
    

<?php } ?>

<?php
include 'requires/functions.php';
$rgpd=isset($_POST["rgpd"]) && !empty($_POST["rgpd"]) ? true : false;
$fname = $_POST["nom"];
$lname = $_POST["prenom"];
$mail = $_POST["email"];
$content = $_POST["message"];


$con = connexionDb();
$sql = "INSERT INTO contacts (fname,lname,mail,content,rgpd,ip) VALUES ('{$fname}','{$lname}','{$mail}','{$content}','{$rgpd}','127.0.0.1')";
if(!$rgpd) {
    echo('il est preferable de cocher la case');
}
if($con->query($sql) && $captchaSuccess == true){
    echo('Votre message a bien été envoyé !');
    
    
}
?>