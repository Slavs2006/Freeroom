
function ControllerOfIndividualShedule () {
	//1. bind of all day-cells = model.getEvent() if day-cell is not free. 
	//2. bind NEXT
	//3. bind PREV
	//4. bind SHOW_ORDER
	//5. bind MAKE_ORDER
	//6. ? bind CLOSE ?
	//7. 
	this.modelOfIndividualShedule = new ModelOfIndividualShedule();
	this.viewOfIndividualShedule = new ViewOfIndividualShedule();
}


function ModelOfIndividualShedule () {
	//0. constructor = getIndividualShedule() + getEvent()
	//1. getIndividualShedule = function of AJAX (aud, week1, week2). return HTML of individual shedule of selected aud.
	//3. showOrder = function (...pre-set of parametrs to fill order's field ...). fill field of orderMenuWindow
	//4. checkOrderParametrs = function (). validate paametrs of order. (? AJAX to check on server complicated parametrs, or only client checker ?)
	//5. makeOrder = function of AJAX (...full set of order's parametrs...). send to server the order pack . return status: 
					// if OK -> order added in stack -> also return HTML from server and call modelOfUserRequests.addNewRequest()
					// else say some attention message "Your request is suck. try again.."
	//6.
}

function ViewOfIndividualShedule () {
	this.showMe = function (idAuditory, dataStart,guest) { // great fucking function. need to be fixed!
		function showTableWithOtherTime(idAuditory, dataStart,guest) {
			var dayTrans = ""; // день недели для обращения к нужной таблице бд латинскими буквами
			var tmp = cur_head; 
			if (dataStart) {
				var month;
				var day;
				var chet = ""; // указывает четная или нечетная неделя even or odd
				var year;
				var d = new Date((86400 * 7 + dataStart) * 1000);
				month = d.getMonth() + 1;
				year = d.getFullYear();
				day = d.getDate();
				dayOfWeek = d.getDay();
				var strDate = year+"-"+month+"-"+day;
				switch (dayOfWeek) {
					case 1:
						dayTrans = "mon";
						break;
					case 2:
						dayTrans = "tue";
						break;
					case 3:
						dayTrans = "wed";
						break;
					case 4:
						dayTrans = "thu";
						break;
					case 5:
						dayTrans = "fri";
						break;
					case 6:
						dayTrans = "sat";
						break;
					case 7:
						dayTrans = "sun";
						break;
					default:
						break;
				}
				
			if ((getWeekNum(dataStart*1000) + 1)  % 2) {
				chet = "odd";		
			} else {
				chet = "even";
			}
				//alert(strDate);
			} else {
				if (!tmp)
					tmp = $('#evenT a').html();
				var strDateTmp = tmp.split(' ');
				var dayOfDateTmp = strDateTmp[0].split(',');
				var dayOfDate = dayOfDateTmp[0]; // день недели по-русски
				//alert(dayOfDate);
				switch (dayOfDate) {
					case "Понедельник":
						dayTrans = "mon";
						break;
					case "Вторник":
						dayTrans = "tue";
						break;
					case "Среда":
						dayTrans = "wed";
						break;
					case "Четверг":
						dayTrans = "thu";
						break;
					case "Пятница":
						dayTrans = "fri";
						break;
					case "Суббота":
						dayTrans = "sat";
						break;
					case "Воскресенье":
						dayTrans = "sun";
						break;
					default:
						alert("Неправильный день недели.");
				}
				var strDateTmp2 = strDateTmp[1].split('/');
				var strDate = strDateTmp2[2]+"-"+strDateTmp2[1]+"-"+strDateTmp2[0]; // выбранная дата в формате YYYY-mm-dd
				idAuditory = idAuditory.replace(/[^0-9]/,"");
				if (cur_week == 2) {
					chet = "even";
				} else {
					chet = "odd";
				}
			}
			tmp = $('div[class*="AccordionPara"] h3[aria-selected="true"] a').html();
			var numPar = cur_time; // содержит номер пары, на которую открыто рассписание

			var table = "";
			//alert("real=dataAboutAuditory&chet="+chet+"&date="+strDate+"&dayTrans="+dayTrans+"&numPar="+numPar+"&idAuditory="+idAuditory);
			$.ajax({
				url: "ajaxScripts.php",
				type: "POST",
				dataType: "html",
				data: "real=dataAboutAuditory&chet="+chet+"&date="+strDate+"&dayTrans="+dayTrans+"&numPar="+numPar+"&idAuditory="+idAuditory,
				success: function (data) {
						$('#tableWithOtherTime').html("");
						if (guest == 1) {
							$('#dialog').dialog({
								autoOpen: false,
								width: 800,
								hide: "slide",
								show: "slide",
								buttons: {
									"Ok": function() { 
										$(this).dialog("close"); 
									}
								}
							});
						} else {
							$('#dialog').dialog({
								autoOpen: false,
								width: 800,
								hide: "slide",
								show: "slide",
								buttons: {
									"Ok": function() { 
										$(this).dialog("close"); 
									},
									"Забронировать": function() {  
										if ($('#ui-dialog-title-dialog').html() == "Кликните по интересующей ячейке, чтобы узнать дату резерва или занятия.") {
											alert("Вы должны выбрать день и пару!");
										} else {
											$(this).dialog("close"); 
											$("#reservation").dialog("open"); 
											var dateBron = $('#ui-dialog-title-dialog').html().split(' ');
											$('#dateBron').val(dateBron[2]);
											getNumAuditory(idAuditory);
											getTimePara(dateBron[3]);
										}
									}
								}
							});
						}
						$('#dialog').html(data);
						$('#ui-dialog-title-dialog').html("Кликните по интересующей ячейке, чтобы узнать дату резерва или занятия.");
						$('#dialog').dialog('open');
				}
			});
			
		}
	}
	this.hideMe = function () {
		
	}
}