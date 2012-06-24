function ControllerOfMaps () {
	//1. bind of all auds on map
	//2. bind of floor selector
	//3. 
	this.modelOfMaps = new ModelOfMaps();
	this.viewOfMaps = new ViewOfMaps();
}

function ModelOfMaps () {
	this.currentFreeAuds; 
	//0. constructor = getFreeAuds()
	//1. service functions of selecting floor
	//2. getFreeAuds = function of AJAX (date, pare). return new currentFreeAuds
}

function ViewOfMaps () {
	//0. constructor = paintAllMaps()
	//1. paintAllMaps = function (model.currentFreeAuds). paint all maps with current set of free auds
	//2. 
}

