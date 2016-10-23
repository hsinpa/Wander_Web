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
      overflow-y: hidden;
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
      border: 7px solid #383838;
    }
    #spell-actionbar{
      background-color: #444;
      position: absolute;
      top: 70%;
      width: 60%;
      height: 17%;
      left: 35%;
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
    #spell-actionbar-empty:after {
      color: #a6a9af;
      text-align: center;
      content: "+";
      z-index: 2;
      font-size: 8vh;
      margin-top: 10%;
      display: flex;
      justify-content: center;
    }
    .spell-icon-container > img {
      width: 90%;
      height: 90%;
      margin-left: 5%;
      margin-top: 5%;
    }
    .spell-actionbar-item > #spell-icon-group {
      width: 90%;
      margin-left: 5%;
      position: absolute;
      top: 10%;
    }
    #spell-sidebar-customer {
      background-image: url("../image/editor/customers/knight.png");
    }
    #spell-sidebar-product {
      background-image: url("../image/editor/products/hat-brown.png");
    }
    #spell-sidebar-opponent {
      background-image: url("../image/editor/competitor/robot-gray.png");
    }

    /*/ Actionbar - Opponent /*/
    #spell-actionbar-opponent-1 {
      background-image: url("../image/editor/competitor/robot-gray.png");
    }
    #spell-actionbar-opponent-2 {
      background-image: url("../image/editor/competitor/robot-white.png");
    }
    #spell-actionbar-opponent-3 {
      background-image: url("../image/editor/competitor/robot-blue.png");
    }
    #spell-actionbar-opponent-4 {
      background-image: url("../image/editor/competitor/ninja.png");
    }
    #spell-actionbar-opponent-5 {
      background-image: url("../image/editor/competitor/robot-red.png");
    }

    /*/ Actionbar - Product /*/
    #spell-actionbar-product-1 {
      background-image: url("../image/editor/products/hat-brown.png");
    }
    #spell-actionbar-product-2 {
      background-image: url("../image/editor/products/cloak-red.png");
    }
    #spell-actionbar-product-3 {
      background-image: url("../image/editor/products/ring-blue.png");
    }
    #spell-actionbar-product-4 {
      background-image: url("../image/editor/products/shoes-brown.png");
    }
    #spell-actionbar-product-5 {
      background-image: url("../image/editor/products/bag-blue.png");
    }
    #spell-actionbar-product-6 {
      background-image: url("../image/editor/products/watch-red.png");
    }

    /*/ Actionbar - Customer /*/
    #spell-actionbar-customer-1 {
      background-image: url("../image/editor/customers/knight.png");
    }
    #spell-actionbar-customer-2 {
      background-image: url("../image/editor/customers/orc.png");
    }
    #spell-actionbar-customer-3 {
      background-image: url("../image/editor/customers/paladin.png");
    }
    #spell-actionbar-customer-4 {
      background-image: url("../image/editor/customers/orc-family.png");
    }
    #spell-actionbar-customer-5 {
      background-image: url("../image/editor/customers/goblin-old.png");
    }
    #spell-actionbar-customer-6 {
      background-image: url("../image/editor/customers/goblin-young.png");
    }

    #spell-window {
      position: absolute;
      width: 35%;
      height: 50%;
      background-color: #444;
      border-radius: 10px;
      left: 35%;
      top: 15%;
    }
    #spell-window-image {
      position: absolute;
      height: 40%;
      width: 40%;
      top: 5%;
      left: 5%;
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
    }
    #spell-window-name {
      position: absolute;
      width: 40%;
      height: 7%;
      left: 50%;
      top: 10%;
      color: white;
      font-size: 2vh;
    }
    #spell-window-type {
      position: absolute;
      width: 40%;
      height: 7%;
      left: 50%;
      top: 22%;
      color:white;
      font-size: 2vh;
    }
    #spell-window-attr-1 {
      position: absolute;
      top: 55%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    #spell-window-attr-2 {
      position: absolute;
      top: 62%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    #spell-window-attr-3 {
      position: absolute;
      top: 69%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    #spell-window-attr-4 {
      position: absolute;
      top: 76%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    #spell-window-attr-5 {
      position: absolute;
      top: 83%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    .spell-window-attr-name {
      position: absolute;
      font-size: 2vh;
      top: 10%;
      color: white;
      border: 1px solid #cacaca;
      width: auto;
      border-radius: 5px;
      padding-left: 2%;
      padding-right: 2%;
      height: 86%;
      background-color: #383838;
      text-align: center;
      left: 10%;
    }
    .spell-window-attr-name > input {
      width: 95%;
      position: absolute;
      border-radius: 5px;
      height: 90%;
      top: 5%;
      background-color: #383838;
      color: white;
      font-size: 1.5vh;
    }
    .spell-window-attr-name > input:focus {
      background-color: #383838;
    }
    .spell-window-attr-value > input {
      width: 100%;
      position: absolute;
      border-radius: 5px;
      height: 90%;
      top: 5%;
      background-color: #383838;
      color: white;
      font-size: 1.5vh;
    }
    .spell-window-attr-value > input:focus {
      background-color: #383838;
    }
    .spell-window-attr-value {
      position: absolute;
      left: 50%;
      width: 35%;
      height: 100%;
    }
    .spell-window-attr-value > input:nth-child(1) {
      z-index: 3;
      cursor: default;
    }
    .spell-window-attr-type {
      position: absolute;
      left: 85%;
      width: 20%;
      height: 100%;
    }
    .spell-button-percentage {
      max-height: 100%;
      padding: 0;
      margin: 0;
      top: 5%;
      left: 10%;
      width: 25%;
      position: absolute;
      padding-top: 7%;
      padding-bottom: 7%;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      padding-left: 4%;
      padding-right: 4%;
      background-color: #383838;
      border: 1px solid #cacaca;
    }
    .spell-button-percentage:hover, .spell-button-percentage:focus {
      background-color: #444;
    }
    .spell-button-number {
      max-height: 100%;
      padding: 0;
      margin: 0;
      top: 5%;
      left: 35%;
      width: 25%;
      position: absolute;
      padding-top: 7%;
      padding-bottom: 7%;
      background-color: #383838;
      border: 1px solid #cacaca;
    }
    .spell-button-number:hover, .spell-button-number:focus {
      background-color: #444;
    }
    .spell-button-delta {
      max-height: 100%;
      padding: 0;
      margin: 0;
      top: 5%;
      left: 60%;
      width: 25%;
      position: absolute;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      padding-right: 4%;
      padding-left: 4%;
      padding-top: 7%;
      padding-bottom: 7%;
      background-color: #383838;
      border: 1px solid #cacaca;
    }
    .spell-button-delta:hover, .spell-button-delta:focus {
      background-color: #444;
    }
    .spell-window-attr-active {
      width: 3%;
      position: absolute;
      height: 80%;
      top: 20%;
    }
    #spell-window > .spell-window-attr-active {
      display: none;
    }
    #spell-information {
      background-color: #444;
      left: 72%;
      width: 23%;
      height: 50%;
      top: 15%;
      position: absolute;
      border-radius: 10px;
    }
    #spell-information > .spell-information-name {
      position: absolute;
      top: 50%;
      width: 80%;
      left: 10%;
      height: 10%;
      font-size: 2.5vh;
      color: white;
    }
    #spell-information > .spell-information-name > .spell-information-name-title {
      color: gray;
    }
    #spell-information > .spell-information-description {
      position: absolute;
      top: 60%;
      width: 80%;
      left: 10%;
      height: 20%;
      font-size: 2.5vh;
      color: white;
    }
    #spell-information > .spell-information-name > .spell-information-description-title {
      color: gray;
    }
    #spell-information > .spell-information-image {
      position: absolute;
      height: 40%;
      width: 40%;
      top: 5%;
      left: 5%;
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      background-image: url("../image/editor/tactics/group.png");
    }
    #spell-window-image > .spell-window-image-1 {
      position: absolute;
      width: 33%;
      height: 50%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
    #spell-window-image > .spell-window-image-2 {
      position: absolute;
      left: 33%;
      width: 33%;
      height: 50%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
    #spell-window-image > .spell-window-image-3 {
      position: absolute;
      left: 66%;
      width: 33%;
      height: 50%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
    #spell-window-image > .spell-window-image-4 {
      position: absolute;
      top: 53%;
      width: 33%;
      height: 50%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
    #spell-window-image > .spell-window-image-5 {
      position: absolute;
      top: 53%;
      left: 33%;
      width: 33%;
      height: 50%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
    #spell-window-image > .spell-window-image-6 {
      position: absolute;
      top: 53%;
      left: 66%;
      width: 33%;
      height: 50%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
    .spell-window-attr-value > input:nth-child(3) {
      display: none;
    }
    #spell-information > span.spell-information-name {
      font-size: 2vh;
    }
    .spell-information-name > input {
      display: inline-block;
      width: 60%;
      z-index: 2;
      position: relative;
      border-radius: 5px;
      height: 60%;
    }
    #spell-information > span.spell-information-description {
      font-size: 2vh;
    }
    #spell-window-container {
      position: absolute;
      width: 35%;
      height: 50%;
      background-color: #444;
      border-radius: 10px;
      left: 35%;
      top: 15%;
    }
    .spell-window-item {
      position: absolute;
      width: 28%;
      height: 45%;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
    .spell-window-container-1 {
      top: 13%;
      left: 5%;
    }
    .spell-window-container-2 {
      top: 13%;
      left: 35%;
    }
    .spell-window-container-3 {
      top: 13%;
      left: 65%;
    }
    .spell-window-container-4 {
      top: 55%;
      left: 5%;
    }
    .spell-window-container-5 {
      top: 55%;
      left: 35%;
    }
    .spell-window-container-6 {
      top: 55%;
      left: 65%;
    }
    .spell-window-title {
      font-size: 2.5vh;
      top: 2%;
      position: absolute;
      left: 4%;
      color: white;
    }
    #spell-window-close {
      background-image: url("../image/editor/close.png");
      position: absolute;
      width: 7%;
      height: 5%;
      top: 3%;
      left: 88%;
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
    }
  </style>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js'></script>
  <script type="text/javascript" src="{{ url('js/cms/editor/adapttext.js') }}"></script>
  <script lang="text/javascript">
    $(document).ready(function() {
      $('#spell-window').hide();
      $('#spell-actionbar').hide();
      $('#spell-information').hide();
      $('#spell-window-product').hide();
      $('#spell-window-competitor').hide();
      $('#spell-window-container').hide();


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
/*
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
            $(targetContainer).removeAttr('id');
            $(targetContainer).empty().append(el);
            var newContainer = '<div class="spell-actionbar-item" id="spell-actionbar-empty"></div>';
            $('#spell-actionbar').append(newContainer);

            var array = document.getElementsByClassName('spell-icon-container');
            var actionbarSelectArea = Array.prototype.slice.call(array);
            var array = document.getElementsByClassName('spell-actionbar-item');
            var actionbarArea = Array.prototype.slice.call(array);
            actionbarDrag(actionbarSelectArea, actionbarArea);
        });
      }

      //Initialize dragging
      var array = document.getElementsByClassName('spell-icon-container');
      var actionbarSelectArea = Array.prototype.slice.call(array);
      var array = document.getElementsByClassName('spell-actionbar-item');
      var actionbarArea = Array.prototype.slice.call(array);
      var actionDrag = dragula ({
        direction: 'mixed',
        copy: true,
        revertOnSpill: true,
        containers: actionbarSelectArea,
        containers: actionbarArea
      }).on('drag', function () {
          console.log('Drag started');
      }).on('drop', function (el, target, source, sibling) {
          var element = el;
          var targetContainer = target;
          var siblingTarget = sibling;
          this.cancel(true);
          $(targetContainer).removeClass('spell-actionbar-empty');
          $(targetContainer).removeAttr('id');
          $(targetContainer).empty().append(el);
          var newContainer = '<div class="spell-actionbar-item" id="spell-actionbar-empty"></div>';
          $('#spell-actionbar').append(newContainer);
      });
      */
      var opponentBar = '<div class="spell-actionbar-item" id="spell-actionbar-opponent-1"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-opponent-2"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-opponent-3"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-opponent-4"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-opponent-5"></div>'

      var productBar = '<div class="spell-actionbar-item" id="spell-actionbar-product-1"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-product-2"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-product-3"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-product-4"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-product-5"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-product-6"></div>'

      var customerBar = '<div class="spell-actionbar-item" id="spell-actionbar-customer-1"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-customer-2"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-customer-3"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-customer-4"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-customer-5"></div>\
      <div class="spell-actionbar-item" id="spell-actionbar-customer-6"></div>'

      var spellForm = $('#spell-form');
      $(spellForm).on("click",$('.spell-window-attr-value input:nth-child(1)'), function() {
        $(event.target).next().css("z-index","4").focus();
      });
      $(document).on("input", $('.spell-window-attr-value input:nth-child(2)'), function () {
        var value = $(event.target).val();
        if (! /^-?\d*\.?\d+$/.test(value)) {
          $(event.target).parent().next('div').find("button").prop("disabled", true);
        } else {
          $(event.target).parent().next('div').find("button").prop("disabled", false);
        }
      });
      $(document).on("focusout",$('.spell-window-attr-value input:nth-child(2)'), function() {
        if ($(event.target).hasClass('spell-window-attr-value') == false){
          return false;
        }
        var value = $(event.target).val();
        if (! /^-?\d*\.?\d+$/.test(value)) {
          $(event.target).prev().val(value);
          $(event.target).prev().css("color","white");
          $(event.target).css("z-index","2");
          $(event.target).parent().parent().prepend('<div class="spell-window-attr-active"><input type="radio" checked></div>');
        } else {
          return false;
        }
      });
      $('.spell-window-attr-type .spell-button-percentage').on("click" ,function() {
        var temp = $(event.target).parent().prev().find(">:last-child").val();
        var perc = $(event.target).parent().prev().find(">:first-child").next().val();
        var result = (perc / 100) * temp;
        $(event.target).parent().prev().find(">:first-child").val(result);
        $(event.target).parent().prev().find(">:first-child").css("z-index","4");
        $(event.target).parent().prev().find(">:first-child").next().css("z-index","2");
        $(event.target).parent().parent().prepend('<div class="spell-window-attr-active"><input type="radio" checked></div>');
        if (perc < 100) {
          $(event.target).parent().prev().find(">:first-child").css("color","red");
        } else if (perc > 100){
          $(event.target).parent().prev().find(">:first-child").css("color","green");
        } else if (perc == 100) {
          $(event.target).parent().prev().find(">:first-child").css("color","white");
        }
      });
      $('.spell-window-attr-type .spell-button-number').on("click" ,function() {
        var temp = $(event.target).parent().prev().find(">:last-child").val();
        var add = $(event.target).parent().prev().find(">:first-child").next().val();
        var result = parseInt(temp) + parseInt(add);
        $(event.target).parent().prev().find(">:first-child").val(result);
        $(event.target).parent().prev().find(">:first-child").css("z-index","4");
        $(event.target).parent().prev().find(">:first-child").next().css("z-index","2");
        $(event.target).parent().parent().prepend('<div class="spell-window-attr-active"><input type="radio" checked></div>');
        var num = parseInt($(event.target).parent().prev().find(">:first-child").next().val());
        if (add < 0) {
          $(event.target).parent().prev().find(">:first-child").css("color","red");
        } else if (add > 0){
          $(event.target).parent().prev().find(">:first-child").css("color","green");
        } else if (add == 0) {
          $(event.target).parent().prev().find(">:first-child").css("color","white");
        }
      });
      $('.spell-window-attr-type .spell-button-delta').on("click" ,function() {
        var temp = $(event.target).parent().prev().find(">:last-child").val();
        var add = $(event.target).parent().prev().find(">:first-child").next().val();
        var result = parseInt(add);
        $(event.target).parent().prev().find(">:first-child").val(result);
        $(event.target).parent().prev().find(">:first-child").css("z-index","4");
        $(event.target).parent().prev().find(">:first-child").next().css("z-index","2");
        $(event.target).parent().parent().prepend('<div class="spell-window-attr-active"><input type="radio" checked></div>');
        var num = parseInt($(event.target).parent().prev().find(">:first-child").next().val());
        if (result < temp) {
          $(event.target).parent().prev().find(">:first-child").css("color","red");
        } else if (result > temp){
          $(event.target).parent().prev().find(">:first-child").css("color","green");
        } else if (result == temp) {
          $(event.target).parent().prev().find(">:first-child").css("color","white");
        }
      });
      var spellActionbar = $('#spell-actionbar');
      $(spellActionbar).on("click",$('#spell-actionbar .spell-actionbar-item'), function() {
        if ($(event.target).hasClass('spell-actionbar-item') == false){
          return false;
        }

        $('#spell-window').show(600);
        $('#spell-information').show(600);


        var bg = $(event.target).css('background-image');
        $('#spell-window-image').css('background-image',bg);
        if ($('.spell-window-container-1').css('background-image') == "none" || $('.spell-window-container-1').css('background-image') == bg) {
          $('.spell-window-container-1').css('background-image',bg);
        } else if ($('.spell-window-container-2').css('background-image') == "none" || $('.spell-window-container-2').css('background-image') == bg) {
          $('.spell-window-container-2').css('background-image',bg);
        } else if ($('.spell-window-container-3').css('background-image') == "none" || $('.spell-window-container-3').css('background-image') == bg) {
          $('.spell-window-container-3').css('background-image',bg);
        } else if ($('.spell-window-container-4').css('background-image') == "none" || $('.spell-window-container-4').css('background-image') == bg) {
          $('.spell-window-container-4').css('background-image',bg);
        } else if ($('.spell-window-container-5').css('background-image') == "none" || $('.spell-window-container-5').css('background-image') == bg) {
          $('.spell-window-container-5').css('background-image',bg);
        } else if ($('.spell-window-container-6').css('background-image') == "none" || $('.spell-window-container-6').css('background-image') == bg) {
          $('.spell-window-container-6').css('background-image',bg);
        }
        if (bg.includes("competitor")){
          $('#spell-window-type').html('Type: Competitor');
          if (bg.includes("ninja")) {
            $('#spell-window-name').html('Name: Ninja');
          } else if (bg.includes("robot-blue")) {
            $('#spell-window-name').html('Name: Blue Robot');
          } else if (bg.includes("robot-gray")) {
            $('#spell-window-name').html('Name: Gray Robot');
          } else if (bg.includes("robot-red")) {
            $('#spell-window-name').html('Name: Red Robot');
          } else if (bg.includes("robot-white")) {
            $('#spell-window-name').html('Name: White Robot');
          }
        } else if (bg.includes("products")){
          $('#spell-window-type').html('Type: Product');
          if (bg.includes("bag")) {
            $('#spell-window-name').html('Name: Bag');
          } else if (bg.includes("cloak")) {
            $('#spell-window-name').html('Name: Cloak');
          } else if (bg.includes("hat")) {
            $('#spell-window-name').html('Name: Hat');
          } else if (bg.includes("ring")) {
            $('#spell-window-name').html('Name: Ring');
          } else if (bg.includes("shoes")) {
            $('#spell-window-name').html('Name: Shoes');
          } else if (bg.includes("watch")) {
            $('#spell-window-name').html('Name: Watch');
          }
        } else {
          $('#spell-window-type').html('Type: Customer');
          if (bg.includes("knight")) {
            $('#spell-window-name').html('Name: Knight');
          } else if (bg.includes("paladin")) {
            $('#spell-window-name').html('Name: Paladin');
          } else if (bg.includes("goblin-young")) {
            $('#spell-window-name').html('Name: Young Goblin');
          } else if (bg.includes("goblin-old")) {
            $('#spell-window-name').html('Name: Old Goblin');
          } else if (bg.includes("orc-family")) {
            $('#spell-window-name').html('Name: Orc Family');
          } else if (bg.includes("orc")) {
            $('#spell-window-name').html('Name: Orc');
          }
        }
      });
      $('.spell-sidebar-storage #spell-sidebar-customer').on("click" ,function() {
        $('#spell-actionbar').show().empty().append(customerBar);
        document.getElementById('spell-form').reset();
        for (x = 1; x < 6; x++){
          var tmp = Math.floor(Math.random() * 100) + 1;
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(1)').val(tmp.toString());
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(3)').val(tmp.toString());
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(1)').css("color", "white");
        }
        $('#spell-window-container').hide(600);
        $('.spell-window-attr-active').remove();
        $('#spell-window-container').children().css("background-image", "none");
        $('.spell-window-container-1').empty();
        $('.spell-window-container-2').empty();
        $('.spell-window-container-3').empty();
        $('.spell-window-container-4').empty();
        $('.spell-window-container-5').empty();
        $('.spell-window-container-6').empty();
        $('#spell-window').hide(600);
        $('#spell-information').show(600);
        setTimeout(function(){ $('.spell-window-title').empty().text('Customers affected'); }, 600);
      });
      $('.spell-sidebar-storage #spell-sidebar-product').on("click" ,function() {
        $('#spell-actionbar').show().empty().append(productBar);
        document.getElementById('spell-form').reset();
        for (x = 1; x < 6; x++){
          var tmp = Math.floor(Math.random() * 100) + 1;
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(1)').val(tmp.toString());
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(3)').val(tmp.toString());
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(1)').css("color", "white");
        }
        $('#spell-window-container').hide(600);
        $('.spell-window-attr-active').remove();
        $('#spell-window-container').children().css("background-image", "none");
        $('.spell-window-container-1').empty();
        $('.spell-window-container-2').empty();
        $('.spell-window-container-3').empty();
        $('.spell-window-container-4').empty();
        $('.spell-window-container-5').empty();
        $('.spell-window-container-6').empty();
        $('#spell-window').hide(600);
        $('#spell-information').show(600);
        setTimeout(function(){ $('.spell-window-title').empty().text('Products affected'); }, 600);
      });
      $('.spell-sidebar-storage #spell-sidebar-opponent').on("click" ,function() {
        $('#spell-actionbar').show().empty().append(opponentBar);
        document.getElementById('spell-form').reset();
        for (x = 1; x < 6; x++){
          var tmp = Math.floor(Math.random() * 100) + 1;
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(1)').val(tmp.toString());
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(3)').val(tmp.toString());
          $('#spell-window-attr-value-' + x + ' >  input:nth-child(1)').css("color", "white");
        }
        $('#spell-window-container').hide(600);
        $('.spell-window-attr-active').remove();
        $('#spell-window-container').children().css("background-image", "none");
        $('.spell-window-container-1').empty();
        $('.spell-window-container-2').empty();
        $('.spell-window-container-3').empty();
        $('.spell-window-container-4').empty();
        $('.spell-window-container-5').empty();
        $('.spell-window-container-6').empty();
        $('#spell-window').hide(600);
        $('#spell-information').show(600);
        setTimeout(function(){ $('.spell-window-title').empty().text('Competitors affected'); }, 600);
      });
      $('#spell-window-close').on("click" ,function() {
        $('#spell-window').hide(600);
        setTimeout(function(){ $('#spell-window-container').show(600); }, 600);
      });


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
        <div class="spell-sidebar-storage-icon spell-icon-container" id="spell-sidebar-customer">
        </div>
        <div class="spell-sidebar-storage-icon spell-icon-container" id="spell-sidebar-product">
        </div>
        <div class="spell-sidebar-storage-icon spell-icon-container" id="spell-sidebar-opponent">
        </div>
      </div>
    </div>
  </div>
  <div class="medium-8 columns" id="spell-actionbar">
    <div class="spell-actionbar-item" id="spell-actionbar-opponent-1"></div>
    <div class="spell-actionbar-item" id="spell-actionbar-opponent-2"></div>
    <div class="spell-actionbar-item" id="spell-actionbar-opponent-3"></div>
    <div class="spell-actionbar-item" id="spell-actionbar-opponent-4"></div>
    <div class="spell-actionbar-item" id="spell-actionbar-opponent-5"></div>
  </div>
  <div id="spell-window">
    <div id="spell-window-close"></div>
    <div id="spell-window-image"></div>
    <div id="spell-window-name"></div>
    <div id="spell-window-type"></div>
    <form id="spell-form">
      <div id="spell-window-attr-1">
        <span class="spell-window-attr-name" id="spell-window-attr-name-1">Population</span>
        <div class="spell-window-attr-value" id="spell-window-attr-value-1"><input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"><input type="text" placeholder="Value"></div>
        <div class="spell-window-attr-type" id="spell-window-attr-type-1"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
      </div>
      <div id="spell-window-attr-2">
        <span class="spell-window-attr-name" id="spell-window-attr-name-2">Awareness</span>
        <div class="spell-window-attr-value" id="spell-window-attr-value-2">Value: <input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"><input type="text" placeholder="Value"></div>
        <div class="spell-window-attr-type" id="spell-window-attr-type-2"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
      </div>
      <div id="spell-window-attr-3">
        <span class="spell-window-attr-name" id="spell-window-attr-name-3">Elasticity</span>
        <div class="spell-window-attr-value" id="spell-window-attr-value-3">Value: <input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"><input type="text" placeholder="Value"></div>
        <div class="spell-window-attr-type" id="spell-window-attr-type-3"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
      </div>
      <div id="spell-window-attr-4">
        <span class="spell-window-attr-name" id="spell-window-attr-name-4">Popularity</span>
        <div class="spell-window-attr-value" id="spell-window-attr-value-4">Value: <input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"><input type="text" placeholder="Value"></div>
        <div class="spell-window-attr-type" id="spell-window-attr-type-4"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
      </div>
      <div id="spell-window-attr-5">
        <span class="spell-window-attr-name" id="spell-window-attr-name-5">Responsiveness</span>
        <div class="spell-window-attr-value" id="spell-window-attr-value-5">Value: <input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"><input type="text" placeholder="Value"></div>
        <div class="spell-window-attr-type" id="spell-window-attr-type-5"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
      </div>
    </div>
  </div>
  </form>
  <div id="spell-information">
    <div class="spell-information-image"></div>
    <span class="spell-information-name">Spell Name: <input type="text"></span>
    <span class="spell-information-description">Description: <textarea rows="3"></textarea></span>
  </div>
  <div id="spell-window-container">
    <span class="spell-window-title"></span>
    <div class="spell-window-item spell-window-container-1"></div>
    <div class="spell-window-item spell-window-container-2"></div>
    <div class="spell-window-item spell-window-container-3"></div>
    <div class="spell-window-item spell-window-container-4"></div>
    <div class="spell-window-item spell-window-container-5"></div>
    <div class="spell-window-item spell-window-container-6"></div>
  </div>

</div>



@stop
