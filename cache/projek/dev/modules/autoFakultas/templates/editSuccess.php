<?php
// auto-generated by sfPropelAdmin
// date: 2015/06/11 16:41:55
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('edit fakultas', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fakultas/edit_header', array('fakultas' => $fakultas)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fakultas/edit_messages', array('fakultas' => $fakultas, 'labels' => $labels)) ?>
<?php include_partial('fakultas/edit_form', array('fakultas' => $fakultas, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fakultas/edit_footer', array('fakultas' => $fakultas)) ?>
</div>

</div>