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
                <nav class="w-nav-menu" role="navigation">
                    <a class="nav-links w-nav-link" href="index.php">Mein Telefonbuch</a>
                    <a class="nav-links w-nav-link" href="vcard-upload.php">Kontakt hinzufügen +</a>
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
            </div>
        </div>
        <div class="container">
            <?php
            include("Helper/DatabaseHelper.php");

            $sql = "DELETE FROM kontakte WHERE id =$_GET[id]";

            if ($conn->query($sql) === TRUE) {
                echo "<strong>Kontakt wurde gelöscht</strong><br><br> ";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
            <div>
                <a href="index.php">Zurück Telefonbuch</a><br><br>
                <a href="vcard-upload.php">Visitenkarte scannen</a>
            </div>
        </div>
</main>
<footer class="footer">© <?php echo date('Y'); ?> Ein Projekt von Luisa, Eva, Andreas und Karsten</footer>

<!--Include Footer Scripts like Bootstrap-->
<?php include("Partials/FooterScripts.php");?>
</body>
</html>