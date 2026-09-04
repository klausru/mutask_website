<?php
/**
 * templates/footer.php — the site footer.
 * Included by templates/layout.php
 *
 * The copyright line at the bottom comes from SITE_FOOTER in config.php.
 */
?>
<footer>
    <div class="footer-funding">
        <ul>
        <li>
            <a href="https://www.chistera.eu/" target="_blank">
            <img class="footer-eu-logo"
             src="assets/imgs/chist-era-logo.svg"
             alt="Funded by the European Union withing the Horizon Europe scheme">
            </a>
        </li>
        <li>
            <a href="https://www.ncn.gov.pl/en" target="_blank">
            <img class="footer-eu-logo"
             src="/assets/imgs/ncn-logo.svg"
             alt="Co-funded by the National Science Center Poland">
            </a>
        </li>
        <li>
            <a href="https://anr.fr/en/" target="_blank">
            <img class="footer-eu-logo"
             src="/assets/imgs/ANR_logo.svg"
             alt="Co-funded by the Agence Nationale de la Recherche, France">
            </a>
        </li>
        <li>
            <a href="https://www.snf.ch/en" target="_blank">
            <img class="footer-eu-logo"
             src="/assets/imgs/snf_logo.svg"
             alt="Co-funded by the Swiss National Science Science Foundation">
            </a>
        </li>
        </ul>
        <p class="footer-funding-text">
          MUTASK is funded under CHIST-ERA Call 2025, Science in Your Own Language. <a href="https://www.chistera.eu/projects/mutask" target="_blank">CHIST-ERA Project ID: CHIST-ERA-25-SOL-06.</a><br />
          The Polish partner is funded by the National Science Centre, Poland, under grant <a href="https://ncn.gov.pl/sites/default/files/pliki/chistera2025-leszczuk-en.pdf" target="_blank">CN project number: 2025/07/Y/ST6/00133.</a><br />
        The French partner is funded by the Agence Nationale de la Recherche, ANR project number: ANR-25-CHR4-0001.<br />
          The Swiss partner is funded by the Swiss National Science Foundation (SNSF/FNS/SNF) <a href="https://data.snf.ch/grants/grant/238347" target="_blank">https://data.snf.ch/grants/grant/238347</a>.
        </p>
    </div>

    <div class="footer-logos">
     <ul>
         <li><a href="https://www.agh.edu.pl/en/" target="_blank"><img src="/assets/imgs/agh_logo.svg" alt="AGH logo"></a></li>
         <li><a href="https://www.univ-lorraine.fr/en/univ-lorraine/" target="_blank"><img src="/assets/imgs/Logo_Uni_Lorraine.svg" alt="LORIA logo"></a></li>
         <li><a href="https://phzh.ch/en/" target="_blank"><img src="/assets/imgs/PHZH_logo_ganz.svg" alt="Zurich University of Teacher Education (PH Zürich)"></a></li>
         <li><a href="https://www.fhnw.ch/en" target="_blank"><img src="/assets/imgs/fhnw-logo-de.svg" alt="University of Applied Sciences and Arts Northwestern Switzerland - FHNW"></a></li>
         <li><a href="https://clarin-ch.ch" target="_blank"><img src="/assets/imgs/CLARIN-CH-logo.png" alt="CLARIN-CH"></a></li>
     </ul>
    </div>

    <p class="footer-copyright"><?= htmlspecialchars(SITE_FOOTER) ?></p>
</footer>
