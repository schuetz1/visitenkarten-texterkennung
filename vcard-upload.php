<!DOCTYPE html>
<html data-wf-page="584fb072e8610f05474f47da" data-wf-site="584fb072e8610f05474f47d9">
<head>
    <meta charset="utf-8">
    <title>Visitenkarten Tool</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/evas-dapper-site-07b6d3.webflow.css" rel="stylesheet" type="text/css">
    <script src="js/modernizr.js" type="text/javascript"></script>
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body>
<header class="header">
    <div class="w-container">
        <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
            <div class="nav w-container">
                <a class="logo w-nav-brand" href="/"><img src="images/logo_LEAK.png">
                </a>
                <nav class="w-nav-menu" role="navigation"><a class="nav-links w-nav-link" href="index.php">Mein Telefonbuch</a><a class="nav-links w-nav-link" href="vcard-upload.php">Kontakt hinzufügen +</a>
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
                <h1>Visitenkarte hochladen</h1>
            </div>
        </div>
        <script src="js/tesseract.js"></script>

        <!-- Das Skript wurde ergänzt-->
        <script>
            var arrayResult;
            function recognizeFile(file) {
                Tesseract.recognize(file, {
                            lang: document.querySelector('#langsel').value
                        })
                        .then(function (result) {
                            console.log(result);
                            var i;
                            for (i = 0; i < result['lines'].length; result['lines'][i++]['text']) {
                                if (i === 0){
                                    document.getElementById('vorname').value = result['lines'][0]['words'][0]['text'];
                                    document.getElementById('nachname').value = result['lines'][0]['words'][1]['text'];
                                }
                                else if(result['lines'][i]['text'].includes("@")){
                                    var z = result['lines'][i]['text'].split(':');
                                    document.getElementById('email').value = z[1];
                                }
                                else if (result['lines'][i]['text'].includes("www")){
                                    document.getElementById('website').value = result['lines'][i]['text'];
                                }
                                else if (result['lines'][i]['text'].includes("GmbH",'Co.KG','KG')){
                                    document.getElementById('firma').value=result['lines'][i]['text'];

                                }
                                else if (result['lines'][i]['text'].includes('Handy')){
                                    var m = result['lines'][i]['text'].split(':');
                                    document.getElementById('handy').value= m[1];

                                }

                                else if (result['lines'][i]['text'].includes("Tel")){
                                    var x = result['lines'][i]['text'].split(':');
                                    document.getElementById('telefonnummer').value=x[1];
                                }
                                else if (result['lines'][i]['text'].includes("Fax")){
                                    var y = result['lines'][i]['text'].split(':');
                                    document.getElementById('fax').value=y[1];
                                } else if (Boolean(result['lines'][i]['text'].match(/\b\d{5}\s/g)) == true) {
                                  document.getElementById('plz').value = result['lines'][i]['text'].match(/\b\d{5}/g);
                                }

                                $('#plz').bind('mouseenter change', function(e) {
                                  if ($(this).val().length > 4) {
                                    var ort = $('#stadt');
                                    $.getJSON('http://www.geonames.org/postalCodeLookupJSON?&country=DE&callback=?', {postalcode: this.value }, function(response) {
                                      if (response && response.postalcodes.length && response.postalcodes[0].placeName) {
                                        ort.val(response.postalcodes[0].placeName);
                                      }
                                    })
                                  } else {
                                    $('#stadt').val('');
                                  }
                                });
                            }
                        })
            }
        </script>
        <!-- Ende der Änderung -->
        <div class="w-form">
            <form action="update.php" method="post" enctype="multipart/form-data">
                <label for="exampleInputFile">Sprache wählen</label>
                <select id="langsel" name="language">
                    <option value='afr'> Afrikaans</option>
                    <option value='ara'> Arabic</option>
                    <option value='aze'> Azerbaijani</option>
                    <option value='bel'> Belarusian</option>
                    <option value='ben'> Bengali</option>
                    <option value='bul'> Bulgarian</option>
                    <option value='cat'> Catalan</option>
                    <option value='ces'> Czech</option>
                    <option value='chi_sim'> Chinese</option>
                    <option value='chi_tra'> Traditional Chinese</option>
                    <option value='chr'> Cherokee</option>
                    <option value='dan'> Danish</option>
                    <option value='deu' selected> Deutsch</option>
                    <option value='ell'> Greek</option>
                    <option value='eng'> English</option>
                    <option value='enm'> English (Old)</option>
                    <option value='meme'> Internet Meme</option>
                    <option value='epo'> Esperanto</option>
                    <option value='epo_alt'> Esperanto alternative</option>
                    <option value='equ'> Math</option>
                    <option value='est'> Estonian</option>
                    <option value='eus'> Basque</option>
                    <option value='fin'> Finnish</option>
                    <option value='fra'> French</option>
                    <option value='frk'> Frankish</option>
                    <option value='frm'> French (Old)</option>
                    <option value='glg'> Galician</option>
                    <option value='grc'> Ancient Greek</option>
                    <option value='heb'> Hebrew</option>
                    <option value='hin'> Hindi</option>
                    <option value='hrv'> Croatian</option>
                    <option value='hun'> Hungarian</option>
                    <option value='ind'> Indonesian</option>
                    <option value='isl'> Icelandic</option>
                    <option value='ita'> Italian</option>
                    <option value='ita_old'> Italian (Old)</option>
                    <option value='jpn'> Japanese</option>
                    <option value='kan'> Kannada</option>
                    <option value='kor'> Korean</option>
                    <option value='lav'> Latvian</option>
                    <option value='lit'> Lithuanian</option>
                    <option value='mal'> Malayalam</option>
                    <option value='mkd'> Macedonian</option>
                    <option value='mlt'> Maltese</option>
                    <option value='msa'> Malay</option>
                    <option value='nld'> Dutch</option>
                    <option value='nor'> Norwegian</option>
                    <option value='pol'> Polish</option>
                    <option value='por'> Portuguese</option>
                    <option value='ron'> Romanian</option>
                    <option value='rus'> Russian</option>
                    <option value='slk'> Slovakian</option>
                    <option value='slv'> Slovenian</option>
                    <option value='spa'> Spanish</option>
                    <option value='spa_old'> Old Spanish</option>
                    <option value='sqi'> Albanian</option>
                    <option value='srp'> Serbian (Latin)</option>
                    <option value='swa'> Swahili</option>
                    <option value='swe'> Swedish</option>
                    <option value='tam'> Tamil</option>
                    <option value='tel'> Telugu</option>
                    <option value='tgl'> Tagalog</option>
                    <option value='tha'> Thai</option>
                    <option value='tur'> Turkish</option>
                    <option value='ukr'> Ukrainian</option>
                    <option value='vie'> Vietnamese</option>
                </select>

                <div class="form-group">
                    <input type="file"
                           id="imageUpload"
                           name="imageUpload"
                           onchange="recognizeFile(window.lastFile=this.files[0])">
                </div>
                <div><p id="upload"></p></div>
                <label for="geschlecht">Geschlecht</label>
                <select name="geschlecht" class="form-control">
                    <option value='Herr'>Herr</option>
                    <option value='Frau'>Frau</option>
                </select>

                <div class="form-group">
                    <label for="vorname">Vorname</label>
                    <input type="text"
                           class="form-control"
                           id="vorname"
                           name="vorname"
                           placeholder="Vorname">
                </div>
                <div class="form-group">
                    <label for="nachname">Nachname</label>
                    <input type="text"
                           class="form-control"
                           id="nachname"
                           name="nachname"
                           placeholder="Nachname">
                </div>
                <div class="form-group">
                    <label for="firma">Firma</label>
                    <input type="text"
                           class="form-control"
                           id="firma"
                           name="firma"
                           placeholder="Firmen Name">
                </div>
                <div class="form-group">
                    <label for="strasse">Straße & Hausnummer</label>
                    <input type="text"
                           class="form-control"
                           id="strasse"
                           name="strasse"
                           placeholder="Musterstraße 1">
                </div>

                <!-- Ein Feld für PLZ und ein Feld für die Stadt eingefügt -->
                <div class="form-group">
                    <label for="plz">PLZ & Ort</label>
                    <input type="text"
                           class="form-control"
                           id="plz"
                           name="plz"
                           placeholder="75365 ">
                    <input type="text"
                           class="form-control"
                           id="stadt"
                           name="ort"
                           placeholder="Musterstadt">
                </div>
                <!-- Ende der Änderung -->
                <div class="form-group">
                    <label for="telefonnummer">Telefonnummer</label>
                    <input type="text"
                           class="form-control"
                           id="telefonnummer"
                           name="telefonnummer"
                           placeholder="0705170480">
                </div>
                <div class="form-group">
                    <label for="fax">Faxnummer</label>
                    <input type="text"
                           class="form-control"
                           id="fax"
                           name="faxnummer"
                           placeholder="01511774577">
                </div>
                <div class="form-group">
                    <label for="handy">Handynummer</label>
                    <input type="text"
                           class="form-control"
                           id="handy"
                           name="handy"
                           placeholder="015117745444">
                </div>
                <div class="form-group">
                    <label for="email">Email Adresse</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="website">Webseite</label>
                    <input type="text"
                           class="form-control"
                           id="website"
                           name="website"
                           placeholder="examlpe@text.de">
                </div>
                <div class="form-group">
                    <label for="datum">Datum</label>
                    <input type="datum"
                           class="form-control"
                           id="datum"
                           name="datum"
                           value="<?php echo date('d.m.Y')?>">

                </div>
                <div class="form-group">
                    <label for="notizen">Notizen</label>
            <textarea class="form-control"
                      id="notizen"
                      name="notizen"
                      rows="3"></textarea>
                </div>
                <button type="submit" name="formSubmit" class="btn btn-default">In die Datenbank speichern</button>
            </form>

            <div class="row">
                <div class="col-md-8">
                    <div id="visitenkarten-text"></div>
                </div>
            </div>
        </div>
    </div>
</main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
<div class="footer">© <?php echo date('Y');?> Ein Projekt von Luisa, Eva, Andreas und Karsten</div>

<?php include("Partials/FooterScripts.php");?>
</body>
</html>
