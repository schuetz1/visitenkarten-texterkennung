<!DOCTYPE html>
<html data-wf-page="584fb072e8610f05474f47da" data-wf-site="584fb072e8610f05474f47d9">
<head>
    <meta charset="utf-8">
    <title>Visitenkarten Tool</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
</head>
<body>
<header class="header">
    <div class="w-container">
        <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
            <div class="nav w-container">
                <a class="logo w-nav-brand" href="/"><img src="images/logo.png">
                </a>
                <nav class="w-nav-menu" role="navigation">
                    <a class="nav-links w-nav-link" href="/">Telefonbuch</a>
                    <a class="nav-links w-nav-link" href="vcard-upload.php">Visitenkarte scannen</a>
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
        <div class="row">
            <div class="col-md-8">
                <h1>Telefonbuch Kontakte</h1>
            </div>
        </div>


        <table id="example" class="table table-hover" width="100%">
            <thead>
            <tr>
                <th>Bild</th>
                <th>Vorname</th>
                <th>Nachname</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include("Helper/DatabaseHelper.php");

            while ($row = $result->fetch_assoc()) {

//                Get Image from Database and save to
//                $imagePath = "<img src=uploads/" . $row["image"] . " height=\"auto\" width=\"70\">";
//                echo "<tr>" . $imagePath . "";

                echo "<td><td>" . $row["vorname"] . "</td>";
                echo "<td>" . $row["nachname"] . "</td></tr>";
            }
            
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</main>

<div class="footer">© <?php echo date('Y'); ?> Ein Projekt von Luisa, Eva, Andreas und Karsten</div>



<?php include("Partials/FooterScripts.php");?>
<script>
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>

</body>
</html>