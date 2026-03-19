<div class="form-group">
    <label for="<?php echo $name?>"><?php echo $label?><span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="<?php echo $name?>" required="" 
        value="<?php echo ($this->session->flashdata('post') ? $this->session->flashdata('post')[$name] : (isset($default) ? $default : '')) ?>" 
        data-parsley-trigger="focusin focusout" data-parsley-<?php echo $type!=='' ? 'type="'.$type.'"' : 'pattern="'.(isset($pattern) ? $pattern : '^[a-zA-Z ]*$').'"' ?> 
        data-parsley-minlength="<?php echo isset($minLength) ? $minLength : '1' ?>" data-parsley-maxlength="<?php echo isset($maxLength) ? $maxLength : '100' ?>" >
</div>