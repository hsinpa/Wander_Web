var utilityModule = {
  SwapDomElement : function(element) {
    element.children().each(function(i,li){element.prepend(li)});
  },
  SetToScreenHeight : function(element) {
    element.css("min-height", window.screen.availHeight- 100);
  },
  SetToHalfScreenHeight : function(element) {
    element.css("min-height", (window.screen.availHeight-100) / 2);
  }
};
