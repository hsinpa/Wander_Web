declare var $:any; // Magic

class DataLoader {
    constructor() {

    }

    loadLightGallery() {
        $("#video").lightGallery({
            selector:'.video'
          });
        $('#iframe').lightGallery({
           html:true,
           thumbnail:false,
           selector:'.iframe',
           videoMaxWidth:'100%'
       });
    }

    loadHomePage () {
      (function(self : any) {
      $.getJSON( "HsiN/data.json", function( data : any ) {
        for (var i in data.sketchfab) {
            var html = '<li data-iframe="true" data-src="' + data.sketchfab[i].url + '">\
                        <img class="iframe" src="' + data.sketchfab[i].image + '" />\
                        <h5>' + data.sketchfab[i].name + '</h5>\
                      </li>';
            $("#iframe").append(html);
        }
        for (var i in data.youtube) {
            var html = '<li>\
                      <img class="video" src="' + data.youtube[i].image + '" data-src="'+data.youtube[i].url+'" />\
                      <h5>' + data.youtube[i].name + '</h5>\
                    </li>';
            $("#video").append(html);
        }
        self.loadLightGallery();
      });
      })(this);
    }
}
