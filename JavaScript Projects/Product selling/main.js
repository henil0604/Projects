console.log("Welcome to product selling Web")

function btn(){
	var ptr = document.getElementById('ptrInput').value;
	var qty = parseInt(document.getElementById('qtyInput').value);
	var nett = parseInt(document.getElementById('nettInput').value);
	var sch = parseInt(document.getElementById('scheemInput').value);
	var scheem = (sch*qty)/(100)
	var result = document.getElementById('result');
	var a = (ptr*qty);
	var b = (qty)+(scheem)*(nett)
	var c = (ptr*qty)-(nett)*(qty+scheem);
	var mainresult = result.innerHTML = (c);
{
	var ptrget = localStorage.setItem('ptr', JSON.parse(ptr))
	var qtyget = localStorage.setItem('qty', JSON.parse(qty))
	var nettget = localStorage.setItem('nett', JSON.parse(nett))
	var schget = localStorage.setItem('sch', JSON.parse(sch))
	var proget = localStorage.setItem('profit', JSON.parse(c))
}
}

function btn1(){
	print()
}

function btn2(){
{
	var ptr = document.getElementById('ptrInput').value;
	var qty = parseInt(document.getElementById('qtyInput').value);
	var nett = parseInt(document.getElementById('nettInput').value);
	var sch = parseInt(document.getElementById('scheemInput').value);
	var scheem = (sch*qty)/(100)
	var result = document.getElementById('result');
	var a = (ptr*qty);
	var b = (qty)+(scheem)*(nett)
	var c = (ptr*qty)-(nett)*(qty+scheem);
	var mainresult = result.innerHTML = (c);
}
{
	var ptrM = document.getElementById('ptrInput');
	var qtyM = document.getElementById('qtyInput');
	var nettM = document.getElementById('nettInput');
	var schM = document.getElementById('scheemInput');
	var proM = document.getElementById('result');
}


var ptrG = localStorage.getItem('ptr')
ptrM.value = ptrG
var qtyG = localStorage.getItem('qty')
qtyM.value = qtyG
var nettG = localStorage.getItem('nett')
nettM.value = nettG
var schG = localStorage.getItem('sch')
schM.value = schG
var proG = localStorage.getItem('profit')
proM.value = proG

btn()

}