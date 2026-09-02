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
        <img class="footer-eu-logo"
             src="assets/imgs/chist-era-logo.svg"
             alt="Co-funded by the European Union">
        <p class="footer-funding-text">
          MUTASK is funded under CHIST-ERA Call 2025, Science in Your Own Language. CHIST-ERA Project ID: CHIST-ERA-25-SOL-06.<br />
          The Polish partner is funded by the National Science Centre, Poland, under grant 2025/07/Y/ST6/00133.<br />
          The Swiss partner is funded by the Swiss National Science Foundation (SNSF/FNS/SNF) <a href="https://data.snf.ch/grants/grant/238347" target="_blank">https://data.snf.ch/grants/grant/238347</a>.
        </p>
    </div>

    <div class="footer-logos">
     <ul>
         <li><img src="/assets/imgs/ncn-logo.svg" alt="Logo NCN"></li>
         <li><img src="/assets/imgs/PHZH_logo_ganz.svg" alt="Zurich University of Teacher Education (PH Zürich)"></li>
       <li><img src="/assets/imgs/fhnw-logo-de.svg" alt="University of Applied Sciences and Arts Northwestern Switzerland - FHNW"></li>
       <li><img src="/assets/imgs/CLARIN-CH-logo.png" alt="CLARIN-CH"></li>
         </ul>
    </div>

    <p class="footer-copyright"><?= htmlspecialchars(SITE_FOOTER) ?></p>
</footer>
