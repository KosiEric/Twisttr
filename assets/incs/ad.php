<div class="banner-example" id="footer-banner">
    <div id="banner">
        <div class="active bannerItem">
            <span class="banner-header display-1">NOTICE!!</span>
            <div class="banner-text">
            <?php if(($HomePage->WebsiteDetails->currentHour >= $HomePage->WebsiteDetails->endHour) and ($HomePage->WebsiteDetails->endHour - 23) <= 12) { ?>
            Today's game has ended.<br />Tomorrow's game starts by <?php echo $HomePage->WebsiteDetails->startHourString; ?> and ends by <?php echo $HomePage->WebsiteDetails->endHourString; ?> CAT
            <?php }elseif (($HomePage->WebsiteDetails->currentHour >= $HomePage->WebsiteDetails->startHour) and ($HomePage->WebsiteDetails->currentHour < $HomePage->WebsiteDetails->endHour)) { ?>
                Today's game has started, game ends by  <?php echo $HomePage->WebsiteDetails->endHourString; ?> CAT
                <?php } else { ?>
                Today's game starts by <?php echo $HomePage->WebsiteDetails->startHourString; ?> and ends by <?php echo $HomePage->WebsiteDetails->endHourString; ?> CAT

                <p class = "prices">Amount : <?php } 
                
                $count = 1;
                $payment_options = $HomePage->WebsiteDetails->allowedPlayAmountOptions;
                $Naira = $HomePage->WebsiteDetails->Naira;
                $amount = "";
                foreach( $payment_options as $option){

                    $amount.= ($count == count($payment_options)) ? "<span>{$Naira}$option </span>" : "<span>{$Naira}$option, </span>"; 

                    $count ++;
                    ?> 
           <?php  } echo($amount); ?>
           </p>

            </div>

            <a class="btn btn-outline btn-lg" href="#play-amount-modal" data-toggle="modal">
                <?php echo
                ((($HomePage->WebsiteDetails->currentHour >= $HomePage->WebsiteDetails->endHour) and ($HomePage->WebsiteDetails->endHour - 23)) or (($HomePage->WebsiteDetails->currentHour >= $HomePage->WebsiteDetails->startHour) and ($HomePage->WebsiteDetails->currentHour < $HomePage->WebsiteDetails->endHour)) <= 12)?"Play Bonus Mode" : "Play Now"; ?></a>
        </div>
    </div>
    </span>
    </a>
</div>
</div>