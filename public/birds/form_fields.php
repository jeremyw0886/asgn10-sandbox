<?php
// prevents this code from being loaded directly in the browser
// or without first setting required variables
if (!isset($bird)) {
  redirect_to(url_for('/birds/index.php'));
}
?>

<div class="form-group <?php echo isset($bird->errors['common_name']) ? 'has-error' : ''; ?>">
  <label for="common-name">Common Name</label>
  <div class="input-container">
    <input type="text" id="common-name" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>">
    <?php if (isset($bird->errors['common_name'])) { ?>
      <span class="field-error"><?php echo h($bird->errors['common_name']); ?></span>
    <?php } ?>
  </div>
</div>

<div class="form-group <?php echo isset($bird->errors['habitat']) ? 'has-error' : ''; ?>">
  <label for="habitat">Habitat</label>
  <div class="input-container">
    <textarea id="habitat" name="bird[habitat]" rows="5"><?php echo h($bird->habitat); ?></textarea>
    <?php if (isset($bird->errors['habitat'])) { ?>
      <span class="field-error"><?php echo h($bird->errors['habitat']); ?></span>
    <?php } ?>
  </div>
</div>

<div class="form-group <?php echo isset($bird->errors['food']) ? 'has-error' : ''; ?>">
  <label for="food">Food</label>
  <div class="input-container">
    <textarea id="food" name="bird[food]" rows="5"><?php echo h($bird->food); ?></textarea>
    <?php if (isset($bird->errors['food'])) { ?>
      <span class="field-error"><?php echo h($bird->errors['food']); ?></span>
    <?php } ?>
  </div>
</div>

<div class="form-group <?php echo isset($bird->errors['conservation_id']) ? 'has-error' : ''; ?>">
  <label for="conservation-id">Conservation Status</label>
  <div class="input-container">
    <select id="conservation-id" name="bird[conservation_id]">
      <option value="1" <?php if ($bird->conservation_id == '1') {
                          echo 'selected';
                        } ?>>Low Concern</option>
      <option value="2" <?php if ($bird->conservation_id == '2') {
                          echo 'selected';
                        } ?>>Moderate Concern</option>
      <option value="3" <?php if ($bird->conservation_id == '3') {
                          echo 'selected';
                        } ?>>Extreme Concern</option>
      <option value="4" <?php if ($bird->conservation_id == '4') {
                          echo 'selected';
                        } ?>>Extinct</option>
    </select>
    <?php if (isset($bird->errors['conservation_id'])) { ?>
      <span class="field-error"><?php echo h($bird->errors['conservation_id']); ?></span>
    <?php } ?>
  </div>
</div>

<div class="form-group <?php echo isset($bird->errors['backyard_tips']) ? 'has-error' : ''; ?>">
  <label for="backyard-tips">Backyard Tips</label>
  <div class="input-container">
    <textarea id="backyard-tips" name="bird[backyard_tips]" rows="5"><?php echo h($bird->backyard_tips); ?></textarea>
    <?php if (isset($bird->errors['backyard_tips'])) { ?>
      <span class="field-error"><?php echo h($bird->errors['backyard_tips']); ?></span>
    <?php } ?>
  </div>
</div>
