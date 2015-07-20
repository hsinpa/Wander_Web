var GalleryManager = (function () {
    function GalleryManager() {
        $("#video").lightGallery();
        $('#iframe').lightGallery({
            html: true,
            thumbnail: false,
            selector: '.iframe',
            videoMaxWidth: '100%'
        });
    }
    return GalleryManager;
})();
module.exports = GalleryManager;
//# sourceMappingURL=GalleryManager.js.map