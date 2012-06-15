function controllerOfMaps () {
	//1. bind of all auds on map
	//2. bind of floor selector
	//3. 
	this.modelOfMaps = new modelOfMaps();
	this.viewOfMaps = new viewOfMaps();
}

function controllerOfCalendarAndTime () {
	//1. bind of change date
	//2. bind of change pare
	//3. 
	this.modelOfCalendarAndTime = new modelOfCalendarAndTime();
}

function controllerOfIndividualShedule () {
	//1. bind of all day-cells(change down prepod and pare info by AJAX request)
	//2. bind NEXT
	//3. bind PREV
	//4. bind SHOW_ORDER
	//5. bind MAKE_ORDER
	//6. ? bind CLOSE ?
	//7. 
	this.modelOfIndividualShedule = new modelOfIndividualShedule();
}

function controllerOfUserRequests () {
	//1. COMET -> which one?
	//2. 
	this.modelOfUserRequests = new modelOfUserRequests();
}

function mainControllerForUser () {
	this.controllerOfMaps = new controllerOfMaps();
	this.controllerOfCalendarAndTime = new controllerOfCalendarAndTime();
	this.controllerOfIndividualShedule = new controllerOfIndividualShedule();
	this.controllerOfUserRequests = new controllerOfUserRequests();
	//
}

function mainControllerForGuest () {
	this.controllerOfMaps = new controllerOfMaps();
	this.controllerOfCalendarAndTime = new controllerOfCalendarAndTime();
	//
}

function mainControllerForAdmin () {
	//
}


