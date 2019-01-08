<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulaire de contact - Version multi-champ</title>
<!-- call bootstrap -->
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="padding:50px 0 200px 0">
  <div style="padding-bottom:100px" class="container">
  <div class="row">
  <div class="col-md-12">
  <hr>
  <div class="alert alert-info"><b>INFOS:</b> Ce formulaire est une démo, le fonctionnement est complet mais le message n'arrivera nul part, les spammer peuvent passer leur chemin!</div>
  <hr>
  </div>
  </div>
  </div>
<!-- CONTENT -->
  <div class="container">
  <?php if(array_key_exists('errors',$_SESSION)): ?>
  <div class="alert alert-danger">
  <?= implode('<br>', $_SESSION['errors']); ?>
  </div>
  <?php endif; ?>
  <?php if(array_key_exists('success',$_SESSION)): ?>
  <div class="alert alert-success">
  <p>Votre email à bien été transmis !</p>
  </div>
  <?php endif; ?>
<form action="send_form.php" method="post" enctype="multipart/form-data">
  <div class="row">
<div class="col-md-6">
  <div class="form-group">
  <label for="inputname">Votre nom</label>
  <input type="text" name="name" class="form-control" id="inputname" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">
  </div><!--/*.form-group-->
  </div><!--/*.col-md-6-->
<div class="col-md-6">
  <div class="form-group">
  <label for="inputemail">Votre email</label>
  <input required type="email" name="email" class="form-control" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">
  </div><!--/*.form-group-->
  </div><!--/*.col-md-6-->
<div class="col-md-6">
  <div class="form-group">
  <label for="inputsubject">Sujet</label>
  <input type="text" name="subject" class="form-control" id="inputsubject" value="<?php echo isset($_SESSION['inputs']['subject'])? $_SESSION['inputs']['subject'] : ''; ?>">
  </div><!--/*.form-group-->
  </div><!--/*.col-md-6-->
<div class="col-md-6">
  <div class="form-group">
  <label for="inputservice">La demande concerne</label>
  <select class="form-control" name="service" id="inputservice">
  <option value=""></option>
  <option value="Un appareil electronique">Un appareil electronique</option>
  <option value="Les fruits et légumes">Les fruits et légumes</option>
  <option value="Un voyage de vacances">Un voyage de vacances</option>
  </select>
  </div><!--/*.form-group-->
  </div><!--/*.col-md-12-->
<div class="col-md-12">
  <div class="form-group">
  <label>Vous êtes</label>
  <div class="radio">
  <label>
  <input type="radio" name="optionsradios" id="optionsradios1" value="Vous êtes un developpeur en herbe qui souhaite apprendre à créer un formulaire">
  Vous êtes un developpeur en herbe qui souhaite apprendre à créer un formulaire
  </label>
  </div>
  <div class="radio">
  <label>
  <input type="radio" name="optionsradios" id="optionsradios2" value="Vous cherchez un code tout prêt car vous êtes quelqu'un de pressé">
  Vous cherchez un code tout prêt car vous êtes quelqu'un de pressé
  </label>
  </div>
  <div class="radio">
  <label>
  <input type="radio" name="optionsradios" id="optionsradios3" value="Vous etes agacé par mes questions sans intérêt  qui me servent juste à mettre du contenu dans ce formulaire :)">
  Vous etes agacé par mes questions sans intérêt  qui me servent juste à mettre du contenu dans ce formulaire :)
  </label>
  </div>
  </div><!--/*.form-group-->
  </div><!--/*.col-md-12-->
<div class="col-md-12">
  <div class="form-group">
  <label>Vous avez achetez ce produit pour <i>(plusieurs réponses possible)</i></label>
  <div class="checkbox">
  <label>
  <input name="multiselect[]" type="checkbox" value="Essayer car vous etes curieux">
  Essayer car vous etes curieux
  </label>
  </div>
  <div class="checkbox">
  <label>
  <input name="multiselect[]" type="checkbox" value="Car vous ne savez pas quoi faire de votre fortune">
  Car vous ne savez pas quoi faire de votre fortune
  </label>
  </div>
  <div class="checkbox">
  <label>
  <input name="multiselect[]" type="checkbox" value="C'est un achat compulsif">
  C'est un achat compulsif
  </label>
  </div>
  </div><!--/*.form-group-->
  </div><!--/*.col-md-12-->
<div class="col-md-12">
  <div class="form-group">
  <label for="inputfiles">Envoyer un fichier</label>
  
  <input type="file" name="upfiles" id="inputfiles">
  <p>Extensions autorisées:<i>.jpeg, .jpg, .png, .pdf</i></p>
  </div><!--/*.form-group-->
  </div><!--/*.col-md-12-->
<div class="col-md-12">
  <div class="form-group">
  <label for="inputmessage">Votre message</label>
  <textarea required id="inputmessage" name="message" class="form-control"><?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?></textarea>
  </div><!--/*.form-group-->
  </div><!--/*.col-md-12-->
<div class="col-md-12">
  <div class="checkbox">
  <label for="checkspam">
  <input type="checkbox" name="antispam" id="checkspam">Je suis un spammer et je l'assume!
  </label>
  </div>
  </div><!--/*.col-md-12-->
<div class="col-md-12">
  <button type='submit' class='btn btn-primary'>Envoyer</button>
  </div><!--/*.col-md-12-->
</div><!--/*.row-->
  </form>
</div><!--/*.container-->
  <!-- END CONTENT -->
</body>
  </html>
  <?php
unset($_SESSION['inputs']); // on nettoie les données précédentes
  unset($_SESSION['success']);
  unset($_SESSION['errors']);