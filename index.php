<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />

    <link href="https://fonts.googleapis.com/css?family=Thasadith:400,400i,700,700i" rel="stylesheet">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>

    <section class="text-center background-img" style="background-image: url('images/Photo20-10-2018103700.JPG'); position: relative;">
        <div class="container text-light">
            <div class="row">
                <div class="col-lg-12 header-content">
                    <h1>Sabrina & Guillaume</h1>
                    <p>17 août 2019</p>
                </div>
            </div>
        </div>
    </section>

    <section class="background-red" style="padding-bottom: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-light text-center">
                    <h2>Si vous êtes arrivés là, c&#39;est que <strong>la moitié du chemin est parcouru</strong>. Vous savez donc que nous allons enfin nous marier (<em>oui, enfin !)</em></h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 shadow-lg p-0 mb-5 bg-white rounded" style="margin-top : -120px;">
                    <h3 class="p-5 text-center bg-light">Encore un petit effort, nous aimerions de ce fait savoir si :</h3>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            <?php
                                var_dump($_POST)
                            ?>
                                <?php if(array_key_exists('errors',$_SESSION)): ?>
                                    <div class="alert alert-danger">
                                    <?= implode('<br>', $_SESSION['errors']); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(array_key_exists('success',$_SESSION)): ?>
                                    <div class="alert alert-success">
                                    Votre email à bien été transmis !
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <form action="send_form.php" method="post" class="p-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Nous devons tout d'abord savoir qui vous êtes <i class="em em-smirk"></i> </p>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="forname" value="<?php echo isset($_SESSION['inputs']['forname'])? $_SESSION['inputs']['forname'] : ''; ?>" class="form-control" placeholder="Prénom" aria-label="prenom" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="name" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>" class="form-control" placeholder="Nom" aria-label="nom" aria-describedby="basic-addon1">
                            </div>

                            <div class="col-lg-12">
                                <input type="text" name="email" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>" class="form-control mt-4" placeholder="Adresse e-mail" aria-label="nom" aria-describedby="basic-addon1">
                            </div>

                            <hr> <!-- End - Coordonnées -->

                            <div class="col-lg-12">
                                <p>Vous serez parmi nous le 17 août : <i class="em em-calendar"></i></p>
                                <div class="form-check">
                                    <input name="multiselect_reason[]" class="form-check-input" type="checkbox" name="reason" value="parce que vous nous aimez bien" id="multiselect_reason_1">
                                    <label class="form-check-label" for="">parce que vous nous aimez bien</label>
                                </div>
                                <div class="form-check">
                                    <input name="multiselect_reason[]" class="form-check-input" type="checkbox" value="parce-que vous n&#39;aviez rien à faire ce jour là" id="multiselect_reason_2">
                                    <label class="form-check-label" for="">parce-que vous n&#39;aviez rien à faire ce jour là</label>
                                </div>
                                <div class="form-check">
                                    <input name="multiselect_reason[]" class="form-check-input" type="checkbox" value="parce que toute excuse est bonne pour faire la fête" id="multiselect_reason_3">
                                    <label class="form-check-label" for="">parce que toute excuse est bonne pour faire la fête</label>
                                </div>
                                <div class="form-check pb-4">
                                    <input name="multiselect_reason[]" class="form-check-input" type="checkbox" value="autres" id="multiselect_reason_4">
                                    <label class="form-check-label" for="">Autres ? <em>(justifier votre présence)</em></label>
                                </div>
                                <div class="col-lg-12 p-0">
                                    <input name="justification" value="<?php echo isset($_SESSION['inputs']['justification'])? $_SESSION['inputs']['justification'] : ''; ?>" type="text" class="form-control" placeholder="Justification" aria-label="justification" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <hr> <!-- End - Raison venue -->

                            <div class="col-lg-12">
                                <p>Comme vous avez décidé de vous joindre à nous, (et vous avez très bien fait) vous pouvez même nous préciser si vous avez décidé de sauver le règne animal ou pas, à savoir si vous mangez de la viande ou pas : <i class="em em-cow"></i></p>
                                <div class="form-check">
                                    <input required name="optionsradios_veggie" class="form-check-input" type="radio" value="Le règne animal je m’en fiche" id="optionsradios_veggie_1">
                                    <label class="form-check-label" for="">Le règne animal je m’en fiche</label>
                                </div>
                                <div class="form-check">
                                    <input name="optionsradios_veggie" class="form-check-input" type="radio" value="Vous n’avez pas plutôt de la mâche et du tofu ?" id="optionsradios_veggie_2">
                                    <label class="form-check-label" for="">Vous n’avez pas plutôt de la mâche et du tofu ?</label>
                                </div>
                            </div>

                            <hr> <!-- End - Veggie -->

                            <div class="col-lg-12">
                                <p>Certains d’entre vous ont eu à cœur de repeupler la planète, c’est pourquoi nous avons besoin de
                                        savoir si vous venez accompagner de vos minis vous ! <i class="em em-baby"></i></p>
                                <p>Jamais sans vos enfants, vous serez : </p>
                                <div class="form-check">
                                    <input required name="optionsradios_children" class="form-check-input" type="radio" value="+ 1" id="optionsradios_children_1">
                                    <label class="form-check-label" for="">+ 1</label>
                                </div>
                                <div class="form-check">
                                    <input name="optionsradios_children" class="form-check-input" type="radio" value="+ 2" id="optionsradios_children_2">
                                    <label class="form-check-label" for="">+ 2</label>
                                </div>
                                <div class="form-check">
                                    <input name="optionsradios_children" class="form-check-input" type="radio" value="+ 3" id="optionsradios_children_3">
                                    <label class="form-check-label" for="">+ 3</label>
                                </div>
                                <div class="form-check">
                                    <input name="optionsradios_children" class="form-check-input" type="radio" value="+ 4" id="optionsradios_children_4">
                                    <label class="form-check-label" for="">+ 4</label>
                                </div>
                                <p class="mt-3">Ou</p>
                                <div class="form-check">
                                    <input name="optionsradios_children" class="form-check-input" type="radio" value="Vous allez mettre à contribution papy &amp; mamy <em>(ou tata &amp; tonton)" id="optionsradios_children_5">
                                    <label class="form-check-label" for="">Vous allez mettre à contribution papy &amp; mamy <em>(ou tata &amp; tonton)</em></label>
                                </div>
                            </div>

                            <hr> <!-- End - Enfants -->

                            <div class="col-lg-12">
                                <p>Parce que nous sommes soucieux de votre permis et de vos points <em>(et de votre survie)</em> nous vous
                                proposons de pré-booker des chambres d’hôtels dans l’Ibis budget de Mante la Jolie <em>(60€ pour unechambre double)</em>. <i class="em em-bed"></i></p>
                                <div class="form-check">
                                    <input required name="optionsradios_hotel" class="form-check-input mt-3" type="radio" value="Très bonne idée, pré-réservez-nous une chambre" id="optionsradios_hotel_1">
                                    <label class="form-check-label" for="">Très bonne idée, pré-réservez-nous une chambre pour <input name="person" value="<?php echo isset($_SESSION['inputs']['persone'])? $_SESSION['inputs']['persone'] : ''; ?>" type="text" class="form-control nb-person" placeholder="X" aria-label="prenom" aria-describedby="basic-addon1">personnes</label>
                                </div>
                                <div class="form-check">
                                    <input name="optionsradios_hotel" class="form-check-input" type="radio" value="Non merci, je rentre à la maison !" id="optionsradios_hotel_2">
                                    <label class="form-check-label" for="">Non merci, je rentre à la maison !</label>
                                </div>
                                <p class="pt-4">Pour vous y rendre, une navette est mise à votre disposition durant toute la nuit ! <em>(et oui, on pense à tout !)</em></p>
                            </div>

                            <div class="col-lg-12">
                                <button type='submit' class='btn btn-primary btn-custom'>Envoyer mes réponses !</button>
                            </div>
                        </div>
                    </form>
                <div class="row m-0">
                    <div class="col-lg-12 p-5 text-center text-light background-red">
                        <h1>Un thème pour notre marriage ?</h1>
                        <p>Parce que nous ne sommes pas des gens chiants (non, Sabrina n’est pas chiante ce n’est pas vrai),<br>
                        nous n’imposons aucun thème. Malgré tout, la couleur dominante du mariage est le rouge.<br> 
                        N’hésitez donc pas à mettre une touche de rouge, ou un accessoire dans vos tenues.<br>
                        <em>(ne vous enflammez pas en sortant LA tenue totale red c’est pas une bonne idée).</em></p>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-12 p-5 text-center">
                        <h1>Afin de ne pas vous perdre, voici les adresses utiles :</h1>
                        <ul>
                            <li><strong>Mairie de Rueil Malmaison :</strong> 6 Rue Paul Vaillant Couturier, 92500 Rueil-Malmaison</li>
                            <li><strong>Parking à proximité : </strong>Indigo Médiathèque : 17 Boulevard du Maréchal Foch, 92500 Rueil-Malmaison <br><strong>&</strong> Indigo Hotel de ville : 13 Boulevard du Maréchal Foch, 92500 Rueil-Malmaison</li>
                            <li><strong>L’église</strong> se situe à 3mn à pied de la Mairie, suivez le mouvement !</li>
                            <li><strong>Domaine de Brunel :</strong> 22 sente Jean Brunel, 95510 Aincourt (Pensez à désactiver l’option péage de votre GPS !)</li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row pb-5">
                <div class="col-lg-12 text-center pt-5 pb-5">
                    <h1>Nos coordonnées</h1>
                </div>
                <div class="col-lg-6 text-center icon-red">
                    <i class="fas fa-home "></i>
                    <p>6B rue Jules Parent, <br>92 500 Rueil Malmaison</p>
                </div>
                <div class="col-lg-6 text-center icon-red">
                    <i class="fas fa-phone "></i>
                    <p>06.35.51.41.10, <br> 06.17.07.86.61</p>
                </div>
            </div>
        </div>
    </section>


    <main>

    </main>

    <footer class="bg-dark p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-light">
                    <p class="m-0">Mariage de Sabrina et Guillaume, le 17 août 2019</p>
                </div>
            </div>
        </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

<?php
    unset($_SESSION['inputs']); // on nettoie les données précédentes
    unset($_SESSION['success']);
    unset($_SESSION['errors']);
?>