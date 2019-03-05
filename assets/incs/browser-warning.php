<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$WebsiteDetails = new WebsiteDetails();
$browser_warning = <<<BROWSER_WARNING
<div class="grid-tools FullSite">
    <div class="container">
        <div class="container-wrapper">
            <div class="container-full-column">
                <div class="unsupported-browser">

                    <h1>Please upgrade your browser in order to use {$WebsiteDetails->SiteName}</h1>
                    <p>We built {$WebsiteDetails->SiteName} using the latest technology which improves the look of the site, increases the speed of the site, and gives you a better experience with new features and functions. Unfortunately, your browser does not support these technologies.</p>
                    <h2>Please download one of these free and up-to-date browsers:</h2>

                    <span class="browser-links"><img  src="{$WebsiteDetails->IMG_FOLDER}firefox.png" class="img-responsive browsers" /><span class="browser-names">Firefox</span></span>
                    <span class="browser-links" ><img src="{$WebsiteDetails->IMG_FOLDER}google-chrome.png" class="img-responsive browsers" /><span class="browser-names">Google Chrome</span></span>
                    <span class="browser-links" ><img src="{$WebsiteDetails->IMG_FOLDER}edge.png" class="img-responsive browsers " /><span class="browser-names" id="edge-browser-name">Microsoft Edge</span></span>
                    <span class="browser-links" ><img src="{$WebsiteDetails->IMG_FOLDER}brave.png" class="img-responsive browsers" /><span class="browser-names">Brave Browser</span></span>
                    <hr>
                    <div class="unsupported-message">
                        <h3>I can't update my browser</h3>
                        <ul>
                            <li>Ask your system administrator to update your browser if you cannot install updates yourself.</li>
                            <li>If you can't change your browser because of compatibility issues, think about installing a second browser for utilization of this site and keep the old one for compatibility.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

BROWSER_WARNING;

echo  $browser_warning; ?>
