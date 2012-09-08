function ControllerOfCalendarAndTime () {
	
	this.model = new ModelOfCalendarAndTime();
	this.view = new ViewOfCalendarAndTime();
	
	this.activate = function (_maps) {
		var CalendarAndTimeNamespace = {
			lastSelectedDateAndTime : new Object(),
			MonthArr : new Array("Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря"),
			DayArr : new Array ("Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"),
			ifmoPareCalc : function () {
				var answ = 0;
				var tmpTime = new Date();
				tmpTime = tmpTime.getHours()*60 + tmpTime.getMinutes();
				if ( tmpTime <= 9*60 + 20 ) {
					answ = 1;
				}
				else if ( (tmpTime > 9*60 + 20) && (tmpTime <= 10*60 + 50) ) {
					answ = 2;
				}
				else if ( (tmpTime > 10*60 + 50) && (tmpTime <= 12*60 + 20) ) {
					answ = 3;
				}
				else if ( (tmpTime > 12*60 + 20) && (tmpTime <= 14*60) ) {
					answ = 4;
				}
				else if ( (tmpTime > 14*60) && (tmpTime <= 15*60 + 40) ) {
					answ = 5;
				}
				else if ( (tmpTime > 15*60 + 40) && (tmpTime <= 17*60 + 10) ) {
					answ = 6;
				}
				else if ( (tmpTime > 17*60 + 10) && (tmpTime <= 18*60 + 40) ) {
					answ = 7;
				}
				return answ;
			},
			
			ifmoWeekCalc : function (_date) {
				var ifmoWeek = $.datepicker.iso8601Week(_date) - 35;
				if ( ifmoWeek >= 0 ) { return ifmoWeek + (ifmoWeek % 2 == 0 ? ' чет.' : ' нечет.'); }
				else { return ifmoWeek + 52 + (ifmoWeek % 2 == 0 ? ' чет.' : ' нечет.'); }
			},
			
			createDateButtonTitle : function (_date) {
				return _date.getDate() + " " + CalendarAndTimeNamespace.MonthArr[_date.getMonth()] + ", " + CalendarAndTimeNamespace.DayArr[_date.getDay()] + ", неделя " + CalendarAndTimeNamespace.ifmoWeekCalc(_date);
			}
		};
		$("#datepicker").datepicker({
							dayNamesMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
							monthNames: ["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],
							weekHeader: "Неделя",
							calculateWeek: CalendarAndTimeNamespace.ifmoWeekCalc, 
							showOtherMonths: true,
							selectOtherMonths: true,
							showWeek: true,
							firstDay: 1,
							minDate: 0,
							maxDate: new Date("12.31.2012"),
							defaultDate: "+" + (CalendarAndTimeNamespace.ifmoPareCalc() == 0 ? 1 : 0 ),
							onSelect: function(dateText, inst) {
											var tmpDate = new Date(dateText);
											if ( Date.parse( CalendarAndTimeNamespace.lastSelectedDateAndTime["date"] ) != Date.parse( tmpDate ) ) {
												CalendarAndTimeNamespace.lastSelectedDateAndTime["date"] = tmpDate;
												_maps.renewAllMaps( CalendarAndTimeNamespace.lastSelectedDateAndTime["date"], CalendarAndTimeNamespace.lastSelectedDateAndTime["pare"] );
												$("#dateButton").button( "option", "label", CalendarAndTimeNamespace.createDateButtonTitle(tmpDate) );
											}
											$("#datepicker").hide();
											tmpDate = 0;
										}
						})
						.hide();
		$("#dateButton").button({
							icons: { secondary: "ui-icon-circle-triangle-s" },
							label: CalendarAndTimeNamespace.createDateButtonTitle($("#datepicker").datepicker("getDate"))
						})
						.click(function () {
							$("#datepicker").toggle();
							$("#dateButton").toggleClass("ui-state-active");
							//$("#datepicker .ui-datepicker").attr("style", "width: 30em;"); - this is not worked. solution = width of datapicker was changed in jqueryUI css files
						});
		$( "#parepicker" ).buttonset();
		$( "#parepicker label[for ='pare" + (CalendarAndTimeNamespace.ifmoPareCalc() == 0 ? 1 : CalendarAndTimeNamespace.ifmoPareCalc() ) + "']" ).addClass("ui-state-active");
		$( "#parepicker span" ).attr("style", "width: 42px; padding: 4px;");
		$( "#parepicker .ui-button" ).click(function () {
			var tmpPare = $("#parepicker label.ui-state-active").attr("for")[4];
			if ( CalendarAndTimeNamespace.lastSelectedDateAndTime["pare"] != tmpPare) {
				CalendarAndTimeNamespace.lastSelectedDateAndTime["pare"] = tmpPare;
				_maps.renewAllMaps( CalendarAndTimeNamespace.lastSelectedDateAndTime["date"], CalendarAndTimeNamespace.lastSelectedDateAndTime["pare"] );
			}
			tmpPare = 0;
		});
		CalendarAndTimeNamespace.lastSelectedDateAndTime["date"] = $("#datepicker").datepicker("getDate");
		CalendarAndTimeNamespace.lastSelectedDateAndTime["pare"] = $("#parepicker label.ui-state-active").attr("for")[4];
		_maps.renewAllMaps( CalendarAndTimeNamespace.lastSelectedDateAndTime["date"], CalendarAndTimeNamespace.lastSelectedDateAndTime["pare"]);
	};
}

function ModelOfCalendarAndTime () {
	
}

function ViewOfCalendarAndTime () {
	
}