@extends('template')
<link rel="stylesheet" src="{{ url('css/foundation/foundation-select.css') }}">
@section('content')
@include('cms.header')


<script type="text/javascript" src="{{ url('js/cms/editor/attrchange.js') }}"></script>
<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>
  <style>
    .phone {
      background-image: url(../image/editor/iphone.png);
      width: 1000px;
      height: 500px;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .viewport {
      height: 86%;
      top: 6.5%;
      left: 12%;
      width: 76%;
      z-index: -1;
      position: relative;
    }
    .background {
      width:100%;
      height:100%;
      background-size: cover;
      background-repeat: no-repeat;
      z-index: -1;
    }
    .tools {
      width: 45%;
      height: 45%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 25%;
      bottom: 14%;
      position: relative;
    }
    .competitor {
      width: 35%;
      height: 35%;
      background-size: contain;
      background-repeat: no-repeat;
      top: -126%;
      left: 72%;
      position: relative;
      z-index: -1;
    }
    .problems {
      width: 35%;
      height: 35%;
      background-size: contain;
      background-repeat: no-repeat;
      top: -136%;
      left: 30%;
      position: relative;
    }
    .tactic {
      width: 15%;
      height: 35%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 75%;
      top: -135%;
      position: relative;
      z-index: -1;
    }
    .area {
      height:250px;
      width:500px;
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
      <div class="medium-10 medium-centered columns">
        <div class="area">
          <div class="phone">
            <div class="viewport">
              <div class="background"></div>
            </div>
            <div class="tools"></div>
            <div class="competitor"></div>
            <div class="problems"></div>
            <div class="tactic"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@stop
