@extends('template')
@section('content')
@include('cms.header')

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
    #phone-container {
      left: -4%;
      position: relative;
      top: 100px;
    }
    .phoneArea {
      position: fixed;
      margin-right: 2%;
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
      background-image: url(../image/editor/iphone.png);
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
    .topbar-money {
      height: 57%;
      width: 6%;
      left: 12%;
      top: 28%;
      position: absolute;
      background-image: url(../image/editor/topbar/money-dollar.png);
      z-index: 3;
      background-repeat: no-repeat;
      background-size: contain;
    }
    .topbar-money-text {
      left: 19%;
      top: 28%;
      position: absolute;
      z-index: 3;
      background-repeat: no-repeat;
      background-size: contain;
      color: gold;
      font-size: xx-small;
    }
    .topbar-supply {
      height: 57%;
      width: 9%;
      left: 44%;
      top: 25%;
      position: absolute;
      background-image: url(../image/editor/topbar/supply-boxes.png);
      z-index: 3;
      background-repeat: no-repeat;
      background-size: contain;
    }
    .topbar-supply-text {
      left: 52.5%;
      top: 28%;
      position: absolute;
      z-index: 3;
      background-repeat: no-repeat;
      background-size: contain;
      color: lightgreen;
      font-size: xx-small;
    }
    .topbar-spell {
      height: 57%;
      width: 9%;
      left: 31.4%;
      top: 25%;
      position: absolute;
      background-image: url(../image/editor/topbar/spell-blue.png);
      z-index: 3;
      background-repeat: no-repeat;
      background-size: contain;
    }
    .topbar-spell-text {
      left: 39.5%;
      top: 28%;
      position: absolute;
      z-index: 3;
      background-repeat: no-repeat;
      background-size: contain;
      color: lightblue;
      font-size: xx-small;
    }
    #toolbar-elements {
      height: 15%;
      bottom: 2%;
      width: 57%;
      left: 21.5%;
    }
    .prop-1 {
      width: 14.5%;
      height: 100%;
      z-index: 4;
      background-image: url(../image/editor/fantasy/prop-blank.png);
      background-size: cover;
      position: absolute;
    }
    .prop-2 {
      width: 14.5%;
      height: 100%;
      z-index: 4;
      background-image: url(../image/editor/fantasy/prop-blank.png);
      background-size: cover;
      position: absolute;
      left: 16%;
    }
    .prop-3 {
      width: 14.5%;
      height: 100%;
      z-index: 4;
      background-image: url(../image/editor/fantasy/prop-blank.png);
      background-size: cover;
      position: absolute;
      left: 33%;
    }
    .tactic-1 {
      width: 14.5%;
      height: 100%;
      z-index: 4;
      background-image: url(../image/editor/fantasy/tactic-blank.png);
      background-size: cover;
      position: absolute;
      left: 53%;
    }
    .tactic-2 {
      width: 14.5%;
      height: 100%;
      z-index: 4;
      background-image: url(../image/editor/fantasy/tactic-blank.png);
      background-size: cover;
      position: absolute;
      left: 69%;
    }
    .tactic-3 {
      width: 14.5%;
      height: 100%;
      z-index: 4;
      background-image: url(../image/editor/fantasy/tactic-blank.png);
      background-size: cover;
      position: absolute;
      left: 85%;
    }
    .prop-icon {
      height: 80%;
      width: 85%;
      left: 7.5%;
      top: 12%;
      position: absolute;
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }
    .tactic-icon {
      height: 80%;
      width: 85%;
      left: 7.5%;
      top: 12%;
      position: absolute;
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }
    .prop-price {
      bottom: 9%;
      right: 8%;
      position: absolute;
      color: yellow;
      width: 60%;
      height: 35%;
      text-align: right;
    }
    .prop-price > span {
      color: yellow;
      text-align: right;
    }
    .prop-amount {
      top: 1%;
      left: 1%;
      position: absolute;
      color: yellow;
      width: 50%;
      height: 35%;
      color: white;
    }
    .prop-amount > span {
      color: white;
    }
    .screen-product {
      width: 70%;
      height: 80%;
      left: 15%;
      top: 15%;
      position: relative;
      background-image: url(../image/editor/fantasy/screen-product.png);
      background-size: contain;
      background-repeat: no-repeat;
      z-index: 10;
    }
    .screen-overlay {
      background-color: black;
      width: 100%;
      height: 100%;
      position: absolute;
      z-index: 9;
      opacity: .6;
    }
    .screen-customer {
      position: absolute;
      width: 70%;
      height: 80%;
      left: 15%;
      top: 15%;
      position: relative;
      background-image: url(../image/editor/fantasy/screen-customer.png);
      background-size: contain;
      background-repeat: no-repeat;
      z-index: 10;
    }
    .screen-customer > #customer-image {
      position: absolute;
      width: 30%;
      left: 5%;
      height: 56%;
      top: 26%;
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      z-index: 10;
    }
    .customer-information {
      right: 10%;
      width: 50%;
      height: 72%;
      position: absolute;
      top: 19%;
    }
    .customer-information > div > span {
      color:white;
    }
    .customer-information > #customer-reached {
      position: absolute;
      top: 0%;
      width: 100%;
      height: 13%;
    }
    .customer-information > #customer-visiting {
      position: absolute;
      top: 13%;
      width: 100%;
      height: 13%;
    }
    .customer-information > #customer-awareness {
      position: absolute;
      top: 26%;
      width: 100%;
      height: 13%;
    }
    .customer-information > #customer-payment {
      position: absolute;
      top: 39%;
      width: 100%;
      height: 13%;
    }
    .customer-information > #customer-elasticity {
      position: absolute;
      top: 52%;
      width: 100%;
      height: 13%;
    }
    .product-information {
      right: 5%;
      width: 50%;
      height: 63%;
      position: absolute;
      top: 18%;
    }
    .product-information > #market-price {
      position: absolute;
      top: 0%;
      width: 100%;
      height: 13%;
    }
    .product-information > #material-cost {
      position: absolute;
      top: 13%;
      width: 100%;
      height: 13%;
    }
    .product-information > #inventory-cost {
      position: absolute;
      top: 26%;
      width: 100%;
      height: 13%;
    }
    .product-information > #defect-rate {
      position: absolute;
      top: 39%;
      width: 100%;
      height: 13%;
    }
    .product-information > #price-elasticity {
      position: absolute;
      top: 52%;
      width: 100%;
      height: 13%;
    }
    .product-information > #product-description {
      position: absolute;
      top: 65%;
      width: 100%;
      height: 30%;
    }
    .product-information > div > span {
      color: white;
    }
    #product-image {
      position: absolute;
      width: 21%;
      height: 50%;
      left: 12%;
      top: 28%;
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }
    #product-name {
      position: absolute;
      width: 20%;
      height: 10%;
      left: 13%;
      top: 73%;
      text-align: center;
    }
    #product-name > span {
      font-weight: bold;
    }
    [id^="customer-"][id$="-label1"],[id^="customer-"][id$="-label2"],[id^="customer-"][id$="-label3"],[id^="customer-"][id$="-label4"],[id^="customer-"][id$="-label5"] {
      width: 49%;
      display: inline-block;
      margin-right: 2%;
    }
    [id^="customer-"][id$="-reached"],[id^="customer-"][id$="-visiting"],[id^="customer-"][id$="-awareness"],[id^="customer-"][id$="-payment"],[id^="customer-"][id$="-elasticity"] {
      width: 49%;
      display: inline-block;
    }
    #customer-reached-1, #customer-reached-2, #customer-visiting-1, #customer-visiting-2, #customer-awareness-1, #customer-awareness-2, #customer-payment-1, #customer-payment-2, #customer-elasticity-1, #customer-elasticity-2 {
      width: auto;
      display: inline-block;
      margin-right: 4%;
      color: white;
      font-family: 'LatoWebLight', Calibri, Candara, Optima, Arial, sans-serif;
    }

    .propertyListing {
      margin-bottom: 3%;
    }
    .propertyButton {
      padding-top: 1%;
      margin-left: 4%;
      display: inline-table;
      width: 18%;
      background-color: darkgray;
      border-radius: 5px;
      text-align: center;
    }
    .propertyButton > span {
      display: inline-block;
    }
    .propertyButtonClosed {
      padding-bottom: 1%;
    }
    .propertyButtonOpen {
      padding-bottom: 0%;
    }
    .propertyDetails {
      width: 250%;
      background-color: darkgray;
      border-radius: 5px;
      transition: left 300ms linear, border-top-right-radius 300ms linear, padding-bottom 300ms linear, width 300ms linear, transform 300ms linear;
    }
    .propertyDetailsLeft {
      left: -150%;
      position: relative;
    }
    .propertyDetailsClosed {
        height: 0px;
        margin-top: 0%;
    }
    .propertyDetailsHalfOpen {
        height: 180px;
        margin-top: 10%;
    }
    .propertyDetailsOpen {
        height: 360px;
        margin-top: 10%;
    }
    .propertyIconListing {
      width: 90%;
      height: 150px;
      margin-top: 1%;
      display: inline-block;
      overflow-x: scroll;
    }
    .propertyIcon {
      width: 27%;
      height: 95%;
      margin-right: 5%;
      display: inline-block;
    }
    .propertyIconLabel {
      font-family: 'LatoWebLight', Calibri, Candara, Optima, Arial, sans-serif;
    }
    .propertyIconImage {
      height: 100px;
      width: 100px;
      background-color: lightgray;
      border-radius: 5px;
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      display: inline-block;
    }
    .propertyInformation {
      height: 185px;
      width: 90%;
      display: inline-block;
    }
    .propertyInformation > h5 {
      margin-bottom: 0;
    }
    .propertyInformationInputs {
      columns: 2;
      height: 100%;
    }
    .propertyInformationInputs > label {
      display: inline-block;
    }
    .propertyInformationInputs > label > input {
      margin-bottom: .5rem;
    }

    a#prop-1-info {
      padding: .5em;
    }
    #prop-1-flipped > label {
        font-size: .75em;
    }
    #prop-1-flipped > label > input {
      height: 1.5rem;
      margin-bottom: .5rem;
    }

    a#prop-2-info {
      padding: .5em;
    }
    #prop-2-flipped > label {
        font-size: .75em;
    }
    #prop-2-flipped > label > input {
      height: 1.5rem;
      margin-bottom: .5rem;
    }

    a#prop-3-info {
      padding: .5em;
    }
    #prop-3-flipped > label {
        font-size: .75em;
    }
    #prop-3-flipped > label > input {
      height: 1.5rem;
      margin-bottom: .5rem;
    }

  </style>
  <script type="text/javascript" src="{{ url('js/cms/editor/adapttext.js') }}"></script>
  <script lang="text/javascript">
    $(document).ready(function() {

      $('.propertyInformation').hide();
      $('.propertyDetails').hide();
      $('#prop-1-original').hide();
      $('#prop-1-flipped').hide();
      $('#prop-2-original').hide();
      $('#prop-2-flipped').hide();
      $('#prop-3-original').hide();
      $('#prop-3-flipped').hide();
      $('#customer-1-original').hide();
      $('#customer-1-flipped').hide();
      $('#customer-2-original').hide();
      $('#customer-2-flipped').hide();
      $('#customer-3-original').hide();
      $('#customer-3-flipped').hide();

      $('#iconHero').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#charactersHero').fadeIn();
      });
      $('#iconCompetitor').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#charactersCompetitor').fadeIn();
      });

      $('.propertyListing').on("click", ".propertyButtonClosed", function() {
        $('.propertyDetailsOpen').removeClass('propertyDetailsOpen').addClass('propertyDetailsClosed');
        $('.propertyDetailsHalfOpen').removeClass('propertyDetailsHalfOpen').addClass('propertyDetailsClosed');
        $('.propertyButtonOpen').removeClass('propertyButtonOpen').addClass('propertyButtonClosed');
        $('.propertyDetails').fadeOut(5);
        $('.propertyInformation').hide();
        $(event.target).removeClass('propertyButtonClosed').addClass('propertyButtonOpen');
        $(event.target).find('.propertyDetails').removeClass('propertyDetailsClosed').addClass('propertyDetailsHalfOpen').fadeIn();
      });

      $('#iconProp1').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#props1').fadeIn();
        $('#prop-1-original').fadeIn();
      });

      $('#prop-1-config').on("click", flipProp);
      $('#prop-1-info').on("click", flipPropBack);

      $('#iconProp2').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#props2').fadeIn();
        $('#prop-2-original').fadeIn();
      });

      $('#prop-2-config').on("click", flipProp);
      $('#prop-2-info').on("click", flipPropBack);

      $('#iconProp3').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#props3').fadeIn();
        $('#prop-3-original').fadeIn();
      });

      $('#prop-3-config').on("click", flipProp);
      $('#prop-3-info').on("click", flipPropBack);

      $('#iconCustomer1').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#customer-1').fadeIn();
        $('#customer-1-original').fadeIn();
      });

      $('#customer-1-config').on("click", flipCustomer);
      $('#customer-1-info').on("click", flipPropBack);

      $('#iconCustomer2').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#customer-2').fadeIn();
        $('#customer-2-original').fadeIn();
      });

      $('#customer-2-config').on("click", flipCustomer);
      $('#customer-2-info').on("click", flipPropBack);

      $('#iconCustomer3').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#customer-3').fadeIn();
        $('#customer-3-original').fadeIn();
      });

      $('#customer-3-config').on("click", flipCustomer);
      $('#customer-3-info').on("click", flipPropBack);

      $('#iconSpell1').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#spells1').fadeIn();
        $('#spells1 > div').children().fadeIn();
      });

      $('#iconSpell2').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#spells2').fadeIn();
        $('#spells2 > div').children().fadeIn();
      });

      $('#iconSpell3').on("click", function() {
        $('.propertyInformation').fadeOut(5);
        $('.screen-product').hide();
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        $(event.target).closest(".propertyDetails").removeClass("propertyDetailsHalfOpen").addClass("propertyDetailsOpen");
        $('#spells3').fadeIn();
        $('#spells3 > div').children().fadeIn();
      });

      function flipProp() {
        $(event.target).parent().fadeOut(5);
        $(event.target).parent().eq(1).fadeIn();
        $('.screen-product').show();
        $('.screen-overlay').show();
        var id = event.target.id.substring(5);
        id = id.slice(0,-7);
        if ($('#prop-'+id+'-name').val()!=="") {
          var tmp = '<span>'+$('#prop-'+id+'-name').val()+'</span>';
          $('#product-name').empty().append(tmp);
          $('#product-name').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#prop-'+id+'-description').val()!=="") {
          var tmp = '<span>'+$('#prop-'+id+'-description').val()+'</span>';
          $('#product-description').empty().append(tmp);
          $('#product-description').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+id+'-icon').val()!==null) {
          var url = "url(../image/editor/products/" + $('#prop-'+id+'-icon').val() + ".png)"
          $('#product-image').css({"background-image":url});
        }
        if ($('#prop-'+id+'-market').val()!=="") {
          var tmp = '<span>Market Price: $'+$('#prop-'+id+'-market').val()+'</span>';
          $('#market-price').empty().append(tmp);
          $('#market-price').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+id+'-material').val()!=="") {
          var tmp = '<span>Material Cost: $'+$('#prop-'+id+'-material').val()+'/unit</span>';
          $('#material-cost').empty().append(tmp);
          $('#material-cost').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+id+'-inventory').val()!=="") {
          var tmp = '<span>Inventory Cost: $'+$('#prop-'+id+'-inventory').val()+'/unit</span>';
          $('#inventory-cost').empty().append(tmp);
          $('#inventory-cost').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+id+'-defect').val()!=="") {
          var tmp = '<span>Defect Rate: '+$('#prop-'+id+'-defect').val()+'%</span>';
          $('#defect-rate').empty().append(tmp);
          $('#defect-rate').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+id+'-elasticity').val()!=="") {
          var tmp = '<span>Price Elasticity: '+$('#prop-'+id+'-elasticity').val()+'</span>';
          $('#price-elasticity').empty().append(tmp);
          $('#price-elasticity').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
      }

      function flipPropBack() {
        $(event.target).parent().fadeOut(5);
        $(event.target).parent().prev().fadeIn();
        $('.screen-product').hide();
        $('.screen-overlay').hide();
        $('.screen-customer').hide();
      }

      function flipCustomer() {
        $(event.target).parent().fadeOut(5);
        $(event.target).parent().next().fadeIn();
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-7);
        $('.screen-customer').show();
        $('.screen-overlay').show();
        //Get existing information
        if ($('#customer-'+cid+'-label1').val()!=="") {
          $('#customer-reached-1').text($('#customer-'+cid+'-label1').val()+':');
          $('#customer-reached').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-reached').val()!=="") {
          $('#customer-reached-2').text($('#customer-'+cid+'-reached').val());
          $('#customer-reached').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-label2').val()!=="") {
          $('#customer-visiting-1').text($('#customer-'+cid+'-label2').val()+':');
          $('#customer-reached').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-visiting').val()!=="") {
          $('#customer-visiting-2').text($('#customer-'+cid+'-visiting').val());
          $('#customer-visiting').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-label3').val()!=="") {
          $('#customer-awareness-1').text($('#customer-'+cid+'-label3').val()+':');
          $('#customer-awareness').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-awareness').val()!=="") {
          $('#customer-awareness-2').text($('#customer-'+cid+'-awareness').val());
          $('#customer-awareness').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-label4').val()!=="") {
          $('#customer-payment-1').text($('#customer-'+cid+'-label4').val()+':');
          $('#customer-payment').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-payment').val()!=="") {
          $('#customer-elasticity-2').text($('#customer-'+cid+'-elasticity').val());
          $('#customer-elasticity').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-label5').val()!=="") {
          $('#customer-elasticity-1').text($('#customer-'+cid+'-label5').val()+':');
          $('#customer-elasticity').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-elasticity').val()!=="") {
          $('#customer-elasticity-2').text($('#customer-'+cid+'-elasticity').val());
          $('#customer-elasticity').adaptText({
            minFontSize: 10,
            maxFontSize: 30,
            tollerance: 2
          });
        }
        if ($('#customer-'+cid+'-image').val()!==null) {
          var url = "url(../image/editor/customers/" + $('#customer-'+cid+'-image').val() + ".png)"
          $('#customer-image').css({"background-image":url});
        }
        if ($('#prop-'+cid+'-market').val()!=="") {
          var tmp = '<span>Market Price: $'+$('#prop-'+cid+'-market').val()+'</span>';
          $('#market-price').empty().append(tmp);
          $('#market-price').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+cid+'-material').val()!=="") {
          var tmp = '<span>Material Cost: $'+$('#prop-'+cid+'-material').val()+'/unit</span>';
          $('#material-cost').empty().append(tmp);
          $('#material-cost').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+cid+'-inventory').val()!=="") {
          var tmp = '<span>Inventory Cost: $'+$('#prop-'+cid+'-inventory').val()+'/unit</span>';
          $('#inventory-cost').empty().append(tmp);
          $('#inventory-cost').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+cid+'-defect').val()!=="") {
          var tmp = '<span>Defect Rate: '+$('#prop-'+cid+'-defect').val()+'%</span>';
          $('#defect-rate').empty().append(tmp);
          $('#defect-rate').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }
        if ($('#prop-'+cid+'-elasticity').val()!=="") {
          var tmp = '<span>Price Elasticity: '+$('#prop-'+cid+'-elasticity').val()+'</span>';
          $('#price-elasticity').empty().append(tmp);
          $('#price-elasticity').adaptText({
            minFontSize: 10,
            maxFontSize: 15,
            tollerance: 2
          });
        }

      }

      $("#customer-1-image").on("change", function(){
        var id = 1;
        var value = $("#customer-1-image").val();
        if (value == "knight") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/knight.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/knight.png)"});
        } else if (value == "paladin") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/paladin.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/paladin.png)"});
        } else if (value == "goblin-old") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/goblin-old.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/goblin-old.png)"});
        } else if (value == "goblin-young") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/goblin-young.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/goblin-young.png)"});
        } else if (value == "orc-family") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/orc-family.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/orc-family.png)"});
        } else if (value == "orc") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/orc.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/orc.png)"});
        }
      });

      $("#customer-3-image").on("change", function(){
        var id = 3;
        var value = $("#customer-3-image").val();
        if (value == "knight") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/knight.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/knight.png)"});
        } else if (value == "paladin") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/paladin.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/paladin.png)"});
        } else if (value == "goblin-old") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/goblin-old.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/goblin-old.png)"});
        } else if (value == "goblin-young") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/goblin-young.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/goblin-young.png)"});
        } else if (value == "orc-family") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/orc-family.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/orc-family.png)"});
        } else if (value == "orc") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/orc.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/orc.png)"});
        }
      });

      $("#customer-2-image").on("change", function(){
        var id = 2;
        var value = $("#customer-2-image").val();
        if (value == "knight") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/knight.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/knight.png)"});
        } else if (value == "paladin") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/paladin.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/paladin.png)"});
        } else if (value == "goblin-old") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/goblin-old.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/goblin-old.png)"});
        } else if (value == "goblin-young") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/goblin-young.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/goblin-young.png)"});
        } else if (value == "orc-family") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/orc-family.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/orc-family.png)"});
        } else if (value == "orc") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/customers/orc.png)"});
          $('#iconCustomer'+id).css({"background-image":"url(../image/editor/customers/orc.png)"});
        }
      });

      function sendForm () {
        document.getElementById("send-spell").submit();
      }
      document.getElementById("send-spell-button").onclick = sendForm;

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
        setTimeout(function(){ $('#customerContainer').foundation('down', $('#customerContent')); }, 300);
      });
      $('#customerSave').click(function(){
        $('#customerContainer').foundation('toggle', $('#customerContent'));
        setTimeout(function(){ $('#spellContainer').foundation('down', $('#spellContent')) }, 300);
        $('.screen-product').hide();
        $('.screen-overlay').hide();
        $('.screen-customer').hide();
      });
      $('#spellSave').click(function(){
        $('#spellContainer').foundation('up', $('#spellContent'));
      });

      $("#money-icon").change(function(){
        if (this.value == "dollar") {
          $('.topbar-money').css({"background-image":"url(../image/editor/topbar/money-dollar.png)"})
        } else if (this.value == "euro") {
          $('.topbar-money').css({"background-image":"url(../image/editor/topbar/money-euro.png)"})
        }
      });

      $("#supply-icon").change(function(){
        if (this.value == "boxes") {
          $('.topbar-supply').css({"background-image":"url(../image/editor/topbar/supply-boxes.png)"})
        } else if (this.value == "truck") {
          $('.topbar-supply').css({"background-image":"url(../image/editor/topbar/supply-truck.png)"})
        }
      });

      $("#spell-icon").change(function(){
        if (this.value == "red") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/topbar/spell-red.png)"})
        } else if (this.value == "blue") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/topbar/spell-blue.png)"})
        } else if (this.value == "yellow") {
          $('.topbar-spell').css({"background-image":"url(../image/editor/topbar/spell-yellow.png)"})
        }
      });

      $("#hero-icon").change(function(){
        if (this.value == "mage") {
          var mage = '<img src="../image/editor/heroes/mage.png" class="selection-hero-image">';
          $('#hero-area').empty().append(mage);
          $('#iconHero').css({"background-image":"url(../image/editor/heroes/mage.png)"});
        } else if (this.value == "wizard") {
          var wizard = '<img src="../image/editor/heroes/wizard.png" class="selection-hero-image">';
          $('#hero-area').empty().append(wizard);
          $('#iconHero').css({"background-image":"url(../image/editor/heroes/wizard.png)"});
        } else if (this.value == "goblin") {
          var goblin = '<img src="../image/editor/heroes/goblin.png" class="selection-hero-image">';
          $('#hero-area').empty().append(goblin);
          $('#iconHero').css({"background-image":"url(../image/editor/heroes/goblin.png)"});
        } else if (this.value == "builder") {
          var builder = '<img src="../image/editor/heroes/builder.png" class="selection-hero-image">';
          $('#hero-area').empty().append(builder);
          $('#iconHero').css({"background-image":"url(../image/editor/heroes/builder.png)"});
        }
      });

      $("#competitor-icon").change(function(){
        if (this.value == "gray-robot") {
          var robotgray = '<img src="../image/editor/competitor/robot-gray.png" class="selection-hero-image">';
          $('#competitor-area').empty().append(robotgray);
          $('#iconCompetitor').css({"background-image":"url(../image/editor/competitor/robot-gray.png)"});
        } else if (this.value == "robot-blue") {
          var robotblue = '<img src="../image/editor/competitor/robot-blue.png" class="selection-hero-image">';
          $('#competitor-area').empty().append(robotblue);
          $('#iconCompetitor').css({"background-image":"url(../image/editor/competitor/robot-blue.png)"});
        } else if (this.value == "robot-white") {
          var robotwhite = '<img src="../image/editor/competitor/robot-white.png" class="selection-hero-image">';
          $('#competitor-area').empty().append(robotwhite);
          $('#iconCompetitor').css({"background-image":"url(../image/editor/competitor/robot-white.png)"});
        } else if (this.value == "robot-red") {
          var robotred = '<img src="../image/editor/competitor/robot-red.png" class="selection-hero-image">';
          $('#competitor-area').empty().append(robotred);
          $('#iconCompetitor').css({"background-image":"url(../image/editor/competitor/robot-red.png)"});
        } else if (this.value == "ninja") {
          var ninja = '<img src="../image/editor/competitor/ninja.png" class="selection-hero-image">';
          $('#competitor-area').empty().append(ninja);
          $('#iconCompetitor').css({"background-image":"url(../image/editor/competitor/ninja.png)"});
        }
      });

      $("#prop-1-icon").change(function(){
        var url = "url(../image/editor/products/" + this.value + ".png)";
        $('.prop-1-icon').css({"background-image":url});
        $('#iconProp1').css({"background-image":url});
      });

      $("#prop-2-icon").change(function(){
        var url = "url(../image/editor/products/" + this.value + ".png)"
        $('.prop-2-icon').css({"background-image":url});
        $('#iconProp2').css({"background-image":url});
      });

      $("#prop-3-icon").change(function(){
        var url = "url(../image/editor/products/" + this.value + ".png)"
        $('.prop-3-icon').css({"background-image":url});
        $('#iconProp3').css({"background-image":url});
      });

      $("#tactic-1-icon").change(function(){
        var url = "url(../image/editor/tactics/" + this.value + ".png)"
        $('.tactic-1-icon').css({"background-image":url});
        $('#iconProp1').css({"background-image":url});
      });

      $("#tactic-2-icon").change(function(){
        var url = "url(../image/editor/tactics/" + this.value + ".png)"
        $('.tactic-2-icon').css({"background-image":url})
      });

      $("#tactic-3-icon").change(function(){
        var url = "url(../image/editor/tactics/" + this.value + ".png)"
        $('.tactic-3-icon').css({"background-image":url})
      });

    });
    $(document).ready(function() {
      $('.screen-product').hide();
      $('.screen-overlay').hide();
      var current = 2;
      var id = 1;
      var prop = '<div class="panel" id="prop-'+ id +'">\
                    <div id="prop-'+ id +'-original">\
                      <label>Prop Name: <input type="text" placeholder="Name" id="prop-'+ id +'-name" /></label>\
                      <label>Prop Description: <input type="text" placeholder="Description" id="prop-'+ id +'-description" /></label>\
                      <label>Prop Icon:\
                        <select id="prop-'+ id +'-icon">\
                          <option selected disabled></option>\
                          <option value="bag-blue">Blue Bag</option>\
                          <option value="bag-brown">Brown Bag</option>\
                          <option value="bag-red">Red Bag</option>\
                          <option value="cloak-blue">Blue Cloak</option>\
                          <option value="cloak-brown">Brown Cloak</option>\
                          <option value="cloak-red">Red Cloak</option>\
                          <option value="hat-blue">Blue Hat</option>\
                          <option value="hat-brown">Brown Hat</option>\
                          <option value="hat-red">Red Hat</option>\
                          <option value="ring-blue">Blue Ring</option>\
                          <option value="ring-brown">Brown Ring</option>\
                          <option value="ring-red">Red Ring</option>\
                          <option value="shoes-blue">Blue Shoes</option>\
                          <option value="shoes-brown">Brown Shoes</option>\
                          <option value="shoes-red">Red Shoes</option>\
                          <option value="watch-blue">Blue Watch</option>\
                          <option value="watch-brown">Brown Watch</option>\
                          <option value="watch-red">Red Watch</option>\
                        </select>\
                      </label>\
                      <label>Market Price: <input type="number" placeholder="Market Price" id="prop-'+ id +'-market" /></label>\
                      <label>Toolbar Location:\
                        <select id="prop-'+ id +'-display">\
                          <option selected></option>\
                          <option value="position-1">Position 1</option>\
                          <option value="position-2">Position 2</option>\
                          <option value="position-3">Position 3</option>\
                        </select>\
                      </label>\
                      <div id="prop-controls">\
                        <a class="secondary button" id="prop-'+ id +'-config">Configure pricing information</a>\
                        <a class="alert button" id="prop-remove">Remove</a>\
                      </div>\
                    </div>\
                    <div id="prop-'+ id +'-flipped">\
                      <label>Material Cost: <input type="number" placeholder="Material Cost" id="prop-'+ id +'-material" /></label>\
                      <label>Inventory Cost: <input type="number" placeholder="Inventory Cost" id="prop-'+ id +'-inventory" /></label>\
                      <label>Defect Rate: <input type="number" placeholder="Defect Rate" id="prop-'+ id +'-defect" /></label>\
                      <label>Price Elasticity: <input type="number" placeholder="Price Elasticity" id="prop-'+ id +'-elasticity" /></label>\
                    </div>\
                  </div>';
      $(prop).appendTo('#prop-listing');
      $('#prop-'+id+'-flipped').hide();
      id++;
      $('#propAdding' ).on('click', '#prop-add', function() {
        var prop1 = '<div class="panel" id="prop-'+ id +'">\
                      <hr>\
                      <div id="prop-'+ id +'-original">\
                        <label>Prop Name: <input type="text" placeholder="Name" id="prop-'+ id +'-name" /></label>\
                        <label>Prop Description: <input type="text" placeholder="Description" id="prop-'+ id +'-description" /></label>\
                        <label>Prop Icon:\
                          <select id="prop-'+ id +'-icon">\
                            <option selected disabled></option>\
                            <option value="bag-blue">Blue Bag</option>\
                            <option value="bag-brown">Brown Bag</option>\
                            <option value="bag-red">Red Bag</option>\
                            <option value="cloak-blue">Blue Cloak</option>\
                            <option value="cloak-brown">Brown Cloak</option>\
                            <option value="cloak-red">Red Cloak</option>\
                            <option value="hat-blue">Blue Hat</option>\
                            <option value="hat-brown">Brown Hat</option>\
                            <option value="hat-red">Red Hat</option>\
                            <option value="ring-blue">Blue Ring</option>\
                            <option value="ring-brown">Brown Ring</option>\
                            <option value="ring-red">Red Ring</option>\
                            <option value="shoes-blue">Blue Shoes</option>\
                            <option value="shoes-brown">Brown Shoes</option>\
                            <option value="shoes-red">Red Shoes</option>\
                            <option value="watch-blue">Blue Watch</option>\
                            <option value="watch-brown">Brown Watch</option>\
                            <option value="watch-red">Red Watch</option>\
                          </select>\
                        </label>\
                        <label>Market Price: <input type="number" placeholder="Market Price" id="prop-'+ id +'-market" /></label>\
                        <label>Toolbar Location:\
                          <select id="prop-'+ id +'-display">\
                            <option selected></option>\
                            <option value="position-1">Position 1</option>\
                            <option value="position-2">Position 2</option>\
                            <option value="position-3">Position 3</option>\
                          </select>\
                        </label>\
                        <div id="prop-controls">\
                          <a class="secondary button" id="prop-'+ id +'-config">Configure pricing information</a>\
                          <a class="alert button" id="prop-remove">Remove</a>\
                        </div>\
                      </div>\
                      <div id="prop-'+ id +'-flipped">\</div>\
                    </div>';
        if (current < 7) {
          $(prop1).appendTo('#prop-listing');
          $('#prop-'+id+'-flipped').hide();
          $('[id ^=prop-][id $=-flipped]').slideUp();
          $('[id ^=prop-][id $=-config]').text("Configure pricing information");
          //$('.screen-product').hide();
          //$('.screen-overlay').hide();
          current++;
          id++;
          return false;
        }
      });

      $('.screen-customer').hide();
      var currentCid = 2;
      var cid = 1;
      var cust = '<div class="panel" id="customer-'+ cid +'">\
                    <div id="customer-'+ cid +'-original">\
                      <label>Customer Name: <input type="text" placeholder="Customer Name" id="customer-'+ cid +'-name" /></label>\
                      <label>Customer Image:\
                        <select id="customer-'+ cid +'-image">\
                          <option selected disabled></option>\
                          <option value="knight">Knight</option>\
                          <option value="paladin">Paladin</option>\
                          <option value="goblin-old">Old Goblin</option>\
                          <option value="goblin-young">Young Goblin</option>\
                          <option value="orc-family">Orc Family</option>\
                          <option value="orc">Orc</option>\
                        </select>\
                      </label>\
                      <div id="customer-controls">\
                        <a class="secondary button" id="customer-'+ cid +'-config">Configure customer information</a>\
                        <a class="alert button" id="customer-remove">Remove</a>\
                      </div>\
                    </div>\
                    <div id="customer-'+ cid +'-flipped">\
                      <input type="text" id="customer-'+cid+'-label1" placeholder="Attribute 1" /><input type="text" placeholder="Attribute 1 Value" id="customer-'+ cid +'-reached" />\
                      <input type="text" id="customer-'+cid+'-label2" placeholder="Attribute 2" /><input type="text" placeholder="Attribute 2 Value" id="customer-'+ cid +'-visiting" />\
                      <input type="text" id="customer-'+cid+'-label3" placeholder="Attribute 3" /><input type="text" placeholder="Attribute 3 Value" id="customer-'+ cid +'-awareness" />\
                      <input type="text" id="customer-'+cid+'-label4" placeholder="Attribute 4" /><input type="text" placeholder="Attribute 4 Value" id="customer-'+ cid +'-payment" />\
                      <input type="text" id="customer-'+cid+'-label5" placeholder="Attribute 5" /><input type="text" placeholder="Attribute 5 Value" id="customer-'+ cid +'-elasticity" />\
                    </div>\
                  </div>';
      $(cust).appendTo('#customer-listing');
      $('#customer-'+cid+'-flipped').hide();
      cid++;
      $('#customerAdding' ).on('click', '#customer-add', function() {
        var cust1 = '<div class="panel" id="customer-'+ cid +'">\
                      <hr>\
                      <div id="customer-'+ cid +'-original">\
                        <label>Customer Name: <input type="text" placeholder="Customer Name" id="customer-'+ cid +'-name" /></label>\
                        <label>Customer Image:\
                          <select id="customer-'+ cid +'-image">\
                            <option selected disabled></option>\
                            <option value="knight">Knight</option>\
                            <option value="paladin">Paladin</option>\
                            <option value="goblin-old">Old Goblin</option>\
                            <option value="goblin-young">Young Goblin</option>\
                            <option value="orc-family">Orc Family</option>\
                            <option value="orc">Orc</option>\
                          </select>\
                        </label>\
                        <div id="customer-controls">\
                          <a class="secondary button" id="customer-'+ cid +'-config">Configure customer information</a>\
                          <a class="alert button" id="customer-remove">Remove</a>\
                        </div>\
                      </div>\
                      <div id="customer-'+ cid +'-flipped">\
                        <input type="text" id="customer-'+cid+'-label1" placeholder="Attribute 1" /><input type="text" placeholder="Attribute 1 Value" id="customer-'+ cid +'-reached" />\
                        <input type="text" id="customer-'+cid+'-label2" placeholder="Attribute 2" /><input type="text" placeholder="Attribute 2 Value" id="customer-'+ cid +'-visiting" />\
                        <input type="text" id="customer-'+cid+'-label3" placeholder="Attribute 3" /><input type="text" placeholder="Attribute 3 Value" id="customer-'+ cid +'-awareness" />\
                        <input type="text" id="customer-'+cid+'-label4" placeholder="Attribute 4" /><input type="text" placeholder="Attribute 4 Value" id="customer-'+ cid +'-payment" />\
                        <input type="text" id="customer-'+cid+'-label5" placeholder="Attribute 5" /><input type="text" placeholder="Attribute 5 Value" id="customer-'+ cid +'-elasticity" />\
                      </div>\
                    </div>';
        if (currentCid < 7) {
          $(cust1).appendTo('#customer-listing');
          $('#customer-'+cid+'-flipped').hide();
          $('[id ^=prop-][id $=-flipped]').slideUp();
          $('[id ^=prop-][id $=-config]').text("Configure pricing information");
          //$('.screen-product').hide();
          //$('.screen-overlay').hide();
          $('.screen-customer').hide();
          $('#customer-image').css("background-image","");
          currentCid++;
          cid++;
          return false;
        }
      });

      $('#customer-listing' ).on('click', '#customer-remove', function() {
        $(this).parents('.panel').remove();
        currentCid--;
        $('.screen-customer').hide();
        $('.screen-overlay').hide();
        return false;
      });

      $('#customer-listing' ).on('click', '#prop-remove', function() {
        $(this).parents('.panel').remove();
        current--;
        $('.screen-product').hide();
        $('.screen-overlay').hide();
        return false;
      });

      $('#prop-listing' ).on('click', '#prop-remove', function() {
        $(this).parents('.panel').remove();
        current--;
        $('.screen-product').hide();
        $('.screen-overlay').hide();
        return false;
      });

      $(document).on('input', '[id ^=prop-][id $=-name]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-5);
        var tmp = '<span>'+$('#prop-'+id+'-name').val()+'</span>';
        $('#product-name').empty().append(tmp);
        $('#product-name').adaptText({
          minFontSize: 10,
          maxFontSize: 30,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=prop-][id $=-description]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-12);
        var tmp = '<span>'+$('#prop-'+id+'-description').val()+'</span>';
        $('#product-description').empty().append(tmp);
        $('#product-description').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('change', '[id ^=prop-][id $=-icon]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-5);
        var url = "url(../image/editor/products/" + this.value + ".png)";
        $('#product-image').css({"background-image":url});
      });


      $(document).on('input', '[id ^=prop-][id $=-market]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-7);
        var tmp = '<span>Market Price: $'+$('#prop-'+id+'-market').val()+'</span>';
        $('#market-price').empty().append(tmp);
        $('#market-price').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input', '[id ^=prop-][id $=-material]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-9);
        var tmp = '<span>Material Cost: $'+$('#prop-'+id+'-material').val()+'/unit</span>';
        $('#material-cost').empty().append(tmp);
        $('#material-cost').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input', '[id ^=prop-][id $=-inventory]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-10);
        var tmp = '<span>Inventory Cost: $'+$('#prop-'+id+'-inventory').val()+'/unit</span>';
        $('#inventory-cost').empty().append(tmp);
        $('#inventory-cost').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });
      $(document).on('input', '[id ^=prop-][id $=-defect]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-7);
        var tmp = '<span>Defect Rate: '+$('#prop-'+id+'-defect').val()+'%</span>';
        $('#defect-rate').empty().append(tmp);
        $('#defect-rate').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=prop-][id $=-elasticity]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-11);
        var tmp = '<span>Price Elasticity: '+$('#prop-'+id+'-elasticity').val()+'</span>';
        $('#price-elasticity').empty().append(tmp);
        $('#price-elasticity').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-label1]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-7);
        var tmp = $('#customer-'+cid+'-label1').val()+":";
        $('#customer-reached-1').empty().append(tmp);
        $('#customer-reached-1').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-reached]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-8);
        var tmp = $('#customer-'+cid+'-reached').val();
        $('#customer-reached-2').empty().append(tmp);
        $('#customer-reached-2').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-label2]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-7);
        var tmp = $('#customer-'+cid+'-label2').val()+":";
        $('#customer-visiting-1').empty().append(tmp);
        $('#customer-visiting-1').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-visiting]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-9);
        var tmp = $('#customer-'+cid+'-visiting').val();
        $('#customer-visiting-2').empty().append(tmp);
        $('#customer-visiting-2').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-label3]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-7);
        var tmp = $('#customer-'+cid+'-label3').val()+":";
        $('#customer-awareness-1').empty().append(tmp);
        $('#customer-awareness-1').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-awareness]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-10);
        var tmp = $('#customer-'+cid+'-awareness').val();
        $('#customer-awareness-2').empty().append(tmp);
        $('#customer-awareness-2').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-label4]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-7);
        var tmp = $('#customer-'+cid+'-label4').val()+":";
        $('#customer-payment-1').empty().append(tmp);
        $('#customer-payment-1').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-payment]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-8);
        var tmp = $('#customer-'+cid+'-payment').val();
        $('#customer-payment-2').empty().append(tmp);
        $('#customer-payment-2').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-label5]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-7);
        var tmp = $('#customer-'+cid+'-label5').val()+":";
        $('#customer-elasticity-1').empty().append(tmp);
        $('#customer-elasticity-1').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('input','[id ^=customer-][id $=-elasticity]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-11);
        var tmp = $('#customer-'+cid+'-elasticity').val();
        $('#customer-elasticity-2').empty().append(tmp);
        $('#customer-elasticity-2').adaptText({
          minFontSize: 10,
          maxFontSize: 15,
          tollerance: 2
        });
      });

      $(document).on('click','[id ^=prop-][id $=-config]', function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-7);
        $('#prop-'+id+'-flipped').slideToggle();
        this.toggle = !this.toggle;
        //$(this).text(this.toggle ? "Hide pricing information" : "Configure pricing information");
        if ($('#prop-'+id+'-config').text()=="Hide pricing information") {
          $('.screen-product').show();
          $('.screen-overlay').show();
          //Get existing information
          var id = event.target.id.substring(5,6);
          if ($('#prop-'+id+'-name').val()!=="") {
            var tmp = '<span>'+$('#prop-'+id+'-name').val()+'</span>';
            $('#product-name').empty().append(tmp);
            $('#product-name').adaptText({
              minFontSize: 10,
              maxFontSize: 30,
              tollerance: 2
            });
          }
          if ($('#prop-'+id+'-description').val()!=="") {
            var tmp = '<span>'+$('#prop-'+id+'-description').val()+'</span>';
            $('#product-description').empty().append(tmp);
            $('#product-description').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+id+'-icon').val()!==null) {
            var url = "url(../image/editor/products/" + $('#prop-'+id+'-icon').val() + ".png)"
            $('#product-image').css({"background-image":url});
          }
          if ($('#prop-'+id+'-market').val()!=="") {
            var tmp = '<span>Market Price: $'+$('#prop-'+id+'-market').val()+'</span>';
            $('#market-price').empty().append(tmp);
            $('#market-price').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+id+'-material').val()!=="") {
            var tmp = '<span>Material Cost: $'+$('#prop-'+id+'-material').val()+'/unit</span>';
            $('#material-cost').empty().append(tmp);
            $('#material-cost').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+id+'-inventory').val()!=="") {
            var tmp = '<span>Inventory Cost: $'+$('#prop-'+id+'-inventory').val()+'/unit</span>';
            $('#inventory-cost').empty().append(tmp);
            $('#inventory-cost').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+id+'-defect').val()!=="") {
            var tmp = '<span>Defect Rate: '+$('#prop-'+id+'-defect').val()+'%</span>';
            $('#defect-rate').empty().append(tmp);
            $('#defect-rate').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+id+'-elasticity').val()!=="") {
            var tmp = '<span>Price Elasticity: '+$('#prop-'+id+'-elasticity').val()+'</span>';
            $('#price-elasticity').empty().append(tmp);
            $('#price-elasticity').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
        } else {
          //$('.screen-product').hide();
          //$('.screen-overlay').hide();
        }
        return false;
      });
