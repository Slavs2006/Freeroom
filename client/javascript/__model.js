function modelOfMaps () {
	this.currentFreeAuds; 
	//0. constructor = getFreeAuds()
	//1. service functions of selecting floor
	//2. getFreeAuds = function of AJAX (date, pare). return new currentFreeAuds
}

function modelOfCalendarAndTime () {
	//1.
}

function modelOfIndividualShedule () {
	//0. constructor = getIndividualShedule() + getEvent()
	//1. getIndividualShedule = function of AJAX (aud, week1, week2). return individual shedule of selected aud.
	//2. getEvent = function of AJAX (date, pare, aud). return HTML of event at selected day+pare
	//3. showOrder = function (...pre-set of parametrs to fill order's field ...). fill field of orderMenuWindow
	//4. checkOrderParametrs = function (). validate paametrs of order. (? AJAX to check on server complicated parametrs, or only client checker ?)
	//5. makeOrder = function of AJAX (...full set of order's parametrs...). send to server the order pack . return status: 
					// if OK -> order added in stack -> also return HTML from server and call modelOfUserRequests.addNewRequest()
					// else say some attention message "Your request is suck. try again.."
	//6. 
}

function modelOfUserRequests () {
	//0. constructor = getAllActualRequest(date). return HTML of actual request for this user.
	//1. addNewRequest = function (htmlOfRequest). add new request to userRequestList. ? sortAllRequest() ?
	//2. ? sortAllRequest = function (). sort all request ?
	//3. 
}