<div class="wrainbo-cms-license-register">
  <h2>Register</h2>

  <style>
    .line {
      display: inline-block;
      vertical-align: baseline;
      width: 12%;
      text-align: center;
      padding-right: 3%;
      padding-left: 3%;
    }
    .email {
      display: inline-block;
      width: 88%;
    }
    .emailRow{
      width: 100%;
      white-space: nowrap;
    }
  </style>

  <script lang="text/javascript">
    $(function() {
      $( 'button[id^=email]' ).click(function() {
        console.log('Fired on ' + event.target)
        event.target.textContent = "-";
      });
    });
  </script>

  <form id="registerEmail" action="registerEmail" method="post">
    <div>
      <div class="emailRow">
        <input type="email" class="email" id="email-1" name="email[]" placeholder="Email"/>
        <button id="button-1" class="button line">+</button>
      </div>
      <div class="emailRow">
        <input type="email" class="email" id="email-2" name="email[]" placeholder="Email"/>
        <button id="button-2" class="button line">+</button>
      </div>
      <div class="emailRow">
        <input type="email" class="email" id="email-3" name="email[]" placeholder="Email"/>
        <button id="button-3" class="button line">+</button>
      </div>
      <div class="emailRow">
        <input type="email" class="email" id="email-4" name="email[]" placeholder="Email"/>
        <button id="button-4" class="button line">+</button>
      </div>
      <div class="emailRow">
        <input type="email" class="email" id="email-5" name="email[]" placeholder="Email"/>
        <button id="button-5" class="button line">+</button>
      </div>
      <input type="text"  name="department" placeholder="Department"/>
      <input type="hidden" name="cms_token" value="<?php echo session('cms.token'); ?>">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </div>

    <div class="wrainbo-cms-license-register-submitZone medium-centered columns">
      <input type="submit" value="SUBMIT" class="button submitButton"/><br />
      <span class="tip">*Use plus button to apply multiple users at once</span>
    </div>

  </form>
</div>
