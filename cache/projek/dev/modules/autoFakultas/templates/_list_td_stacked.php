<?php
// auto-generated by sfPropelAdmin
// date: 2015/06/11 16:41:55
?>
<td colspan="4">
    <?php echo link_to($fakultas->getId() ? $fakultas->getId() : __('-'), 'fakultas/edit?id='.$fakultas->getId()) ?>
     - 
    <?php echo $fakultas->getNama() ?>
     - 
    <?php echo ($fakultas->getCreatedAt() !== null && $fakultas->getCreatedAt() !== '') ? format_date($fakultas->getCreatedAt(), "f") : '' ?>
     - 
    <?php echo ($fakultas->getUpdatedAt() !== null && $fakultas->getUpdatedAt() !== '') ? format_date($fakultas->getUpdatedAt(), "f") : '' ?>
     - 
</td>