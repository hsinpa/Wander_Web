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
    #department {
      position: relative;
      left: 4%;
      width: 92%;
    }
  </style>

  <script lang="text/javascript">
    $(function() {
      var line = 1;
      $('<div class="emailRow"><input type="email" class="email" name="email[]" placeholder="Email"/><button type="button" class="button line button-email">+</button>').appendTo('.email-inputs');
      $('.email-inputs' ).on('click', '.button-email', function() {
        if (event.target.textContent == "+" && line < 5) {
          event.target.textContent = "-";
          $('<div class="emailRow"><input type="email" class="email" name="email[]" placeholder="Email"/><button type="button" class="button line button-email">+</button>').appendTo('.email-inputs');
          line++;
          return false;
        } else if (event.target.textContent == "-") {
          event.target.textContent = "+";
          $(this).parents('.emailRow').remove();
          line--;
          return false;
        }
      });
    });
  </script>

  <form id="registerEmail" action="registerEmail" method="post">
    <div class="email-inputs">
    </div>
      <input type="text"  id="department" name="department" placeholder="Department"/>
      <input type="hidden" name="cms_token" value="<?php echo session('cms.token'); ?>">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <div class="wrainbo-cms-license-register-submitZone medium-centered columns">
      <input type="submit" value="SUBMIT" class="button submitButton"/><br />
      <span class="tip">*Use plus button to apply multiple users at once</span>
    </div>

  </form>
</div>
