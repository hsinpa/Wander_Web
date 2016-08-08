
export function SwapDomElement(element) {
  //var ul = $('.learningDetailPanel-2 .row');
  element.children().each(function(i,li){element.prepend(li)});
}

export function SetToScreenHeight(element) {
  element.css("min-height", window.screen.availHeight- 100);
}
