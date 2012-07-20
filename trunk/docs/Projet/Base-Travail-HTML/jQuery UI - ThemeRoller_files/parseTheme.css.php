

/*
* jQuery UI CSS Framework
* Copyright (c) 2009 AUTHORS.txt (http://jqueryui.com/about)
* Dual licensed under the MIT (MIT-LICENSE.txt) and GPL (GPL-LICENSE.txt) licenses.
* To view and modify this theme, visit http://jqueryui.com/themeroller/?ctl=themeroller&ffDefault=Segoe%20UI,%20Helvetica,%20Arial,%20sans-serif&fwDefault=bold&fsDefault=1.1em&cornerRadius=6px&bgColorHeader=9fda58&bgTextureHeader=12_gloss_wave.png&bgImgOpacityHeader=85&borderColorHeader=000000&fcHeader=222222&iconColorHeader=1f1f1f&bgColorContent=000000&bgTextureContent=12_gloss_wave.png&bgImgOpacityContent=55&borderColorContent=4a4a4a&fcContent=ffffff&iconColorContent=9fda58&bgColorDefault=0a0a0a&bgTextureDefault=02_glass.png&bgImgOpacityDefault=40&borderColorDefault=1b1613&fcDefault=b8ec79&iconColorDefault=b8ec79&bgColorHover=000000&bgTextureHover=02_glass.png&bgImgOpacityHover=60&borderColorHover=000000&fcHover=96f226&iconColorHover=b8ec79&bgColorActive=4c4c4c&bgTextureActive=01_flat.png&bgImgOpacityActive=0&borderColorActive=696969&fcActive=ffffff&iconColorActive=ffffff&bgColorHighlight=f1fbe5&bgTextureHighlight=02_glass.png&bgImgOpacityHighlight=55&borderColorHighlight=8cce3b&fcHighlight=030303&iconColorHighlight=000000&bgColorError=f6ecd5&bgTextureError=12_gloss_wave.png&bgImgOpacityError=95&borderColorError=f1ac88&fcError=74736d&iconColorError=cd0a0a&bgColorOverlay=262626&bgTextureOverlay=07_diagonals_small.png&bgImgOpacityOverlay=50&opacityOverlay=30&bgColorShadow=303030&bgTextureShadow=01_flat.png&bgImgOpacityShadow=0&opacityShadow=50&thicknessShadow=6px&offsetTopShadow=-6px&offsetLeftShadow=-6px&cornerRadiusShadow=12px
*/


