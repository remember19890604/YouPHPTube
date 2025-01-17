<?php
if (!empty($removeVideoList)) {
    return false;
}

$TimeLogLimitMYBR = 0.2;
$timeLogNameMYBR = TimeLogStart("modeYoutubeBottomRight.php");
if (!empty($video['users_id']) && User::hasBlockedUser($video['users_id'])) {
    return false;
}

TimeLogEnd($timeLogNameMYBR, __LINE__, $TimeLogLimitMYBR);
?>
<!--googleoff: all-->
<div class="col-lg-12 col-sm-12 col-xs-12 text-center">
    <?php
    $getAdsSideRectangle = getAdsSideRectangle();
    if (!empty($getAdsSideRectangle)) {
        echo $getAdsSideRectangle;
    } else {
        echo "<!-- ";
        echo "getAdsSideRectangle is empty ";
        echo implode(', ', ADs::getAdsCodeReason('sideRectangle'));
        echo " -->";
    }
    ?>
</div>
<?php
TimeLogEnd($timeLogNameMYBR, __LINE__, $TimeLogLimitMYBR);
if (!empty($playlist_id)) {
    include $global['systemRootPath'] . 'view/include/playlist.php'; ?>
    <script>
        $(document).ready(function() {
            setAutoplay(true);
        });
    </script>
<?php
} elseif (empty($autoPlayVideo)) {
?>
    <div class="col-lg-12 col-sm-12 col-xs-12 autoplay text-muted" style="margin: 10px 0;">
        <strong><?php echo __("Autoplay ended"); ?></strong>
        <span class="pull-right">
            <span><?php echo __("Autoplay"); ?></span>
            <span>
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="<?php echo __("When autoplay is enabled, a suggested video will automatically play next."); ?>"></i>
            </span>
            <div class="material-switch pull-right" style="margin-left: 10px;">
                <input type="checkbox" class="saveCookie" name="autoplay" id="autoplay" <?php echo PlayerSkins::isAutoplayEnabled() ? "checked" : ""; ?>>
                <label for="autoplay" class="label-primary"></label>
            </div>
        </span>
    </div>
<?php
} elseif (!empty($autoPlayVideo) && PlayerSkins::showAutoplay()) { ?>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12 autoplay text-muted" style="margin: 10px 0;">
            <strong><?php echo __("Up Next"); ?></strong>
            <span class="pull-right">
                <span><?php echo __("Autoplay"); ?></span>
                <span>
                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo __("When autoplay is enabled, a suggested video will automatically play next."); ?>"></i>
                </span>
                <div class="material-switch pull-right" style="margin-left: 10px;">
                    <input type="checkbox" class="saveCookie" name="autoplay" id="autoplay" <?php echo PlayerSkins::isAutoplayEnabled() ? "checked" : ""; ?>>
                    <label for="autoplay" class="label-primary"></label>
                </div>
            </span>
        </div>
    </div>
<?php
    $style = 'margin: 10px 0; padding: 15px 5px;';
    if (!PlayerSkins::isAutoplayEnabled()) {
        $style .= 'display: none;';
    }
    echo Video::getVideosListItem($autoPlayVideo['id'], 'autoPlayVideoDiv', $style);
}

TimeLogEnd($timeLogNameMYBR, __LINE__, $TimeLogLimitMYBR);

$modeYouTubeTimeLog['After autoplay and playlist '] = microtime(true) - $modeYouTubeTime;
$modeYouTubeTime = microtime(true);
?>
<div class="clearfix"></div>
<div class="extraVideos nopadding" style="margin: 15px 0;"></div>
<div class="clearfix"></div>
<!-- videos List -->
<div id="videosList">
    <?php
    TimeLogEnd($timeLogNameMYBR, __LINE__, $TimeLogLimitMYBR);
    if (empty($playlist_id)) {
        include $global['systemRootPath'] . 'view/videosList.php';
    }
    TimeLogEnd($timeLogNameMYBR, __LINE__, $TimeLogLimitMYBR);
    ?>
</div>
<!-- End of videos List -->
<!--googleon: all-->

<script>
    var fading = false;
    var autoPlaySources = <?php echo json_encode(@$autoPlaySources); ?>;
    var autoPlayURL = '<?php echo @$autoPlayURL; ?>';
    var autoPlayPoster = '<?php echo @$autoPlayPoster; ?>';
    var autoPlayThumbsSprit = '<?php echo @$autoPlayThumbsSprit; ?>';

    $(document).ready(function() {



    });
</script>