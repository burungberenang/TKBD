<?php
// auto-generated by sfPropelAdmin
// date: 2015/06/11 16:41:55
?>
<?php echo form_tag('fakultas/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fakultas, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('fakultas[nama]', __($labels['fakultas{nama}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fakultas{nama}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fakultas{nama}')): ?>
    <?php echo form_error('fakultas{nama}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fakultas, 'getNama', array (
  'size' => 45,
  'control_name' => 'fakultas[nama]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fakultas[created_at]', __($labels['fakultas{created_at}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fakultas{created_at}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fakultas{created_at}')): ?>
    <?php echo form_error('fakultas{created_at}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fakultas, 'getCreatedAt', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fakultas[created_at]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fakultas[updated_at]', __($labels['fakultas{updated_at}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fakultas{updated_at}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fakultas{updated_at}')): ?>
    <?php echo form_error('fakultas{updated_at}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fakultas, 'getUpdatedAt', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fakultas[updated_at]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fakultas' => $fakultas)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fakultas->getId()): ?>
<?php echo button_to(__('delete'), 'fakultas/delete?id='.$fakultas->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