/* Component containers
----------------------------------*/
.ui-widget { font-family: Segoe UI, Helvetica, Arial, sans-serif; font-size: 1.1em; }
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button { font-family: Segoe UI, Helvetica, Arial, sans-serif; font-size: 1em; }
.ui-widget-content { border: 1px solid #4a4a4a; background: #000000 url(../images/?new=000000&w=500&h=100&f=png&q=100&fltr[]=over|textures/12_gloss_wave.png|0|0|55) 50% top repeat-x; color: #ffffff; }
.ui-widget-content a { color: #ffffff; }
.ui-widget-header { border: 1px solid #000000; background: #9fda58 url(../images/?new=9fda58&w=500&h=100&f=png&q=100&fltr[]=over|textures/12_gloss_wave.png|0|0|85) 50% 50% repeat-x; color: #222222; font-weight: bold; }
.ui-widget-header a { color: #222222; }

/* Interaction states
----------------------------------*/
.ui-state-default, .ui-widget-content .ui-state-default { border: 1px solid #1b1613; background: #0a0a0a url(../images/?new=0a0a0a&w=1&h=400&f=png&q=100&fltr[]=over|textures/02_glass.png|0|0|40) 50% 50% repeat-x; font-weight: bold; color: #b8ec79; outline: none; }
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited { color: #b8ec79; text-decoration: none; outline: none; }
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus { border: 1px solid #000000; background: #000000 url(../images/?new=000000&w=1&h=400&f=png&q=100&fltr[]=over|textures/02_glass.png|0|0|60) 50% 50% repeat-x; font-weight: bold; color: #96f226; outline: none; }
.ui-state-hover a, .ui-state-hover a:hover { color: #96f226; text-decoration: none; outline: none; }
.ui-state-active, .ui-widget-content .ui-state-active { border: 1px solid #696969; background: #4c4c4c url(../images/?new=4c4c4c&w=40&h=100&f=png&q=100&fltr[]=over|textures/01_flat.png|0|0|0) 50% 50% repeat-x; font-weight: bold; color: #ffffff; outline: none; }
.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited { color: #ffffff; outline: none; text-decoration: none; }

/* Interaction Cues
----------------------------------*/
.ui-state-highlight, .ui-widget-content .ui-state-highlight {border: 1px solid #8cce3b; background: #f1fbe5 url(../images/?new=f1fbe5&w=1&h=400&f=png&q=100&fltr[]=over|textures/02_glass.png|0|0|55) 50% 50% repeat-x; color: #030303; }
.ui-state-highlight a, .ui-widget-content .ui-state-highlight a { color: #030303; }
.ui-state-error, .ui-widget-content .ui-state-error {border: 1px solid #f1ac88; background: #f6ecd5 url(../images/?new=f6ecd5&w=500&h=100&f=png&q=100&fltr[]=over|textures/12_gloss_wave.png|0|0|95) 50% top repeat-x; color: #74736d; }
.ui-state-error a, .ui-widget-content .ui-state-error a { color: #74736d; }
.ui-state-error-text, .ui-widget-content .ui-state-error-text { color: #74736d; }
.ui-state-disabled, .ui-widget-content .ui-state-disabled { opacity: .35; filter:Alpha(Opacity=35); background-image: none; }
.ui-priority-primary, .ui-widget-content .ui-priority-primary { font-weight: bold; }
.ui-priority-secondary, .ui-widget-content .ui-priority-secondary { opacity: .7; filter:Alpha(Opacity=70); font-weight: normal; }

/* Icons
----------------------------------*/

/* states and images */
.ui-icon { width: 16px; height: 16px; background-image: url(../images/?new=9fda58&w=256&h=240&f=png&fltr[]=rcd|256&fltr[]=mask|icons/icons.png); }
.ui-widget-content .ui-icon {background-image: url(../images/?new=9fda58&w=256&h=240&f=png&fltr[]=rcd|256&fltr[]=mask|icons/icons.png); }
.ui-widget-header .ui-icon {background-image: url(../images/?new=1f1f1f&w=256&h=240&f=png&fltr[]=rcd|256&fltr[]=mask|icons/icons.png); }
.ui-state-default .ui-icon { background-image: url(../images/?new=b8ec79&w=256&h=240&f=png&fltr[]=rcd|256&fltr[]=mask|icons/icons.png); }
.ui-state-hover .ui-icon, .ui-state-focus .ui-icon {background-image: url(../images/?new=b8ec79&w=256&h=240&f=png&fltr[]=rcd|256&fltr[]=mask|icons/icons.png); }
.ui-state-active .ui-icon {background-image: url(../images/?new=ffffff&w=256&h=240&f=png&fltr[]=rcd|256&fltr[]=mask|icons/icons.png); }
.ui-state-highlight .ui-icon {background-image: url(../images/?new=000000&w=256&h=240&f=png&fltr[]=rcd|256&fltr[]=mask|icons/icons.png); }
.ui-state-error .ui-icon, .ui-state-error-text .ui-icon {background-image: url(../images/?new=cd0a0a&w=256&h=240&f=png&fltr[]=rcd|256&fltr[]=mask|icons/icons.png); }

/* positioning */
.ui-icon-carat-1-n { background-position: 0 0; }
.ui-icon-carat-1-ne { background-position: -16px 0; }
.ui-icon-carat-1-e { background-position: -32px 0; }
.ui-icon-carat-1-se { background-position: -48px 0; }
.ui-icon-carat-1-s { background-position: -64px 0; }
.ui-icon-carat-1-sw { background-position: -80px 0; }
.ui-icon-carat-1-w { background-position: -96px 0; }
.ui-icon-carat-1-nw { background-position: -112px 0; }
.ui-icon-carat-2-n-s { background-position: -128px 0; }
.ui-icon-carat-2-e-w { background-position: -144px 0; }
.ui-icon-triangle-1-n { background-position: 0 -16px; }
.ui-icon-triangle-1-ne { background-position: -16px -16px; }
.ui-icon-triangle-1-e { background-position: -32px -16px; }
.ui-icon-triangle-1-se { background-position: -48px -16px; }
.ui-icon-triangle-1-s { background-position: -64px -16px; }
.ui-icon-triangle-1-sw { background-position: -80px -16px; }
.ui-icon-triangle-1-w { background-position: -96px -16px; }
.ui-icon-triangle-1-nw { background-position: -112px -16px; }
.ui-icon-triangle-2-n-s { background-position: -128px -16px; }
.ui-icon-triangle-2-e-w { background-position: -144px -16px; }
.ui-icon-arrow-1-n { background-position: 0 -32px; }
.ui-icon-arrow-1-ne { background-position: -16px -32px; }
.ui-icon-arrow-1-e { background-position: -32px -32px; }
.ui-icon-arrow-1-se { background-position: -48px -32px; }
.ui-icon-arrow-1-s { background-position: -64px -32px; }
.ui-icon-arrow-1-sw { background-position: -80px -32px; }
.ui-icon-arrow-1-w { background-position: -96px -32px; }
.ui-icon-arrow-1-nw { background-position: -112px -32px; }
.ui-icon-arrow-2-n-s { background-position: -128px -32px; }
.ui-icon-arrow-2-ne-sw { background-position: -144px -32px; }
.ui-icon-arrow-2-e-w { background-position: -160px -32px; }
.ui-icon-arrow-2-se-nw { background-position: -176px -32px; }
.ui-icon-arrowstop-1-n { background-position: -192px -32px; }
.ui-icon-arrowstop-1-e { background-position: -208px -32px; }
.ui-icon-arrowstop-1-s { background-position: -224px -32px; }
.ui-icon-arrowstop-1-w { background-position: -240px -32px; }
.ui-icon-arrowthick-1-n { background-position: 0 -48px; }
.ui-icon-arrowthick-1-ne { background-position: -16px -48px; }
.ui-icon-arrowthick-1-e { background-position: -32px -48px; }
.ui-icon-arrowthick-1-se { background-position: -48px -48px; }
.ui-icon-arrowthick-1-s { background-position: -64px -48px; }
.ui-icon-arrowthick-1-sw { background-position: -80px -48px; }
.ui-icon-arrowthick-1-w { background-position: -96px -48px; }
.ui-icon-arrowthick-1-nw { background-position: -112px -48px; }
.ui-icon-arrowthick-2-n-s { background-position: -128px -48px; }
.ui-icon-arrowthick-2-ne-sw { background-position: -144px -48px; }
.ui-icon-arrowthick-2-e-w { background-position: -160px -48px; }
.ui-icon-arrowthick-2-se-nw { background-position: -176px -48px; }
.ui-icon-arrowthickstop-1-n { background-position: -192px -48px; }
.ui-icon-arrowthickstop-1-e { background-position: -208px -48px; }
.ui-icon-arrowthickstop-1-s { background-position: -224px -48px; }
.ui-icon-arrowthickstop-1-w { background-position: -240px -48px; }
.ui-icon-arrowreturnthick-1-w { background-position: 0 -64px; }
.ui-icon-arrowreturnthick-1-n { background-position: -16px -64px; }
.ui-icon-arrowreturnthick-1-e { background-position: -32px -64px; }
.ui-icon-arrowreturnthick-1-s { background-position: -48px -64px; }
.ui-icon-arrowreturn-1-w { background-position: -64px -64px; }
.ui-icon-arrowreturn-1-n { background-position: -80px -64px; }
.ui-icon-arrowreturn-1-e { background-position: -96px -64px; }
.ui-icon-arrowreturn-1-s { background-position: -112px -64px; }
.ui-icon-arrowrefresh-1-w { background-position: -128px -64px; }
.ui-icon-arrowrefresh-1-n { background-position: -144px -64px; }
.ui-icon-arrowrefresh-1-e { background-position: -160px -64px; }
.ui-icon-arrowrefresh-1-s { background-position: -176px -64px; }
.ui-icon-arrow-4 { background-position: 0 -80px; }
.ui-icon-arrow-4-diag { background-position: -16px -80px; }
.ui-icon-extlink { background-position: -32px -80px; }
.ui-icon-newwin { background-position: -48px -80px; }
.ui-icon-refresh { background-position: -64px -80px; }
.ui-icon-shuffle { background-position: -80px -80px; }
.ui-icon-transfer-e-w { background-position: -96px -80px; }
.ui-icon-transferthick-e-w { background-position: -112px -80px; }
.ui-icon-folder-collapsed { background-position: 0 -96px; }
.ui-icon-folder-open { background-position: -16px -96px; }
.ui-icon-document { background-position: -32px -96px; }
.ui-icon-document-b { background-position: -48px -96px; }
.ui-icon-note { background-position: -64px -96px; }
.ui-icon-mail-closed { background-position: -80px -96px; }
.ui-icon-mail-open { background-position: -96px -96px; }
.ui-icon-suitcase { background-position: -112px -96px; }
.ui-icon-comment { background-position: -128px -96px; }
.ui-icon-person { background-position: -144px -96px; }
.ui-icon-print { background-position: -160px -96px; }
.ui-icon-trash { background-position: -176px -96px; }
.ui-icon-locked { background-position: -192px -96px; }
.ui-icon-unlocked { background-position: -208px -96px; }
.ui-icon-bookmark { background-position: -224px -96px; }
.ui-icon-tag { background-position: -240px -96px; }
.ui-icon-home { background-position: 0 -112px; }
.ui-icon-flag { background-position: -16px -112px; }
.ui-icon-calendar { background-position: -32px -112px; }
.ui-icon-cart { background-position: -48px -112px; }
.ui-icon-pencil { background-position: -64px -112px; }
.ui-icon-clock { background-position: -80px -112px; }
.ui-icon-disk { background-position: -96px -112px; }
.ui-icon-calculator { background-position: -112px -112px; }
.ui-icon-zoomin { background-position: -128px -112px; }
.ui-icon-zoomout { background-position: -144px -112px; }
.ui-icon-search { background-position: -160px -112px; }
.ui-icon-wrench { background-position: -176px -112px; }
.ui-icon-gear { background-position: -192px -112px; }
.ui-icon-heart { background-position: -208px -112px; }
.ui-icon-star { background-position: -224px -112px; }
.ui-icon-link { background-position: -240px -112px; }
.ui-icon-cancel { background-position: 0 -128px; }
.ui-icon-plus { background-position: -16px -128px; }
.ui-icon-plusthick { background-position: -32px -128px; }
.ui-icon-minus { background-position: -48px -128px; }
.ui-icon-minusthick { background-position: -64px -128px; }
.ui-icon-close { background-position: -80px -128px; }
.ui-icon-closethick { background-position: -96px -128px; }
.ui-icon-key { background-position: -112px -128px; }
.ui-icon-lightbulb { background-position: -128px -128px; }
.ui-icon-scissors { background-position: -144px -128px; }
.ui-icon-clipboard { background-position: -160px -128px; }
.ui-icon-copy { background-position: -176px -128px; }
.ui-icon-contact { background-position: -192px -128px; }
.ui-icon-image { background-position: -208px -128px; }
.ui-icon-video { background-position: -224px -128px; }
.ui-icon-script { background-position: -240px -128px; }
.ui-icon-alert { background-position: 0 -144px; }
.ui-icon-info { background-position: -16px -144px; }
.ui-icon-notice { background-position: -32px -144px; }
.ui-icon-help { background-position: -48px -144px; }
.ui-icon-check { background-position: -64px -144px; }
.ui-icon-bullet { background-position: -80px -144px; }
.ui-icon-radio-off { background-position: -96px -144px; }
.ui-icon-radio-on { background-position: -112px -144px; }
.ui-icon-pin-w { background-position: -128px -144px; }
.ui-icon-pin-s { background-position: -144px -144px; }
.ui-icon-play { background-position: 0 -160px; }
.ui-icon-pause { background-position: -16px -160px; }
.ui-icon-seek-next { background-position: -32px -160px; }
.ui-icon-seek-prev { background-position: -48px -160px; }
.ui-icon-seek-end { background-position: -64px -160px; }
.ui-icon-seek-first { background-position: -80px -160px; }
.ui-icon-stop { background-position: -96px -160px; }
.ui-icon-eject { background-position: -112px -160px; }
.ui-icon-volume-off { background-position: -128px -160px; }
.ui-icon-volume-on { background-position: -144px -160px; }
.ui-icon-power { background-position: 0 -176px; }
.ui-icon-signal-diag { background-position: -16px -176px; }
.ui-icon-signal { background-position: -32px -176px; }
.ui-icon-battery-0 { background-position: -48px -176px; }
.ui-icon-battery-1 { background-position: -64px -176px; }
.ui-icon-battery-2 { background-position: -80px -176px; }
.ui-icon-battery-3 { background-position: -96px -176px; }
.ui-icon-circle-plus { background-position: 0 -192px; }
.ui-icon-circle-minus { background-position: -16px -192px; }
.ui-icon-circle-close { background-position: -32px -192px; }
.ui-icon-circle-triangle-e { background-position: -48px -192px; }
.ui-icon-circle-triangle-s { background-position: -64px -192px; }
.ui-icon-circle-triangle-w { background-position: -80px -192px; }
.ui-icon-circle-triangle-n { background-position: -96px -192px; }
.ui-icon-circle-arrow-e { background-position: -112px -192px; }
.ui-icon-circle-arrow-s { background-position: -128px -192px; }
.ui-icon-circle-arrow-w { background-position: -144px -192px; }
.ui-icon-circle-arrow-n { background-position: -160px -192px; }
.ui-icon-circle-zoomin { background-position: -176px -192px; }
.ui-icon-circle-zoomout { background-position: -192px -192px; }
.ui-icon-circle-check { background-position: -208px -192px; }
.ui-icon-circlesmall-plus { background-position: 0 -208px; }
.ui-icon-circlesmall-minus { background-position: -16px -208px; }
.ui-icon-circlesmall-close { background-position: -32px -208px; }
.ui-icon-squaresmall-plus { background-position: -48px -208px; }
.ui-icon-squaresmall-minus { background-position: -64px -208px; }
.ui-icon-squaresmall-close { background-position: -80px -208px; }
.ui-icon-grip-dotted-vertical { background-position: 0 -224px; }
.ui-icon-grip-dotted-horizontal { background-position: -16px -224px; }
.ui-icon-grip-solid-vertical { background-position: -32px -224px; }
.ui-icon-grip-solid-horizontal { background-position: -48px -224px; }
.ui-icon-gripsmall-diagonal-se { background-position: -64px -224px; }
.ui-icon-grip-diagonal-se { background-position: -80px -224px; }


/* Misc visuals
----------------------------------*/

/* Corner radius */
.ui-corner-tl { -moz-border-radius-topleft: 6px; -webkit-border-top-left-radius: 6px; }
.ui-corner-tr { -moz-border-radius-topright: 6px; -webkit-border-top-right-radius: 6px; }
.ui-corner-bl { -moz-border-radius-bottomleft: 6px; -webkit-border-bottom-left-radius: 6px; }
.ui-corner-br { -moz-border-radius-bottomright: 6px; -webkit-border-bottom-right-radius: 6px; }
.ui-corner-top { -moz-border-radius-topleft: 6px; -webkit-border-top-left-radius: 6px; -moz-border-radius-topright: 6px; -webkit-border-top-right-radius: 6px; }
.ui-corner-bottom { -moz-border-radius-bottomleft: 6px; -webkit-border-bottom-left-radius: 6px; -moz-border-radius-bottomright: 6px; -webkit-border-bottom-right-radius: 6px; }
.ui-corner-right {  -moz-border-radius-topright: 6px; -webkit-border-top-right-radius: 6px; -moz-border-radius-bottomright: 6px; -webkit-border-bottom-right-radius: 6px; }
.ui-corner-left { -moz-border-radius-topleft: 6px; -webkit-border-top-left-radius: 6px; -moz-border-radius-bottomleft: 6px; -webkit-border-bottom-left-radius: 6px; }
.ui-corner-all { -moz-border-radius: 6px; -webkit-border-radius: 6px; }

/* Overlays */
.ui-widget-overlay { background: #262626 url(../images/?new=262626&w=40&h=40&f=png&q=100&fltr[]=over|textures/07_diagonals_small.png|0|0|50) 50% 50% repeat; opacity: .30;filter:Alpha(Opacity=30); }
.ui-widget-shadow { margin: -6px 0 0 -6px; padding: 6px; background: #303030 url(../images/?new=303030&w=40&h=100&f=png&q=100&fltr[]=over|textures/01_flat.png|0|0|0) 50% 50% repeat-x; opacity: .50;filter:Alpha(Opacity=50); -moz-border-radius: 12px; -webkit-border-radius: 12px; }