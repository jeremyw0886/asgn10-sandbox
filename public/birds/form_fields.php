<?php
// prevents this code from being loaded directly in the browser
// or without first setting required variables
if(!isset($bird)) {
  redirect_to(url_for('/birds/index.php'));
}
?>

<div class="form-group">
  <label for="common-name">Common Name</label>
  <input type="text" id="common-name" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>">
</div>

<div class="form-group">
  <label for="habitat">Habitat</label>
  <textarea id="habitat" name="bird[habitat]" rows="5"><?php echo h($bird->habitat); ?></textarea>
</div>

<div class="form-group">
  <label for="food">Food</label>
  <textarea id="food" name="bird[food]" rows="5"><?php echo h($bird->food); ?></textarea>
</div>

<div class="form-group">
  <label for="conservation-id">Conservation Status</label>
  <select id="conservation-id" name="bird[conservation_id]">
    <option value="1" <?php if($bird->conservation_id == '1') { echo 'selected'; } ?>>Low Concern</option>
    <option value="2" <?php if($bird->conservation_id == '2') { echo 'selected'; } ?>>Moderate Concern</option>
    <option value="3" <?php if($bird->conservation_id == '3') { echo 'selected'; } ?>>Extreme Concern</option>
    <option value="4" <?php if($bird->conservation_id == '4') { echo 'selected'; } ?>>Extinct</option>
  </select>
</div>

<div class="form-group">
  <label for="backyard-tips">Backyard Tips</label>
  <textarea id="backyard-tips" name="bird[backyard_tips]" rows="5"><?php echo h($bird->backyard_tips); ?></textarea>
</div>
