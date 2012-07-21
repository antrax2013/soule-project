(function ($) { $.fn.asmSelect = function (o) { var p = { listType: 'ol', sortable: false, highlight: false, animate: false, addItemTarget: 'bottom', hideWhenAdded: false, debugMode: false, removeLabel: 'Suppr', highlightAddedLabel: 'Ajouter: ', highlightRemovedLabel: 'Supprimer: ', containerClass: 'asmContainer', selectClass: 'asmSelect', optionDisabledClass: 'asmOptionDisabled', listClass: 'asmList', listSortableClass: 'asmListSortable', listItemClass: 'asmListItem', listItemLabelClass: 'asmListItemLabel', removeClass: 'asmListItemRemove', highlightClass: 'asmHighlight' }; $.extend(p, o); return this.each(function (f) { var g = $(this); var h; var i; var j; var k = false; var l = false; var m = false; function init() { while ($("#" + p.containerClass + f).size() > 0) f++; i = $("<select></select>").addClass(p.selectClass).attr('name', p.selectClass + f).attr('id', p.selectClass + f); $selectRemoved = $("<select></select>"); j = $("<" + p.listType + "></" + p.listType + ">").addClass(p.listClass).attr('id', p.listClass + f); h = $("<div></div>").addClass(p.containerClass).attr('id', p.containerClass + f); buildSelect(); i.change(selectChangeEvent).click(selectClickEvent); g.change(originalChangeEvent).wrap(h).before(i).before(j); if (p.sortable) makeSortable(); if ($.browser.msie && $.browser.version < 8) j.css('display', 'inline-block'); $(document).ready(function () { if (i.outerHeight() !== 22) i.offsetParent().offsetParent().offsetParent().css('background-position', 0 + 'px ' + (i.outerHeight() - 22) + 'px') }) } function makeSortable() { j.sortable({ items: 'li.' + p.listItemClass, handle: '.' + p.listItemLabelClass, axis: 'y', update: function (e, a) { var b; $(this).children("li").each(function (n) { $option = $('#' + $(this).attr('rel')); if ($(this).is(".ui-sortable-helper")) { b = $option.attr('id'); return } g.append($option) }); if (b) triggerOriginalChange(b, 'sort') } }).addClass(p.listSortableClass) } function selectChangeEvent(e) { if ($.browser.msie && $.browser.version < 7 && !l) return; var a = $(this).children("option:selected").slice(0, 1).attr('rel'); addListItem(a); l = false; triggerOriginalChange(a, 'add') } function selectClickEvent() { l = true } function originalChangeEvent(e) { if (m) { m = false; return } i.empty(); j.empty(); buildSelect(); if ($.browser.opera) j.hide().fadeIn("fast") } function buildSelect() { k = true; var c = ((typeof g.prop != 'undefined') ? g.prop('title') : g.attr('title')); i.prepend("<option>" + c + "</option>"); g.children("option").each(function (n) { var a = $(this); var b; if (!a.attr('id')) a.attr('id', 'asm' + f + 'option' + n); b = a.attr('id'); if (a.is(":selected")) { addListItem(b); addSelectOption(b, true) } else { addSelectOption(b) } }); if (!p.debugMode) g.hide(); selectFirstItem(); k = false } function addSelectOption(a, b) { if (b == undefined) var b = false; var c = $('#' + a); var d = $("<option>" + c.text() + "</option>").val(c.val()).attr('rel', a); if (b) disableSelectOption(d); i.append(d) } function selectFirstItem() { i.children(":eq(0)").attr("selected", true) } function disableSelectOption(a) { a.addClass(p.optionDisabledClass).attr("selected", false).attr("disabled", true); if (p.hideWhenAdded) a.hide(); if ($.browser.msie) i.hide().show() } function enableSelectOption(a) { a.removeClass(p.optionDisabledClass).attr("disabled", false); if (p.hideWhenAdded) a.show(); if ($.browser.msie) i.hide().show() } function addListItem(a) { var b = $('#' + a); if (!b) return; var c = $("<a></a>").attr("href", "#").addClass(p.removeClass).prepend(p.removeLabel).click(function () { dropListItem($(this).parent('li').attr('rel')); return false }); var d = $("<span></span>").addClass(p.listItemLabelClass).html(b.html()); var e = $("<li></li>").attr('rel', a).addClass(p.listItemClass).append(d).append(c).hide(); if (!k) { if (b.is(":selected")) return; b.attr('selected', true) } if (p.addItemTarget == 'top' && !k) { j.prepend(e); if (p.sortable) g.prepend(b) } else { j.append(e); if (p.sortable) g.append(b) } addListItemShow(e); disableSelectOption($("[rel=" + a + "]", i)); if (!k) { setHighlight(e, p.highlightAddedLabel); selectFirstItem(); if (p.sortable) j.sortable("refresh") } } function addListItemShow(a) { if (p.animate && !k) { a.animate({ opacity: "show", height: "show" }, 100, "swing", function () { a.animate({ height: "+=2px" }, 50, "swing", function () { a.animate({ height: "-=2px" }, 25, "swing") }) }) } else { a.show() } } function dropListItem(a, b) { if (b == undefined) var b = true; var c = $('#' + a); c.attr('selected', false); $item = j.children("li[rel=" + a + "]"); dropListItemHide($item); enableSelectOption($("[rel=" + a + "]", p.removeWhenAdded ? $selectRemoved : i)); if (b) setHighlight($item, p.highlightRemovedLabel); triggerOriginalChange(a, 'drop') } function dropListItemHide(a) { if (p.animate && !k) { $prevItem = a.prev("li"); a.animate({ opacity: "hide", height: "hide" }, 100, "linear", function () { $prevItem.animate({ height: "-=2px" }, 50, "swing", function () { $prevItem.animate({ height: "+=2px" }, 100, "swing") }); a.remove() }) } else { a.remove() } } function setHighlight(a, b) { if (!p.highlight) return; i.next("#" + p.highlightClass + f).remove(); var c = $("<span></span>").hide().addClass(p.highlightClass).attr('id', p.highlightClass + f).html(b + a.children("." + p.listItemLabelClass).slice(0, 1).text()); i.after(c); c.fadeIn("fast", function () { setTimeout(function () { c.fadeOut("slow") }, 50) }) } function triggerOriginalChange(a, b) { m = true; $option = $("#" + a); g.trigger('change', [{ 'option': $option, 'value': $option.val(), 'id': a, 'item': j.children("[rel=" + a + "]"), 'type': b}]) } init() }) } })(jQuery);