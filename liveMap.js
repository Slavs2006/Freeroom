var countAccordChangePara = 0;
var countAccordChangeDay = 0;
function hideAllMap() {
	for (var i = 1; i < 7; i++) {
		$("#" + i + "floorSVG").removeClass("show").addClass("hide");
	}
}
function bindAudClick() {
	$(".numAud").click(function () {
							var number = $(this).text();
							if ($("#" + number[0] + "floorSVG").hasClass("hide")) {
								hideAllMap();
								openAndPaintFloor(number[0]);
							}
						});
}
function bindStageClick() {
	$(".newStage").click(function () {
							var number = $(this).text();
							if ($("#" + number[0] + "floorSVG").hasClass("hide")) {
								hideAllMap();
								openAndPaintFloor(number[0]);
							}
						});		
}
function bindAccordionChange() {
	$( ".accordion" ).bind( "accordionchange", function() {
												hideAllMap();
												openAndPaintFloor(1);
											});
}
function bindTabsChange() {
	$( ".mainTabs" ).bind( "tabsshow", function() {
												hideAllMap();
												openAndPaintFloor(1);
											});
}

function openAndPaintFloor(floorNum) {
	$("#" + floorNum + "floorSVG").removeClass("hide").addClass("show");
	var svgdom = document.getElementById(floorNum + "floorSVG").getSVGDocument();
	$('path', svgdom).each(function() {
		if(this.id[0] == "a") {
			this.style.fill = "#fff";
		}
	});
	var curAud = "";
	//var style = "";
	//var allAud = "";
	//alert($("div[class*='ui-tabs-panel']:not([class*='ui-tabs-hide'])").attr("id"));
	$("div[class*='ui-tabs-panel']:not([class*='ui-tabs-hide']) > div.accordion.AccordionDay > div.ui-accordion-content-active > div.accordion.AccordionPara > div.oneWarrior.ui-accordion-content-active > div.numAud").each(function() {
			curAud = this.outerText;
		//	alert(curAud);
			if (curAud && curAud[0] == floorNum) {
				if (curAud[2] == "/") {
					curAud = "190" +curAud[3];
				}
				//allAud += " " + curAud;
				$('path', svgdom).each(function() {
					if(this.id == "a" + curAud) {
						this.style.fill = "#D8F781";
					}
				});
			}
		});
	
}