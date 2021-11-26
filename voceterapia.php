<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sessioni di voceterapia | Voceterapia</title>
    <meta charset="utf-8">
    <meta name="description" content=""/>
    <meta name="keywords" content="voceterpia, insegnate di voceterapia, elisa fortunati, verona, lezioni di canto, insegnante di canto, canto, logopedista, terapista, recitazione, dizione, riabilitazione, rieducazione, psicologa, balbuzie, tecnica vocale, postura, benessere, rilassamento, anti stress"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- MAIN CONTENT -->
    <h1>Sessioni di voceterapia</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="card-title">Modalità:</p>
                        </div>
                        <div class="col-lg-8">
                            <p class="card-text">In presenza oppure online</p>
                        </div>
                        <div class="col-lg-4">
                            <p class="card-title">Indicata per:</p>
                        </div>
                        <div class="col-lg-8">
                            <ul>
                                <li>attori, cantanti, insegnanti, avvocati, commessi, addetti alla reception, alle vendite e tutti coloro che facciano un uso professionale della voce</li>
                                <li>adulti e bambini con afonia, disfonia, disturbi del linguaggio, difficoltà di pronuncia, di comunicazione, di espressione, di utilizzo della voce in generale, disagio psichico (in affiancamento anche ad altri professionisti quali psicologi, educatori o logopedisti)</li>
                                <li>persone che intendano approfondire o migliorare la dizione, la recitazione, la pronuncia di determinati fonemi e la loro comunicazione verbale in genere</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <img src="images/Meditazione-Canto.jpeg" alt="" style="width: 15.5em;">
        </div>
    </div>
    <div>
        <p>Lavorare sulla propria voce vuol dire investire in primis sulla nostra capacità di relazionarci con gli altri e di veicolare il nostro messaggio in maniera chiara e distinta.
        Quindi vuol dire riappropriarci di un suono che, per qualche ragione, non ha la libertà e la spontaneità che vorremmo.
        A chi serve investire in questo percorso? 
        Sicuramente a chi sente di avere difficoltà di espressione, ha necessità di migliorare la propria comunicazione e la propria autostima.
        Sarà una grande scoperta ed emozione intraprendere questo viaggio meraviglioso all’interno di sé e scoprire un mondo di cui non si aveva coscienza né conoscenza.
        Conoscersi e riconoscere in noi i meccanismi che regolano la fonazione, la respirazione, la corretta postura e l’emissione vocale ci aiuterà a rendere questo processo sempre più consapevole.
        </p>
        <p>In questi anni il metodo vocale che ho perfezionato nel tempo grazie alla frequenza di diversi corsi e alla mia esperienza, è stato molto utile come attività di supporto, collaborazione e affiancamento ai percorsi di psicoterapia o logopedici, per adulti ma anche adolescenti che sentono in qualche modo di avere difficoltà nell’esprimersi come desiderano. 
        La voceterapia adotta approcci individualizzati, pensati quindi ad hoc per ogni esigenza.
        Chi ha seguito questo percorso ha raggiunto non solo il proprio obiettivo, ma anche una maggiore armonia psicofisica ed emotiva.
        Lavorare sulla propria voce è come fare del nostro dono naturale un piccolo miracolo artistico, così come ho imparato personalmente, dopo anni di esperienza “sul campo”, come cantante, allieva e insegnante.
        </p>
    </div>

    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/scrollToTop.js"></script>
</body>
</html>