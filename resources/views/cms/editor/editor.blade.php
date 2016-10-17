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
    .toolbar {
      width: 66%;
      height: 26%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 17%;
      bottom: 0%;
      position: absolute;
      z-index: 2;
    }
    .products {
      width: 27%;
      height: 15%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 21.5%;
      bottom: 2%;
      position: absolute;
      z-index: 3;
    }
    .tactics {
      width: 27%;
      height: 15%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 51.5%;
      bottom: 2%;
      position: absolute;
      z-index: 3;
    }
    .competitor {
      width: 16%;
      height: 31%;
      background-size: contain;
      background-repeat: no-repeat;
      bottom: 68%;
      left: 83%;
      position: absolute;
      z-index: 2;
    }
    .competitor > img {
      background-image: url(../image/editor/competitor/back.png);
      background-size: contain;
    }
    .hero {
      width: 16%;
      height: 38%;
      background-size: contain;
      background-repeat: no-repeat;
      bottom: 0%;
      left: 1%;
      position: absolute;
      z-index: 2;
    }
    .problem1 {
      width: 17%;
      height: 37%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 21.5%;
      bottom: 40%;
      position: absolute;
      z-index: 2;
    }
    .problem2 {
      width: 17%;
      height: 37%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 41.5%;
      bottom: 40%;
      position: absolute;
      z-index: 2;
    }
    .problem3 {
      width: 17%;
      height: 37%;
      background-size: contain;
      background-repeat: no-repeat;
      left: 61.5%;
      bottom: 40%;
      position: absolute;
      z-index: 2;
    }
    .topbar {
      width: 47%;
      height: 10%;
      background-size: contain;
      background-repeat: no-repeat;
      left: .5%;
      top: .5%;
      position: absolute;
      z-index: 2;
    }
    .tool {
      width: 15%;
      height: 26%;
      background-size: contain;
      background-repeat: no-repeat;
      position: absolute;
      z-index: 2;
      bottom: -2%;
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
      opacity: 0;
    }
    .phoneBackground {
      position: absolute;
      width: 132%;
      height: 116%;
      left: -16%;
      top: -7.2%;
      background-image: url(http://localhost:8000/image/editor/iphone.png);
      background-size: contain;
      background-repeat: no-repeat;
      z-index: 5;
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
      border-radius: 0px;
      margin-top: 0%;
      width: 100%;
      height: 100%;
      margin-bottom: 0%;
      margin-right: 0%;
    }
    .view > .gu-unselectable > img:nth-child(2):not(.gu-mirror) {
      display:none;
    }
    #tool-area > #modern-tool {
      position: absolute;
      left: -5%;
      bottom: 10%;
      height: 80%;
      width: 95%;
    }
    body.gu-unselectable {
      opacity: 1;
      background: #f3f3f3;
      z-index: -1;
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
        });
      }

      var noneA = document.getElementsByClassName('none');
      function problemDragger(selectArea, target1Area, target2Area, target3Area) {
        dragula([selectArea, target1Area, target2Area, target3Area], {
          direction: 'mixed',
          copy: true,
          revertOnSpill: true
        }).on('drop', function (el, target, source, sibling) {
            var element = el;
            var targetContainer = target;
            var siblingTarget = sibling;
            this.cancel(true);
            $(targetContainer).empty().append(element);
        }).on('drag', function (el, target, source, sibling) {
            $(target1Area).addClass('gu-unselectable');
            $(target2Area).addClass('gu-unselectable');
            $(target3Area).addClass('gu-unselectable');
        }).on('dragend', function (el, target, source, sibling) {
            $(target1Area).removeClass('gu-unselectable');
            $(target2Area).removeClass('gu-unselectable');
            $(target3Area).removeClass('gu-unselectable');
        });
      }

      //Toolbar dragging
      var toolbarSelectArea = document.getElementById('selection-toolbar-area');
      var toolbarArea = document.getElementById('toolbar-area');
      dragger(toolbarSelectArea, toolbarArea);

      //Background dragging
      var backgroundSelectArea = document.getElementById('selection-background-area');
      var backgroundArea = document.getElementById('background-area');
      dragger(backgroundSelectArea, backgroundArea);

      //Competitor dragging
      var competitorSelectArea = document.getElementById('selection-competitor-area');
      var competitorArea = document.getElementById('competitor-area');
      dragger(competitorSelectArea, competitorArea);

      //Tool dragging
      var toolSelectArea = document.getElementById('selection-tool-area');
      var toolArea = document.getElementById('tool-area');
      dragger(toolSelectArea, toolArea);

      //Tactics dragging
      var tacticsSelectArea = document.getElementById('selection-tactics-area');
      var tacticsArea = document.getElementById('tactics-area');
      dragger(tacticsSelectArea, tacticsArea);

      //Topbar dragging
      var topbarSelectArea = document.getElementById('selection-topbar-area');
      var topbarArea = document.getElementById('topbar-area');
      dragger(topbarSelectArea, topbarArea);

      //Products dragging
      var productsSelectArea = document.getElementById('selection-products-area');
      var productsArea = document.getElementById('products-area');
      dragger(productsSelectArea, productsArea);

      //Hero dragging
      var heroSelectArea = document.getElementById('selection-hero-area');
      var heroArea = document.getElementById('hero-area');
      dragger(heroSelectArea, heroArea);

      //Problem dragging
      var problemSelectArea = document.getElementById('selection-problem-area');
      var problem1Area = document.getElementById('problem1-area');
      var problem2Area = document.getElementById('problem2-area');
      var problem3Area = document.getElementById('problem3-area');
      problemDragger(problemSelectArea, problem1Area, problem2Area, problem3Area);
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
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Tools</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-tool-area">
                <img src="../image/editor/modern/tool.png" class="selection-tool-image" id="modern-tool">
                <img src="../image/editor/fantasy/tool.png" class="selection-tool-image">
              </div>
            </div>
          </li>
        </ul>
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Heroes</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-hero-area">
                <img src="../image/editor/heroes/wizard.png" class="selection-hero-image">
                <img src="../image/editor/heroes/builder.png" class="selection-hero-image">
                <img src="../image/editor/heroes/mage.png" class="selection-hero-image">
                <img src="../image/editor/heroes/goblin.png" class="selection-hero-image">
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="medium-4 columns">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Products</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-products-area">
                <img src="../image/editor/modern/products.png" class="selection-products-image">
                <img src="../image/editor/fantasy/products.png" class="selection-products-image">
              </div>
            </div>
          </li>
        </ul>
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Tool Bar</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-toolbar-area">
                <img src="../image/editor/modern/main_hud.png" class="selection-toolbar-image">
                <img src="../image/editor/fantasy/main_hud.png" class="selection-toolbar-image">
              </div>
            </div>
          </li>
        </ul>
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Top Bar</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-topbar-area">
                <img src="../image/editor/modern/topbar.png" class="selection-topbar-image">
                <img src="../image/editor/fantasy/topbar.png" class="selection-topbar-image">
              </div>
            </div>
          </li>
        </ul>
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Competitors</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-competitor-area">
                <img src="../image/editor/competitor/ninja.png" class="selection-competitor-image">
                <img src="../image/editor/competitor/robot-blue.png" class="selection-competitor-image">
                <img src="../image/editor/competitor/robot-gray.png" class="selection-competitor-image">
                <img src="../image/editor/competitor/robot-red.png" class="selection-competitor-image">
                <img src="../image/editor/competitor/robot-white.png" class="selection-competitor-image">
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
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Tactics</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-tactics-area">
                <img src="../image/editor/modern/tactics.png" class="selection-tactics-image">
                <img src="../image/editor/fantasy/tactics.png" class="selection-tactics-image">
              </div>
            </div>
          </li>
        </ul>
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#" class="accordion-title">Problems</a>
            <div class="accordion-content" data-tab-content>
              <div id="selection-problem-area">
                <img src="../image/editor/modern/problem.png" class="selection-problem-image">
                <img src="../image/editor/fantasy/problem.png" class="selection-problem-image">
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
            <div class="phoneBackground"></div>
            <div class="background" id="background-area"></div>
            <div class="topbar" id="topbar-area"></div>
            <div class="toolbar" id="toolbar-area"></div>
            <div class="products" id="products-area"></div>
            <div class="tactics" id="tactics-area"></div>
            <div class="competitor" id="competitor-area"></div>
            <div class="hero" id="hero-area"></div>
            <div class="problem1" id="problem1-area"></div>
            <div class="problem2" id="problem2-area"></div>
            <div class="problem3" id="problem3-area"></div>
            <div class="tool" id="tool-area"></div>
          </div>
          <img src="../image/editor/iphone.png" class="phoneImage">
        </div>
      </div>
    </div>
  </div>
  <div class="none"></div>
</div>



@stop
