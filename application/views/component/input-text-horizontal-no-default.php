<div class="form-group">
    <label class="col-md-3 control-label" for="<?php echo $name?>"><?php echo $label?></label>
    <div class="col-md-9">
        <input type="text" required="" name="<?php echo $name?>" id="<?php echo $name?>" class="form-control" value="" 
            data-parsley-trigger="focusin focusout" data-parsley-<?php echo $type!=='' ? 'type="'.$type.'"' : 'pattern="'.(isset($pattern) ? $pattern : '^[a-zA-Z ]*$').'"' ?>
            data-parsley-minlength="<?php echo isset($minLength) ? $minLength : '1' ?>" data-parsley-maxlength="<?php echo isset($maxLength) ? $maxLength : '100' ?>" >
    </div>
</div>