function ControllerOfMaps () {
	//constructor:
	this.model = new ModelOfMaps();
	this.view = new ViewOfMaps();
	
	this.bindAllAudsOnAllMaps = function () {	//1. bind of all auds on maps to show onClick individualShedule of clicked auds
		for (var floorNumber = 1; floorNumber < 7; floorNumber++) {
			var svgdom = document.getElementById(floorNumber + "floorSVG").getSVGDocument();
			$('path', svgdom).each(function() {
				if(this.id[0] == "a") {
					this.style.fill = "#fff";
				}
				$(this).unbind();
				$(this).bind("click", function () {
					client.controllerOfIndividualShedule.viewOfIndividualShedule.showMe(this.id, 0, testUser);//???
				});
			});
		}
	}
	
	this.renewAllMaps = function(_date, _pare) {
		var ifmoWeek = $.datepicker.iso8601Week(_date) - 35;
		parity = ifmoWeek % 2 == 0 ? 'even' : 'odd';
		_model = this.model;
		_view = this.view;
		$.ajax({
			url: "./../server/mainSwitchScript.php",
			type: "POST",
			data: ({command : 'renewMaps', date : _date, pare : _pare, parity : parity}),
			dataType: "json",
			success: function(data) {
						for (var key in data) {	//	convert from 19/x to 190x
							if (data[key].aud[2] == "/") { 
								data[key].aud = "190" + data[key].aud[3];
							}
						}
						_model.currentFreeAuds = data;
						_view.clearAllMaps();
						_view.paintAllMaps( _model.currentFreeAuds );
					},	
			error: function(jqXHR, textStatus, errorThrown) {
						alert(jqXHR + " _ " +textStatus+ " _ " + errorThrown);
					}
			//write exceptions...
		})
	}
	
	this.activate = function () {
		//powerOn floorSelector, show 1 floor(or instructions to newbe)
		var MapsNameSpace = {
			lastSelectedFloor : 0
		};
		$( "#floorSelector" ).buttonset();
		$( "#floorSelector label[for ='floor1']" ).addClass("ui-state-active");
		$( "#floorSelector .ui-button" ).attr("style", "width: 16.45%;");
		$( "#floorSelector span" ).attr("style", "padding: 0;");
		$( "#floorSelector .ui-button" ).click(function () {
			var tmpFloor = $( "#floorSelector label.ui-state-active" ).attr("for")[5];
			if (MapsNameSpace.lastSelectedFloor != tmpFloor) {
				$( ".imap" ).attr("style", " z-index: 0;");
				$( "#shadeSVG" ).attr("style", " z-index: 1;");
				$( "#" + tmpFloor + "floorSVG" ).attr("style", " z-index: 2;");
				MapsNameSpace.lastSelectedFloor = tmpFloor;
			}
			tmpFloor = 0;
		});
		$( ".imap" ).attr("style", " z-index: 0;");
		$( "#shadeSVG" ).attr("style", " z-index: 1;");
		$( "#1floorSVG" ).attr("style", " z-index: 2;");
		MapsNameSpace.lastSelectedFloor = 1;
	}
}

function ModelOfMaps () {
	this.currentFreeAuds = new Array(); // assoc array: key = audNumber, val = audStatus {free|busy}
	//add some structure of floor alias to control Painting
}

function ViewOfMaps () {
	this.busyColor = "#FF8C69";
	this.freeColor = "#BEF574";
	this.paintAllMaps = function (_setOfFreeAuds) {//1. paintAllMaps = function (model.currentFreeAndReservedAuds). paint all maps with current set of free auds
		var floor = 6;
		var freeColor = this.freeColor;
		while (floor > 0) {
			var svgdom = document.getElementById( floor + "floorSVG" ).getSVGDocument();
			for (var key in _setOfFreeAuds) {
				$('path[id="a' + _setOfFreeAuds[key].aud + '"]', svgdom)
					.each( function() {
							this.style.fill = freeColor;
					});
			}
			floor--;
		}
	}
	this.clearAllMaps = function () {
		var floor = 6;
		var busyColor = this.busyColor;
		while (floor > 0) {
			var svgdom = document.getElementById( floor + "floorSVG" ).getSVGDocument();
			$('path[id^="a"]', svgdom).each( function() {
												this.style.fill = busyColor;
											});
			floor--;
		}
	}
}

