<header class="top-bar">
  <div class="title-bar-left show-for-small-only">
    <button class="menu-icon" type="button" data-open="offCanvas"></button>
    <span class="title-bar-title">
      <a href="/" ><span class="title-bar-title">HOME</span></a>
    </span>
  </div>

    <div class="top-bar-title show-for-medium">
      <!-- <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
        <span class="menu-icon dark" data-toggle></span>
      </span> -->
      <a href="/" ><img src="image/icon/logo.png" /></a>
    </div>

    <div id="responsive-menu">
      <div class="top-bar-left show-for-medium">
        <ul class="dropdown menu" data-dropdown-menu>
          <li><a href="/">HOME</a></li>
          <li><a href="gameplay">GAMEPLAY</a></li>
          <li><a href="learning">LEARNING</a></li>
          <li><a href="aboutUs" >ABOUT US</a></li>
        </ul>
      </div>
    </div>
</header>

<script text="text/javascript">
  $(".off-canvas-list a").click(function () {
            $("#offCanvas").foundation('close');
  });
</script>
