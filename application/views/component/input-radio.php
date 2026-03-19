<div class="col-md-3">
    <div class="radio radio-primary">
        <input type="radio" name="<?php echo $name?>" id="<?php echo $value?>" 
            value="<?php echo $value?>" <?php echo $value===$default ? 'checked' : '' ?> >
        <label for="<?php echo $value?>">
        <?php echo $label?>
        </label>
    </div>
</div>
