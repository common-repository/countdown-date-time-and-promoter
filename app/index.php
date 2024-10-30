<?php

// Including the WordPress load file so we have access to the wordpress API

?>

<!DOCTYPE html>
<html>
<head>
<style>
<?php require CFC_PATH.'/css/main.css'; ?>
</style>
<script> 
<?php require CFC_PATH.'/js/main.js'; ?>
</script>
</head>
<body>
<div class="displayFrame">
 <div id="displayCounter"></div>
 <div id="current-date"></div>
 <div id="current-time"></div>
 <div id="promoterText"><?php echo esc_html($displayPromoterText);?></div>
 <a href="<?php echo esc_url($displayPromoteUrl);?>"><div id="promoterLink"><?php echo esc_html($displayPromoteLinkText);?></div></a>
</div>
</body>
</html>