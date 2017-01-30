<div id="wrainbo-cms-menu">
  <ul>
    <a href="assessment"><li class="{{ $page=='assessment' ? 'menu-hightlight' : '' }}">Assessment</li></a>
    <a href="editor"><li class="{{ $page=='editor' ? 'menu-hightlight' : '' }}">Game Editor</li></a>
    <a href="#"><li class="{{ $page=='element-editor' ? 'menu-hightlight' : '' }}">Element Editor</li></a>
    <a href="#"><li class="{{ $page=='spell-editor' ? 'menu-hightlight' : '' }}">Spell Editor</li></a>
    <a href="level"><li class="{{ $page=='level' ? 'menu-hightlight' : '' }}">Level Editor</li></a>
    <a href="#"><li class="{{ $page=='license' ? 'menu-hightlight' : '' }}">Manage License</li></a>
    <!-- <li><a href="spell">Spell</a></li> -->
    <a href="logout"><li>Logout</li></a>
  </ul>
</div>

<script type="text/javascript">
    var windowH = $(document).height();
    $('#wrainbo-cms-menu').css('height', (windowH-50)+'px');
    setTimeout(function(){
        var windowH = $(document).height();
        $('#wrainbo-cms-menu').css('height', (windowH-50)+'px');
      }, 700);

    $(window).resize(function(){
        var windowH = $(document).height();
        $('#wrainbo-cms-menu').css('height', (windowH-50)+'px');
    })
</script>
