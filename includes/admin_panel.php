<div id="nginxchampuru-settings">
<div id="icon-options-general" class="icon32"><br /></div>
<h2><?php _e("Cache Settings", "nginxchampuru"); ?> <a href="<?php echo $this->get_cacheclear_url(); ?>" class="add-new-h2"><?php _e("Flush All Caches", "nginxchampuru"); ?></a></h2>

<?php if (isset($_GET['message']) && $_GET['message'] === "true"): ?>
<div id="message" class="updated"><p><?php _e("Saved.", "nginxchampuru"); ?></p></div>
<?php endif; ?>

<h3><?php _e("Cache Expire", "nginxchampuru"); ?></h3>

<form action="admin.php?page=nginx-champuru" method="post">
<input type="hidden" name="nonce" value="<?php echo wp_create_nonce("nginxchampuru-optionsave"); ?>" />

<?php

$expires = get_option("nginxchampuru-cache_expires");
if (!is_array($expires)) {
    $expires = array();
}

?>

<table class="form-table">
<?php foreach ($this->default_cache_params as $par => $title): ?>
<tr>
    <?php
        if (isset($expires[$par]) && strlen($expires[$par])) {
            $expires[$par] = intval($expires[$par]);
        } else {
            $expires[$par] = $nginxchampuru->get_default_expire();
        }
    ?>
    <th><?php echo $title; ?></th>
    <td><input type="text" class="int" name="expires[<?php echo $par; ?>]" value="<?php echo $expires[$par]; ?>" /> sec</td>
</tr>
<?php endforeach; ?>
</table>


<h3><?php _e("Automatic Flush", "nginxchampuru"); ?></h3>

<table class="form-table">
<tr>
    <th><?php _e("On Publish", "nginxchampuru"); ?></th>
    <td><?php $this->get_modes_select("publish"); ?></td>
</tr>
<tr>
    <th><?php _e("On Comment Posted", "nginxchampuru"); ?></th>
    <td><?php $this->get_modes_select("comment"); ?></td>
</tr>
</table>


<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="変更を保存"  /></p>
</form>

</div><!-- #ninjax-expirescontrol -->