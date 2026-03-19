<div class="form-group">
    <label class="col-md-4 control-label" for="<?php echo $name?>" style="margin-top:3px"><?php echo $label?></label>
    <div class="col-md-8">
        <input type="text" readonly="" name="<?php echo $name?>" id="<?php echo $name?>" value="<?php echo ($this->session->flashdata('post') ? $this->session->flashdata('post')[$name] : $default) ?>" class="form-control seamless"/>
    </div>
</div>