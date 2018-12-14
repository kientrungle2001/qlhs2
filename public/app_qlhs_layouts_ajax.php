<?php $data->displayChildren('[tagName=html.body]');?>
<?php $data->displayChildren('[tagName=html.head]');?>
<?php if (count($data->jsInstances)) { ?>
<script type="text/javascript">
    pzk_init(<?php echo json_encode($data->jsInstances) ?>);
</script>
<?php } ?>