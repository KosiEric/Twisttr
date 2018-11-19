<div class="banner-example" id="footer-banner">
    <div id="banner">
        <div class="active bannerItem">
            <span class="banner-header display-1">NOTICE!!</span>
            <div class="banner-text">
            <?php if(($currentHour >= $endHour) and ($endHour - 23) <= 12) { ?>
            Today's game has ended.<br />Tomorrow's game starts by <?php echo $startHourString; ?> and ends by <?php echo $endHourString; ?> CAT
            <?php }elseif (($currentHour >= $startHour) and ($currentHour < $endHour)) { ?>
                Today's game has started, game ends <?php// echo $startHourString; ?> by <?php echo $endHourString; ?> CAT
                <?php } else { ?>
                Today's game starts by <?php echo $startHourString; ?> and ends by <?php echo $endHourString; ?> CAT

           <?php  }?>

            </div>

            <a class="btn btn-outline btn-lg" href="#play-amount-modal" data-toggle="modal">Play Now</a>
        </div>
    </div>
    </span>
    </a>
</div>
</div>