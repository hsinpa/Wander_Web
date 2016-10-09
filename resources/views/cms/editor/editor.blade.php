@extends('template')

@section('content')
@include('cms.header')

<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>
  <style>
    .phoneArea {
      position: relative;
      z-index: 10;
    }
    .view {
      position: absolute;
      height: 86.5%;
      width: 75.5%;
      left: 12.3%;
      top: 6.75%;
      z-index: -1;
    }
   .background {
      width:100%;
      height:100%;
      background-size: cover;
      background-repeat: no-repeat;
      z-index: 5;
    }
    .tools {
      width: 60%;
      height: 60%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 20%;
      bottom: -37.6%;
      position: absolute;
      z-index: 1;
    }
    .competitor {
      width: 45%;
      height: 45%;
      background-size: contain;
      background-repeat: no-repeat;
      bottom: 59%;
      left: 78%;
      position: absolute;
      z-index: 1;
    }
    .problems {
      width: 50%;
      height: 50%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 25%;
      bottom: 25%;
      position: absolute;
    }
    .tactic {
      width: 15%;
      height: 35%;
      background-size: contain;
      background-repeat: no-repeat;
      position: absolute;
      z-index: 1;
      bottom: -11%;
      right: -1%;
    }
    .phoneImage {
      user-drag: none;
      user-select: none;
      -moz-user-select: none;
      -webkit-user-drag: none;
      -webkit-user-select: none;
      -ms-user-select: none;
    }
    #selection-background-area > span > .selection-background-image {
      border-radius: 10px;
      margin-top: 2%;
      margin-bottom: 2%;
      width: 48%;
      margin-right: 1%;

    }
    #background-area > .gu-mirror > .selection-background-image {
      width: 100%;
      height: 100%;
    }
  </style>
  <script lang="text/javascript">
  $(function() {

      jQuery('.problems').css('opacity', '0');
      jQuery('.tools').css('opacity', '0');
      jQuery('.competitor').css('opacity', '0');
      jQuery('.tactic').css('opacity', '0');

    $( "#subject" ).change(function() {
      $change1 = $(this).val();
      if ($change1 == "business") {
        $("#theme").removeAttr('disabled');
        $("#fantasy").removeAttr('disabled');
        $("#modern").removeAttr('disabled');
        $("#object").removeAttr('disabled');
        $("#object").val([]);
        jQuery('.problems').css('opacity', '0');
        jQuery('.tools').css('opacity', '0');
        jQuery('.competitor').css('opacity', '0');
        jQuery('.tactic').css('opacity', '0');
        $('.background').css('background-image', 'none');
        $('.tools').css('background-image', 'none');
        $('.competitor').css('background-image', 'none');
        $('.problems').css('background-image', 'none');
        $('.tactic').css('background-image', 'none');
        $('#theme').prop('selectedIndex', 0);
      } else if ($change1 == "procurement") {
          $("#theme").removeAttr('disabled');
          $("#fantasy").prop('disabled', true);
          $("#modern").removeAttr('disabled');
          $("#object").removeAttr('disabled');
          $("#object").val([]);
          jQuery('.problems').css('opacity', '0');
          jQuery('.tools').css('opacity', '0');
          jQuery('.competitor').css('opacity', '0');
          jQuery('.tactic').css('opacity', '0');
          $('.background').css('background-image', 'none');
          $('.tools').css('background-image', 'none');
          $('.competitor').css('background-image', 'none');
          $('.problems').css('background-image', 'none');
          $('.tactic').css('background-image', 'none');
          $('#theme').prop('selectedIndex', 0);
      } else if ($change1 == "leadership") {
          $("#theme").removeAttr('disabled');
          $("#fantasy").prop('disabled', true);
          $("#modern").removeAttr('disabled');
          $("#object").removeAttr('disabled');
          $("#object").val([]);
          jQuery('.problems').css('opacity', '0');
          jQuery('.tools').css('opacity', '0');
          jQuery('.competitor').css('opacity', '0');
          jQuery('.tactic').css('opacity', '0');
          $('.background').css('background-image', 'none');
          $('.tools').css('background-image', 'none');
          $('.competitor').css('background-image', 'none');
          $('.problems').css('background-image', 'none');
          $('.tactic').css('background-image', 'none');
          $('#theme').prop('selectedIndex', 0);
      }
    });
    $( "#theme" ).change(function($subject) {
      $change = $(this).val();
      var subject = $( "#subject option:selected" ).text();

      if (subject=="Procurement" && $change=="modern") {
        $('.background').css('background-image', 'url(../image/editor/modern_background.png)');
        $('.tools').css('background-image', 'url(../image/editor/procurment_tools.png)');
        $('.competitor').css('background-image', 'url(../image/editor/modern_competitor.png)');
        $('.problems').css('background-image', 'url(../image/editor/modern_problems.png)');
        $('.tactic').css('background-image', 'url(../image/editor/modern_analyze_tool.png)');
        $("#object").val([]);
        jQuery('.problems').css('opacity', '0');
        jQuery('.tools').css('opacity', '0');
        jQuery('.competitor').css('opacity', '0');
        jQuery('.tactic').css('opacity', '0');
      } else if (subject==="Leadership" && $change=="modern") {
        $('.background').css('background-image', 'url(../image/editor/leadership_background.jpg)');
        $('.tools').css('background-image', 'url(../image/editor/modern_tools.png)');
        $('.competitor').css('background-image', 'url(../image/editor/modern_competitor.png)');
        $('.problems').css('background-image', 'url(../image/editor/modern_problems.png)');
        $('.tactic').css('background-image', 'url(../image/editor/modern_analyze_tool.png)');
        $("#object").val([]);
        jQuery('.problems').css('opacity', '0');
        jQuery('.tools').css('opacity', '0');
        jQuery('.competitor').css('opacity', '0');
        jQuery('.tactic').css('opacity', '0');
      } else if ($change == "fantasy") {
        $('.background').css('background-image', 'url(../image/editor/magitech_background.png)');
        $('.tools').css('background-image', 'url(../image/editor/magitech_tools.png)');
        $('.competitor').css('background-image', 'url(../image/editor/magitech_competitor.png)');
        $('.problems').css('background-image', 'url(../image/editor/magitech_problems.png)');
        $('.tactic').css('background-image', 'url(../image/editor/magitech_analyze_tool.png)');
        $("#object").val([]);
        jQuery('.problems').css('opacity', '0');
        jQuery('.tools').css('opacity', '0');
        jQuery('.competitor').css('opacity', '0');
        jQuery('.tactic').css('opacity', '0');
      } else if ($change == "modern") {
        $('.background').css('background-image', 'url(../image/editor/modern_background.png)');
        $('.tools').css('background-image', 'url(../image/editor/modern_tools.png)');
        $('.competitor').css('background-image', 'url(../image/editor/modern_competitor.png)');
        $('.problems').css('background-image', 'url(../image/editor/modern_problems.png)');
        $('.tactic').css('background-image', 'url(../image/editor/modern_analyze_tool.png)');
        $("#object").val([]);
        jQuery('.problems').css('opacity', '0');
        jQuery('.tools').css('opacity', '0');
        jQuery('.competitor').css('opacity', '0');
        jQuery('.tactic').css('opacity', '0');
      }
    });

    $( "#object" ).change(function() {
      var $change = $(this).val();
      if(jQuery.inArray("problem", $change) > -1) {
        jQuery('.problems').css('opacity', '1');
      } else if (jQuery.inArray("problem", $change) == -1) {
        jQuery('.problems').css('opacity', '0');
      }
      if(jQuery.inArray("prop", $change) > -1) {
        jQuery('.tools').css('opacity', '1');
      } else if (jQuery.inArray("prop", $change) == -1) {
        jQuery('.tools').css('opacity', '0');
      }
      if(jQuery.inArray("tactic", $change) > -1) {
        jQuery('.tactic').css('opacity', '1');
      } else if (jQuery.inArray("tactic", $change) == -1) {
        jQuery('.tactic').css('opacity', '0');
      }
      if(jQuery.inArray("challenge", $change) > -1) {
        jQuery('.competitor').css('opacity', '1');
      } else if (jQuery.inArray("challenge", $change) == -1) {
        jQuery('.competitor').css('opacity', '0');
      }
    });
  });


  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js'></script>
  <script>
    $(document).ready(function(){
      var backgroundSelectArea = document.getElementById('selection-background-area');
      var backgroundArea = document.getElementById('background-area');
      dragula([backgroundSelectArea, backgroundArea], {
        mirrorContainer: document.getElementById('background-area')
      });
    });
  </script>
  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Game Editor</h2>
    <div class="row">
      <div class="medium-12">
        <div class="medium-3 medium-offset-1 columns">
          <form>
            <select id="subject">
              <option disabled selected>Subject</option>
              <option id="business" value="business">Business Acumen</option>
              <option id="procurement" value="procurement">Procurement</option>
              <option id="leadership" value="leadership">Leadership</option>
            </select>
        </div>
        <div class="medium-3 medium-offset-1 columns">
          <select id="theme" data-prompt="Art Theme" disabled>
            <option disabled selected>Theme</option>
            <option id="fantasy" value="fantasy" disabled>Fantasy</option>
            <option id="modern" value="modern" disabled>Modern Comics</option>
          </select>
        </div>
        <div class="medium-3 columns">
          <select  id="object" multiple disabled data-prompt="Objects">
            <option id="problem" value="problem">Problem</option>
            <option id="prop" value="prop">Prop</option>
            <option id="tactic" value="tactic">Tactic</option>
            <option id="challenge" value="challenge">Challenge</option>
          </select>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="medium-4">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Background</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-background-area">
                <span><img src="../image/editor/modern/background.jpg" class="selection-background-image"></span>
                <span><img src="../image/editor/modern/leadership_background.jpg" class="selection-background-image"></span>
                <span><img src="../image/editor/fantasy/background.jpg" class="selection-background-image"></span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="phoneArea">
          <div class="view">
            <div class="background" id="background-area"></div>
            <div class="tools"></div>
            <div class="competitor"></div>
            <div class="problems"></div>
            <div class="tactic"></div>
          </div>
          <img src="../image/editor/iphone.png" class="phoneImage">
        </div>
      </div>
    </div>
  </div>
</div>



@stop
