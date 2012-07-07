function ControllerOfMaps () {
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
	
	this.bindAllFloorSelectors = function () {	//2. bind of floor selectors
		$('ul.tabs').delegate('li:not(.current)', 'click', function() {
			var pevNumber = $(this).siblings('current').index() + 1;
			var curNumber = $(this).index() + 1;
			$(this).addClass('current').siblings().removeClass('current');
			showAndHideMaps(curNumber, pevNumber);
		});
	}
	
	this.renewAllMaps = function(_date, _pare) {
		this.modelOfMaps->getFreeAndReservedAuds(date, pare);
		this.viewOfMaps->paintAllMaps(this.modelOfMaps->currentFreeAndReservedAuds);
	}
	
	this.modelOfMaps = new ModelOfMaps();
	this.viewOfMaps = new ViewOfMaps();
	
	
}

function ModelOfMaps () {
	this.currentFreeAndReservedAuds; // assoc array: key = audNumber, val = audStatus {free|busy}
	//0. constructor = getFreeAndReservedAuds() 
	//1. service functions of selecting floor
	//2. getFreeAndReservedAuds = function of AJAX (date, pare). return new currentFreeAndReservedAuds
	this.getFreeAndReservedAuds = function(_date, _pare) {
		$.ajax({
				type: "POST",
				url: "server/mainSwitchScript.php",
				data: ({command : 'renewMaps', date : _date, pare : _pare}),
				dataType: "json",
				success: function(data)
						{
							this.currentFreeAndReservedAuds = data;
						},	
				//error - ?
				//write exceptions...
		})	
	}
}

function ViewOfMaps () {
	//0. constructor = paintAllMaps(someSet), hideAllMaps(), showAndHideMaps(1)
	this.currentSelectedFloor;
	this.paintAllMaps = function (_setOfFreeAndReservedAuds) {//1. paintAllMaps = function (model.currentFreeAndReservedAuds). paint all maps with current set of free auds
		for (var curAud in _setOfFreeAndReservedAuds) {
			for (var floorNumber = 1, checkStatus = false; checkStatus == false && floorNumber < 7; floorNumber++) {
				if (curAud && curAud[0] == floorNumber) {	// reconstruct this crazy checker. do it more clever and chip. maybe restruct SVGes 
					var svgdom = document.getElementById(floorNumber + "floorSVG").getSVGDocument();
					if (curAud[2] == "/") {
						curAud = "190" +curAud[3];
					}
					$('path', svgdom).each(
						function() {
							if (this.id[0] == "a") {
								if (this.id == "a" + curAud) {
									var statusOfAud = _setOfFreeAndReservedAuds [curAud];
									var color = "";
									switch (statusOfAud) {
										case "free": 	color = "#D8F781";
														break;
										case "busy":	color = "#3366FF";
														break;
										default:		color = "#000000";
														break;
									}
									this.style.fill = color;
								}
							}
						}
					);
					var checkStatus = true;
				}
			}
		}
	}
	this.showAndHideMaps = function (_numOfShownMap, _numOfHiddenMap = 0) {
		$("#" + _numOfShownMap + "floorSVG").removeClass("hide").addClass("show");
		this.currentSelectedFloor = _numOfShownMap;
		if (_numOfHiddenMap != 0) {
			$("#" + _numOfHiddenMap + "floorSVG").removeClass("show").addClass("hide");
		}
	}
	this.hideAllMaps = function () {
		for (var floorNumber = 1; floorNumber < 7; floorNumber++) {
			$("#" + floorNumber + "floorSVG").removeClass("show").addClass("hide");
		}
		this.currentSelectedFloor = 0;
	}
}

