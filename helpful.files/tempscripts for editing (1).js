<script>

function editGame(){
console.log("editing");
var xhr = new XMLHttpRequest();


var url = 


// OPEN - type, url/file, async
xhr.open('POST', url, true); //flist.php?type=1&submit=GO
//console.log(xhr);
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			document.getElementById("demo1").innerHTML = (this.responseText);
			alert("Sucessfully edited!");
		}
	}
xhr.send();
}

function loadFood(){
console.log("food");
var xhr = new XMLHttpRequest();
// OPEN - type, url/file, async
xhr.open('GET', "flist.php?type=2&submit=GO", true); //you can just use the var
//console.log(xhr);
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			document.getElementById("demo1").innerHTML = (this.responseText);
		}
	}
xhr.send(); 
}

function orderItem(viewid){ //might be ez to just input the one int when hiding
	console.log(viewid);
	var tnum = prompt("Please Enter your table number");
	//alert("Hello! I am an alert box!!");
}

function loadSearch(){
//?viewid=".($myarray['id'])."&submit=GO' 
//console.log('in loading');
var gname = document.searchinput.gname.value;
//console.log(gname);
var mech = document.searchinput.mech.value;
//console.log(mech);
var genre = document.searchinput.genre.value;
//console.log(genre);
var ptime = document.searchinput.ptime.value;
//console.log(ptime);
var pnum = document.searchinput.pnum.value;
//console.log(pnum);
//var view = document.input.newview.value;

var appurl = `glist.php?`; //viewid="${view}"&submit=GO`;
var and = '&';
if(gname.length > 0){
	appurl = appurl.concat(`gname="` , gname, '"');
	and = '&';
}
if(genre.length > 0){
	appurl = appurl.concat(`genre="` , genre, '"');
	and = '&';
}
if(ptime.length > 0){
	appurl = appurl.concat(`ptime="` , ptime, '"');
	and = '&';
}
if(pnum.length > 0){
	appurl = appurl.concat(`pnum="` , pnum, '"');
	and = '&';
}
if(mech.length > 0){
	appurl = appurl.concat(`mech="` , mech, '"');
	and = '&';
}
		
		

console.log(appurl);
//console.log(appurl);
//create new xhr object
var xhr = new XMLHttpRequest();
// OPEN - type, url/file, async
xhr.open('GET', appurl, true); //you can just use the var 

xhr.onload = function(){
	//console.log('onload');
	if(this.status == 200){
		//console.log('status');
		document.getElementById("demo").innerHTML = (this.responseText);
	}
}
//document.getElementById("demo").innerHTML = xhr;
xhr.send();
}
function loadAll(){
	var appurl = `glist.php?`;
	console.log(appurl);
	//create new xhr object
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var 

	xhr.onload = function(){
		console.log('onload');
		if(this.status == 200){
			console.log('status');
			document.getElementById("demo").innerHTML = (this.responseText);
		}
	}
	//document.getElementById("demo").innerHTML = xhr;
	xhr.send();
}
function loadFrame() {
	//?viewid=".($myarray['id'])."&submit=GO' 
	var gname = document.input.gname.value;//no form name?
	var mech = document.input.mech.value;
	var genre = document.input.genre.value;
	var ptime = document.input.ptime.value;
	var pnum = document.input.pnum.value;

	var appurl = `glist.php?gname="${gname}"&mech="${mech}"&genre="${genre}"&ptime="${ptime}"&pnum="${pnum}"&submit=GO`;
	document.getElementById("app").src = appurl;
}
</script>