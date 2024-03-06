<?php
declare(strict_types=1);

date_default_timezone_set('Europe/Berlin');
setlocale(LC_ALL, 'de_DE.utf8');
setlocale(LC_TIME, 'de_DE.UTF-8');
//setlocale(LC_ALL, ['de_DE.UTF-8', 'de-DE.UTF-8', 'de.UTF-8', 'de_DE', 'de-DE', 'de', 'ge']);

if (is_file(__DIR__ . '/vendor/autoload.php')) {
  $loader = require __DIR__ . '/vendor/autoload.php';
} else {
  die('The main autoloader not found! Did you forget to run "composer install"?');
}

$uri = $_SERVER['REQUEST_URI'] ?? '';
$dateTime = new DateTime();

?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- head_xmlarea :: XML-Namensraum -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <!-- head_title :: Titel der Seite -->
  <title>net-idea Webagentur :: Startseite</title>
  <!-- head_meta :: begin :: Meta-Angaben -->
  <!-- head_meta_main :: begin :: verbreitetste Meta-Angaben -->
  <meta name="description"
        content="net-idea ist Ihre führende Webagentur für professionelles Entwicklung und digitales Marketing. Wir schaffen beeindruckende Online-Präsenzen, optimieren Ihre Sichtbarkeit und setzen innovative Technologien ein, um Ihren digitalen Erfolg zu gewährleisten."/>
  <meta name="author" content="Adam Ibrom"/>
  <meta name="keywords" content="net-idea,net idea,Agentur,Internet,Entwicklung,Planung,Beratung,Beratung,Software,Design"/>
  <!-- head_meta_main :: end -->
  <!-- head_meta_document :: begin :: grundsätzliche Meta-Angaben zum Dokument -->
  <meta name="language" content="de"/>
  <meta name="resource-type" content="document"/>
  <meta name="generator" content="net-idea"/>
  <!-- head_meta_document :: end -->
  <meta name="google-site-verification" content="H7ouZvrktN5SSHHrhch_UmwxSPV-eWfRUiCcTJlhhlA"/>
  <!-- head_meta :: end :: Meta-Angaben -->
  <!-- head_favicon :: begin :: Link zum Favicon -->
  <link rel="shortcut icon" href="favicon.ico"/>
  <link type="image/gif" rel="icon" href="favicon.gif"/>
  <!-- head_favicon :: end -->
  <!-- head_style :: begin -->
  <!-- head_style_external :: begin :: Links zu externen Stylesheets -->
  <!-- head_style_external :: end -->
  <!-- head_style_internal :: begin :: eingebundene Stylesheets -->
  <link type="text/css" rel="stylesheet" href="assets/css/reset.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/master.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/grids.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/grid-headline.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/grid-middle.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/grid-footer.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/view-headline.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/view-middle.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/view-footer.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/box-white.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/global.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/forms.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/tables.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/navigation.css"/>
  <link type="text/css" rel="stylesheet" href="assets/css/layover-minimal.css"/>
  <!-- head_style_internal :: end -->
  <!-- head_style :: end -->
  <!-- head_script :: begin :: Scripte -->
  <!-- head_script_external :: begin :: Links zu externen Scripten -->
  <!-- head_script_external :: end -->
  <!-- head_script_internal :: begin :: eingebundene Scripte -->
  <script type="text/javascript">
    /* <![CDATA[ */
    const serverDateTime = new Date(<?= $dateTime->format('Y, n, j, G, i, s') ?>);

    function clock() {
      if (!document.all && !document.getElementById) {
        return;
      }

      let hours = serverDateTime.getHours();
      let minutes = serverDateTime.getMinutes();
      let seconds = serverDateTime.getSeconds();
      serverDateTime.setSeconds(seconds + 1);

      if (hours <= 9) {
        hours = "0" + hours;
      }

      if (minutes <= 9) {
        minutes = "0" + minutes;
      }

      if (seconds <= 9) {
        seconds = "0" + seconds;
      }

      const time_display = hours + ":" + minutes + ":" + seconds;

      if (document.getElementById) {
        document.getElementById("time").innerHTML = time_display
      } else if (document.all) {
        time.innerHTML = time_display;
      }

      setTimeout("clock()", 1000);
    }

    /* ]]> */
  </script>
  <!-- head_script_internal :: end :: eingebundene Scripte -->
  <!-- head_script :: end -->
