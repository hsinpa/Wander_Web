@extends('template')
@section('content')
@include('cms.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">
<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">

  <style>

    p, ul, li, label, h2, h3, h4 {
      color: white;
    }

    .spell-container {
      position: absolute;
      left: 17%;
      width: 83%;
      height: 90%;
    }
    .spell-window {
      background-image: url(../image/editor/spell_window.png);
      background-size: contain;
      background-repeat: no-repeat;
      width: 47%;
      height: 55%;
      left: 2%;
      top: 5%;
      position: relative;
      border-radius: 5px;
    }
    .spell-window-title {
      position: relative;
      left: 3%;
      top: 3.5%;
      width: 88%;
      height: 10%;
      font-size: 2.5vh;
      text-align: center;
    }
    .spell-window-image {
      position: absolute;
      width: 16%;
      height: 22%;
      left: 8%;
      top: 17%;
      background-image: url(../image/editor/spell/icons/megaphone.png);
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }
    .spell-window-description {
      position: absolute;
      left: 5%;
      top: 45%;
      width: 24%;
      height: 34%;
      color: white;
    }
    .spell-window-action {
      position: relative;
      left: 30%;
      top: 13%;
      width: 60%;
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
      position: relative;
      width: 96%;
      height: 35%;
      bottom: -5%;
      left: 2%;
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
      left: 4%;
      top: 45%;
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
      background-color: #c4c5c8;
      color: black;
      left: 3%;
      margin-top: 2%;
      margin-bottom: -1%;
      width: 85%;
      height: 8%;
      font-size: 2.5vh;
      text-align: center;
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

window.onload = function() {
    $('.spell-window-action-3').fadeOut(1);
    $('.spell-window-action-3-rename').fadeOut(1);
    $('.spell-window-action-2').fadeOut(1);
    $('.spell-window-action-2-rename').fadeOut(1);
    $('.spell-action-window').fadeOut(1);
    $('.spell-target-window').fadeOut(1);

    var current = 0;

    var focus = '<div class="spell-target-item" style="background-image: url(../image/editor/spell/customers/business_man.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/customers/business_woman.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/customers/shopper_man.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/customers/shopper_woman.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/customers/young_woman.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/customers/old_man.png);"></div>'

    var challenge = '<div class="spell-target-item" style="background-image: url(../image/editor/spell/competitors/black_suit_man.png);"></div>\
                    <div class="spell-target-item" style="background-image: url(../image/editor/spell/competitors/red_suit_man.png);"></div>\
                    <div class="spell-target-item" style="background-image: url(../image/editor/spell/competitors/gray_suit_woman.png);"></div>\
                    <div class="spell-target-item" style="background-image: url(../image/editor/spell/competitors/purple_suit_woman.png);"></div>'

    var tool = '<div class="spell-target-item" style="background-image: url(../image/editor/spell/products/backpack.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/hat.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/jacket.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/shoes.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/blue_ring.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/red_ring.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/yellow_ring.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/blue_watch.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/red_watch.png);"></div>\
                <div class="spell-target-item" style="background-image: url(../image/editor/spell/products/yellow_watch.png);"></div>'

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

    $('.spell-window-action-1-toggle').on("click", function () {
      if ($('.spell-window-action-1-toggle').hasClass('spell-window-toggle-add')) {
        appearA1();
      } else {
        hideA1();
      }
    });

    $('.spell-window-action-2-toggle').on("click", function () {
      if ($('.spell-window-action-2-toggle').hasClass('spell-window-toggle-add')) {
        appearA2();
      } else {
        hideA2();
      }
    });

    $('.spell-window-action-3-toggle').on("click", function () {
      if ($('.spell-window-action-3-toggle').hasClass('spell-window-toggle-add')) {
        appearA3();
      } else {
        hideA3();
      }
    });

    function appearA1 () {
      $('.spell-window-action-1').fadeIn();
      $('.spell-window-action-1-rename').fadeIn();
      $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
      if ($('.spell-window-action-2').is(":hidden") && $('.spell-window-action-3').is(":hidden")) {
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-2').is(":visible") && $('.spell-window-action-3').is(":hidden")) {
        $('.spell-window-action-3').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-2').is(":hidden") && $('.spell-window-action-3').is(":visible")) {
        $('.spell-window-action-3').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      }
    }

    function hideA1 () {
      $('.spell-window-action-1').fadeOut();
      $('.spell-window-action-1-rename').fadeOut();
      $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-remove');
      if ($('.spell-window-action-2').is(":hidden") && $('.spell-window-action-3').is(":hidden")) {
        $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-2').is(":visible") && $('.spell-window-action-3').is(":hidden")) {
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove');
        $('.spell-window-action-1-toggle').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-2').is(":hidden") && $('.spell-window-action-3').is(":visible")) {
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove');
        $('.spell-window-action-1-toggle').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-2').is(":visible") && $('.spell-window-action-3').is(":visible")) {
        $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
        $('.spell-window-action-1-toggle').addClass('spell-window-toggle-remove');
      }
    }

    function appearA2 () {
      $('.spell-window-action-2').fadeIn();
      $('.spell-window-action-2-rename').fadeIn();
      $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
      if ($('.spell-window-action-1').is(":hidden") && $('.spell-window-action-3').is(":hidden")) {
        $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":visible") && $('.spell-window-action-3').is(":hidden")) {
        $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":hidden") && $('.spell-window-action-3').is(":visible")) {
        $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":visible") && $('.spell-window-action-3').is(":visible")) {
        $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
      }
    }

    function hideA2 () {
      $('.spell-window-action-2').fadeOut();
      $('.spell-window-action-2-rename').fadeOut();
      $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove');
      if ($('.spell-window-action-1').is(":hidden") && $('.spell-window-action-3').is(":hidden")) {
        $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":visible") && $('.spell-window-action-3').is(":hidden")) {
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove');
        $('.spell-window-action-1-toggle').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":hidden") && $('.spell-window-action-3').is(":visible")) {
          $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove')
          $('.spell-window-action-1-toggle').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":visible") && $('.spell-window-action-3').is(":visible")) {
        $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove');
        $('.spell-window-action-2-toggle').addClass('spell-window-toggle-add');
      }
    }

    function appearA3 () {
      $('.spell-window-action-3').fadeIn();
      $('.spell-window-action-3-rename').fadeIn();
      $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-add').addClass('spell-window-toggle-remove');
      if ($('.spell-window-action-1').is(":hidden") && $('.spell-window-action-2').is(":hidden")) {
        $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":visible") && $('.spell-window-action-2').is(":hidden")) {
        $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":hidden") && $('.spell-window-action-2').is(":visible")) {
        $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      }
    }

    function hideA3 () {
      $('.spell-window-action-3').fadeOut();
      $('.spell-window-action-3-rename').fadeOut();
      $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove');
      if ($('.spell-window-action-1').is(":hidden") && $('.spell-window-action-2').is(":hidden")) {
        $('.spell-window-action-1-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":visible") && $('.spell-window-action-2').is(":hidden")) {
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":hidden") && $('.spell-window-action-2').is(":visible")) {
        $('.spell-window-action-2-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      } else if ($('.spell-window-action-1').is(":visible") && $('.spell-window-action-2').is(":visible")) {
        $('.spell-window-action-3-toggle').removeClass('spell-window-toggle-remove').addClass('spell-window-toggle-add');
      }
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
          return false;
        }
        A1_targets.push(temp);
        var id = A1_targets.length - 1;
        $('.spell-action-target').append("<li data-content='" + id + "'>"+temp+"</li>");
      } else if (current == 2) {
        if ($.inArray(temp, A2_targets) !== -1) {
          return false;
        }
        A2_targets.push(temp);
        var id = A2_targets.length - 1;
        $('.spell-action-target').append("<li data-content='" + id + "' class=\"spell-action-target-item\">"+temp+"</li>");
      } else if (current == 3) {
        if ($.inArray(temp, A3_targets) !== -1) {
          return false;
        }
        A3_targets.push(temp);
        var id = A3_targets.length - 1;
        $('.spell-action-target').append("<li data-content='" + id + "'>"+temp+"</li>");
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
