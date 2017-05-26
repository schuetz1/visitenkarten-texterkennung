<!DOCTYPE html>
<html data-wf-page="584fb072e8610f05474f47da" data-wf-site="584fb072e8610f05474f47d9">
<head>
    <meta charset="utf-8">
    <title>Visitenkarten Tool</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <script src="js/modernizr.js" type="text/javascript"></script>
</head>
<body>
<header class="header">
    <div class="w-container">
        <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
            <div class="nav w-container">
                <a class="logo w-nav-brand" href="/"><img src="images/logo_LEAK.png">
                </a>
                <nav class="w-nav-menu" role="navigation"><a class="nav-links w-nav-link" href="index.php">Mein
                        Telefonbuch</a><a class="nav-links w-nav-link" href="vcard-upload.php">Kontakt hinzufügen +</a>
                </nav>
                <div class="w-nav-button">
                    <div class="w-icon-nav-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="w-container">
        <div class="w-row">
            <div class="w-col w-col-9">
                <h1>Kontakt erfolgreich gespeichert</h1>
            </div>
        </div>
        <div class="container">
            <?php
            include("Helper/DatabaseHelper.php");
            include("Helper/PostVariablesHelper.php");
            include("Helper/SavePicturesHelper.php");

            $sql = "INSERT INTO kontakte (vorname, nachname, image, geschlecht, firma, strasse, plz, ort, telefonnummer, faxnummer, handy, email, website, datum, notizen)
                    VALUES ('$vorname','$nachname','$image', '$geschlecht', '$firma', '$strasse', '$plz', '$ort', '$telefonnummer', '$faxnummer', '$handy', '$email', '$webseite', '$datum', '$notizen')";

            if ($conn->query($sql) === TRUE) {
                echo "<br><br><br><p>Die Visitenkarte mit dem Bildnamen  <strong>$image</strong> wurde gespeichert.</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
            <br><br>
            <div>
                <a href="index.php">Weiter zum Telefonbuch -></a><br><br>
                <a href="vcard-upload.php"><- Zurück und Visitenkarte scannen</a>
            </div>
        </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<footer class="footer">© <?php echo date('Y'); ?> Ein Projekt von Luisa, Eva, Andreas und Karsten</footer>

<!--Include Footer Scripts like Bootstrap-->
<?php include("Partials/FooterScripts.php"); ?>
</body>
</html>
