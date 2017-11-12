var el = document.getElementById('items');
var sortable = Sortable.create(el)

function showLL() {
	if (document.getElementById('llDiv').style.display == "block") {
		document.getElementById('llDiv').style.display = "none";
	} else {
		document.getElementById('llDiv').style.display = "block";
		document.getElementById('cdDiv').style.display = "none";
		document.getElementById('pcDiv').style.display = "none";
		document.getElementById('rDiv').style.display = "none";
		document.getElementById('tDiv').style.display = "none";
		document.getElementById('pnDiv').style.display = "none";
		document.getElementById('snDiv').style.display = "none";
	}
}

function showCD() {
	if (document.getElementById('cdDiv').style.display == "block") {
		document.getElementById('cdDiv').style.display = "none";
	} else {
		document.getElementById('cdDiv').style.display = "block";
		document.getElementById('llDiv').style.display = "none";
		document.getElementById('pcDiv').style.display = "none";
		document.getElementById('rDiv').style.display = "none";
		document.getElementById('tDiv').style.display = "none";
		document.getElementById('pnDiv').style.display = "none";
		document.getElementById('snDiv').style.display = "none";
	}
}

function showPC() {
	if (document.getElementById('pcDiv').style.display == "block") {
		document.getElementById('pcDiv').style.display = "none";
	} else {
		document.getElementById('pcDiv').style.display = "block";
		document.getElementById('llDiv').style.display = "none";
		document.getElementById('cdDiv').style.display = "none";
		document.getElementById('rDiv').style.display = "none";
		document.getElementById('tDiv').style.display = "none";
		document.getElementById('pnDiv').style.display = "none";
		document.getElementById('snDiv').style.display = "none";
	}
}

function showR() {
	if (document.getElementById('rDiv').style.display == "block") {
		document.getElementById('rDiv').style.display = "none";
	} else {
		document.getElementById('rDiv').style.display = "block";
		document.getElementById('llDiv').style.display = "none";
		document.getElementById('cdDiv').style.display = "none";
		document.getElementById('pcDiv').style.display = "none";
		document.getElementById('tDiv').style.display = "none";
		document.getElementById('pnDiv').style.display = "none";
		document.getElementById('snDiv').style.display = "none";
	}
}

function showT() {
	if (document.getElementById('tDiv').style.display == "block") {
		document.getElementById('tDiv').style.display = "none";
	} else {
		document.getElementById('tDiv').style.display = "block";
		document.getElementById('llDiv').style.display = "none";
		document.getElementById('cdDiv').style.display = "none";
		document.getElementById('pcDiv').style.display = "none";
		document.getElementById('rDiv').style.display = "none";
		document.getElementById('pnDiv').style.display = "none";
		document.getElementById('snDiv').style.display = "none";
	}
}

function showPN() {
	if (document.getElementById('pnDiv').style.display == "block") {
		document.getElementById('pnDiv').style.display = "none";
	} else {
		document.getElementById('pnDiv').style.display = "block";
		document.getElementById('llDiv').style.display = "none";
		document.getElementById('cdDiv').style.display = "none";
		document.getElementById('pcDiv').style.display = "none";
		document.getElementById('rDiv').style.display = "none";
		document.getElementById('tDiv').style.display = "none";
		document.getElementById('snDiv').style.display = "none";
	}
}

function showSN() {
	if (document.getElementById('snDiv').style.display == "block") {
		document.getElementById('snDiv').style.display = "none";
	} else {
		document.getElementById('snDiv').style.display = "block";
		document.getElementById('llDiv').style.display = "none";
		document.getElementById('cdDiv').style.display = "none";
		document.getElementById('pcDiv').style.display = "none";
		document.getElementById('rDiv').style.display = "none";
		document.getElementById('tDiv').style.display = "none";
		document.getElementById('pnDiv').style.display = "none";
	}
}