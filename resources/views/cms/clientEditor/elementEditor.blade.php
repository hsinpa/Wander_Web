@extends('template')
@section('content')
@include('cms.header')


<script type="text/javascript" src="{{ url('js/cms/editor/attrchange.js') }}"></script>
<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>
  <style>
    #characters {
      margin-left: 5%;
      margin-right: 5%;
    }
    .saveButton {
    }
    .left-margin {
      margin-left: 1%;
    }
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
  </style>
  <script lang="text/javascript">
    $(document).ready(function() {
      $('#currencySave').click(function(){
        $('#currencyContainer').foundation('up', $('#currencyContent'));
        setTimeout(function(){ $('#characterContainer').foundation('down', $('#characterContent')); }, 300);
      });
      $('#characterSave').click(function(){
        $('#characterContainer').foundation('up', $('#characterContent'));
        setTimeout(function(){ $('#propContainer').foundation('down', $('#propContent')); }, 300);
      });
      $('#propSave').click(function(){
        $('#propContainer').foundation('up', $('#propContent'));
        setTimeout(function(){ $('#spellContainer').foundation('down', $('#spellContent')); }, 300);
      });
      $('#spellSave').click(function(){
        $('#spellContainer').foundation('up', $('#spellContent'));
      });
    });
  </script>
  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Game Editor</h2>
    <div class="medium-4 left-margin">
      <div class="medium-12 columns">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" id="currencyContainer">
          <li class="accordion-item is-active" data-accordion-item>
            <a href="#currencyContent" class="accordion-title">Currency</a>
            <div class="accordion-content" data-tab-content id="currencyContent">
              <div class="row">
                <div class="panel">
                  <h4>Money</h4>
                  <form>
                    <label>Currency Name: <input type="text" placeholder="Name" /></label>
                    <label>Icon
                      <select>
                        <option value="dollar">Dollar Coin</option>
                        <option value="euro">Euro Coin</option>
                        <option value="gold">Gold Bar</option>
                        <option value="silver">Silver Bar</option>
                      </select>
                    </label>
                </div>
                <div class="panel">
                  <h4>Spell</h4>
                  <label>Spell Power Name: <input type="text" placeholder="Spell Power" /></label>
                  <label>Icon
                    <select>
                      <option value="blue">Blue Orb</option>
                      <option value="purple">Purple Orb</option>
                      <option value="light">Lightbulb</option>
                      <option value="book">Book</option>
                    </select>
                  </label>
                </div>
                <div class="panel">
                  <h4>Supply</h4>
                  <label>Supply Name: <input type="text" placeholder="Supply" /></label>
                  <label>Icon
                    <select>
                      <option value="boxes">Boxes</option>
                      <option value="truck">Truck</option>
                    </select>
                  </label>
                </div>
                <div class="medium-3 medium-centered">
                  <button type="button" id="currencySave" class="success button saveButton">Save Changes</button>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="medium-12 columns">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" id="characterContainer">
          <li class="accordion-item" data-accordion-item>
            <a href="#characterContent" class="accordion-title">Characters</a>
            <div class="accordion-content" data-tab-content id="characterContent">
            <div class="row">
              <div class="panel">
                <h4>Player</h4>
                <label>Player Name: <input type="text" placeholder="Name" /></label>
                <label>Player Description: <input type="text" placeholder="Description" /></label>
                <label>Player Icon:
                  <select>
                    <option value="human">Human</option>
                    <option value="robot">Robot</option>
                    <option value="orc">Orc</option>
                    <option value="man">Business Man</option>
                    <option value="woman">Business Woman</option>
                  </select>
                </label>
                <label>Starting Currency: <input type="number" placeholder="Starting Currency" /></label>
                <label>Starting Spell Power: <input type="number" placeholder="Starting Spell Power" /></label>
                <label>Starting Supply: <input type="number" placeholder="Starting Supply" /></label>
              </div>
              <div class="panel">
                <h4>Opponent</h4>
                <label>Opponent Name: <input type="text" placeholder="Name" /></label>
                <label>Opponent Description: <input type="text" placeholder="Description" /></label>
                <label>Opponent Icon:
                  <select>
                    <option value="human">Human</option>
                    <option value="robot">Robot</option>
                    <option value="orc">Orc</option>
                    <option value="man">Business Man</option>
                    <option value="woman">Business Woman</option>
                  </select>
                </label>
                <label>Starting Currency: <input type="number" placeholder="Starting Currency" /></label>
                <label>Starting Spell Power: <input type="number" placeholder="Starting Spell Power" /></label>
                <label>Starting Supply: <input type="number" placeholder="Starting Supply" /></label>
              </div>
              <div class="medium-3 medium-centered">
                <button type="button" id="characterSave" class="success button saveButton">Save Changes</button>
              </div>
            </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="medium-12 columns">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" id="propContainer">
          <li class="accordion-item" data-accordion-item>
            <a href="#propContent" class="accordion-title">Props</a>
            <div class="accordion-content" data-tab-content id="propContent">
            <div class="row">
              <div class="panel">
                <h4>Prop 1</h4>
                <label>Prop Name: <input type="text" placeholder="Name" /></label>
                <label>Prop Description: <input type="text" placeholder="Description" /></label>
                <label>Prop Icon:
                  <select>
                    <option value="hat">Hat</option>
                    <option value="clock">Clock</option>
                    <option value="watch">Watch</option>
                    <option value="shirt">Shirt</option>
                    <option value="pants">Pants</option>
                    <option value="computer">Computer</option>
                    <option value="phone">Phone</option>
                    <option value="food">Food</option>
                    <option value="drink">Drink</option>
                  </select>
                </label>
                <a class="secondary button" data-open="prop1Config">Click to configure prop pricing information</a>
                <div class="reveal" id="prop1Config" data-reveal>
                  <h3>Prop 1 - Pricing Configuration</h3>
                  <label>Market Price: <input type="number" placeholder="Market Price" /></label>
                  <label>Material Cost: <input type="number" placeholder="Material Cost" /></label>
                  <label>Inventory Cost: <input type="number" placeholder="Inventory Cost" /></label>
                  <label>Defect Rate: <input type="number" placeholder="Inventory Cost" /></label>
                  <label>Price Elasticity: <input type="number" placeholder="Inventory Cost" /></label>
                </div>
              </div>
              <div class="panel">
                <h4>Prop 2</h4>
                <label>Prop Name: <input type="text" placeholder="Name" /></label>
                <label>Prop Description: <input type="text" placeholder="Description" /></label>
                <label>Prop Icon:
                  <select>
                    <option value="hat">Hat</option>
                    <option value="clock">Clock</option>
                    <option value="watch">Watch</option>
                    <option value="shirt">Shirt</option>
                    <option value="pants">Pants</option>
                    <option value="computer">Computer</option>
                    <option value="phone">Phone</option>
                    <option value="food">Food</option>
                    <option value="drink">Drink</option>
                  </select>
                </label>
                <a class="secondary button" data-open="prop2Config">Click to configure prop pricing information</a>
                <div class="reveal" id="prop2Config" data-reveal>
                  <h3>Prop 2 - Pricing Configuration</h3>
                  <label>Market Price: <input type="number" placeholder="Market Price" /></label>
                  <label>Material Cost: <input type="number" placeholder="Material Cost" /></label>
                  <label>Inventory Cost: <input type="number" placeholder="Inventory Cost" /></label>
                  <label>Defect Rate: <input type="number" placeholder="Inventory Cost" /></label>
                  <label>Price Elasticity: <input type="number" placeholder="Inventory Cost" /></label>
                </div>
              </div>
              <div class="panel">
                <h4>Prop 3</h4>
                <label>Prop Name: <input type="text" placeholder="Name" /></label>
                <label>Prop Description: <input type="text" placeholder="Description" /></label>
                <label>Prop Icon:
                  <select>
                    <option value="hat">Hat</option>
                    <option value="clock">Clock</option>
                    <option value="watch">Watch</option>
                    <option value="shirt">Shirt</option>
                    <option value="pants">Pants</option>
                    <option value="computer">Computer</option>
                    <option value="phone">Phone</option>
                    <option value="food">Food</option>
                    <option value="drink">Drink</option>
                  </select>
                </label>
                <a class="secondary button" data-open="prop3Config">Click to configure prop pricing information</a>
                <div class="reveal" id="prop3Config" data-reveal>
                  <h3>Prop 3 - Pricing Configuration</h3>
                  <label>Market Price: <input type="number" placeholder="Market Price" /></label>
                  <label>Material Cost: <input type="number" placeholder="Material Cost" /></label>
                  <label>Inventory Cost: <input type="number" placeholder="Inventory Cost" /></label>
                  <label>Defect Rate: <input type="number" placeholder="Inventory Cost" /></label>
                  <label>Price Elasticity: <input type="number" placeholder="Inventory Cost" /></label>
                </div>
              </div>
              <div class="medium-3 medium-centered">
                <button type="button" id="propSave" class="success button saveButton">Save Changes</button>
              </div>
            </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="medium-12 columns">
        <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" id="spellContainer">
          <li class="accordion-item" data-accordion-item>
            <a href="#spellContent" class="accordion-title">Spells</a>
            <div class="accordion-content" data-tab-content id="spellContent">
            <div class="row">
              <div class="panel">
                <h4>Spell 1</h4>
                <label>Spell Name: <input type="text" placeholder="Name" /></label>
                <label>Spell Description: <input type="text" placeholder="Description" /></label>
                <label>Spell Icon:
                  <select>
                    <option value="wand">Wand</option>
                    <option value="brain">Brain</option>
                    <option value="star">Star</option>
                    <option value="megaphone">Megaphone</option>
                    <option value="paper">Paper</option>
                    <option value="book">Book</option>
                  </select>
                </label>
                <a class="secondary button" data-open="spell1Config">Click to configure spell actions</a>
                <div class="reveal" id="spell1Config" data-reveal>
                  <h3>Spell Configuration</h3>
                  <h4>Primary Action 1</h4>
                  <label>Name: <input type="text" placeholder="Primary Action 1 Name" /></label>
                  <label>Currency Cost: <input type="number" placeholder="Currency Cost" /></label>
                  <label>Spell Power Cost: <input type="number" placeholder="Spell Power Cost" /></label>
                  <h4>Primary Action 2</h4>
                  <label>Primary Action 2 Name: <input type="text" placeholder="Primary Action 2 Name" /></label>
                  <label>Currency Cost: <input type="number" placeholder="Currency Cost" /></label>
                  <label>Spell Power Cost: <input type="number" placeholder="Spell Power Cost" /></label>
                </div>
              </div>
              <div class="panel">
                <h4>Spell 2</h4>
                <label>Spell Name: <input type="text" placeholder="Name" /></label>
                <label>Spell Description: <input type="text" placeholder="Description" /></label>
                <label>Spell Icon:
                  <select>
                    <option value="wand">Wand</option>
                    <option value="brain">Brain</option>
                    <option value="star">Star</option>
                    <option value="megaphone">Megaphone</option>
                    <option value="paper">Paper</option>
                    <option value="book">Book</option>
                  </select>
                </label>
                <a class="secondary button" data-open="spell2Config">Click to configure spell actions</a>
                <div class="reveal" id="spell2Config" data-reveal>
                  <h3>Spell Configuration</h3>
                  <h4>Primary Action 1</h4>
                  <label>Name: <input type="text" placeholder="Primary Action 1 Name" /></label>
                  <label>Currency Cost: <input type="number" placeholder="Currency Cost" /></label>
                  <label>Spell Power Cost: <input type="number" placeholder="Spell Power Cost" /></label>
                  <h4>Primary Action 2</h4>
                  <label>Primary Action 2 Name: <input type="text" placeholder="Primary Action 2 Name" /></label>
                  <label>Currency Cost: <input type="number" placeholder="Currency Cost" /></label>
                  <label>Spell Power Cost: <input type="number" placeholder="Spell Power Cost" /></label>
                </div>
              </div>
              <div class="panel">
                <h4>Spell 3</h4>
                <label>Spell Name: <input type="text" placeholder="Name" /></label>
                <label>Spell Description: <input type="text" placeholder="Description" /></label>
                <label>Spell Icon:
                  <select>
                    <option value="wand">Wand</option>
                    <option value="brain">Brain</option>
                    <option value="star">Star</option>
                    <option value="megaphone">Megaphone</option>
                    <option value="paper">Paper</option>
                    <option value="book">Book</option>
                  </select>
                </label>
                <a class="secondary button" data-open="spell3Config">Click to configure spell actions</a>
                <div class="reveal" id="spell3Config" data-reveal>
                  <h3>Spell Configuration</h3>
                  <h4>Primary Action 1</h4>
                  <label>Name: <input type="text" placeholder="Primary Action 1 Name" /></label>
                  <label>Currency Cost: <input type="number" placeholder="Currency Cost" /></label>
                  <label>Spell Power Cost: <input type="number" placeholder="Spell Power Cost" /></label>
                  <h4>Primary Action 2</h4>
                  <label>Primary Action 2 Name: <input type="text" placeholder="Primary Action 2 Name" /></label>
                  <label>Currency Cost: <input type="number" placeholder="Currency Cost" /></label>
                  <label>Spell Power Cost: <input type="number" placeholder="Spell Power Cost" /></label>
                </div>
              </div>
              <div class="medium-3 medium-centered">
                <button type="button" id="spellSave" class="success button saveButton">Save Changes</button>
              </div>
            </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="medium-6">
      <div class="phoneArea">
        <div class="view">
          <div class="phoneBackground"></div>
          <div class="background" id="background-area"></div>
          <div class="toolbar" id="toolbar-area"></div>
          <div class="competitor" id="competitor-area"></div>
          <div class="problems"></div>
          <div class="tool" id="tool-area"></div>
        </div>
        <img src="../image/editor/iphone.png" class="phoneImage">
      </div>
    </div>
  </div>
</div>

</form>

@stop
