function ControllerOfGuest () {
	this.controllerOfMaps = new ControllerOfMaps();
	this.controllerOfCalendarAndTime = new ControllerOfCalendarAndTime();
	//this.controllerOfIndividualShedule = new ControllerOfIndividualShedule();
	//this.controllerOfEvent = new ControllerOfEvent();
	//
	this.model = new ModelOfGuest();
	this.view = new ViewOfGuest();
	
	this.activate = function () {
		this.controllerOfMaps.activate();
		this.controllerOfCalendarAndTime.activate(this.controllerOfMaps);
		//this.controllerOfIndividualShedule.activate();
		//this.controllerOfEvent.activate();
	}
}

function ModelOfGuest () {
	
}

function ViewOfGuest () {
	
}
