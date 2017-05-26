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
                    <a class="nav-links w-nav-link w--current" href="index.php">Mein Telefonbuch</a>
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
        <div class="row">
            <div class="col-md-8">
                <h1>Mein Telefonbuch</h1>
            </div>
        </div>

        <table id="table-kontakt" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style='display:none;'>ID</th>
                <th>Bild</th>
                <th style='display:none;'>Geschlecht</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th style='display:none;'>Firma</th>
                <th style='display:none;'>Straße & Nr.</th>
                <th style='display:none;'>PLZ</th>
                <th style='display:none;'>Ort</th>
                <th>Tel.</th>
                <th style='display:none;'>Fax</th>
                <th style="display:none;">Handy</th>
                <th>E-Mail</th>
                <th style="display:none;">Webseite</th>
                <th style='display:none;'>Hochladedatum</th>
                <th style='display:none;'>Notizen</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            include("Helper/DatabaseHelper.php");

            while ($row = $result->fetch_assoc()) {
//              Get Image from Database
                $imagePath = "<img src=uploads/" . $row["image"] . " height=\"auto\" width=\"70\">";

                echo "<tr><td style='display:none;'>" . $row["id"] . "</td>";
                echo "<td>$imagePath</td>";
                echo "<td style='display:none;'>" . $row["geschlecht"] . "</td>";
                echo "<td>" . $row["vorname"] . "</td>";
                echo "<td>" . $row["nachname"] . "</td>";
                echo "<td style='display:none;'>" . $row["firma"] . "</td>";
                echo "<td style='display:none;'>" . $row["strasse"] . "</td>";
                echo "<td style='display:none;'>" . $row["plz"] . "</td>";
                echo "<td style='display:none;'>" . $row["ort"] . "</td>";
                echo "<td>" . $row["telefonnummer"] . "</td>";
                echo "<td style='display:none;'>" . $row["faxnummer"] . "</td>";
                echo "<td style='display:none;'>" . $row["handy"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td style='display:none;'>" . $row["website"] . "</td>";
                echo "<td style='display:none;'>" . $row["datum"] . "</td>";
                echo "<td style='display:none;'>" . $row["notizen"] . "</td>";
                echo "<td style=\"text-align:center;\"><button class=\"btn btn-primary\" 
                                                                data-toggle=\"modal\" 
                                                                data-target=\"#myModal\" 
                                                                contenteditable=\"false\">Kontakt anzeigen & Bearbeiten</button>
                                 <button name=\"Submit2\" 
                                 type=\"button\" 
                                 class=\"btn btn-danger\" 
                                 onclick=\"javascript:location.href='delete-contact.php?id=$row[id]'\">Löschen</button></td></tr>";
            }
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
                                                                                   class="">×   </span><span
                            class="sr-only">Close</span>

                    </button>
                    <h4 class="modal-title" id="myModalLabel">Kontakt bearbeiten</h4>

                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                    <button type="button" class="btn btn-primary">Speichern</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<footer class="footer">© <?php echo date('Y'); ?> Ein Projekt von Luisa, Eva, Andreas und Karsten</footer>


<?php include("Partials/FooterScripts.php"); ?>
<script>
    $('#table-kontakt').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $(".btn[data-target='#myModal']").click(function () {
        var columnHeadings = $("thead th").map(function () {
            return $(this).text();
        }).get();
        columnHeadings.pop();
        var columnValues = $(this).parent().siblings().map(function () {
            return $(this).text();
        }).get();
        var modalBody = $('<div id="modalContent"></div>');
        var modalForm = $('<form role="form" name="modalForm" action="edit.php" method="post"></form>');
        $.each(columnHeadings, function (i, columnHeader) {
            var formGroup = $('<div class="form-group"></div>');
            formGroup.append('<label for="' + columnHeader + '">' + columnHeader + '</label>');
            formGroup.append('<input class="form-control" name="' + columnHeader + i + '" id="' + columnHeader + i + '" value="' + columnValues[i] + '" />');
            modalForm.append(formGroup);
        });
        modalBody.append(modalForm);
        $('.modal-body').html(modalBody);
    });
    $('.modal-footer .btn-primary').click(function () {
        $('form[name="modalForm"]').submit();
    });

</script>

</body>
</html>
