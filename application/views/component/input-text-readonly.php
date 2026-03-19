<div class="form-group">
    <label for="<?php echo $name?>"><?php echo $label?></label>
    <input type="text" name="<?php echo $name?>" id="<?php echo $name?>" value="<?php echo ($this->session->flashdata('post') ? (isset($this->session->flashdata('post')[$name]) ? $this->session->flashdata('post')[$name] : '') : (isset($default) ? $default : '')) ?>" class="form-control" readonly="">
</div>