<div class="form-group">
    <label class="col-md-3 control-label" for="<?php echo $name?>"><?php echo $label?><span class="text-danger">*</span></label>
    <div class="col-md-9">
        <div class="input-group">
            <span class="input-group-addon">+62</span>
            <input type="text" name="<?php echo $name?>" id="<?php echo $name?>" required="" class="form-control"
                value="<?php echo ($this->session->flashdata('post') ? (isset($this->session->flashdata('post')[$name]) ? $this->session->flashdata('post')[$name] : '') : (isset($default) ? substr($default,2) : '')) ?>"
                data-parsley-trigger="focusin focusout" data-parsley-type="digits"
                data-parsley-minlength="6" data-parsley-maxlength="14">
        </div>
    </div>
</div>
