<div class="wrainbo-cms-license-register">
  <h2>Register</h2>

  <form action="registerEmail" method="post">
    <div>
      <input type="email" name="email" placeholder="Email"/>
      <input type="text"  name="department" placeholder="Department"/>
      <input type="hidden" name="cms_token" value="<?php echo session('cms.token'); ?>">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </div>

    <div class="wrainbo-cms-license-register-submitZone">
      <input type="submit" value="SUBMIT" class="button submitButton"/><br />
      <span class="tip">*Use plus button to apply multiple users at once</span>
    </div>

  </form>
</div>
