console.log("Welcome to Tempture converter");
cel()

function cel(){
	var cInput = document.getElementById('celciusInput')
	var cInputV = parseInt(cInput.value);
	var fInput = document.getElementById('feranhitInput')
	var fInputV = fInput.value
	var ConvertC = parseInt(273);
	var CResult = (cInputV+ConvertC)
	if (cInput.value=="") {
		cInput.value = 0;
		fInput.value = 273;
	} else {
		fInput.value = CResult;
	}


}


function fer(){
	var cInput = document.getElementById('celciusInput')
	var cInputV = parseInt(cInput.value);
	var fInput = document.getElementById('feranhitInput')
	var fInputV = fInput.value;
	var ConvertC = parseInt(273);
	var FResult = (fInputV-ConvertC)

	if (fInput.value=="") {
		fInput.value = 0;
		cInput.value = 273;
	} else {
		cInput.value = FResult;
	}
}

function get(){
{
	var cInput = document.getElementById('celciusInput')
	var cInputV = parseInt(cInput.value);
	var fInput = document.getElementById('feranhitInput')
	var fInputV = fInput.value
	var ConvertC = parseInt(273);
	var CResult = (cInputV+ConvertC)
}
{
	var cInput = document.getElementById('celciusInput')
	var cInputV = parseInt(cInput.value);
	var fInput = document.getElementById('feranhitInput')
	var fInputV = fInput.value;
	var ConvertC = parseInt(273);
	var FResult = (fInputV-ConvertC)
}



}