<footer>
    <hr>
    <p>&copy; <?php echo  $currentYear;?> <?php echo  $brand;?> &nbsp;&nbsp; <span class="text-muted"><i class="fa fa-long-arrow-left"></i> This is data that can be changed in assets/data/data.yml</span></p>
    <br>
        <a href="?session_renew=true">Renew Prototype Session</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <?php foreach ($languages as $key => $languageTmp){ ?>
            <a href="?switchLanguage=<?php echo $key ;?>"><?php echo $languageTmp ;?></a>&nbsp;&nbsp;
        <?php } ?>
    <br>
    <a class="" data-toggle="collapse" data-target="#collapse<?php echo getUniqueId();?>">Deeplink</a>
    <div id="collapse<?php echo $lastUniqueId;?>" class="collapse">
        <input type="text" class="form-control selectOnClick" name="" placeholder="" value="<?php echo getDeeplink(); ;?>">
    </div>
</footer>