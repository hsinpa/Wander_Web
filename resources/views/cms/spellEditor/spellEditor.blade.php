@extends('template')
@section('content')
@include('cms.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">
<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">

  <style>

    p, ul, li, label, h2, h3, h4 {
      color: black;
    }

    .spell-container {
      position: absolute;
      left: 17%;
      width: 83%;
      height: 90%;
    }
    .spell-window {
      background-image: url(../image/editor/spell/spell_window.png);
      background-size: contain;
      background-repeat: no-repeat;
      width: 47%;
      height: 55%;
      left: 2%;
      top: 2%;
      position: relative;
      border-radius: 5px;
    }
    .spell-window-title {
      position: relative;
      left: 5.5%;
      top: 5.5%;
      width: 88%;
      height: 10%;
      font-size: 2.5vh;
      text-align: center;
    }
    .spell-window-image {
      position: absolute;
      width: 16%;
      height: 22%;
      left: 10%;
      top: 22%;
      background-image: url(../image/editor/spell/icons/megaphone.png);
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }
    .spell-window-description {
      position: absolute;
      left: 5%;
      top: 52%;
      width: 24%;
      height: 34%;
    }
    .spell-window-action {
      position: relative;
      left: 31%;
      top: 18%;
      width: 52%;
      height: 53%;
    }
    .spell-window-action-1 {
      background-image: url(../image/editor/spell/action.png);
      background-size: contain;
      background-repeat: no-repeat;
      position: relative;
      width: 91%;
      height: 29%;
      text-align: center;
      color: white;
      font-size: 2.5vh;
      padding-top: 3%;
    }
    .spell-window-action-2 {
      background-image: url(../image/editor/spell/action.png);
      background-size: contain;
      background-repeat: no-repeat;
      position: relative;
      width: 91%;
      height: 29%;
      text-align: center;
      color: white;
      font-size: 2.5vh;
      padding-top: 3%;
    }
    .spell-window-action-3 {
      background-image: url(../image/editor/spell/action.png);
      background-size: contain;
      background-repeat: no-repeat;
      position: relative;
      width: 91%;
      height: 29%;
      text-align: center;
      color: white;
      font-size: 2.5vh;
      padding-top: 3%;
    }

    .spell-action-window {
      background-color: #444;
      left: 51%;
      width: 47%;
      height: 55%;
      top: 2%;
      position: absolute;
      border-radius: 5px;
      padding: 1%;
      z-index: 1;
    }
    .spell-action-title {
      position: relative;
      left: 2%;
      top: 2%;
    }
    .spell-action-title:nth-of-type(2) {
      top:-3%;
    }
    .spell-action-target {
      position: relative;
      weight: 95%;
      columns: 2;
      -webkit-columns: 2;
      -moz-columns: 2;
      list-style-position: inside;
      text-indent: -.5em;
      overflow: hidden;
      margin-bottom: 0;
      padding-left: 2%;
    }
    .spell-action-target-storage {
      position: relative;
      overflow-x: hidden;
      overflow-y: scroll;
      width: 100%;
      height: 35%;
      top: -4%;
    }
    .spell-action-target-storage::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      border-radius: 10px;
      background-color: #F5F5F5;
      margin-left: 1%;
      margin-right: 1%;
    }
    .spell-action-target-storage::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #847f7f;
    }
    .spell-action-target-storage::-webkit-scrollbar {
      width: 12px;
      background-color: #444;
    }
    .spell-window-action-1-rename {
      position: relative;
      width: 8%;
      height: 60%;
      top: -60%;
      left: 102%;
      background-size: contain;
      background-repeat: no-repeat;
      background-image: url(../image/editor/spell/rename.png);
    }
    .spell-window-action-1-toggle {
      position: absolute;
      width: 8%;
      height: 15%;
      right: -10.5%;
      top: 4%;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .spell-window-action-2-rename {
      position: relative;
      width: 8%;
      height: 60%;
      top: -60%;
      left: 102%;
      background-size: contain;
      background-repeat: no-repeat;
      background-image: url(../image/editor/spell/rename.png);
    }
    .spell-window-action-2-toggle {
      position: absolute;
      width: 8%;
      height: 15%;
      right: -10.5%;
      top: 33%;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .spell-window-action-3-rename {
      position: relative;
      width: 8%;
      height: 60%;
      top: -60%;
      left: 102%;
      background-size: contain;
      background-repeat: no-repeat;
      background-image: url(../image/editor/spell/rename.png);
    }
    .spell-window-action-3-toggle {
      position: absolute;
      width: 8%;
      height: 15%;
      right: -10.5%;
      top: 62%;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .spell-window-toggle-remove {
      background-image: url(../image/editor/spell/remove.png);
    }
    .spell-window-toggle-add {
      background-image: url(../image/editor/spell/add.png);
    }
    .spell-action-cost-input {
      float: left !important;
    }
    .spell-action-cost-input > input {
      border-radius: 5px;
    }
    .spell-action-cost-input > label {
      font-size: 1.75vh;
    }
    .spell-action-buttons {
      text-align: center;
    }
    .spell-action-buttons > button {
      border-radius: 5px;
    }

    .spell-target-window {
      position: absolute;
      width: 79.7%;
      height: 32%;
      bottom: -3%;
      left: 18.6%;
      background-color: #444;
      border-radius: 5px;
      padding: 1%;
      overflow-x: auto;
      overflow-y: hidden;
      white-space: nowrap;
    }
    .spell-target-window::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      border-radius: 10px;
      background-color: #F5F5F5;
      margin-left: 1%;
      margin-right: 1%;
    }
    .spell-target-window::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #847f7f;
    }
    .spell-target-window::-webkit-scrollbar {
      width: 12px;
      background-color: #444;
    }
    .spell-target-item {
      position: relative;
      height: 96%;
      top: 1.5%;
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
    .spell-window-description-input {
      position: absolute;
      color: black;
      left: 5%;
      top: 52%;
      width: 25%;
      height: 30%;
      border-radius: 5px;
      border: none;
    }
    .spell-window-action-1-input, .spell-window-action-2-input, .spell-window-action-3-input {
      position: relative;
      width: 92%;
      height: 70%;
      text-align: center;
      background-color: #020403;
      color: white;
      font-size: 2.5vh;
      padding-top: 3%;
      padding-bottom: 2%;
      border-radius: 5px;
      border: none;
    }
    .spell-window-title-input {
      position: relative;
      background-color: #e6e6e6;
      color: black;
      left: 3%;
      margin-top: 2%;
      margin-bottom: -1%;
      width: 85%;
      height: 8%;
      font-size: 2.5vh;
      text-align: center;
    }

    .spell-information-window {
      position: absolute;
      width: 35%;
      height: 50%;
      background-color: #444;
      border-radius: 10px;
      border-color: darkgray;
      border-width: medium;
      border-style: solid;
      left: 35%;
      top: 4%;
      z-index: 2;
    }
    .spell-information-image {
      position: absolute;
      height: 40%;
      width: 40%;
      top: 5%;
      left: 5%;
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .spell-information-name {
      position: absolute;
      width: 40%;
      height: 7%;
      left: 50%;
      top: 10%;
      color: white;
      font-size: 2vh;
    }
    .spell-information-type {
      position: absolute;
      width: 40%;
      height: 7%;
      left: 50%;
      top: 24%;
      color:white;
      font-size: 2vh;
    }
    .spell-information-attr-1 {
      position: absolute;
      top: 55%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    .spell-information-attr-2 {
      position: absolute;
      top: 62%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    .spell-information-attr-3 {
      position: absolute;
      top: 69%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    .spell-information-attr-4 {
      position: absolute;
      top: 76%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    .spell-information-attr-5 {
      position: absolute;
      top: 83%;
      height: 7%;
      width: 90%;
      left: 5%;
    }
    .spell-information-attr-name {
      position: absolute;
      font-size: 2vh;
      top: 10%;
      color: white;
      width: auto;
      border-radius: 5px;
      padding-left: 2%;
      padding-right: 2%;
      height: 86%;
      background-color: #383838;
      text-align: center;
      left: 9%;
    }
    .spell-information-attr-name > input {
      width: 95%;
      position: absolute;
      border-radius: 5px;
      height: 90%;
      top: 5%;
      background-color: #383838;
      color: white;
      font-size: 1.5vh;
    }
    .spell-information-attr-name > input:focus {
      background-color: #383838;
    }
    .spell-information-attr-value > input {
      width: 100%;
      position: absolute;
      border-radius: 5px;
      height: 90%;
      top: 5%;
      background-color: #383838;
      color: white;
      font-size: 1.5vh;
    }
    .spell-information-attr-value > input:focus {
      background-color: #383838;
    }
    .spell-information-attr-value {
      position: absolute;
      left: 66%;
      width: 14%;
      height: 100%;
      top: 0;
    }
    .spell-information-attr-value > input:nth-child(1) {
      z-index: 3;
      cursor: default;
    }
    .spell-information-attr-type {
      position: absolute;
      left: 85%;
      width: 20%;
      height: 100%;
      top: 0;
    }
    .spell-information-attr-start {
      left: 48%;
      position: relative;
      color: white;
    }
    .spell-information-label {
      position: relative;
      top: 44%;
      width: 50%;
      left: 44%;
    }
    .spell-information-label-1 {
      color:white;
    }
    .spell-information-label-2 {
      color: white;
      position: relative;
      left: 10%;
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
    .spell-information-attr-change {
      position: absolute;
      top: 20%;
      height: 70%;
      width: 4%;
    }
    .spell-information-window > .spell-information-attr-active {
      display: none;
    }
    .spell-information-close {
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

    $.fn.inlineEdit = function(replaceWith, connectWith) {
      $(this).hover(function() {
          $(this).addClass('hover');
      }, function() {
          $(this).removeClass('hover');
      });
      $(this).click(function() {
          var elem = $(this);
          elem.hide();
          elem.after(replaceWith);
          replaceWith.focus();
          replaceWith.blur(function() {
              if ($(this).val() != "") {
                  connectWith.val($(this).val()).change();
                  elem.text($(this).val());
              }
              $(this).remove();
              elem.show();
          });
      });
    };

    $.fn.actionInlineEdit = function(text, replaceWith, connectWith) {
      $(this).hover(function() {
          $(text).addClass('hover');
      }, function() {
          $(text).removeClass('hover');
      });
      $(this).click(function() {
          var elem = $(text);
          elem.hide();
          elem.after(replaceWith);
          replaceWith.focus();
          replaceWith.blur(function() {
              if ($(this).val() != "") {
                  connectWith.val($(this).val()).change();
                  elem.text($(this).val());
              }
              $(this).remove();
              elem.show();
          });
      });
    };


    var A1_gold = 0;
    var A1_mana = 0;

    var A2_gold = 0;
    var A2_mana = 0;

    var A3_gold = 0;
    var A3_mana = 0;

    var A1_targets = new Array;
    var A2_targets = new Array;
    var A3_targets = new Array;

    var target_information1 = [];
    var target_information2 = [];
    var target_information3 = [];


    for (x=0; x < 20; x++) {
      var tmp1 = Math.floor(Math.random() * 100) + 1;
      var tmp2 = Math.floor(Math.random() * 100) + 1;
      var tmp3 = Math.floor(Math.random() * 100) + 1;
      var tmp4 = Math.floor(Math.random() * 100) + 1;
      var tmp5 = Math.floor(Math.random() * 100) + 1;
      target_information1.push({field1: tmp1, field2: tmp2, field3: tmp3, field4: tmp4, field5: tmp5, field1changed: "", field2changed: "", field3changed: "", field4changed: "", field5changed: "", field1by: tmp1, field2by: tmp2, field3by: tmp3, field4by: tmp4, field5by: tmp5});
      target_information2.push({field1: tmp1, field2: tmp2, field3: tmp3, field4: tmp4, field5: tmp5, field1changed: "", field2changed: "", field3changed: "", field4changed: "", field5changed: "", field1by: tmp1, field2by: tmp2, field3by: tmp3, field4by: tmp4, field5by: tmp5});
      target_information3.push({field1: tmp1, field2: tmp2, field3: tmp3, field4: tmp4, field5: tmp5, field1changed: "", field2changed: "", field3changed: "", field4changed: "", field5changed: "", field1by: tmp1, field2by: tmp2, field3by: tmp3, field4by: tmp4, field5by: tmp5});
    }


window.onload = function() {
    $('.spell-window-action-3').fadeOut(1);
    $('.spell-window-action-3-rename').fadeOut(1);
    $('.spell-window-action-2').fadeOut(1);
    $('.spell-window-action-2-rename').fadeOut(1);
    $('.spell-action-window').fadeOut(1);
    $('.spell-target-window').fadeOut(1);
    $('.spell-information-attr-change').fadeOut(1);
    $('.spell-information-window').fadeOut(1);

    if($('#spell_name_storage').text() !== ""){
      var spell_name = $('#spell_name_storage').text();
      $('.spell-window-title').text(spell_name);
    }
    if($('#spell_description_storage').text() !== ""){
      var spell_description = $('#spell_description_storage').text();
      $('.spell-window-description').text(spell_description);
    }
    if($('#spell_icon_storage').text() !== ""){
      var spell_icon = $('#spell_icon_storage').text();
      if (spell_icon == "loan") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/loan.png)")
      } else if (spell_icon == "megaphone") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/megaphone.png)")
      } else if (spell_icon == "insurance") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/insurance.png)")
      } else if (spell_icon == "group") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/group.png)")
      } else if (spell_icon == "cycle") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/cycle.png)")
      } else if (spell_icon == "money-tree") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/money-tree.png)")
      } else if (spell_icon == "research") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/research.png)")
      } else if (spell_icon == "spell-blue") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/spell-blue.png)")
      } else if (spell_icon == "spell-red") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/spell-red.png)")
      } else if (spell_icon == "star") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/star.png)")
      } else if (spell_icon == "supply") {
        $('.spell-window-image').css("background-image","url(../image/editor/spell/icons/supply.png)")
      }
    }

    var current = 0;

    var focus = '<div class="spell-target-item" data-content="4" style="background-image: url(../image/editor/spell/customers/business_man.png);"></div>\
                <div class="spell-target-item" data-content="5" style="background-image: url(../image/editor/spell/customers/business_woman.png);"></div>\
                <div class="spell-target-item" data-content="6" style="background-image: url(../image/editor/spell/customers/shopper_man.png);"></div>\
                <div class="spell-target-item" data-content="7" style="background-image: url(../image/editor/spell/customers/shopper_woman.png);"></div>\
                <div class="spell-target-item" data-content="8" style="background-image: url(../image/editor/spell/customers/young_woman.png);"></div>\
                <div class="spell-target-item" data-content="9" style="background-image: url(../image/editor/spell/customers/old_man.png);"></div>'

    var challenge = '<div class="spell-target-item" data-content="0" style="background-image: url(../image/editor/spell/competitors/black_suit_man.png);"></div>\
                    <div class="spell-target-item" data-content="1" style="background-image: url(../image/editor/spell/competitors/red_suit_man.png);"></div>\
                    <div class="spell-target-item" data-content="2" style="background-image: url(../image/editor/spell/competitors/gray_suit_woman.png);"></div>\
                    <div class="spell-target-item" data-content="3" style="background-image: url(../image/editor/spell/competitors/purple_suit_woman.png);"></div>'

    var tool = '<div class="spell-target-item" data-content="10" style="background-image: url(../image/editor/spell/products/backpack.png);"></div>\
                <div class="spell-target-item" data-content="11" style="background-image: url(../image/editor/spell/products/hat.png);"></div>\
                <div class="spell-target-item" data-content="12" style="background-image: url(../image/editor/spell/products/jacket.png);"></div>\
                <div class="spell-target-item" data-content="13" style="background-image: url(../image/editor/spell/products/shoes.png);"></div>\
                <div class="spell-target-item" data-content="14" style="background-image: url(../image/editor/spell/products/blue_ring.png);"></div>\
                <div class="spell-target-item" data-content="15" style="background-image: url(../image/editor/spell/products/red_ring.png);"></div>\
                <div class="spell-target-item" data-content="16" style="background-image: url(../image/editor/spell/products/yellow_ring.png);"></div>\
                <div class="spell-target-item" data-content="17" style="background-image: url(../image/editor/spell/products/blue_watch.png);"></div>\
                <div class="spell-target-item" data-content="18" style="background-image: url(../image/editor/spell/products/red_watch.png);"></div>\
                <div class="spell-target-item" data-content="19" style="background-image: url(../image/editor/spell/products/yellow_watch.png);"></div>'

    function saveCurrent() {
      if (current == 1) {
        A1_gold = $('.spell-action-cost-gold').val();
        A1_mana = $('.spell-action-cost-mana').val();
      }
      if (current == 2) {
        A2_gold = $('.spell-action-cost-gold').val();
        A2_mana = $('.spell-action-cost-mana').val();
      }
      if (current == 3) {
        A3_gold = $('.spell-action-cost-gold').val();
        A3_mana = $('.spell-action-cost-mana').val();
      }
    }

    $('.spell-window-action-1-text').on("click", function () {
      saveCurrent();
      $('.spell-action-window').fadeIn();
      $('.spell-target-window').fadeOut();
      $('.spell-action-target').empty();
      $('.spell-action-cost-gold').val('');
      $('.spell-action-cost-mana').val('');
      current = 1;
      $('.spell-action-cost-gold').val(A1_gold);
      $('.spell-action-cost-mana').val(A1_mana);
      if (A1_targets.length !== null || A1_targets.length !== 0) {
        for (x = 0; x < A1_targets.length; x++) {
          $('.spell-action-target').append("<li data-content='"+x+"'>"+A1_targets[x]+"</div>");
        }
      }
    });

    $('.spell-window-action-2-text').on("click", function () {
      saveCurrent();
      $('.spell-action-window').fadeIn();
      $('.spell-target-window').fadeOut();
      $('.spell-action-target').empty();
      $('.spell-action-cost-gold').val('');
      $('.spell-action-cost-mana').val('');
      current = 2;
      $('.spell-action-cost-gold').val(A2_gold);
      $('.spell-action-cost-mana').val(A2_mana);
      if (A2_targets.length !== null || A2_targets.length !== 0) {
        for (x = 0; x < A2_targets.length; x++) {
          $('.spell-action-target').append("<li>"+A2_targets[x]+"</div>");
        }
      }
    });

    $('.spell-window-action-3-text').on("click", function () {
      saveCurrent();
      $('.spell-action-window').fadeIn();
      $('.spell-target-window').fadeOut();
      $('.spell-action-target').empty();
      $('.spell-action-cost-gold').val('');
      $('.spell-action-cost-mana').val('');
      current = 3;
      $('.spell-action-cost-gold').val(A3_gold);
      $('.spell-action-cost-mana').val(A3_mana);
      if (A3_targets.length !== null || A3_targets.length !== 0) {
        for (x = 0; x < A3_targets.length; x++) {
          $('.spell-action-target').append("<li>"+A3_targets[x]+"</div>");
        }
      }
    });

    $('.spell-window-action').on("click", '.spell-window-action-1-toggle', function () {
      if ($('.spell-window-action-1-toggle').hasClass('spell-window-toggle-add')) {
        appear();
      } else {
        disappear();
      }
    });

    $('.spell-window-action').on("click", '.spell-window-action-2-toggle', function () {
      if ($('.spell-window-action-2-toggle').hasClass('spell-window-toggle-add')) {
        appear();
      } else {
        disappear();
      }
    });

    $('.spell-window-action').on("click", '.spell-window-action-3-toggle', function () {
      if ($('.spell-window-action-3-toggle').hasClass('spell-window-toggle-add')) {
        appear();
      } else {
        disappear();
      }
    });

    function appear() {

      if ($('.spell-window-action-1').css('display')=="none") {
        $('.spell-window-action-1').fadeIn();
        $('.spell-window-action-1-rename').fadeIn();
        var elem = $('.spell-window-action-1-rename');
      } else if ($('.spell-window-action-2').css('display')=="none") {
        $('.spell-window-action-2').fadeIn();
        $('.spell-window-action-2-rename').fadeIn();
        var elem = $('.spell-window-action-2-rename')
      } else if ($('.spell-window-action-3').css('display')=="none") {
        $('.spell-window-action-3').fadeIn();
        $('.spell-window-action-3-rename').fadeIn();
        var elem = $('.spell-window-action-3-rename');
      }
      $(elem).promise().done(function(){
        var x = 0;
        if ($('.spell-window-action-1').css('display')=="none") {
          x++;
        }
        if ($('.spell-window-action-2').css('display')=="none") {
          x++;
        }
        if ($('.spell-window-action-3').css('display')=="none") {
          x++;
        }

        if (x == 0) {
          $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
          $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
          $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
        } else if (x == 1) {
          $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
          $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
          $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
        } else if (x == 2) {
          $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
          $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
        }
      });
    }

    function disappear () {
      var y = 0;
      if ($(event.target).hasClass('spell-window-action-1-toggle')) {
        y = 0;
      } else if ($(event.target).hasClass('spell-window-action-2-toggle')) {
        y = 1;
      } else {
        y = 2;
      }

      $('[class ^="spell-window-action"]:not([class $="rename"]):not([class $="toggle"]):not([class $="remove"]):not([class $="text"]):not([class $="add"]):not(":eq(0)"):visible:eq('+y+')').fadeOut();
      $('[class ^="spell-window-action"][class $="-rename"]:visible:eq('+y+')').fadeOut();
      $('[class ^="spell-window-action"][class $="-rename"]:visible:eq('+y+')').promise().done(function(){
        var x = 0;
        if ($('.spell-window-action-1').css('display')=="none") {
          x++;
        }
        if ($('.spell-window-action-2').css('display')=="none") {
          x++;
        }
        if ($('.spell-window-action-3').css('display')=="none") {
          x++;
        }

        if (x == 3) {
          $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
          $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove spell-window-toggle-add');
          $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove spell-window-toggle-add');
        } else if (x == 2) {
          $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
          $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
          $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove spell-window-toggle-add')
        } else if (x == 1) {
          $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
          $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
          $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
        }
      });

    }


    $('.spell-action-buttons-challenge').on("click", function () {
      $('.spell-target-window').empty().append(challenge).fadeIn();
    });

    $('.spell-action-buttons-focus').on("click", function () {
      $('.spell-target-window').empty().append(focus).fadeIn();
    });

    $('.spell-action-buttons-tool').on("click", function () {
      $('.spell-target-window').empty().append(tool).fadeIn();
    });

    $('.spell-target-window').on("click", ".spell-target-item", function () {
      var bg = $(event.target).css('background-image');
      var id = $(event.target).attr('data-content');
      var temp;
      if (bg.includes("black_suit_man")) {
        temp = "Business Man (Black Suit)";
      } else if (bg.includes("red_suit_man")) {
        temp = "Business Man (Red Suit)";
      } else if (bg.includes("gray_suit_woman")) {
        temp = "Business Woman (Gray Suit)";
      } else if (bg.includes("purple_suit_woman")) {
        temp = "Business Woman (Purple Suit)";
      } else if  (bg.includes("business_man")) {
        temp = "Business Man";
      } else if  (bg.includes("business_woman")) {
        temp = "Business Woman";
      } else if  (bg.includes("shopper_man")) {
        temp = "Shopper Man";
      } else if  (bg.includes("shopper_woman")) {
        temp = "Shopper Woman";
      } else if  (bg.includes("young_woman")) {
        temp = "Young Woman";
      } else if  (bg.includes("old_man")) {
        temp = "Old Man";
      } else if  (bg.includes("backpack")) {
        temp = "Backpack";
      } else if  (bg.includes("hat")) {
        temp = "Hat";
      } else if  (bg.includes("jacket")) {
        temp = "Jacket";
      } else if  (bg.includes("shoes")) {
        temp = "Shoes";
      } else if  (bg.includes("blue_ring")) {
        temp = "Blue Ring";
      } else if (bg.includes("yellow_ring")) {
        temp = "Yellow Ring";
      } else if (bg.includes("red_ring")) {
        temp = "Red Ring";
      } else if (bg.includes("blue_watch")) {
        temp = "Blue Ring";
      } else if (bg.includes("yellow_watch")) {
        temp = "Yellow Ring";
      } else if (bg.includes("red_watch")) {
        temp = "Red Ring";
      }
      if (current == 1) {
        if ($.inArray(temp, A1_targets) !== -1) {
          $('.spell-information-image').css('background-image',bg);
          $('.spell-information-name').text(temp);
          if (bg.includes('competitors')) {
            $('.spell-information-type').text('Challenge');
          } else if (bg.includes('customers')) {
            $('.spell-information-type').text('Focus');
          } else {
            $('.spell-information-type').text('Tool');
          }
          loadInformation(target_information1, id);
          $('.spell-information-window').fadeIn();
          $(".spell-information-close").on("click", function(){saveInformation (target_information1, id);});
          return false;
        }
        A1_targets.push(temp);
        $('.spell-action-target').append("<li data-content='" + id + "'>"+temp+"</li>");
        loadInformation(target_information1, id);
        $('.spell-information-window').fadeIn();
        $(".spell-information-close").on("click", function(){saveInformation (target_information1, id);});
      } else if (current == 2) {
        if ($.inArray(temp, A2_targets) !== -1) {
          $('.spell-information-image').css('background-image',bg);
          $('.spell-information-name').text(temp);
          if (bg.includes('competitors')) {
            $('.spell-information-type').text('Challenge');
          } else if (bg.includes('customers')) {
            $('.spell-information-type').text('Focus');
          } else {
            $('.spell-information-type').text('Tool');
          }
          loadInformation(target_information2, id);
          $('.spell-information-window').fadeIn();
          $(".spell-information-close").on("click", function(){saveInformation (target_information2, id);});
          return false;
        }
        A2_targets.push(temp);
        $('.spell-action-target').append("<li data-content='" + id + "' class=\"spell-action-target-item\">"+temp+"</li>");
        loadInformation(target_information2, id);
        $('.spell-information-window').fadeIn();
        $(".spell-information-close").on("click", function(){saveInformation (target_information2, id);});
      } else if (current == 3) {
        if ($.inArray(temp, A3_targets) !== -1) {
          $('.spell-information-image').css('background-image',bg);
          $('.spell-information-name').text(temp);
          if (bg.includes('competitors')) {
            $('.spell-information-type').text('Challenge');
          } else if (bg.includes('customers')) {
            $('.spell-information-type').text('Focus');
          } else {
            $('.spell-information-type').text('Tool');
          }
          loadInformation(target_information3, id);
          $('.spell-information-window').fadeIn();
          $(".spell-information-close").on("click", function(){saveInformation (target_information3, id);});
          return false;
        }
        A3_targets.push(temp);
        $('.spell-action-target').append("<li data-content='" + id + "'>"+temp+"</li>");
        loadInformation(target_information3, id);
        $('.spell-information-window').fadeIn();
        $(".spell-information-close").on("click", function(){saveInformation (target_information3, id);});
      }
      $('.spell-information-image').css('background-image',bg);
      $('.spell-information-name').text(temp);
      if (bg.includes('competitors')) {
        $('.spell-information-type').text('Challenge');
      } else if (bg.includes('customers')) {
        $('.spell-information-type').text('Focus');
      } else {
        $('.spell-information-type').text('Tool');
      }
    });

    function loadInformation (target_information, id) {
      $('.spell-information-attr-value-1 > input[type="text"]:nth-child(1)').val(target_information[id].field1changed);
      $('.spell-information-attr-start-1').text(target_information[id].field1);
      if (target_information[id].field1changed !== "") {
        $('.spell-information-attr-value-1 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-1').find('.spell-information-attr-change').fadeOut();
      } else if (target_information[id].field1changed < 0) {
        $('.spell-information-attr-value-1 > input[type="text"]:nth-child(1)').css('color', 'red');
        $('.spell-information-attr-1').find('.spell-information-attr-change').fadeIn();
      } else if (target_information[id].field1changed > 0) {
        $('.spell-information-attr-value-1 > input[type="text"]:nth-child(1)').css('color', 'green');
        $('.spell-information-attr-1').find('.spell-information-attr-change').fadeIn();
      } else {
        $('.spell-information-attr-value-1 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-1').find('.spell-information-attr-change').fadeOut();
      }

      $('.spell-information-attr-value-2 > input[type="text"]:nth-child(1)').val(target_information[id].field2changed);
      $('.spell-information-attr-start-2').text(target_information[id].field2);
      if (target_information[id].field2changed !== "") {
        $('.spell-information-attr-value-2 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-2').find('.spell-information-attr-change').fadeOut();
      } else if (target_information[id].field2changed < 0) {
        $('.spell-information-attr-value-2 > input[type="text"]:nth-child(1)').css('color', 'red');
        $('.spell-information-attr-2').find('.spell-information-attr-change').fadeIn();
      } else if (target_information[id].field2changed > 0) {
        $('.spell-information-attr-value-2 > input[type="text"]:nth-child(1)').css('color', 'green');
        $('.spell-information-attr-2').find('.spell-information-attr-change').fadeIn();
      } else {
        $('.spell-information-attr-value-2 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-2').find('.spell-information-attr-change').fadeOut();
      }

      $('.spell-information-attr-value-3 > input[type="text"]:nth-child(1)').val(target_information[id].field3changed);
      $('.spell-information-attr-start-3').text(target_information[id].field3);
      if (target_information[id].field3changed !== "") {
        $('.spell-information-attr-value-3 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-3').find('.spell-information-attr-change').fadeOut();
      } else if (target_information[id].field3changed < 0) {
        $('.spell-information-attr-value-3 > input[type="text"]:nth-child(1)').css('color', 'red');
        $('.spell-information-attr-3').find('.spell-information-attr-change').fadeIn();
      } else if (target_information[id].field3changed > 0) {
        $('.spell-information-attr-value-3 > input[type="text"]:nth-child(1)').css('color', 'green');
        $('.spell-information-attr-3').find('.spell-information-attr-change').fadeIn();
      } else {
        $('.spell-information-attr-value-3 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-3').find('.spell-information-attr-change').fadeOut();
      }

      $('.spell-information-attr-value-4 > input[type="text"]:nth-child(1)').val(target_information[id].field4changed);
      $('.spell-information-attr-start-4').text(target_information[id].field4);
      if (target_information[id].field4changed !== ""){
        $('.spell-information-attr-value-4 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-4').find('.spell-information-attr-change').fadeOut();
      } else if (target_information[id].field4changed < 0) {
        $('.spell-information-attr-value-4 > input[type="text"]:nth-child(1)').css('color', 'red');
        $('.spell-information-attr-4').find('.spell-information-attr-change').fadeIn();
      } else if (target_information[id].field4changed > 0) {
        $('.spell-information-attr-value-4 > input[type="text"]:nth-child(1)').css('color', 'green');
        $('.spell-information-attr-4').find('.spell-information-attr-change').fadeIn();
      } else {
        $('.spell-information-attr-value-4 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-4').find('.spell-information-attr-change').fadeOut();
      }

      $('.spell-information-attr-value-5 > input[type="text"]:nth-child(1)').val(target_information[id].field5changed);
      $('.spell-information-attr-start-5').text(target_information[id].field5);
      if (target_information[id].field5changed !== "") {
        $('.spell-information-attr-value-5 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-5').find('.spell-information-attr-change').fadeOut();
      }
      else if (target_information[id].field5changed < 0) {
        $('.spell-information-attr-value-5 > input[type="text"]:nth-child(1)').css('color', 'red');
        $('.spell-information-attr-5').find('.spell-information-attr-change').fadeIn();
      } else if (target_information[id].field5changed > 0) {
        $('.spell-information-attr-value-5 > input[type="text"]:nth-child(1)').css('color', 'green');
        $('.spell-information-attr-5').find('.spell-information-attr-change').fadeIn();
      } else {
        $('.spell-information-attr-value-5 > input[type="text"]:nth-child(1)').css('color', 'white');
        $('.spell-information-attr-5').find('.spell-information-attr-change').fadeOut();
      }
    };

    function saveInformation (target_information, id) {
      target_information[id].field1by = parseInt($('.spell-information-attr-value-1 > input[type="text"]:nth-child(2)').val());
      target_information[id].field2by = parseInt($('.spell-information-attr-value-2 > input[type="text"]:nth-child(2)').val());
      target_information[id].field3by = parseInt($('.spell-information-attr-value-3 > input[type="text"]:nth-child(2)').val());
      target_information[id].field4by = parseInt($('.spell-information-attr-value-4 > input[type="text"]:nth-child(2)').val());
      target_information[id].field5by = parseInt($('.spell-information-attr-value-5 > input[type="text"]:nth-child(2)').val());
      $('.spell-information-window').fadeOut();
      $('.spell-information-close').off();
      $('.spell-information-image').css('background-image','none');
    };

    $('.spell-information-window').on("click",$('.spell-window-attr-value input:nth-child(1)'), function() {
      $(event.target).next().css("z-index","4").focus();
    });
    $('.spell-information-window').on("input", $('.spell-window-attr-value input:nth-child(2)'), function () {
      var value = $(event.target).val();
      if (! /^-?\d*\.?\d+$/.test(value)) {
        $(event.target).parent().next('div').find("button").prop("disabled", true);
      } else {
        $(event.target).parent().next('div').find("button").prop("disabled", false);
      }
    });
    $('.spell-information-window').on("focusout",$('.spell-window-attr-value input:nth-child(2)'), function() {
      if ($(event.target).hasClass('spell-window-attr-value') == false){
        return false;
      }
      var value = $(event.target).val();
      if (! /^-?\d*\.?\d+$/.test(value)) {
        $(event.target).prev().val(value);
        $(event.target).prev().css("color","white");
        $(event.target).css("z-index","2");
      } else {
        return false;
      }
    });
    $('.spell-information-window').on("click", '.spell-button-percentage', function() {
      var temp = $(event.target).parent().prev().find(">:last-child").val();
      var perc = $(event.target).parent().prev().find(">:first-child").next().val();
      var result = (perc / 100) * temp;
      var percent = perc+"%";
      $(event.target).parent().children().css("background-color","");
      $(event.target).parent().children().css("color","");
      $(event.target).css("background-color","ghostwhite");
      $(event.target).css("color","gray");
      $(event.target).parent().prev().find(">:first-child").val(percent);
      $(event.target).parent().prev().find(">:first-child").css("z-index","4");
      $(event.target).parent().prev().find(">:first-child").next().css("z-index","2");
      if (perc < 100) {
        $(event.target).parent().prev().find(">:first-child").css("color","red");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeIn();
      } else if (perc > 100){
        $(event.target).parent().prev().find(">:first-child").css("color","green");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeIn();
      } else if (perc == 100) {
        $(event.target).parent().prev().find(">:first-child").css("color","white");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeOut();
        $(event.target).css("background-color","");
        $(event.target).css("color","");
      }
    });
    $('.spell-information-window').on("click", '.spell-button-number', function() {
      var temp = $(event.target).parent().prev().prev().text();
      var add = $(event.target).parent().prev().find(">:last-child").val();
      var result = parseInt(temp) + parseInt(add);
      var addition;
      if (add > 0) {
        addition = "+" + add;
      } else if (add < 0) {
        addition = add;
      } else if (add == 0) {
        addition = add;
      }

      $(event.target).parent().children().css("background-color","");
      $(event.target).parent().children().css("color","");
      $(event.target).css("background-color","ghostwhite");
      $(event.target).css("color","gray");
      $(event.target).parent().prev().find(">:first-child").val(addition);
      $(event.target).parent().prev().find(">:first-child").css("z-index","4");
      $(event.target).parent().prev().find(">:first-child").next().css("z-index","2");
      var num = parseInt($(event.target).parent().prev().find(">:first-child").next().val());
      if (add < 0) {
        $(event.target).parent().prev().find(">:first-child").css("color","red");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeIn();
      } else if (add > 0){
        $(event.target).parent().prev().find(">:first-child").css("color","green");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeIn();
      } else if (add == 0) {
        $(event.target).parent().prev().find(">:first-child").css("color","white");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeOut();
        $(event.target).css("background-color","");
        $(event.target).css("color","");
      }
    });
    $('.spell-information-window').on("click", '.spell-button-delta', function() {
      var temp = $(event.target).parent().prev().prev().text();
      var add = $(event.target).parent().prev().find(">:last-child").val();
      var result = parseInt(add);
      $(event.target).parent().children().css("background-color","");
      $(event.target).parent().children().css("color","");
      $(event.target).css("background-color","ghostwhite");
      $(event.target).css("color","gray");
      $(event.target).parent().prev().find(">:first-child").val(add);
      $(event.target).parent().prev().find(">:first-child").css("z-index","4");
      $(event.target).parent().prev().find(">:first-child").next().css("z-index","2");
      if (add < 0) {
        $(event.target).parent().prev().find(">:first-child").css("color","red");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeIn();
      } else if (add > 0){
        $(event.target).parent().prev().find(">:first-child").css("color","green");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeIn();
      } else if (add == 0) {
        $(event.target).parent().prev().find(">:first-child").css("color","white");
        $(event.target).closest('[class^="spell-information-attr-"]').parent().find('.spell-information-attr-change').fadeOut();
        $(event.target).css("background-color","");
        $(event.target).css("color","");
      }
    });

  };
  </script>

  <div class="medium-2 columns">
    @include('cms.menu')
  </div>
  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Spell Editor</h2>
  </div>
  <div class="medium-10 columns">
    <div class="spell-container">

      <div class="spell-window">
        <div class="spell-window-title">Click to edit spell name</div>
        <div class="spell-window-image"></div>
        <div class="spell-window-description">Click here to edit the spell description</div>
        <div class="spell-window-action">
          <div class="spell-window-action-1">
            <div class="spell-window-action-1-text">Action #1</div>
            <div class="spell-window-action-1-rename"></div>
          </div>
          <div class="spell-window-action-1-toggle spell-window-toggle-remove"></div>
          <div class="spell-window-action-2">
            <div class="spell-window-action-2-text">Action #2</div>
            <div class="spell-window-action-2-rename"></div>
          </div>
          <div class="spell-window-action-2-toggle spell-window-toggle-add"></div>
          <div class="spell-window-action-3">
            <div class="spell-window-action-3-text">Action #3</div>
            <div class="spell-window-action-3-rename"></div>
          </div>
          <div class="spell-window-action-3-toggle"></div>
        </div>
      </div>

      <div class="spell-action-window">
        <h4 class="spell-action-title">Cost</h4>
        <div class="row">
          <div class="medium-2 medium-offset-1 columns spell-action-cost-input">
            <label for="middle-label" class="text-left middle">Gold: </label>
          </div>
          <div class="medium-6 columns spell-action-cost-input">
            <input type="number" class="spell-action-cost-gold">
          </div>
        </div>
        <div class="row">
          <div class="medium-2 medium-offset-1 columns spell-action-cost-input">
            <label for="middle-label" class="text-left middle">Mana: </label>
          </div>
          <div class="medium-6 columns spell-action-cost-input">
            <input type="number" class="spell-action-cost-mana">
          </div>
        </div>
        <h4 class="spell-action-title">Target</h4>
        <div class="spell-action-target-storage">
          <ul class="spell-action-target">
            <li>Human Male</li>
            <li>Human Female</li>
            <li>Goblin Old</li>
          </ul>
        </div>
        <div class="spell-action-buttons">
          <button class="button spell-action-buttons-challenge">Challenge</button>
          <button class="button spell-action-buttons-focus">Focus</button>
          <button class="button spell-action-buttons-tool">Tool</button>
        </div>
      </div>

      <div class="spell-information-window">
        <div class="spell-information-close"></div>
        <div class="spell-information-image"></div>
        <div class="spell-information-name"></div>
        <div class="spell-information-type"></div>
        <div class="spell-information-label"><span class="spell-information-label-1">Current</span><span class="spell-information-label-2">Change By</span></div>
          <form name="spell-form">
            <div class="spell-information-attr-1">
              <input type="radio" class="spell-information-attr-change" value="" checked>
              <span class="spell-information-attr-name spell-information-attr-name-1">Population</span>
              <span class="spell-information-attr-start spell-information-attr-start-1"></span>
              <div class="spell-information-attr-value spell-information-attr-value-1"><input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"></div>
              <div class="spell-information-attr-type spell-information-attr-type-1"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
            </div>
            <div class="spell-information-attr-2">
              <input type="radio" class="spell-information-attr-change" value="" checked>
              <span class="spell-information-attr-name spell-information-attr-name-2">Awareness</span>
              <span class="spell-information-attr-start spell-information-attr-start-2"></span>
              <div class="spell-information-attr-value spell-information-attr-value-2">Value: <input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"></div>
              <div class="spell-information-attr-type spell-information-attr-type-2"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
            </div>
            <div class="spell-information-attr-3">
              <input type="radio" class="spell-information-attr-change" value="" checked>
              <span class="spell-information-attr-name spell-information-attr-name-3">Elasticity</span>
              <span class="spell-information-attr-start spell-information-attr-start-3"></span>
              <div class="spell-information-attr-value spell-information-attr-value-3">Value: <input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"></div>
              <div class="spell-information-attr-type spell-information-attr-type-3"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
            </div>
            <div class="spell-information-attr-4">
              <input type="radio" class="spell-information-attr-change" value="" checked>
              <span class="spell-information-attr-name spell-information-attr-name-4">Popularity</span>
              <span class="spell-information-attr-start spell-information-attr-start-4"></span>
              <div class="spell-information-attr-value spell-information-attr-value-4">Value: <input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"></div>
              <div class="spell-information-attr-type spell-information-attr-type-4"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
            </div>
            <div class="spell-information-attr-5">
              <input type="radio" class="spell-information-attr-change" value="" checked>
              <span class="spell-information-attr-name spell-information-attr-name-5">Responsiveness</span>
              <span class="spell-information-attr-start spell-information-attr-start-5"></span>
              <div class="spell-information-attr-value spell-information-attr-value-5">Value: <input type="text" placeholder="Value" disabled><input type="text" placeholder="Value"></div>
              <div class="spell-information-attr-type spell-information-attr-type-5"><button class="button spell-button-percentage">%</button><button class="button spell-button-number">#</button><button class="button spell-button-delta">Δ</button></div>
            </div>
          </form>
        </div>
      </div>

      <div class="spell-target-window">
        <div class="spell-target-item"></div>
      </div>

    </div>
  </div>

  <form>
    <input type="hidden" name="spell-window-title" />
    <input type="hidden" name="spell-window-description" />
    <input type="hidden" name="spell-window-action-1-text" />
    <input type="hidden" name="spell-window-action-1-gold" />
    <input type="hidden" name="spell-window-action-1-mana" />
    <input type="hidden" name="spell-window-action-2-text" />
    <input type="hidden" name="spell-window-action-2-gold" />
    <input type="hidden" name="spell-window-action-2-mana" />
    <input type="hidden" name="spell-window-action-3-text" />
    <input type="hidden" name="spell-window-action-3-gold" />
    <input type="hidden" name="spell-window-action-3-mana" />
  </form>
  <div id="spell_name_storage" style="display: none">{{$spell_name}}</div>
  <div id="spell_description_storage" style="display: none">{{$spell_description}}</div>
  <div id="spell_icon_storage" style="display: none">{{$spell_icon}}</div>

  <script>
  var replaceWith = $('<input maxlength="26" name="temp" class="spell-window-title-input" />'),
  connectWith = $('input[name="spell-window-action-2-text"]');
  $('.spell-window-title').inlineEdit(replaceWith, connectWith);

    var replaceWith = $('<textarea name="temp" class="spell-window-description-input" maxlength="100"></textarea>'),
    connectWith = $('input[name="spell-window-description"]');
    $('.spell-window-description').inlineEdit(replaceWith, connectWith);

    var replaceWith = $('<input maxlength="26" name="temp" class="spell-window-action-1-input" />'),
    connectWith = $('input[name="spell-window-action-1-text"]');
    text = $('.spell-window-action-1-text');
    $('.spell-window-action-1-rename').actionInlineEdit(text, replaceWith, connectWith);

    var replaceWith = $('<input maxlength="26" name="temp" class="spell-window-action-2-input" />'),
    connectWith = $('input[name="spell-window-action-2-text"]');
    text = $('.spell-window-action-2-text');
    $('.spell-window-action-2-rename').actionInlineEdit(text, replaceWith, connectWith);

    var replaceWith = $('<input maxlength="26" name="temp" class="spell-window-action-3-input" />'),
    connectWith = $('input[name="spell-window-action-3-text"]');
    text = $('.spell-window-action-3-text');
    $('.spell-window-action-3-rename').actionInlineEdit(text, replaceWith, connectWith);
  </script>

</div>



@stop
