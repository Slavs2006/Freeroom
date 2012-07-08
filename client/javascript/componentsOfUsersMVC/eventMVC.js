
function ControllerOfEvent () {

	//constructor:
	this.modelOfEvent = new ModelOfEvent();
	this.viewOfEvent = new ViewOfEvent();
}


function ModelOfEvent () {
	//1. getEvent = function of AJAX (date, pare, aud). return HTML of event at selected day+pare
	this.getEvent = function (_date, _pare, _aud, _status) {
		var htmlOfEvent = '';
		$.ajax({
			url: "server/mainSwitchScript.php",
			type: "POST",
			data: ({command : 'getEvent', date : _date, pare : _pare, aud : _aud, status : _status}),
			dataType: "html",
			success: function (data) {
				htmlOfEvent = data;
			}	
		});
		return htmlOfEvent;
	}
	
	//constructor:
	
}

function ViewOfEvent () {
	
	//constructor:
	
}