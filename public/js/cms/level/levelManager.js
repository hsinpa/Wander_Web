$(document).ready(function(){

  var selectedUnlock = [];
  Init();
  function Init() {
    console.log($( document ).height());

    //Unlock item that is alread been selected;
    for (var rIndex in rawLevelData) {
      // var uJson = $.parseJSON(rawLevelData[rIndex]["unlock"]);
      // for (var uIndex in uJson) {
      //   selectedUnlock.push(uJson[uIndex]);
      // }
    }
  }

  //Global Varaible
  //SelectUnlockTracker
  $( document ).on('change', '.level-unlockGroup select[name="unlock[]"]', function(e) {
    var selectValue = $(this).find("option:selected");
    for (var i =0 ; i< selectValue.length; i++) {
      if (_.contains(selectedUnlock, selectValue[i].value)) {

      }
      //selectedUnlock.push(uJson[uIndex]);
    }
  });

  function TrackUnlock() {

  }

  //  ========================= Event Management =========================
  //Add Event
  $( document ).on('click', '.templateAdd', function(e) {
    e.preventDefault();
    var _self = $(this).parent(), target = $(this).attr("target");
    $.get( "level."+target, function( data ) {
      _self.siblings("."+target+"Group").append(data);
    });
  });

  //Delete Event
  $( document ).on('click', '.templateDelete', function(e) {
    e.preventDefault();
    $(this).parent().remove();
  });

  //Track round
  $( document ).on('change', '.level-numGroup-round', function(e) {
    var round = $(this).val(),
        _self = $(this);

    $.get( "level.event", function( data ) {
      _self.siblings(".eventGroup").html("");
      for (var i = 0; i < round; i++) {
        _self.siblings(".eventGroup").append(data);
      }
    });

  });


  //Add new level page
  $("#wrainbo-switch-tabs img").click(function(e) {
    var parent = $("#wrainbo-switch-tabs"),
        length = $("#wrainbo-switch-tabs li").length,
        insertLi = "<li class='tabs-title'>"+
                    "<a href='#panel"+(length-1)+"' data-index='"+(length-1)+"'>Level"+length+"</a></li>";

    $.get( "level.template", function( data ) {
      $(insertLi).insertBefore("#wrainbo-switch-tabs img");
      var template = "<div class='tabs-panel' id='panel"+(length-1)+"'>";
          template += data +"</div>";
          $(".tabs-content").append(template);
          //Use the target "ul" to initialize the "Tabs" object.
          var elem = new Foundation.Tabs($(".tabs-content"), {
              "linkClass": "tabs-title"
          });
    });
  });
  //Load
  $( "#wrainbo-switch-tabs" ).on('click', '.tabs-title a', function(e) {
    var _self = $(this);
    console.log($( document ).height());

    $( ".tabs-panel" ).each(function( index ) {
      if (_self.attr("data-index") == index) {
        $(this).addClass("is-active");
      } else {
        $(this).removeClass("is-active");
      }
    });

      if ( rawLevelData[$(this).attr("data-index")] === undefined ) return;
      var panelData = rawLevelData[$(this).attr("data-index")],
          _parent = $("#panel"+$(this).attr("data-index"));
      //competitor
      _parent.find("select[name='competitor'] option[value='"+panelData["competitor"]+"']")[0].selected = 'selected';
      //map
      _parent.find("select[name='map'] option[value='"+panelData["map"]+"']")[0].selected = 'selected';

      //villager
      var villager =  panelData["villagers"].split("&");
      for (var p in villager) {
        _parent.find("select[name='villager[]'] option[value='"+villager[p]+"']")[0].selected = 'selected';
      }

      //Event
      var eventArray = panelData["event"].split("&");
      for (var eIndex in eventArray) {
        var eSelect = $(_parent.find("select[name='event[]']")[eIndex]);
            eSelect.find("option[value='"+eventArray[eIndex]+"']")[0].selected = 'selected';
      }

      //Preset(Optional)
      if (panelData["preset"] != "") {
        var presetJson = panelData["preset"].split("&");
        for (var pIndex in presetJson) {
          var sPresetJson = presetJson[pIndex].split(",");
          console.log(sPresetJson);
          var pSelect = $(_parent.find("select[name='preset[]']")[pIndex]),
              pInput = $(_parent.find("input[name='presetNum[]']")[pIndex]);
              pSelect.find("option[value='"+sPresetJson[0]+"']")[0].selected = 'selected';
              pInput.val(sPresetJson[1]);
        }
      }


      //unlock
      var unlock = panelData["unlock"].split("&");
      for (var u in unlock) {
        _parent.find("select[name='unlock[]'] option[value='"+unlock[u]+"']")[0].selected = 'selected';
      }
  });

  //Save
  $( document ).on('submit', '#wrainbo-cms-level form', function(e) {
    e.preventDefault();
    var checkData = $(this).serializeArray(),
        _self = $(this),
        _submitButton = $(this).find("input[type='submit']"),
        formData = new FormData( this );

    for (var i in checkData) {
      if (checkData[i].value == "") {
        alert(checkData[i].name + " field is empty");
        return;
      }
    }
    _submitButton.addClass("disabled");
    _submitButton[0].disabled = true;

    $.ajax({
      url: "saveLevel",
      type: "POST",
      data: formData,
      processData: false,  // 告诉jQuery不要去处理发送的数据
      contentType: false   // 告诉jQuery不要去设置Content-Type请求头
    }).done(function( data ) {
      console.log(data);
      alert("Save Success");
      _self.find("input[name='level_id']").val(data);

      _submitButton.removeClass("disabled");
      _submitButton[0].disabled = false;
    });
  });

  //Delete
  $( document ).on('click', '.level_delete', function(e) {
    e.preventDefault();
    var formData = new FormData( $(this).parent()[0] );
    $(e).addClass("disabled");
    $(e)[0].disabled = true;

    $.ajax({
      url: "deleteLevel",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false
    }).done(function( data ) {
      console.log(data);
      location.reload();
    });
  });

});