</head>
<!-- head :: end -->
<!-- body :: begin -->
<body id="net-idea" onload="clock();">
<!-- headline :: begin -->
<div id="headline">
  <div class="headline">
    <!-- headline :: begin -->
    <div class="logo"><a href="/"><h1>net-idea WebAgentur</h1></a></div>
    <div class="navigation">
      <ul>
        <li><a href="/" class="home">Home</a></li>
        <li><a href="/beratung">Beratung</a></li>
        <li><a href="/management">Projectmanagment</a></li>
        <li><a href="/design">Design</a></li>
        <li><a href="/entwicklung">Entwicklung</a></li>
        <li><a href="/hosting">Hosting</a></li>
        <li><a href="/service">Service</a></li>
      </ul>
    </div>
    <div class="spezial">
      <?php

      $weekdayNames = ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'];
      $weekdayName = $weekdayNames[$dateTime->format('w')];

      $monthNames = ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];
      $monthName = $monthNames[$dateTime->format('n') - 1];

      //echo $dateTime->format('l, j. F Y');

      ?>
      <?= $weekdayName ?><span class="darker">,</span> <?= "{$dateTime->format('j.')} {$monthName} {$dateTime->format('Y')}" ?> <span class="darker">um</span> <span id="time"><?= $dateTime->format('H:i:s') ?></span> <span class="darker"><em>Uhr</em> im</span> <?= ceil($dateTime->format('n') / 3) /* floor(($time->format('n') - 1) / 3) + 1 */   ?>. <span class="darker"><em>Quartal</em> </span> <?= $dateTime->format('W') ?>. <span class="darker"><em>Kalenderwoche</em> im <em>Sternzeichen</em></span> <?= ZodiacSign($dateTime); ?>
    </div>
    <!-- headline :: end -->
  </div>
</div>
<!-- headline :: end -->
<!-- middle :: begin -->
<div id="middle">
  <div class="middle container_12 clearfix"><?php

    if (file_exists(__DIR__ . "/sites/content/{$uri}.php")) {
      require __DIR__ . "/sites/content/{$uri}.php";
    } else {
      require __DIR__ . '/sites/content/index.php';
    }

    ?>
    <!-- box :: begin -->
    <div class="box_white grid_12_half p" style="">
      <div class="box_white_top_left">
        <div class="box_white_top_right">
          <div class="box_white_top"></div>
        </div>
      </div>
      <div class="box_white_body_left">
        <div class="box_white_body_right">
          <div class="box_white_body clearfix" style="">
            <!-- box_body_content :: begin -->
            <p class="head17">Wir konnten Ihr Interesse wecken? Dann zögern Sie nicht und lernen uns kennen!</p>
            <div class="indentl_4">
              <p class="text14">
                Rufen Sie uns an: <strong>+49 (0)2133 / 22 55 868</strong> oder mobil: <strong>+49 (0)157 / 71 67 13 53</strong><br/>
                Schreiben Sie uns an: <strong><script type="text/javascript">eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%27%3c%61%20%68%72%65%66%3d%22%6d%61%69%6c%74%6f%3a%6d%61%69%6c%40%6e%65%74%2d%69%2e%64%65%22%20%63%6c%61%73%73%3d%22%65%6d%61%69%6c%22%3e%6d%61%69%6c%40%6e%65%74%2d%69%2e%64%65%3c%2f%61%3e%27%29%3b'))</script></strong> oder nutzen Sie unser <strong><a href="/contact" class="internal">Kontaktformular</a></strong>.
              </p>
            </div>
            <!-- box_body_content :: end -->
          </div>
        </div>
      </div>
      <!-- box_body :: end -->
      <!-- box_bottom :: begin -->
      <div class="box_white_bottom_left">
        <div class="box_white_bottom_right">
          <div class="box_white_bottom"></div>
        </div>
      </div>
      <!-- box_bottom :: end -->
    </div>
    <!-- box :: end -->
  </div>
</div>
<!-- middle :: end -->
<!-- footer :: begin -->
<div id="footer">
  <div class="footer">
    <ul>
      <li><span class="text">Copyright &copy; <?= date('Y') ?> <a href="/" onclick="window.open('https://net-i.de'); return false;" class="external">net-i.de</a></span></li>
      <li><a href="/contact" rel="nofollow" class="internal">Kontakt</a></li>
      <li><a href="/impressum" rel="nofollow" class="internal">Impressum</a></li>
    </ul>
  </div>
</div>
<!-- footer :: end -->
</body>
<!-- body :: end -->
</html>
