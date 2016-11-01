@extends('template')
@section('content')
@include('cms.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">
<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">

  <style>

    p, ul, li, label, h2, h3, h4 {
      color: white;
    }
    .spell-window {
      background-image: url(../image/editor/spell_window.png);
      background-size: contain;
      background-repeat: no-repeat;
      width: 45%;
      height: 42%;
      left: 18%;
      position: absolute;
      border-radius: 5px;
    }
    .spell-window-title {
      position: relative;
      left: 3%;
      top: 3.5%;
      width: 64%;
      height: 10%;
      font-size: 2.5vh;
      text-align: center;
    }
    .spell-window-image {
      position: absolute;
      width: 16%;
      height: 24%;
      left: 4%;
      top: 20%;
      background-image: url(../image/editor/spell/icons/megaphone.png);
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }
    .spell-window-description {
      position: absolute;
      left: 4%;
      top: 50%;
      width: 16%;
      height: 34%;
      color: white;
    }
    .spell-window-action {
      position: relative;
      left: 23%;
      top: 16%;
      width: 50%;
      height: 53%;
    }
    .spell-window-action-1 {
      background-image: url(../image/editor/spell/action.png);
      background-size: contain;
      background-repeat: no-repeat;
      position: relative;
      width: 96%;
      height: 29%;
      text-align: center;
      color: white;
      font-size: 2.5vh;
      padding-top: 3%;
      margin-bottom: 2%;
    }
    .spell-window-action-2 {
      background-image: url(../image/editor/spell/action.png);
      background-size: contain;
      background-repeat: no-repeat;
      position: relative;
      width: 96%;
      height: 29%;
      text-align: center;
      color: white;
      font-size: 2.5vh;
      padding-top: 3%;
      margin-bottom: 2%;
    }
    .spell-window-action-3 {
      background-image: url(../image/editor/spell/action.png);
      background-size: contain;
      background-repeat: no-repeat;
      position: relative;
      width: 96%;
      height: 29%;
      text-align: center;
      color: white;
      font-size: 2.5vh;
      padding-top: 3%;
    }

    .spell-action-window {
      background-color: #444;
      left: 65%;
      width: 33%;
      height: 42%;
      top: 15%;
      position: absolute;
      border-radius: 5px;
      padding: 1%;
    }
    .spell-action-title {
      position: relative;
      left: 2%;
      top: 2%;
    }
    .spell-action-target {
      columns: 2;
      -webkit-columns: 2;
      -moz-columns: 2;
      left: 4%;
      position: relative;
      height: 27%;
    }
    .spell-window-action-1-toggle {
      position: absolute;
      width: 8%;
      height: 15%;
      right: -4.5%;
      top: 6%;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .spell-window-action-2-toggle {
      position: absolute;
      width: 8%;
      height: 15%;
      right: -4.5%;
      top: 39%;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .spell-window-action-3-toggle {
      position: absolute;
      width: 8%;
      height: 15%;
      right: -4.5%;
      top: 71%;
      background-size: contain;
      background-repeat: no-repeat;
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
      width: 80%;
      height: 22%;
      top: 62%;
      left: 18%;
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
      top: 50%;
      width: 18%;
      height: 33%;
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
      margin-bottom: 2%;
      padding-bottom: 2%;
      border-radius: 5px;
      border: none;
    }
    .spell-window-title-input {
      position: relative;
      background-color: #c4c5c8;
      color: black;
      left: 3%;
      margin-top: 1.5%;
      width: 64%;
      height: 10%;
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
      console.log('action clicked');
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
  </script>

  <div class="medium-2 columns">
    @include('cms.menu')
  </div>
  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Spell Editor</h2>
  </div>
  <div class="medium-6 columns">
    <div class="spell-window">
      <div class="spell-window-title">Click to edit spell name</div>
      <div class="spell-window-image"></div>
      <div class="spell-window-description">Click here to edit the spell description</div>
      <div class="spell-window-action">
        <div class="spell-window-action-1">
          <div class="spell-window-action-1-text">Action #1</div>
        </div>
        <div class="spell-window-action-1-toggle"></div>
        <div class="spell-window-action-2">
          <div class="spell-window-action-2-text">Action #2</div>
        </div>
        <div class="spell-window-action-2-toggle"></div>
        <div class="spell-window-action-3">
          <div class="spell-window-action-3-text">Action #3</div>
        </div>
        <div class="spell-window-action-3-toggle"></div>
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
      $('.spell-window-action-1').actionInlineEdit(text, replaceWith, connectWith);

      var replaceWith = $('<input maxlength="26" name="temp" class="spell-window-action-2-input" />'),
      connectWith = $('input[name="spell-window-action-2-text"]');
      text = $('.spell-window-action-2-text');
      $('.spell-window-action-2').actionInlineEdit(text, replaceWith, connectWith);

      var replaceWith = $('<input maxlength="26" name="temp" class="spell-window-action-3-input" />'),
      connectWith = $('input[name="spell-window-action-3-text"]');
      text = $('.spell-window-action-3-text');
      $('.spell-window-action-3').actionInlineEdit(text, replaceWith, connectWith);
    </script>

    <div class="spell-action-window">
      <h4 class="spell-action-title">Cost</h4>
      <div class="row">
        <div class="medium-2 medium-offset-1 columns spell-action-cost-input">
          <label for="middle-label" class="text-left middle">Gold: </label>
        </div>
        <div class="medium-6 columns spell-action-cost-input">
          <input type="number">
        </div>
      </div>
      <div class="row">
        <div class="medium-2 medium-offset-1 columns spell-action-cost-input">
          <label for="middle-label" class="text-left middle">Mana: </label>
        </div>
        <div class="medium-6 columns spell-action-cost-input">
          <input type="number">
        </div>
      </div>
      <h4 class="spell-action-title">Target</h4>
      <ul class="spell-action-target">
        <li>Human Male</li>
        <li>Human Female</li>
        <li>Goblin Old</li>
      </ul>
      <div class="spell-action-buttons">
        <button class="button">Challenge</button>
        <button class="button">Focus</button>
        <button class="button">Tool</button>
      </div>
    </div>

    <div class="spell-target-window">
      <div class="spell-target-item"></div>
    </div>


  </div>
</div>



@stop
