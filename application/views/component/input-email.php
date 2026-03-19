<div class="form-group">
    <label for="<?php echo $name?>"><?php echo $label?><span class="text-danger">*</span></label>
    <input type="email" name="<?php echo $name?>" required="" class="form-control"
        value="<?php echo ($this->session->flashdata('post') ? $this->session->flashdata('post')[$name] : (isset($default) ? $default : '')) ?>"
        data-parsley-trigger="focusin focusout" data-parsley-type="email">
</div>