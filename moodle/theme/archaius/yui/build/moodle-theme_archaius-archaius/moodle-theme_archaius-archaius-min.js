YUI.add("moodle-theme_archaius-archaius",function(e,t){M.theme_archaius_loader=M.theme_archaius_loader||{},M.theme_archaius_loader={activateAccordionBlocks:1,activateTopicsCourseMenu:1,activateSlideshow:0,activateHideAndShowBlocks:1,activatePausePlaySlideshow:0,archaiusJSEffects:ArchaiusJSEffects.getInstance(),slideshowTimeout:4e3,pageType:"",subpage:undefined,contextId:0,showRegionPre:1,showRegionPost:1,init:function(e){this.activateAccordionBlocks=parseInt(e.accordionBlocks,10),this.activateSlideshow=parseInt(e.activateSlideshow,10),this.activateHideAndShowBlocks=parseInt(e.activateHideAndShowBlocks,10),this.activateTopicsCourseMenu=parseInt(e.activateTopicsCourseMenu,10),this.activatePausePlaySlideshow=parseInt(e.activatePausePlaySlideshow,10),this.slideshowTimeout=parseInt(e.slideshowTimeout,10),this.confirmationDeleteSlide=e.confirmationDeleteSlide,this.noSlides=e.noSlides,this.contextId=e.contextId,this.pageType=e.pageType,e.subpage!==""&&(this.subpage=e.subpage),this.showRegionPre=parseInt(e.showRegionPre,10),this.showRegionPost=parseInt(e.showRegionPost,10),this.activateAccordionBlocks?this.accordionBlocks():this.commonBlocks(),this.activateHideAndShowBlocks&&this.hideShowBlocks(),this.activateSlideshow&&this.startSlideshow(this.activatePausePlaySlideshow,this.slideshowTimeout,this.confirmationDeleteSlide,this.noSlides),this.topicsCourseMenu(this.activateTopicsCourseMenu)},commonBlocks:function(){this.archaiusJSEffects.commonBlocks()},accordionBlocks:function(){this.archaiusJSEffects.accordionBlocks()},hideShowBlocks:function(){this.archaiusJSEffects.hideShowBlocks()},topicsCourseMenu:function(e){this.archaiusJSEffects.topicsCourseMenu(e)},startSlideshow:function(e,t,n,r){this.archaiusJSEffects.initSlideshow(e,t,n,r)},getUserPreferenceName:function(e){var t="theme_archaius_blocks_region_"+e+"_context_"+this.contextId+"_page_type_"+this.pageType;return this.subpage!==undefined&&(t+="_sub_"+this.subpage),t},setUserPreference:function(e,t){var n=this.getUserPreferenceName(e);M.util.set_user_preference(n,t)}}},"@VERSION@",{requires:["base"]});
