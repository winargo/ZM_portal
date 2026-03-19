<div class="form-group">
    <label class="col-md-3 control-label" for="<?php echo $name?>"><?php echo $label?></label>
    <div class="col-md-9">
        <input type="text" readonly="" name="<?php echo $name?>" id="<?php echo $name?>" value="<?php echo ($this->session->flashdata('post') ?  (isset($this->session->flashdata('post')[$name]) ? $this->session->flashdata('post')[$name] : '')  : $default) ?>" class="form-control"/>
    </div>
</div>