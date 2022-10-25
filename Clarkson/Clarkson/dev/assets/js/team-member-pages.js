// Remove "All" from Filter Items
jQuery('.searchandfilter ul ul li:first-child label').each(function () {
  let all = jQuery(this);
  all.text(all.text().replace(/\w+[.!?]?$/, ''));
});

//Remove "Department" From Title
jQuery('h2.elementor-heading-title').each(function () {
  let dep = jQuery(this);
  dep.html(dep.html().replace(/^(\w+)/, '<span>$1</span>'));
  dep.find('span').remove();
  let newValue = dep.text().replace(':', '');
  dep.text(newValue);
});

//Bold List Item Label
jQuery('.elementor-icon-list-text').each(function () {
  let label = jQuery(this);
  let newValue = label.text().replace(':', '');
  label.text(newValue);
  label.html(label.html().replace(/^(\w+)/, '<span>$1:</span>'));
});

// Add Class "current" to First Filter Item
if (jQuery('.searchandfilter ul ul').find('.current-cat').length === 0) {
  jQuery('.searchandfilter ul ul li:first-child').addClass('current-cat');
}