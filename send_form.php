<?php
session_start();//on démarre la session
// $errors = [];

$errors = array(); // on crée une vérif de champs

if(!array_key_exists('forname', $_POST) || $_POST['forname'] == '') {// on verifie l'existence du champ et d'un contenu
    $errors ['forname'] = "vous n'avez pas renseigné votre prénom";
}

if(!array_key_exists('name', $_POST) || $_POST['name'] == '') {
    $errors ['name'] = "vous n'avez pas renseigné votre nom";
}

if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors ['mail'] = "vous n'avez pas renseigné votre email";
}

if(!array_key_exists('optionsradios_veggie', $_POST) || $_POST['optionsradios_veggie'] == '') {
    $errors ['optionsradios_veggie'] = "vous n'avez pas renseigné votre préférence alimentaire";
}

if(!array_key_exists('optionsradios_children', $_POST) || $_POST['optionsradios_children'] == '') {
    $errors ['optionsradios_children'] = "vous n'avez pas renseigné si vous veniez avec vos enfants ou non";
}

if(!array_key_exists('optionsradios_hotel', $_POST) || $_POST['optionsradios_hotel'] == '') {
    $errors ['optionsradios_hotel'] = "vous n'avez pas renseigné votre préférence concernant la nuit à l'hôtel";
}

if(array_key_exists('optionsradios_hotel', $_POST) && $_POST['person'] == '') {
    $errors ['person'] = "Merci de nous préciser le nombre de personnes concernant la réservation de votre chambre.";
}

//Multi checkbox
if(isset($_POST['multiselect_reason'])){
    $multiselect = array();
    foreach($_POST['multiselect_reason'] as $return_choice){
        $multiselect[] = $return_choice;
    }
        $multiselect = implode(' ; ', $multiselect);
}

if ($return_choice == 'autres' && $_POST['justification'] == '') {
    $errors ['autres'] = "Merci de justifier votre présence après avoir choisi l'option \"Autres\" :)";
}

//On check les infos transmises lors de la validation
if(!empty($errors)){ // si erreur on renvoie vers la page précédente
    $_SESSION['errors'] = $errors;//on stocke les erreurs
    $_SESSION['inputs'] = $_POST;
    header('Location: index.php');
} else {
    $_SESSION['success'] = 1;
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
    $to = 'maximeconan5@gmail.com';
    $subject = 'Message envoyé par ' . htmlspecialchars($_POST['forname']) . ' - ' . htmlspecialchars($_POST['name']) .' - ' . htmlspecialchars($_POST['email']);
    $message_content = '
<table>
    <tr>
        <td><b>Emetteur du message:</b></td>
    </tr>
    <tr>
        <td>'. $subject . '</td>
    </tr>
    <tr>
        <td>'. htmlspecialchars($_POST['service']) . '</td>
    </tr>
    <tr>
        <td><strong>Vous venez car :</strong></td>
    </tr>
    <tr>
        <td>' . htmlspecialchars($multiselect) . ' : ' . htmlspecialchars($_POST['justification']) .  '</td>
    </tr>
    <tr>
        <td><strong>Reponse concernant les végétariens:</strong></td>
    </tr>
    <tr>
        <td>'. htmlspecialchars($_POST['optionsradios_veggie']) . '</td>
    </tr>
    <tr>
    <td><strong>Reponse concernant les enfants:</strong></td>
    </tr>
    <tr>
        <td>'. htmlspecialchars($_POST['optionsradios_children']) . '</td>
    </tr>
    <tr>
    <td><strong>Reponse concernant l\'hôtel:</strong></td>
    </tr>
    <tr>
        <td>'. htmlspecialchars($_POST['optionsradios_hotel']) . ' pour ' . htmlspecialchars($_POST['person']) .  ' personnes</td>
    </tr>
</table>
';
    mail($to, $subject, $message_content, $headers);
    header('Location: index.php');
}