@extends('template')
@section('content')
@include('cms.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">
<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">

  <style>
    #spell-sidebar {
      position: absolute;
      left: 16.66667%;
      height: 95%;
      background-color: #444;
      top: 57px;
      border-left: 2px solid #5a5959;
      border-top-right-radius: 75px;
      border-bottom-right-radius: 75px;
      transition: width 300ms linear, left 300ms linear, transform 300ms linear;
    }
    .spell-sidebar-open {
    width: 12%;
    z-index: 1;
    }
    .spell-sidebar-open:after {
      content: "➔";
      color: white;
      top: 50%;
      position: absolute;
      right: 5%;
      -moz-transform: scale(-1, 1);
      -webkit-transform: scale(-1, 1);
      -o-transform: scale(-1, 1);
      -ms-transform: scale(-1, 1);
      transform: scale(-1, 1);
    }
    .spell-sidebar-closed {
      position: absolute;
      width: 2%;
      border-top-right-radius: 50px;
      border-bottom-right-radius: 50px;
      z-index: 1;
    }
    .spell-sidebar-closed:after {
      content: "➔";
      color: white;
      top: 50%;
      position: absolute;
      right: 25%;
    }
    .spell-sidebar-storage {
      height: 85%;
      top: 7.5%;
      position: absolute;
      width: 80%;
      left: 3%;
      background-color: #5e5e5e;
      border-radius: 8px;
      overflow-y: scroll;
      overflow-x: hidden;
      padding:5%;
      padding-right: 10%;
      z-index: 2;
    }
    .spell-sidebar-storage::-webkit-scrollbar-track
    {
    	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    	border-radius: 10px;
    	background-color: #F5F5F5;
    }
    .spell-sidebar-storage::-webkit-scrollbar
    {
    	width: 12px;
    	background-color: #444;
    }
    .spell-sidebar-storage::-webkit-scrollbar-thumb
    {
    	border-radius: 10px;
    	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    	background-color: #555;
    }
    .spell-sidebar-storage-icon {
      height: 18%;
      width: 108%;
      margin-bottom: 9%;
      display: inline-block;
      background-color: #383838;
      border-radius: 10px;
      border: 1px solid black;
      z-index: 2;
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
    }
    #spell-actionbar{
      background-color: #444;
      position: absolute;
      top: 70%;
      width: 50%;
      height: 17%;
      left: 40%;
      border-radius: 10px;
      z-index: 1;
      padding-left: 1%;
      padding-top: .5%;
      padding-bottom: .5%;
      padding-right: 1%;
      z-index: 1;
      display: flex;
    }
    .spell-actionbar-item {
      position: relative;
      height: 100%;
      width: 16%;
      margin-left: .5%;
      display: inline-block;
      margin-right: .5%;
      background-color: #383838;
      border-radius: 10px;
      border: 1px solid black;
      z-index: 2;
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .spell-actionbar-empty:after {
      color: #a6a9af;
      text-align: center;
      content: "+";
      z-index: 2;
      font-size: 8vh;
      margin-top: 10%;
      display: flex;
      justify-content: center;
    }
    #spell-icon-group {
      background-image: url(../image/editor/tactics/group.png);
    }
    #spell-icon-cycle {
      background-image: url(../image/editor/tactics/cycle.png);
    }
    #spell-icon-insurance {
      background-image: url(../image/editor/tactics/insurance.png);
    }
    #spell-icon-loan {
      background-image: url(../image/editor/tactics/loan.png);
    }
    #spell-icon-research {
      background-image: url(../image/editor/tactics/research.png);
    }

  </style>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js'></script>
  <script type="text/javascript" src="{{ url('js/cms/editor/adapttext.js') }}"></script>
  <script lang="text/javascript">
    $(document).ready(function() {

      //Sidebar open/close function
      function sidebarSlide() {
        var open = document.querySelector(".spell-sidebar-open");
        var closed = document.querySelector(".spell-sidebar-closed");
        var el = document.querySelector("#spell-sidebar");
        var storage = document.querySelector(".spell-sidebar-storage");
        if ($(event.target).attr('id') !== 'spell-sidebar') {
          return false;
        }
        if (open) {
          el.className = "spell-sidebar-closed";
          setTimeout(function(){$(storage).hide();},190);
        } else if (closed) {
          el.className = "spell-sidebar-open";
          setTimeout(function(){$(storage).show();},300);
        }
        return el;
      }
      $('.spell-sidebar-open').on("click", sidebarSlide);
      $('.spell-sidebar-closed').on("click", sidebarSlide);

      //Dragging sidebar-storage icons to actionbar
      function actionbarDrag(selectArea, targetArea) {
        dragula([selectArea, targetArea], {
          accepts: function (el, target) {
            return target !== selectArea
          },
          mirrorContainer: targetArea,
          direction: 'mixed',
          copy: true,
          revertOnSpill: true
        }).on('dragend', function () {
            console.log('Drag started');
        }).on('drop', function (el, target, source, sibling) {
            var element = el;
            var targetContainer = target;
            var siblingTarget = sibling;
            this.cancel(true);
            $(targetContainer).removeClass('spell-actionbar-empty');
            $(targetContainer).attr('id', ''+$(el).attr('id')+'');
        });
      }
      //Initialize dragging

      var actionbarSelectArea = document.getElementById('spell-icon-group');
      var actionbarArea = $('.spell-actionbar-empty');
      actionbarDrag(actionbarSelectArea)

    });
  </script>

  <div class="medium-2 columns">
    @include('cms.menu')
  </div>
  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Spell Editor</h2>
  </div>
  <div class="medium-2 columns">
    <div class="spell-sidebar-open" id="spell-sidebar">
      <div class="spell-sidebar-storage">
        <div class="spell-sidebar-storage-icon" id="spell-icon-container">
          <img src="../image/editor/tactics/group.png" id="spell-icon-group">
        </div>
        <div class="spell-sidebar-storage-icon" id="spell-icon-container">
          <img src="../image/editor/tactics/insurance.png" id="spell-icon-insurance">
        </div>
        <div class="spell-sidebar-storage-icon" id="spell-icon-container">
          <img src="../image/editor/tactics/loan.png" id="spell-icon-loan">
        </div>
        <div class="spell-sidebar-storage-icon" id="spell-icon-container">
          <img src="../image/editor/tactics/research.png" id="spell-icon-research">
        </div>
        <div class="spell-sidebar-storage-icon" id="spell-icon-container">
          <img src="../image/editor/tactics/cycle.png"  id="spell-icon-cycle">
        </div>
      </div>
    </div>
  </div>
  <div class="medium-8 columns" id="spell-actionbar">
    <div class="spell-actionbar-item spell-actionbar-empty"></div>
  </div>

</div>

</form>

@stop
