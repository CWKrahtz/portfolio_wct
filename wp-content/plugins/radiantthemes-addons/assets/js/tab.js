//var WidgetRadiantTabHandler=function($scope,$){jQuery(".rt-tab").each(function(){jQuery(this).find("ul.nav-tabs a:first").tab("show");});}

//jQuery(window).on("elementor/frontend/init",function(){elementorFrontend.hooks.addAction("frontend/element_ready/radiant-tab.default",WidgetRadiantTabHandler);});



var WidgetRadiantTabHandler = function ($scope, $) {
jQuery(".rt-tab").each(function(){
		jQuery(this).find("ul.nav-tabs a:first").tab("show");
	});
}
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-tab.default",
		WidgetRadiantTabHandler
	);
});