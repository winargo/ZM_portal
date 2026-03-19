<div class="form-group">
    <label for="<?php echo $name?>"><?php echo $label?><span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-addon">+62</span>
        <input type="text" name="<?php echo $name?>" required="" class="form-control"
            value="<?php echo ($this->session->flashdata('post') ? $this->session->flashdata('post')[$name] : (isset($default) ? substr($default,2) : '')) ?>"
            data-parsley-trigger="focusin focusout" data-parsley-type="digits"
            data-parsley-minlength="6" data-parsley-maxlength="14">
    </div>
</div>