/*
      $(document).on('click','[id ^=customer-][id $=-config]', function() {
        var cid = event.target.id.substring(9);
        cid = cid.slice(0,-7);
        $('#customer-'+cid+'-flipped').slideToggle();
        this.toggle = !this.toggle;
        //$(this).text(this.toggle ? "Hide customer information" : "Configure customer information");
        if ($('#customer-'+cid+'-config').text()=="Hide customer information") {
          $('.screen-customer').show();
          $('.screen-overlay').show();
          //Get existing information
          var cid = event.target.id.substring(9,10);
          if ($('#customer-'+cid+'-reached').val()!=="") {
            var tmp = '<span>Customer reached: '+$('#customer-'+cid+'-reached').val()+'</span>';
            $('#customer-reached').empty().append(tmp);
            $('#customer-reached').adaptText({
              minFontSize: 10,
              maxFontSize: 30,
              tollerance: 2
            });
          }
          if ($('#customer-'+cid+'-visiting').val()!=="") {
            var tmp = '<span>Customer visiting: '+$('#customer-'+cid+'-visiting').val()+'</span>';
            $('#customer-visiting').empty().append(tmp);
            $('#customer-visiting').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#customer-'+cid+'-awareness').val()!=="") {
            var tmp = '<span>Awareness: '+$('#customer-'+cid+'-awareness').val()+'</span>';
            $('#customer-awareness').empty().append(tmp);
            $('#customer-awareness').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#customer-'+cid+'-payment').val()!=="") {
            var tmp = '<span>Payment speed: '+$('#customer-'+cid+'-payment').val()+'</span>';
            $('#customer-payment').empty().append(tmp);
            $('#customer-payment').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#customer-'+cid+'-image').val()!==null) {
            var url = "url(../image/editor/customers/" + $('#customer-'+cid+'-image').val() + ".png)"
            $('#customer-image').css({"background-image":url});
          }
          if ($('#prop-'+cid+'-market').val()!=="") {
            var tmp = '<span>Market Price: $'+$('#prop-'+cid+'-market').val()+'</span>';
            $('#market-price').empty().append(tmp);
            $('#market-price').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+cid+'-material').val()!=="") {
            var tmp = '<span>Material Cost: $'+$('#prop-'+cid+'-material').val()+'/unit</span>';
            $('#material-cost').empty().append(tmp);
            $('#material-cost').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+cid+'-inventory').val()!=="") {
            var tmp = '<span>Inventory Cost: $'+$('#prop-'+cid+'-inventory').val()+'/unit</span>';
            $('#inventory-cost').empty().append(tmp);
            $('#inventory-cost').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+cid+'-defect').val()!=="") {
            var tmp = '<span>Defect Rate: '+$('#prop-'+cid+'-defect').val()+'%</span>';
            $('#defect-rate').empty().append(tmp);
            $('#defect-rate').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
          if ($('#prop-'+cid+'-elasticity').val()!=="") {
            var tmp = '<span>Price Elasticity: '+$('#prop-'+cid+'-elasticity').val()+'</span>';
            $('#price-elasticity').empty().append(tmp);
            $('#price-elasticity').adaptText({
              minFontSize: 10,
              maxFontSize: 15,
              tollerance: 2
            });
          }
        } else {
          $('.screen-customer').hide();
          $('.screen-overlay').hide();
        }
        return false;
      });
*/

      function position1image () {
        var id = event.target.id.substring(5);
        id = id.slice(0,-5);
        if (id !== prop1assignment){
          return false;
        }
        if ($('#prop-'+id+'-icon').val()!==null){
          var url = "url(../image/editor/products/" + $('#prop-'+id+'-icon').val() + ".png)";
          $('#prop-1-image').css({"background-image":url});
        }
      }
      function position1market () {
        var id = event.target.id.substring(5);
        id = id.slice(0,-7);
        if (id !== prop1assignment){
          return false;
        }
        if ($('#prop-'+id+'-market').val()!=="") {
          var tmp = '<span>$'+$('#prop-'+id+'-market').val()+'</span>';
          $('#prop-1-price').empty().append(tmp);
          $('#prop-1-price').adaptText({
            minFontSize: 10,
            maxFontSize: 21,
            tollerance: 2
          });
        }
      }
      function position2image () {
        var id = event.target.id.substring(5);
        id = id.slice(0,-5);
        if (id !== prop2assignment){
          return false;
        }
        if ($('#prop-'+id+'-icon').val()!==null){
          var url = "url(../image/editor/products/" + $('#prop-'+id+'-icon').val() + ".png)";
          $('#prop-2-image').css({"background-image":url});
        }
      }
      function position2market () {
        var id = event.target.id.substring(5);
        id = id.slice(0,-7);
        if (id !== prop2assignment){
          return false;
        }
        if ($('#prop-'+id+'-market').val()!=="") {
          var tmp = '<span>$'+$('#prop-'+id+'-market').val()+'</span>';
          $('#prop-2-price').empty().append(tmp);
          $('#prop-2-price').adaptText({
            minFontSize: 10,
            maxFontSize: 21,
            tollerance: 2
          });
        }
      }
      function position3image () {
        var id = event.target.id.substring(5);
        id = id.slice(0,-5);
        if (id !== prop3assignment){
          return false;
        }
        if ($('#prop-'+id+'-icon').val()!==null){
          var url = "url(../image/editor/products/" + $('#prop-'+id+'-icon').val() + ".png)";
          $('#prop-3-image').css({"background-image":url});
        }
      }
      function position3market () {
        var id = event.target.id.substring(5);
        id = id.slice(0,-7);
        if (id !== prop3assignment){
          return false;
        }
        if ($('#prop-'+id+'-market').val()!=="") {
          var tmp = '<span>$'+$('#prop-'+id+'-market').val()+'</span>';
          $('#prop-3-price').empty().append(tmp);
          $('#prop-3-price').adaptText({
            minFontSize: 10,
            maxFontSize: 21,
            tollerance: 2
          });
        }
      }

      var prop1assignment = 0;
      var prop2assignment = 0;
      var prop3assignment = 0;
      $(document).on('change', '[id ^=prop-][id $=-display]', {prop1assignment: prop1assignment, prop2assignment: prop2assignment, prop3assignment: prop3assignment}, function() {
        var id = event.target.id.substring(5);
        id = id.slice(0,-8);
        if ($(event.target).val()==null) {
          if (id == prop1assignment) {
          $('#prop-1-image').css({"background-image":"none"});
          $('#prop-1-price').empty();
          prop1assignment = 0;
        } else if (id == prop2assignment) {
          $('#prop-2-image').css({"background-image":"none"});
          $('#prop-2-price').empty();
          prop1assignment = 0;
        } else if (id == prop3assignment) {
          $('#prop-3-image').css({"background-image":"none"});
          $('#prop-3-price').empty();
          prop1assignment = 0;
        }
          document.removeEventListener("change", position1image, false);
          document.removeEventListener("input", position1market, false);
          document.removeEventListener("change", position2image, false);
          document.removeEventListener("input", position2market, false);
          document.removeEventListener("change", position3image, false);
          document.removeEventListener("input", position3market, false);
        }
        if ($(event.target).val()=="position-1") {
          if (id == prop1assignment) {
            $('#prop-1-image').css({"background-image":"none"});
            $('#prop-1-price').empty();
            prop1assignment = 0;
          } else if (id == prop2assignment) {
            $('#prop-2-image').css({"background-image":"none"});
            $('#prop-2-price').empty();
            prop2assignment = 0;
          } else if (id == prop3assignment) {
            $('#prop-3-image').css({"background-image":"none"});
            $('#prop-3-price').empty();
            prop3assignment = 0;
          }
          prop1assignment = id;
          document.removeEventListener("change", position1image, false);
          document.removeEventListener("input", position1market, false);
          document.removeEventListener("change", position2image, false);
          document.removeEventListener("input", position2market, false);
          document.removeEventListener("change", position3image, false);
          document.removeEventListener("input", position3market, false);
          $('#prop-1-image').css({"background-image":"none"});
          $('#prop-1-price').empty();
          if ($('#prop-'+id+'-icon').val()!==null){
            var url = "url(../image/editor/products/" + $('#prop-'+id+'-icon').val() + ".png)";
            $('#prop-1-image').css({"background-image":url});
          }
          if ($('#prop-'+id+'-market').val()!=="") {
            var tmp = '<span>$'+$('#prop-'+id+'-market').val()+'</span>';
            $('#prop-1-price').empty().append(tmp);
            $('#prop-1-price').adaptText({
              minFontSize: 10,
              maxFontSize: 13,
              tollerance: 2
            });
          }
          document.addEventListener("change", position1image, false);
          document.addEventListener("input", position1market, false);
        }
        if ($(event.target).val()=="position-2") {
          if (id == prop1assignment) {
            $('#prop-1-image').css({"background-image":"none"});
            $('#prop-1-price').empty();
            prop1assignment = 0;
          } else if (id == prop2assignment) {
            $('#prop-2-image').css({"background-image":"none"});
            $('#prop-2-price').empty();
            prop2assignment = 0;
          } else if (id == prop3assignment) {
            $('#prop-3-image').css({"background-image":"none"});
            $('#prop-3-price').empty();
            prop3assignment = 0;
          }
          prop2assignment = id;
          document.removeEventListener("change", position1image, false);
          document.removeEventListener("input", position1market, false);
          document.removeEventListener("change", position2image, false);
          document.removeEventListener("input", position2market, false);
          document.removeEventListener("change", position3image, false);
          document.removeEventListener("input", position3market, false);
          $('#prop-2-image').css({"background-image":"none"});
          $('#prop-2-price').empty();
          if ($('#prop-'+id+'-icon').val()!==null){
            var url = "url(../image/editor/products/" + $('#prop-'+id+'-icon').val() + ".png)";
            $('#prop-2-image').css({"background-image":url});
          }
          if ($('#prop-'+id+'-market').val()!=="") {
            var tmp = '<span>$'+$('#prop-'+id+'-market').val()+'</span>';
            $('#prop-2-price').empty().append(tmp);
            $('#prop-2-price').adaptText({
              minFontSize: 10,
              maxFontSize: 13,
              tollerance: 2
            });
          }
          document.addEventListener("change", position2image, false);
          document.addEventListener("input", position2market, false);
        }
        if ($(event.target).val()=="position-3") {
          if (id == prop1assignment) {
            $('#prop-1-image').css({"background-image":"none"});
            $('#prop-1-price').empty();
            prop1assignment = 0;
          } else if (id == prop2assignment) {
            $('#prop-2-image').css({"background-image":"none"});
            $('#prop-2-price').empty();
            prop2assignment = 0;
          } else if (id == prop3assignment) {
            $('#prop-3-image').css({"background-image":"none"});
            $('#prop-3-price').empty();
            prop3assignment = 0;
          }
          prop3assignment = id;
          document.removeEventListener("change", position1image, false);
          document.removeEventListener("input", position1market, false);
          document.removeEventListener("change", position2image, false);
          document.removeEventListener("input", position2market, false);
          document.removeEventListener("change", position3image, false);
          document.removeEventListener("input", position3market, false);
          $('#prop-3-image').css({"background-image":"none"});
          $('#prop-3-price').empty();
          if ($('#prop-'+id+'-icon').val()!==null){
            var url = "url(../image/editor/products/" + $('#prop-'+id+'-icon').val() + ".png)";
            $('#prop-3-image').css({"background-image":url});
          }
          if ($('#prop-'+id+'-market').val()!=="") {
            var tmp = '<span>$'+$('#prop-'+id+'-market').val()+'</span>';
            $('#prop-3-price').empty().append(tmp);
            $('#prop-3-price').adaptText({
              minFontSize: 10,
              maxFontSize: 13,
              tollerance: 2
            });
          }
          document.addEventListener("change", position3image, false);
          document.addEventListener("input", position3market, false);
        }
      });
    });
  </script>
  <div class="medium-10 medium-offset-2">
    <h2 class="wrainbo-cms-title">Element Editor</h2>
  </div>
  <div class="medium-10 medium-offset-2 propertyListing">
    <div class="propertyButton propertyButtonClosed" id="propertyCharacters">
      <span>Characters</span>
      <div class="propertyDetails propertyDetailsClosed">
        <div class="propertyIconListing">
          <div class="propertyIcon">
            <div class="propertyIconLabel">Hero</div>
            <div class="propertyIconImage" id="iconHero"></div>
          </div>
          <div class="propertyIcon">
            <div class="propertyIconLabel">Competitor</div>
            <div class="propertyIconImage" id="iconCompetitor"></div>
          </div>
        </div>
        <div class="propertyInformation" id="charactersHero">
          <h5>Hero</h5>
          <div class="propertyInformationInputs">
            <label>Hero Name: <input type="text" placeholder="Name" /></label>
            <label>Hero Description: <input type="text" placeholder="Description" /></label>
            <label>Hero Icon:
              <select id="hero-icon">
                <option value="mage">Mage</option>
                <option value="goblin">Goblin</option>
                <option value="wizard">Wizard</option>
                <option value="builder">Builder</option>
              </select>
            </label>
          </div>
        </div>
        <div class="propertyInformation" id="charactersCompetitor">
          <h5>Competitor</h5>
          <div class="propertyInformationInputs">
            <label>Competitor Name: <input type="text" placeholder="Name" /></label>
            <label>Competitor Description: <input type="text" placeholder="Description" /></label>
            <label>Competitor Icon:
              <select id="competitor-icon">
                <option value="robot-gray">Gray Robot</option>
                <option value="robot-blue">Blue Robot</option>
                <option value="robot-red">Red Robot</option>
                <option value="robot-white">White Robot</option>
                <option value="ninja">Ninja</option>
              </select>
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="propertyButton propertyButtonClosed" id="propertyProps">
      <span>Props</span>
      <div class="propertyDetails propertyDetailsClosed">
        <div class="propertyIconListing">
          <div class="propertyIcon">
            <div class="propertyIconLabel">Prop 1</div>
            <div class="propertyIconImage" id="iconProp1"></div>
          </div>
          <div class="propertyIcon">
            <div class="propertyIconLabel">Prop 2</div>
            <div class="propertyIconImage" id="iconProp2"></div>
          </div>
          <div class="propertyIcon">
            <div class="propertyIconLabel">Prop 3</div>
            <div class="propertyIconImage" id="iconProp3"></div>
          </div>
        </div>
        <div class="propertyInformation" id="props1">
          <h5>Prop 1</h5>
          <div class="propertyInformationInputs">
            <div id="prop-1-original">
              <label>Prop Name: <input type="text" placeholder="Name" id="prop-1-name" /></label>
              <label>Prop Description: <input type="text" placeholder="Description" id="prop-1-description" /></label>
              <label>Prop Icon:
                <select id="prop-1-icon">
                  <option selected disabled></option>
                  <option value="bag-blue">Blue Bag</option>
                  <option value="bag-brown">Brown Bag</option>
                  <option value="bag-red">Red Bag</option>
                  <option value="cloak-blue">Blue Cloak</option>
                  <option value="cloak-brown">Brown Cloak</option>
                  <option value="cloak-red">Red Cloak</option>
                  <option value="hat-blue">Blue Hat</option>
                  <option value="hat-brown">Brown Hat</option>
                  <option value="hat-red">Red Hat</option>
                  <option value="ring-blue">Blue Ring</option>
                  <option value="ring-brown">Brown Ring</option>
                  <option value="ring-red">Red Ring</option>
                  <option value="shoes-blue">Blue Shoes</option>
                  <option value="shoes-brown">Brown Shoes</option>
                  <option value="shoes-red">Red Shoes</option>
                  <option value="watch-blue">Blue Watch</option>
                  <option value="watch-brown">Brown Watch</option>
                  <option value="watch-red">Red Watch</option>
                </select>
              </label>
              <a class="secondary button" id="prop-1-config">Configure pricing information</a>
            </div>
            <div id="prop-1-flipped">
              <label>Market Price: <input type="number" placeholder="Market Price" id="prop-1-market" /></label>
              <label>Material Cost: <input type="number" placeholder="Material Cost" id="prop-1-material" /></label>
              <label>Inventory Cost: <input type="number" placeholder="Inventory Cost" id="prop-1-inventory" /></label>
              <label>Defect Rate: <input type="number" placeholder="Defect Rate" id="prop-1-defect" /></label>
              <label>Price Elasticity: <input type="number" placeholder="Price Elasticity" id="prop-1-elasticity" /></label>
              <a class="secondary button" id="prop-1-info">Configure basic information</a>
            </div>
          </div>
        </div>
        <div class="propertyInformation" id="props2">
          <h5>Prop 2</h5>
          <div class="propertyInformationInputs">
            <div id="prop-2-original">
              <label>Prop Name: <input type="text" placeholder="Name" id="prop-2-name" /></label>
              <label>Prop Description: <input type="text" placeholder="Description" id="prop-2-description" /></label>
              <label>Prop Icon:
                <select id="prop-2-icon">
                  <option selected disabled></option>
                  <option value="bag-blue">Blue Bag</option>
                  <option value="bag-brown">Brown Bag</option>
                  <option value="bag-red">Red Bag</option>
                  <option value="cloak-blue">Blue Cloak</option>
                  <option value="cloak-brown">Brown Cloak</option>
                  <option value="cloak-red">Red Cloak</option>
                  <option value="hat-blue">Blue Hat</option>
                  <option value="hat-brown">Brown Hat</option>
                  <option value="hat-red">Red Hat</option>
                  <option value="ring-blue">Blue Ring</option>
                  <option value="ring-brown">Brown Ring</option>
                  <option value="ring-red">Red Ring</option>
                  <option value="shoes-blue">Blue Shoes</option>
                  <option value="shoes-brown">Brown Shoes</option>
                  <option value="shoes-red">Red Shoes</option>
                  <option value="watch-blue">Blue Watch</option>
                  <option value="watch-brown">Brown Watch</option>
                  <option value="watch-red">Red Watch</option>
                </select>
              </label>
              <a class="secondary button" id="prop-2-config">Configure pricing information</a>
            </div>
            <div id="prop-2-flipped">
              <label>Market Price: <input type="number" placeholder="Market Price" id="prop-2-market" /></label>
              <label>Material Cost: <input type="number" placeholder="Material Cost" id="prop-2-material" /></label>
              <label>Inventory Cost: <input type="number" placeholder="Inventory Cost" id="prop-2-inventory" /></label>
              <label>Defect Rate: <input type="number" placeholder="Defect Rate" id="prop-2-defect" /></label>
              <label>Price Elasticity: <input type="number" placeholder="Price Elasticity" id="prop-2-elasticity" /></label>
              <a class="secondary button" id="prop-2-info">Configure basic information</a>
            </div>
          </div>
        </div>
        <div class="propertyInformation" id="props3">
          <h5>Prop 3</h5>
          <div class="propertyInformationInputs">
            <div id="prop-3-original">
              <label>Prop Name: <input type="text" placeholder="Name" id="prop-3-name" /></label>
              <label>Prop Description: <input type="text" placeholder="Description" id="prop-3-description" /></label>
              <label>Prop Icon:
                <select id="prop-3-icon">
                  <option selected disabled></option>
                  <option value="bag-blue">Blue Bag</option>
                  <option value="bag-brown">Brown Bag</option>
                  <option value="bag-red">Red Bag</option>
                  <option value="cloak-blue">Blue Cloak</option>
                  <option value="cloak-brown">Brown Cloak</option>
                  <option value="cloak-red">Red Cloak</option>
                  <option value="hat-blue">Blue Hat</option>
                  <option value="hat-brown">Brown Hat</option>
                  <option value="hat-red">Red Hat</option>
                  <option value="ring-blue">Blue Ring</option>
                  <option value="ring-brown">Brown Ring</option>
                  <option value="ring-red">Red Ring</option>
                  <option value="shoes-blue">Blue Shoes</option>
                  <option value="shoes-brown">Brown Shoes</option>
                  <option value="shoes-red">Red Shoes</option>
                  <option value="watch-blue">Blue Watch</option>
                  <option value="watch-brown">Brown Watch</option>
                  <option value="watch-red">Red Watch</option>
                </select>
              </label>
              <a class="secondary button" id="prop-3-config">Configure pricing information</a>
            </div>
            <div id="prop-3-flipped">
              <label>Market Price: <input type="number" placeholder="Market Price" id="prop-3-market" /></label>
              <label>Material Cost: <input type="number" placeholder="Material Cost" id="prop-3-material" /></label>
              <label>Inventory Cost: <input type="number" placeholder="Inventory Cost" id="prop-3-inventory" /></label>
              <label>Defect Rate: <input type="number" placeholder="Defect Rate" id="prop-3-defect" /></label>
              <label>Price Elasticity: <input type="number" placeholder="Price Elasticity" id="prop-3-elasticity" /></label>
              <a class="secondary button" id="prop-3-info">Configure basic information</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="propertyButton propertyButtonClosed" id="propertyCustomers">
      <span>Customers</span>
      <div class="propertyDetails propertyDetailsLeft propertyDetailsClosed">
        <div class="propertyIconListing">
          <div class="propertyIcon">
            <div class="propertyIconLabel">Customer 1</div>
            <div class="propertyIconImage" id="iconCustomer1"></div>
          </div>
          <div class="propertyIcon">
            <div class="propertyIconLabel">Customer 2</div>
            <div class="propertyIconImage" id="iconCustomer2"></div>
          </div>
          <div class="propertyIcon">
            <div class="propertyIconLabel">Customer 3</div>
            <div class="propertyIconImage" id="iconCustomer3"></div>
          </div>
        </div>
        <div class="propertyInformation" id="customer-1">
          <h5>Customer 1</h5>
          <div class="propertyInformationInputs">
            <div id="customer-1-original">
              <label>Customer Name: <input type="text" placeholder="Customer Name" id="customer-1-name" /></label>
              <label>Customer Image:
                <select id="customer-1-image">
                  <option selected disabled></option>
                  <option value="knight">Knight</option>
                  <option value="paladin">Paladin</option>
                  <option value="goblin-old">Old Goblin</option>
                  <option value="goblin-young">Young Goblin</option>
                  <option value="orc-family">Orc Family</option>
                  <option value="orc">Orc</option>
                </select>
              </label>
              <a class="secondary button" id="customer-1-config">Configure attributes information</a>
            </div>
            <div id="customer-1-flipped">
              <input type="text" id="customer-1-label1" placeholder="Attribute 1" /><input type="text" placeholder="Attribute 1 Value" id="customer-1-reached" />
              <input type="text" id="customer-1-label2" placeholder="Attribute 2" /><input type="text" placeholder="Attribute 2 Value" id="customer-1-visiting" />
              <input type="text" id="customer-1-label3" placeholder="Attribute 3" /><input type="text" placeholder="Attribute 3 Value" id="customer-1-awareness" />
              <input type="text" id="customer-1-label4" placeholder="Attribute 4" /><input type="text" placeholder="Attribute 4 Value" id="customer-1-payment" />
              <input type="text" id="customer-1-label5" placeholder="Attribute 5" /><input type="text" placeholder="Attribute 5 Value" id="customer-1-elasticity" />
              <a class="secondary button" id="customer-1-info">Configure basic information</a>
            </div>
          </div>
        </div>
        <div class="propertyInformation" id="customer-2">
          <h5>Customer 2</h5>
          <div class="propertyInformationInputs">
            <div id="customer-2-original">
              <label>Customer Name: <input type="text" placeholder="Customer Name" id="customer-2-name" /></label>
              <label>Customer Image:
                <select id="customer-2-image">
                  <option selected disabled></option>
                  <option value="knight">Knight</option>
                  <option value="paladin">Paladin</option>
                  <option value="goblin-old">Old Goblin</option>
                  <option value="goblin-young">Young Goblin</option>
                  <option value="orc-family">Orc Family</option>
                  <option value="orc">Orc</option>
                </select>
              </label>
              <a class="secondary button" id="customer-2-config">Configure attributes information</a>
            </div>
            <div id="customer-2-flipped">
              <input type="text" id="customer-2-label1" placeholder="Attribute 1" /><input type="text" placeholder="Attribute 1 Value" id="customer-2-reached" />
              <input type="text" id="customer-2-label2" placeholder="Attribute 2" /><input type="text" placeholder="Attribute 2 Value" id="customer-2-visiting" />
              <input type="text" id="customer-2-label3" placeholder="Attribute 3" /><input type="text" placeholder="Attribute 3 Value" id="customer-2-awareness" />
              <input type="text" id="customer-2-label4" placeholder="Attribute 4" /><input type="text" placeholder="Attribute 4 Value" id="customer-2-payment" />
              <input type="text" id="customer-2-label5" placeholder="Attribute 5" /><input type="text" placeholder="Attribute 5 Value" id="customer-2-elasticity" />
              <a class="secondary button" id="customer-2-info">Configure basic information</a>
            </div>
          </div>
        </div>
        <div class="propertyInformation" id="customer-3">
          <h5>Customer 3</h5>
          <div class="propertyInformationInputs">
            <div id="customer-3-original">
              <label>Customer Name: <input type="text" placeholder="Customer Name" id="customer-3-name" /></label>
              <label>Customer Image:
                <select id="customer-3-image">
                  <option selected disabled></option>
                  <option value="knight">Knight</option>
                  <option value="paladin">Paladin</option>
                  <option value="goblin-old">Old Goblin</option>
                  <option value="goblin-young">Young Goblin</option>
                  <option value="orc-family">Orc Family</option>
                  <option value="orc">Orc</option>
                </select>
              </label>
              <a class="secondary button" id="customer-3-config">Configure attributes information</a>
            </div>
            <div id="customer-3-flipped">
              <input type="text" id="customer-3-label1" placeholder="Attribute 1" /><input type="text" placeholder="Attribute 1 Value" id="customer-3-reached" />
              <input type="text" id="customer-3-label2" placeholder="Attribute 2" /><input type="text" placeholder="Attribute 2 Value" id="customer-3-visiting" />
              <input type="text" id="customer-3-label3" placeholder="Attribute 3" /><input type="text" placeholder="Attribute 3 Value" id="customer-3-awareness" />
              <input type="text" id="customer-3-label4" placeholder="Attribute 4" /><input type="text" placeholder="Attribute 4 Value" id="customer-3-payment" />
              <input type="text" id="customer-3-label5" placeholder="Attribute 5" /><input type="text" placeholder="Attribute 5 Value" id="customer-3-elasticity" />
              <a class="secondary button" id="customer-3-info">Configure basic information</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="propertyButton propertyButtonClosed" id="propertySpells">
      <span>Spells</span>
      <div class="propertyDetails propertyDetailsLeft propertyDetailsClosed">
        <div class="propertyIconListing">
          <div class="propertyIcon">
            <div class="propertyIconLabel">Spell 1</div>
            <div class="propertyIconImage" id="iconSpell1"></div>
          </div>
          <div class="propertyIcon">
            <div class="propertyIconLabel">Spell 2</div>
            <div class="propertyIconImage" id="iconSpell2"></div>
          </div>
          <div class="propertyIcon">
            <div class="propertyIconLabel">Spell 3</div>
            <div class="propertyIconImage" id="iconSpell3"></div>
          </div>
        </div>
        <form id="send-spell" action="sendSpell" method="POST" name="send-spell">
        <div class="propertyInformation" id="spells1">
          <h5>Spell 1</h5>
          <div class="propertyInformationInputs">
            <label>Spell Name: <input type="text" placeholder="Name" name="spell-name" /></label>
            <label>Spell Description: <input type="text" placeholder="Description" name="spell-description" /></label>
            <label>Spell Icon:
              <select id="tactic-1-icon"  name="spell-icon">
                <option value="loan">Loan</option>
                <option value="megaphone">Megaphone</option>
                <option value="insurance">Insurance</option>
                <option value="group">Group</option>
                <option value="cycle">Cycle</option>
                <option value="money-tree">Money Tree</option>
                <option value="research">Research</option>
                <option value="spell-blue">Blue Spell</option>
                <option value="spell-red">Red Spell</option>
                <option value="star">Star</option>
                <option value="supply">Supply</option>
              </select>
            </label>
            <label>
              <button type="submit" class="button" id="send-spell-button" form="send-spell">Click to configure spell actions</button>
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            </label>
          </div>
        </div>
        </form>
        <div class="propertyInformation" id="spells2">
          <h5>Spell 2</h5>
          <div class="propertyInformationInputs">
            <label>Spell Name: <input type="text" placeholder="Name" name="spell-name" /></label>
            <label>Spell Description: <input type="text" placeholder="Description" name="spell-description" /></label>
            <label>Spell Icon:
              <select id="tactic-2-icon"  name="spell-icon">
                <option value="loan">Loan</option>
                <option value="megaphone">Megaphone</option>
                <option value="insurance">Insurance</option>
                <option value="group">Group</option>
                <option value="cycle">Cycle</option>
                <option value="money-tree">Money Tree</option>
                <option value="research">Research</option>
                <option value="spell-blue">Blue Spell</option>
                <option value="spell-red">Red Spell</option>
                <option value="star">Star</option>
                <option value="supply">Supply</option>
              </select>
            </label>
          </div>
        </div>
        <div class="propertyInformation" id="spells3">
          <h5>Spell 3</h5>
          <div class="propertyInformationInputs">
            <label>Spell Name: <input type="text" placeholder="Name" name="spell-name" /></label>
            <label>Spell Description: <input type="text" placeholder="Description" name="spell-description" /></label>
            <label>Spell Icon:
              <select id="tactic-3-icon"  name="spell-icon">
                <option value="loan">Loan</option>
                <option value="megaphone">Megaphone</option>
                <option value="insurance">Insurance</option>
                <option value="group">Group</option>
                <option value="cycle">Cycle</option>
                <option value="money-tree">Money Tree</option>
                <option value="research">Research</option>
                <option value="spell-blue">Blue Spell</option>
                <option value="spell-red">Red Spell</option>
                <option value="star">Star</option>
                <option value="supply">Supply</option>
              </select>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="medium-9 medium-centered left-margin columns" id="phone-container">
    <div class="phoneArea">
      <div class="view">
        <div class="phoneBackground"></div>
        <div class="background" id="background-area"><img src="../image/editor/fantasy/background.jpg" class="selection-background-image"></div>
        <div class="topbar" id="topbar-area"><img src="../image/editor/fantasy/topbar.png" class="selection-topbar-image"></div>
        <div class="topbar" id="topbar-elements">
          <div class="topbar-money"></div>
          <div class="topbar-money-text">5000</div>
          <div class="topbar-spell"></div>
          <div class="topbar-spell-text">5</div>
          <div class="topbar-supply"></div>
          <div class="topbar-supply-text">200</div>
        </div>
        <div class="toolbar" id="toolbar-area"><img src="../image/editor/fantasy/main_hud.png" class="selection-toolbar-image"></div>
        <div class="toolbar" id="toolbar-elements">
          <div class="prop-1">
            <div class="prop-icon prop-1-icon" id="prop-1-image"></div>
            <div class="prop-price prop-1-price" id="prop-1-price">
            </div>
            <div class="prop-amount prop-1-amount" id="prop-1-amount">
            </div>
          </div>
          <div class="prop-2">
            <div class="prop-icon prop-2-icon" id="prop-2-image"></div>
            <div class="prop-price prop-2-price" id="prop-2-price">
            </div>
            <div class="prop-amount prop-2-amount" id="prop-2-amount">
            </div>
          </div>
          <div class="prop-3">
            <div class="prop-icon prop-3-icon" id="prop-3-image"></div>
            <div class="prop-price prop-3-price" id="prop-3-price">
            </div>
            <div class="prop-amount prop-3-amount" id="prop-3-amount">
            </div>
          </div>
          <div class="tactic-1">
            <div class="tactic-icon tactic-1-icon"></div>
            <div class="tactic-price tactic-1-price"></div>
          </div>
          <div class="tactic-2">
            <div class="tactic-icon tactic-2-icon"></div>
            <div class="tactic-price tactic-2-price"></div>
          </div>
          <div class="tactic-3">
            <div class="tactic-icon tactic-3-icon"></div>
            <div class="tactic-price tactic-3-price"></div>
          </div>
        </div>
        <div class="products" id="products-area"></div>
        <div class="tactics" id="tactics-area"></div>
        <div class="competitor" id="competitor-area"><img src="../image/editor/modern/competitor.png" class="selection-competitor-image"></div>
        <div class="hero" id="hero-area"><img src="../image/editor/heroes/mage.png" class="selection-hero-image"></div>
        <div class="problem1" id="problem1-area"></div>
        <div class="problem2" id="problem2-area"></div>
        <div class="problem3" id="problem3-area"></div>
        <div class="tool" id="tool-area"><img src="../image/editor/fantasy/tool.png" class="selection-tool-image"></div>
        <div class="screen-overlay"></div>
        <div class="screen-product" id="screen-product">
          <div id="product-image"></div>
          <div id="product-name"></div>
          <div class="product-information">
            <div id="market-price">
            </div>
            <div id="material-cost">
            </div>
            <div id="inventory-cost">
            </div>
            <div id="defect-rate">
            </div>
            <div id="price-elasticity">
            </div>
            <div id="product-description">
            </div>
          </div>
        </div>
        <div class="screen-customer" id="screen-customer">
          <div id="customer-image"></div>
          <div class="customer-information">
            <div id="customer-reached"><div id="customer-reached-1"></div><div id="customer-reached-2"></div>
            </div>
            <div id="customer-visiting"><div id="customer-visiting-1"></div><div id="customer-visiting-2"></div>
            </div>
            <div id="customer-awareness"><div id="customer-awareness-1"></div><div id="customer-awareness-2"></div>
            </div>
            <div id="customer-payment"><div id="customer-payment-1"></div><div id="customer-payment-2"></div>
            </div>
            <div id="customer-elasticity"><div id="customer-elasticity-1"></div><div id="customer-elasticity-2"></div>
            </div>
          </div>
        </div>
      </div>
      <img src="../image/editor/iphone.png" class="phoneImage">
    </div>
  </div>
</div>

</form>

@stop
