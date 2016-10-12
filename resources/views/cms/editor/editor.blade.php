@extends('template')

@section('content')
@include('cms.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">

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
      z-index: 1;
    }
   .background {
      width:100%;
      height:100%;
      background-size: cover;
      background-repeat: no-repeat;
      z-index: 1;
      position: absolute;
    }
    .tools {
      width: 66%;
      height: 26%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 17%;
      bottom: 0%;
      position: absolute;
      z-index: 2;
    }
    .competitor {
      width: 16%;
      height: 31%;
      background-size: contain;
      background-repeat: no-repeat;
      bottom: 69%;
      left: 84%;
      position: absolute;
      z-index: 2;
    }
    .problems {
      width: 50%;
      height: 50%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 25%;
      bottom: 25%;
      position: absolute;
      z-index: 2;
    }
    .tactic {
      width: 15%;
      height: 35%;
      background-size: contain;
      background-repeat: no-repeat;
      position: absolute;
      z-index: 2;
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
      z-index: -1;
    }
    .selection-background-image {
      border-radius: 10px;
    }
    [class^="selection-"][class*="-image"] {
      margin-top: 2%;
      margin-bottom: 2%;
      width: 48%;
      margin-right: 1%;
    }
    .gu-unselectable {
      opacity: .25;
      background: rgba(0,0,0,0.5);
      z-index: 15;
    }
    .view > [id*="-area"] > [class^="selection-"][class*="-image"]:not(.gu-mirror) {
      border-radius: 0px !important;
      margin-top: 0% !important;
      width: 100% !important;
      height: 100% !important;
      margin-bottom: 0% !important;
      margin-right: 0% !important;
    }
    .view > .gu-unselectable > img:nth-child(2):not(.gu-mirror) {
      display:none;
    }
  </style>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js'></script>
  <script>
    $(document).ready(function(){

      function dragger(selectArea, targetArea) {
        dragula([selectArea, targetArea], {
          accepts: function (el, target) {
            return target !== selectArea
          },
          mirrorContainer: targetArea,
          direction: 'mixed',
          copy: true,
          revertOnSpill: true
        }).on('drop', function (el, target, source, sibling) {
            var element = el;
            var targetContainer = target;
            var siblingTarget = sibling;
            this.cancel(true);
            $(targetContainer).empty().append(element);
            if (siblingTarget !== null) {
              siblingTarget.remove();
            }
        });
      }

      //Toolbar/Action Bar dragging
      var toolSelectArea = document.getElementById('selection-tool-area');
      var toolArea = document.getElementById('tool-area');
      dragger(toolSelectArea, toolArea);

      //Background dragging
      var backgroundSelectArea = document.getElementById('selection-background-area');
      var backgroundArea = document.getElementById('background-area');
      dragger(backgroundSelectArea, backgroundArea);

      //Competitor dragging
      var competitorSelectArea = document.getElementById('selection-competitor-area');
      var competitorArea = document.getElementById('competitor-area');
      dragger(competitorSelectArea, competitorArea);


    });
  </script>
  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Game Editor</h2>
    <div class="row">
      <div class="medium-4 columns">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Background</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-background-area">
                <img src="../image/editor/modern/background.jpg" class="selection-background-image">
                <img src="../image/editor/modern/leadership_background.jpg" class="selection-background-image">
                <img src="../image/editor/fantasy/background.jpg" class="selection-background-image">
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="medium-4 columns">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Tool Bar</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-tool-area">
                <img src="../image/editor/modern/main_hud.png" class="selection-tool-image">
                <img src="../image/editor/fantasy/main_hud.png" class="selection-tool-image">
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="medium-4 columns">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Competitor</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-competitor-area">
                <img src="../image/editor/modern/competitor.png" class="selection-competitor-image">
                <img src="../image/editor/fantasy/competitor.png" class="selection-competitor-image">
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
            <div class="tools" id="tool-area"></div>
            <div class="competitor" id="competitor-area"></div>
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
