<?php echo form_open('captcha/kiemtra2'); ?>
<?php echo $thongbaokq; ?>
<?php echo validation_errors(); ?>
        <!-- the form elements you need followed by the captcha image and the captcha form element-->
         ten<input type="text" name="name" /><br>

        <input type="text" name="captcha" />
        <?php echo $image_captcha; // this will show the captcha image?>
        <input type="hidden" name="captcha2" value="<?php echo $this->session->userdata('captchaword'); ?>" />
        <input type="submit" name="submit" value="submit" />
        </form>
<?php echo form_close(); ?>