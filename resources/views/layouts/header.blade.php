<header class="top-bar">
  <div class="title-bar-left show-for-small-only">
    <button class="menu-icon" type="button" data-open="offCanvas"></button>
    <span class="title-bar-title">
      <a href="/" ><span class="title-bar-title">HOME</span></a>
    </span>
  </div>


    <div id="responsive-menu">
      <div class="top-bar-left show-for-medium">
        <ul class="dropdown menu" data-dropdown-menu>
          <li><a href="/"><img src="image/icon/logo.png" /></a></li>
          <li><a href="/">HOME</a></li>
          <li><a href="gameplay">FEATURE</a></li>
          <li><a href="learning">PRODUCT</a></li>
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
