var showNotice,adminMenu,columns,validateForm,screenMeta;!function(a,b,c){var d=a(document),e=a(b),f=a(document.body);adminMenu={init:function(){},fold:function(){},restoreMenuState:function(){},toggle:function(){},favorites:function(){}},columns={init:function(){var b=this;a(".hide-column-tog","#adv-settings").click(function(){var c=a(this),d=c.val();c.prop("checked")?b.checked(d):b.unchecked(d),columns.saveManageColumnsState()})},saveManageColumnsState:function(){var b=this.hidden();a.post(ajaxurl,{action:"hidden-columns",hidden:b,screenoptionnonce:a("#screenoptionnonce").val(),page:pagenow})},checked:function(b){a(".column-"+b).removeClass("hidden"),this.colSpanChange(1)},unchecked:function(b){a(".column-"+b).addClass("hidden"),this.colSpanChange(-1)},hidden:function(){return a(".manage-column[id]").filter(":hidden").map(function(){return this.id}).get().join(",")},useCheckboxesForHidden:function(){this.hidden=function(){return a(".hide-column-tog").not(":checked").map(function(){var a=this.id;return a.substring(a,a.length-5)}).get().join(",")}},colSpanChange:function(b){var c,d=a("table").find(".colspanchange");d.length&&(c=parseInt(d.attr("colspan"),10)+b,d.attr("colspan",c.toString()))}},d.ready(function(){columns.init()}),validateForm=function(b){return!a(b).find(".form-required").filter(function(){return""===a("input:visible",this).val()}).addClass("form-invalid").find("input:visible").change(function(){a(this).closest(".form-invalid").removeClass("form-invalid")}).length},showNotice={warn:function(){var a=commonL10n.warnDelete||"";return!!confirm(a)},note:function(a){alert(a)}},screenMeta={element:null,toggles:null,page:null,init:function(){this.element=a("#screen-meta"),this.toggles=a("#screen-meta-links").find(".show-settings"),this.page=a("#wpcontent"),this.toggles.click(this.toggleEvent)},toggleEvent:function(){var b=a("#"+a(this).attr("aria-controls"));b.length&&(b.is(":visible")?screenMeta.close(b,a(this)):screenMeta.open(b,a(this)))},open:function(b,c){a("#screen-meta-links").find(".screen-meta-toggle").not(c.parent()).css("visibility","hidden"),b.parent().show(),b.slideDown("fast",function(){b.focus(),c.addClass("screen-meta-active").attr("aria-expanded",!0)}),d.trigger("screen:options:open")},close:function(b,c){b.slideUp("fast",function(){c.removeClass("screen-meta-active").attr("aria-expanded",!1),a(".screen-meta-toggle").css("visibility",""),b.parent().hide()}),d.trigger("screen:options:close")}},a(".contextual-help-tabs").delegate("a","click",function(b){var c,d=a(this);return b.preventDefault(),!d.is(".active a")&&(a(".contextual-help-tabs .active").removeClass("active"),d.parent("li").addClass("active"),c=a(d.attr("href")),a(".help-tab-content").not(c).removeClass("active").hide(),void c.addClass("active").show())}),d.ready(function(){function c(){var b=a("a.wp-has-current-submenu");"folded"===x?b.attr("aria-haspopup","true"):b.attr("aria-haspopup","false")}function g(a){var b,c,d,f,g,h,i,j=a.find(".wp-submenu");g=a.offset().top,h=e.scrollTop(),i=g-h-30,b=g+j.height()+1,c=F.height(),d=60+b-c,f=e.height()+h-50,f<b-d&&(d=b-f),d>i&&(d=i),d>1?j.css("margin-top","-"+d+"px"):j.css("margin-top","")}function h(){a(".notice.is-dismissible").each(function(){var b=a(this),c=a('<button type="button" class="notice-dismiss"><span class="screen-reader-text"></span></button>'),d=commonL10n.dismiss||"";c.find(".screen-reader-text").text(d),c.on("click.wp-dismiss-notice",function(a){a.preventDefault(),b.fadeTo(100,0,function(){b.slideUp(100,function(){b.remove()})})}),b.append(c)})}function i(a){var b=e.scrollTop(),c=!a||"scroll"!==a.type;if(!(B||D||G.data("wp-responsive"))){if(S.menu+S.adminbar<S.window||S.menu+S.adminbar+20>S.wpwrap)return void k();if(R=!0,S.menu+S.adminbar>S.window){if(b<0)return void(O||(O=!0,P=!1,E.css({position:"fixed",top:"",bottom:""})));if(b+S.window>d.height()-1)return void(P||(P=!0,O=!1,E.css({position:"fixed",top:"",bottom:0})));b>N?O?(O=!1,Q=E.offset().top-S.adminbar-(b-N),Q+S.menu+S.adminbar<b+S.window&&(Q=b+S.window-S.menu-S.adminbar),E.css({position:"absolute",top:Q,bottom:""})):!P&&E.offset().top+S.menu<b+S.window&&(P=!0,E.css({position:"fixed",top:"",bottom:0})):b<N?P?(P=!1,Q=E.offset().top-S.adminbar+(N-b),Q+S.menu>b+S.window&&(Q=b),E.css({position:"absolute",top:Q,bottom:""})):!O&&E.offset().top>=b+S.adminbar&&(O=!0,E.css({position:"fixed",top:"",bottom:""})):c&&(O=P=!1,Q=b+S.window-S.menu-S.adminbar-1,Q>0?E.css({position:"absolute",top:Q,bottom:""}):k())}N=b}}function j(){S={window:e.height(),wpwrap:F.height(),adminbar:M.height(),menu:E.height()}}function k(){!B&&R&&(O=P=R=!1,E.css({position:"",top:"",bottom:""}))}function l(){j(),G.data("wp-responsive")?(f.removeClass("sticky-menu"),k()):S.menu+S.adminbar>S.window?(i(),f.removeClass("sticky-menu")):(f.addClass("sticky-menu"),k())}function m(){a(".aria-button-if-js").attr("role","button")}function n(){var a=!1;return b.innerWidth&&(a=Math.max(b.innerWidth,document.documentElement.clientWidth)),a}function o(){var a=n()||961;x=a<=782?"responsive":f.hasClass("folded")||f.hasClass("auto-fold")&&a<=960&&a>782?"folded":"open",d.trigger("wp-menu-state-set",{state:x})}var p,q,r,s,t,u,v,w,x,y=!1,z=a("input.current-page"),A=z.val(),B=/iPhone|iPad|iPod/.test(navigator.userAgent),C=navigator.userAgent.indexOf("Android")!==-1,D=a(document.documentElement).hasClass("ie8"),E=a("#adminmenuwrap"),F=a("#wpwrap"),G=a("#adminmenu"),H=a("#wp-responsive-overlay"),I=a("#wp-toolbar"),J=I.find('a[aria-haspopup="true"]'),K=a(".meta-box-sortables"),L=!1,M=a("#wpadminbar"),N=0,O=!1,P=!1,Q=0,R=!1,S={window:e.height(),wpwrap:F.height(),adminbar:M.height(),menu:E.height()},T=a(".wp-header-end");G.on("click.wp-submenu-head",".wp-submenu-head",function(b){a(b.target).parent().siblings("a").get(0).click()}),a("#collapse-button").on("click.collapse-menu",function(){var b=n()||961;a("#adminmenu div.wp-submenu").css("margin-top",""),b<960?f.hasClass("auto-fold")?(f.removeClass("auto-fold").removeClass("folded"),setUserSetting("unfold",1),setUserSetting("mfold","o"),x="open"):(f.addClass("auto-fold"),setUserSetting("unfold",0),x="folded"):f.hasClass("folded")?(f.removeClass("folded"),setUserSetting("mfold","o"),x="open"):(f.addClass("folded"),setUserSetting("mfold","f"),x="folded"),d.trigger("wp-collapse-menu",{state:x})}),d.on("wp-menu-state-set wp-collapse-menu wp-responsive-activate wp-responsive-deactivate",c),("ontouchstart"in b||/IEMobile\/[1-9]/.test(navigator.userAgent))&&(u=B?"touchstart":"click",f.on(u+".wp-mobile-hover",function(b){G.data("wp-responsive")||a(b.target).closest("#adminmenu").length||G.find("li.opensub").removeClass("opensub")}),G.find("a.wp-has-submenu").on(u+".wp-mobile-hover",function(b){var c=a(this).parent();G.data("wp-responsive")||c.hasClass("opensub")||c.hasClass("wp-menu-open")&&!(c.width()<40)||(b.preventDefault(),g(c),G.find("li.opensub").removeClass("opensub"),c.addClass("opensub"))})),B||C||(G.find("li.wp-has-submenu").hoverIntent({over:function(){var b=a(this),c=b.find(".wp-submenu"),d=parseInt(c.css("top"),10);isNaN(d)||d>-5||G.data("wp-responsive")||(g(b),G.find("li.opensub").removeClass("opensub"),b.addClass("opensub"))},out:function(){G.data("wp-responsive")||a(this).removeClass("opensub").find(".wp-submenu").css("margin-top","")},timeout:200,sensitivity:7,interval:90}),G.on("focus.adminmenu",".wp-submenu a",function(b){G.data("wp-responsive")||a(b.target).closest("li.menu-top").addClass("opensub")}).on("blur.adminmenu",".wp-submenu a",function(b){G.data("wp-responsive")||a(b.target).closest("li.menu-top").removeClass("opensub")}).find("li.wp-has-submenu.wp-not-current-submenu").on("focusin.adminmenu",function(){g(a(this))})),T.length||(T=a(".wrap h1, .wrap h2").first()),a("div.updated, div.error, div.notice").not(".inline, .below-h2").insertAfter(T),d.on("wp-updates-notice-added wp-plugin-install-error wp-plugin-update-error wp-plugin-delete-error wp-theme-install-error wp-theme-delete-error",h),screenMeta.init(),f.on("click","tbody > .check-column :checkbox",function(b){if("undefined"==b.shiftKey)return!0;if(b.shiftKey){if(!y)return!0;p=a(y).closest("form").find(":checkbox").filter(":visible:enabled"),q=p.index(y),r=p.index(this),s=a(this).prop("checked"),0<q&&0<r&&q!=r&&(t=r>q?p.slice(q,r):p.slice(r,q),t.prop("checked",function(){return!!a(this).closest("tr").is(":visible")&&s}))}y=this;var c=a(this).closest("tbody").find(":checkbox").filter(":visible:enabled").not(":checked");return a(this).closest("table").children("thead, tfoot").find(":checkbox").prop("checked",function(){return 0===c.length}),!0}),f.on("click.wp-toggle-checkboxes","thead .check-column :checkbox, tfoot .check-column :checkbox",function(b){var c=a(this),d=c.closest("table"),e=c.prop("checked"),f=b.shiftKey||c.data("wp-toggle");d.children("tbody").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked",function(){return!a(this).is(":hidden,:disabled")&&(f?!a(this).prop("checked"):!!e)}),d.children("thead,  tfoot").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked",function(){return!f&&!!e})}),a("#wpbody-content").on({focusin:function(){clearTimeout(v),w=a(this).find(".row-actions"),a(".row-actions").not(this).removeClass("visible"),w.addClass("visible")},focusout:function(){v=setTimeout(function(){w.removeClass("visible")},30)}},".has-row-actions"),a("tbody").on("click",".toggle-row",function(){a(this).closest("tr").toggleClass("is-expanded")}),a("#default-password-nag-no").click(function(){return setUserSetting("default_password_nag","hide"),a("div.default-password-nag").hide(),!1}),a("#newcontent").bind("keydown.wpevent_InsertTab",function(b){var c,d,e,f,g,h=b.target;if(27==b.keyCode)return b.preventDefault(),void a(h).data("tab-out",!0);if(!(9!=b.keyCode||b.ctrlKey||b.altKey||b.shiftKey)){if(a(h).data("tab-out"))return void a(h).data("tab-out",!1);c=h.selectionStart,d=h.selectionEnd,e=h.value,document.selection?(h.focus(),g=document.selection.createRange(),g.text="\t"):c>=0&&(f=this.scrollTop,h.value=e.substring(0,c).concat("\t",e.substring(d)),h.selectionStart=h.selectionEnd=c+1,this.scrollTop=f),b.stopPropagation&&b.stopPropagation(),b.preventDefault&&b.preventDefault()}}),z.length&&z.closest("form").submit(function(){a('select[name="action"]').val()==-1&&a('select[name="action2"]').val()==-1&&z.val()==A&&z.val("1")}),a('.search-box input[type="search"], .search-box input[type="submit"]').mousedown(function(){a('select[name^="action"]').val("-1")}),a("#contextual-help-link, #show-settings-link").on("focus.scroll-into-view",function(a){a.target.scrollIntoView&&a.target.scrollIntoView(!1)}),function(){function b(){c.prop("disabled",""===d.map(function(){return a(this).val()}).get().join(""))}var c,d,e=a("form.wp-upload-form");e.length&&(c=e.find('input[type="submit"]'),d=e.find('input[type="file"]'),b(),d.on("change",b))}(),B||(e.on("scroll.pin-menu",i),d.on("tinymce-editor-init.pin-menu",function(a,b){b.on("wp-autoresize",j)})),b.wpResponsive={init:function(){var c=this;d.on("wp-responsive-activate.wp-responsive",function(){c.activate()}).on("wp-responsive-deactivate.wp-responsive",function(){c.deactivate()}),a("#wp-admin-bar-menu-toggle a").attr("aria-expanded","false"),a("#wp-admin-bar-menu-toggle").on("click.wp-responsive",function(b){b.preventDefault(),M.find(".hover").removeClass("hover"),F.toggleClass("wp-responsive-open"),F.hasClass("wp-responsive-open")?(a(this).find("a").attr("aria-expanded","true"),a("#adminmenu a:first").focus()):a(this).find("a").attr("aria-expanded","false")}),G.on("click.wp-responsive","li.wp-has-submenu > a",function(b){G.data("wp-responsive")&&(a(this).parent("li").toggleClass("selected"),b.preventDefault())}),c.trigger(),d.on("wp-window-resized.wp-responsive",a.proxy(this.trigger,this)),e.on("load.wp-responsive",function(){var a=navigator.userAgent.indexOf("AppleWebKit/")>-1?e.width():b.innerWidth;a<=782&&c.disableSortables()})},activate:function(){l(),f.hasClass("auto-fold")||f.addClass("auto-fold"),G.data("wp-responsive",1),this.disableSortables()},deactivate:function(){l(),G.removeData("wp-responsive"),this.enableSortables()},trigger:function(){var a=n();a&&(a<=782?L||(d.trigger("wp-responsive-activate"),L=!0):L&&(d.trigger("wp-responsive-deactivate"),L=!1),a<=480?this.enableOverlay():this.disableOverlay())},enableOverlay:function(){0===H.length&&(H=a('<div id="wp-responsive-overlay"></div>').insertAfter("#wpcontent").hide().on("click.wp-responsive",function(){I.find(".menupop.hover").removeClass("hover"),a(this).hide()})),J.on("click.wp-responsive",function(){H.show()})},disableOverlay:function(){J.off("click.wp-responsive"),H.hide()},disableSortables:function(){if(K.length)try{K.sortable("disable")}catch(a){}},enableSortables:function(){if(K.length)try{K.sortable("enable")}catch(a){}}},a(document).ajaxComplete(function(){m()}),d.on("wp-window-resized.set-menu-state",o),d.on("wp-menu-state-set wp-collapse-menu",function(b,c){var d=a("#collapse-button"),e="true",f=commonL10n.collapseMenu;"folded"===c.state&&(e="false",f=commonL10n.expandMenu),d.attr({"aria-expanded":e,"aria-label":f})}),b.wpResponsive.init(),l(),o(),c(),h(),m(),d.on("wp-pin-menu wp-window-resized.pin-menu postboxes-columnchange.pin-menu postbox-toggled.pin-menu wp-collapse-menu.pin-menu wp-scroll-start.pin-menu",l),a(".wp-initial-focus").focus()}),function(){function a(){d.trigger("wp-window-resized")}function c(){b.clearTimeout(f),f=b.setTimeout(a,200)}var f;e.on("resize.wp-fire-once",c)}(),function(){if("-ms-user-select"in document.documentElement.style&&navigator.userAgent.match(/IEMobile\/10\.0/)){var a=document.createElement("style");a.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}")),document.getElementsByTagName("head")[0].appendChild(a)}}()}(jQuery,window);