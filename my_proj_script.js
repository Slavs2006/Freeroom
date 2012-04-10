	//table_select_day = new Array(4);
	//table_select_day[1]=new Array(8);
	//table_select_day[2]=new Array(8);
	//table_select_day[3]=new Array(8);
	
	var table_select_day = [[false,false,false,false,false,false,false,false],[false,false,false,false,false,false,false,false],[false,false,false,false,false,false,false,false],[false,false,false,false,false,false,false,false]];

	var prev_id = 0;
	var cur_date = "undef";
	var cur_day = 0; //название дня недели
	var cur_week = 0; //четная/нечетная неделя
	var cur_head = ""; //название для аккордеона
	
	
	function whichFloorIsIT( numAud ) {
		if (numAud[2] && numAud[2] != "\\" && numAud[2] != "/" && numAud[2] != "." && numAud[2] != "-" ) {
			return numAud[0];
		}
		else return 1;
	}
	
	function restruct_f(str)
	{
		var result = "";
		var arr = str.split(" ");
		arr.sort();
		var k = 0;
		for (var i=0;i<arr.length;i++)
		{
			if (arr[i]!="")
			{
				if (i!=0 && (whichFloorIsIT(arr[i]) - k) > 0)
				{
					result = result + "<div class=\"newStage\">" + whichFloorIsIT(arr[i]) + " этаж</div>";
					k = whichFloorIsIT(arr[i]);
				}
				result = result + "<div class=\"numAud\">" + arr[i] + "</div>";
			}
		}
		//alert(result);
		return result;
	}
	
	function horrable_magic(data)
	{
		var mainTabs = "<div class=\"mainTabs\"></div>";
		var mainUl = "<ul id=\"mainUl\"></ul>";
		var oddT = "<div id=\"oddT\"></div>";
		var evenT = "<div id=\"evenT\"></div>";
		$("#answerStruct").empty().toggleClass("loading").append(mainTabs);
		$(".mainTabs").append(mainUl).append(oddT).append(evenT);

		var daySet = new Array("", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
		//var daySet = new Array("", "Monday", "Tuesday", "Wednesday", "Thuresday", "Friday", "Saturday", "Sunday");
		var weekSet = new Array("","Нечётная неделя", "Чётная неделя");
		var paraSet = new Array("", "1 пара: 08:00 - 09:20", "2 пара: 09:30 - 10:50", "3 пара: 11:00 - 12:20", "4 пара: 12:40 - 14:00", "5 пара: 14:20 - 15:40", "6 пара: 15:50 - 17:10", "7 пара: 17:20 - 18:40");
		var divAccordionPara = "<div class=\"accordion AccordionPara\">";
		var divAccordionDay = "<div class=\"accordion AccordionDay\">";
		var divOpen = "<div>";
		var divOpen_1 = "<div class=\"oneWarrior\">";
		var divClose = "</div>";
		var h3Open = "<h3><a href=\"#\">";
		var h3Close = "</a></h3>";
		var liOdd = "<li><a href=\"#oddT\">Нечётная неделя</a></li>";
		var liEven = "<li><a href=\"#evenT\">Чётная неделя</a></li>";
									
		var oddBool = false;
		var evenBool = false;
		var dayInsBool = false;
		var readyTable = "";
		var Tab = "";
									
		for (var i=1;i<3;i++)
		{
			for (var j=1;j<8;j++)
			{
				for (var k=1;k<8;k++)
				{
					if (data[i*100+j*10+k])
					{
						if (i==1 && oddBool==false) 
						{
							oddBool=true;
							$("#mainUl").append(liOdd);
						}
						else if (i==2 && evenBool==false) 
						{
							evenBool=true;
							$("#mainUl").append(liEven);
						}
						if (dayInsBool==false) 
						{
							dayInsBool=true;
							//формирую строку с добавлением дня
					readyTable = readyTable + h3Open + cur_head + h3Close + divOpen + divAccordionPara + h3Open + paraSet[k] + h3Close + divOpen_1 + restruct_f(data[i*100+j*10+k]) + divClose;

					//	readyTable = readyTable + h3Open + daySet[j] + h3Close + divOpen + divAccordionPara + h3Open + paraSet[k] + h3Close + divOpen_1 + restruct_f(data[i*100+j*10+k]) + divClose;
							//проверить в какую неделю добавлять день #evenT или #oddT
						}
						else 
						{
							//формирую строку без добавления дня
							readyTable = readyTable + h3Open + paraSet[k] + h3Close + divOpen_1 + restruct_f(data[i*100+j*10+k]) + divClose;

						}
					}
				}
				// add div's day
				if (dayInsBool==true)
				{
					readyTable = readyTable + divClose + divClose;
					dayInsBool=false;
				}
			}
			if (readyTable!="")
			{
				readyTable = divAccordionDay + readyTable + divClose;
				Tab = oddBool?"#oddT":"#evenT";
				$(Tab).append(readyTable);

			}
			//alert(readyTable);
			Tab = "";
			readyTable = "";
			oddBool = false;
			evenBool = false;
		}
									
		$("[class='mainTabs']").tabs();
		$("[class*='accordion']").accordion({
			autoHeight: false,
			navigation: true,
			collapsible: false,
			clearStyle: true,
			animated: 'bounceslide'
		});
	}
	
	function ch_nch(_n) //проверка нечетности недели
	{
		if (_n%2) {return 1;}
		else 	  {return 2;}
	}
	
	
	function get_id_time( _hour, _min)
	{
		var info_time_table = new Array(2);
		info_time_table[0] = new Array(8);
		info_time_table[1] = new Array(8);
		info_time_table[0][1] = 800;
		info_time_table[1][1] = 920;
		info_time_table[0][2] = 920;
		info_time_table[1][2] = 1050;
		info_time_table[0][3] = 1050;
		info_time_table[1][3] = 1220;
		info_time_table[0][4] = 1220;
		info_time_table[1][4] = 1400;
		info_time_table[0][5] = 1400;
		info_time_table[1][5] = 1540;
		info_time_table[0][6] = 1540;
		info_time_table[1][6] = 1710;
		info_time_table[0][7] = 1710;
		info_time_table[1][7] = 1820;
		for (var k = 1; k<8; k++)
		{
			if (((_hour*100 + _min) >= info_time_table[0][k]) && ((_hour*100 + _min) < info_time_table[1][k]))
			{
				return k;
			}
		}
		return 1;
	}
	

	
	function get_day(s)
	{
	
	switch(s)
	{
	case "пн": return 1;
	case "вт": return 2;
	case "ср": return 3;
	case "чт": return 4;
	case "пт": return 5;
	case "сб": return 6;
	case "вс": return 7;
	default: alert("Error in get_day!");
	return -1;
	}
	
	
	}
	
	function check_time(time) {
	
	for (var i = 0; i <= 8; i++)
	{
	if (time[i] == true) return 1;
	}
	return 0;
	}
	
	
	
	/*	$(window).bind("resize", function(){
		 $("#dim").css("height", $(window).height());
		});
	*/
	
	$("document").ready( function() // по окончанию загрузки страницы
	{

		$('#calendar').datepick({ 
		renderer: $.datepick.weekOfYearRenderer, 
		calculateWeek: customWeek,
		showOtherMonths: true,
		pickerClass: 'myPicker',
		onSelect: showDate,
		minDate: $.datepick.today(), maxDate:  $.datepick.newDate(2012, 7, 1)}); 
		function customWeek(date) { 
		a = $.datepick.iso8601Week(date) - 5;
		if (a%2 != 0)
		
		a = a + " н/ч.";

		else
		a = a + " ч.";

			 return a
		}
		
		function showDate(date) {
		
		for (var i=1;i<=2;i++)
		{
			for (var j=1;j<8;j++)
			{
				table_select_day[i][j]=false; // обнуляем таблицу выбранных дней и времени
			}
		}
		
		
		cur_date = $.datepick.formatDate('dd/mm/D/MM/yyyy/ww/DD' , $('#calendar').datepick('getDate')[0]);
		arr = cur_date.split('/');
		cur_day = get_day(arr[2]);
		cur_week = ch_nch(arr[5] - 5);
		table_select_day[cur_week][cur_day] = true;
		cur_head = arr[6] + ", " + arr[0] + "/" + arr[1] + "/" + arr[4];
		//alert(cur_head);
		//alert(table_select_day[1]);
		//alert(table_select_day[2]);
}
		
		$('.timeset li a').animate({'opacity':'0.7'},700);
		
		 $('.timeset li a').bind('click',function(){
				var flag = "show";
				var clickId = this.id;
				//alert(prev_id);
				if (clickId=="9")
				{
			//	alert("Выбираем все, господа!");
				$('.timeset li a').animate({'opacity':'0.7','margin-right':'-20px', 'background-color':'#222'},700);
				table_select_day[3] = [true,true,true,true,true,true,true,true];
				$(this).animate({'opacity':'1.0','margin-right':'0px','background-color':'#ff7518'},700);
				}
				else{
					if (prev_id == "9") {
					table_select_day[3] = [false,false,false,false,false,false,false,false];
					$("#9").animate({'opacity':'0.7','margin-right':'-20px','background-color':'#222'},700);
					}			
					if (table_select_day[3][clickId] == false)
					{
					table_select_day[3][clickId] = true;
					flag = "show";
					}
					else {
					table_select_day[3][clickId] = false;
					flag = "hide";
					}			
					
					if (flag == "show")
					{

					 $(this).animate({'opacity':'1.0','margin-right':'0px','background-color':'#ff7518'},700);
					 }
					 else
					 {
					 $(this).animate({'opacity':'0.7','margin-right':'-20px', 'background-color':'#222'},700);
					 }

				 }
				 prev_id = clickId;
                });
		
		
		$("#dim").css("height", 917);

    		$("#enter").bind('click',function(){
    			$("#dim").fadeIn();
    			return false;
			});
    		
    		$(".close").bind('click',function(){
    			$("#dim").fadeOut();
    			return false;
			});
			
		$('#find').bind('click',function(){

			if (cur_date =="undef") 
			{
			alert("Сначала выберите дату.");
			return 0;
			}
			if (!check_time(table_select_day[3])) 
			{
			alert("Сначала выберите время.");
			return 0;
			}
			$("#answerStruct").empty(); // очищаем структуру с номерами аудиторий
				$.ajax({
						type: "POST",
						url: "search.php",
						data: ({odd_week : table_select_day[1], even_week : table_select_day[2], time_set : table_select_day[3]}),//table_select_day}), 
						beforesend: $("#answerStruct").toggleClass("loading").append("<br><br><br><br><br>loading..."),
						dataType: "json",
						success: function(data)
								{
									horrable_magic(data);
									bindAudClick();
									bindStageClick();
									bindAccordionChange();	
									bindTabsChange();
									hideAllMap();
									openAndPaintFloor(1);
								}
				})
			
			});
			
			
		hideAllMap(); // скрываем карты всех этажей
		$("#answerStruct").empty(); // очищаем структуру с номерами аудиторий


		//check day in days_table from current date
		
		cur_head = $.datepick.formatDate('DD, dd/mm/yyyy' , $.datepick.today());
		var today = new Date();
		var j = today.getDay(); 
		if (j==0) {j=7;}
		var min = today.getMinutes();
		var hour = today.getHours();
		var id_time = get_id_time(hour, min);

		table_select_day[3][id_time]=true; //в эту пару по времени показать	
		 $("#"+id_time).animate({'opacity':'1.0','margin-right':'0px','background-color':'#ff7518'},700);
		
		var year = today.getFullYear();
		var first_date = new Date("January 1, " + year);
		var first_day = first_date.getDay();
		var sub = today.getTime() - first_date.getTime();
		var number_of_weeks = sub/1000/60/60/24/7;
		
		number_of_weeks = Math.floor(number_of_weeks);
		var i = ch_nch(number_of_weeks); // в i - нечетная(1) четная(2) неделя

		table_select_day[i][j]=true;		
		$('#calendar').datepick('setDate',$.datepick.today());
		$.ajax({
						type: "POST",
						url: "search.php",
						data: ({odd_week : table_select_day[1], even_week : table_select_day[2], time_set : table_select_day[3]}),//table_select_day}),
						beforesend: $("#answerStruct").toggleClass("loading").append("<br><br><br><br><br>loading..."),
						dataType: "json",
						success: function(data)
								{
									horrable_magic(data);
									bindAudClick();
									bindStageClick();
									bindAccordionChange();
									bindTabsChange();
									hideAllMap();
									openAndPaintFloor(1);
								}
				})
	});