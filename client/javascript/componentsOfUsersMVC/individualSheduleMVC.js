
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
	
}