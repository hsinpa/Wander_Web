<?php
  $bizName = ($user->game_type == "BizVenture") ? "Business Venture" : "Business Battle";
?>
<p>
  <b>Your <?php echo $bizName; ?> password has been changed!</b><br /><br />

  This email confirms that your password has been changed.<br /><br />

  To log on to the <?php echo $bizName; ?> game, use the following credentials:<br /><br />

  <b>Username:</b> <?php echo $user->email; ?><br>
  <b>Password:</b> <?php echo $user->newPassword; ?><br /><br />

  To change your password, please go to the Settings of the app.
  If you have any questions or encounter any problems logging in,
  please contact <a href="mailto:team@wrainbo.com">team@wrainbo.com</a>.
</p>
