
<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name', isset($assetCategory->name) ? $assetCategory->name : null)); ?>" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000"><?php echo e(old('description', isset($assetCategory->description) ? $assetCategory->description : null)); ?></textarea>
        <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('is_active') ? 'has-error' : ''); ?>">
    <label for="is_active" class="col-md-2 control-label">Is Active</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" <?php echo e(old('is_active', isset($assetCategory->is_active) ? $assetCategory->is_active : null) == '1' ? 'checked' : ''); ?>>
                Yes
            </label>
        </div>

        <?php echo $errors->first('is_active', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

