<div class="form-group">
    <label class="col-md-3 control-label" for="<?php echo $name?>"><?php echo $label?>&nbsp;
    <?php if ($url !== null && $url != ''): ?>
        <a target="_blank" href="<?php echo base_url($url)?>"><i class="fa fa-file"></i></a>
    <?php endif; ?>
    <input type="hidden" name="<?php echo $name?>Old" value="<?php echo $url === '' ? '' : $url?>" />
    </label>
    <div class="col-md-9">
        <input type="file" class="filestyle" class="form-control" name="<?php echo $name?>" accept="application/msword,application/pdf, image/*" />
    </div>
</div>
