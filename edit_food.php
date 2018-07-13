<!-- We don't need a full layout in this file because this page will be parsed with Ajax. 

This page will containt the form and the php->sql code for edit/update, add, and hiding games
Unnecciary code will be rmove as this will be embeded in edit.php
-->

<?php
	include("config.php");//this gives USER NON-EDIT priveledges 
// Start the session
//session_start();
$_SESSION["lan"] = "en";
$_SESSION["username"] = "";
$_SESSION["gid"] = 2;
#echo "Session variables are set.";
#echo var_dump($_SESSION["lan"]);

	
	
	//checking if form has been submitted and converting to local variables

		#$gname = $_POST['gname'];
		#$pnum = $_POST['pnum'];
		#$mech = $_POST['mech'];
		#$genre = $_POST['genre'];
		#$vis = $_POST['vis'];
	$viewid = (isset($_POST['viewid']) ? $_POST['viewid'] : '');
	$gname = (isset($_POST['gname']) ? $_POST['gname'] : '');
	$genre = (isset($_POST['genre']) ? $_POST['genre'] : '');		
	$ptime = (isset($_POST['ptime']) ? $_POST['ptime'] : '');
	$pnum = (isset($_POST['pnum']) ? $_POST['pnum'] : '');
	$mech = (isset($_POST['mech']) ? $_POST['mech'] : '');
	$vis = (isset($_POST['vis']) ? $_POST['vis'] : '');
?>
    <link rel="stylesheet" href="lib/framework7/css/framework7.ios.min.css">
    <link rel="stylesheet" href="lib/framework7/css/framework7.ios.colors.min.css">

    <link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery.js"></script> 
    <script src="js/jquery.form.js"></script> 
	<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<div class="navbar">
    <div class="navbar-inner">
        <div class="left">
            <a href="edit.php" class="back link">
                <i class="icon icon-back"></i>
                <span>Back</span>
            </a>
        </div>
		
        <div class="center sliding">.</div>
        <div class="right">
            <a href="#" class="link icon-only open-panel"><i class="icon icon-bars"></i></a>
        </div>
    </div>
</div>
	
	
	
<script>

//~~~~~~~~~~~~start of photo uploader~~~~~~~~~~~~
$(document).ready(function (e) {
	console.log("ready");
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'upload.php',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
				document.getElementById("imgurl").innerHTML = (data);
				//document.getElementById('imgurl').innerHTML = (arr[3]);
				document.getElementById("feedback").innerHTML = (data);
                console.log(data);
            },
            error: function(data){
                console.log("error");
				document.getElementById("feedback").innerHTML = (data);
				document.getElementById('imgurl').innerHTML = (data);
                console.log(data);
            }
        });
    }));

    $("#fileToUpload").on("change", function() {
		console.log("imgbrowse change");
		console.log(document.getElementById('fileToUpload').value);//.value
		//console.log(document.input.fileToUpload.name);
        $("#imageUploadForm").submit();
    });
});
//~~~~~~~~~~~~end of photo uploader~~~~~~~~~~~~



//form submitting funciton
function loadFrame() {//load preview
//?viewid=".($myarray['id'])."&submit=GO' 
	var view = document.input.newview.value;
	var appurl = `search_name.php?type='food'&name="${view}"&submit=GO`;
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); 
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//should return a single number -- 2
			var id = xhr.responseText;
			console.log(id);
			var appurl = `view_food.php?viewid="${id}"&submit=GO`;
			document.getElementById("app").src = appurl;
			document.getElementById("storeid").innerHTML = id;
		}else{
		var appurl = `view_food.php?viewid=0&submit=GO`;
		document.getElementById("app").src = appurl;	
		}		
	}
	xhr.send();
	//once we have the id

}
function editFrame() {
//?viewid=".($myarray['id'])."&submit=GO' 
	var itemarr = [];
	var arr;//	storeid
	//document.getElementById("myP").innerHTML;
	var id = document.getElementById("storeid").innerHTML;

	//http://localhost/fooddata.php?viewid=%2211%22&submit=GO
	var appurl = `fooddata.php?viewid="${id}"&submit=GO`;
	//document.getElementById("app").src = appurl;
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); 
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//2,75,Leo Beer,/img/f/leo.png,1,
			//var test = xhr.responseText;
			//console.log(test);
			arr = xhr.responseText.split(',');
			console.log(arr);
			document.getElementById('name').value = (arr[2]);
			document.getElementById('type').value = (arr[4]);
			document.getElementById('bhat').value = (arr[1]);
			document.getElementById('imageUploadForm').value = (arr[3]);
			document.getElementById('imgurl').innerHTML = (arr[3]);
			console.log(document.getElementById('imageUploadForm').value);
			document.getElementById('storeid').value = (arr[0]);
		}
	}
	xhr.send();
	
}
function addItem(garr) {
	console.log(garr);
	console.log("adding");
	$.post("addfood.php",{gArray: garr},function(data,status){document.getElementById("feedback").innerHTML = (data);});   
}
function updateItem(garr) {
	console.log(garr);
	console.log("adding");
	$.post("addfood.php",{gArray: garr},function(data,status){document.getElementById("feedback").innerHTML = (data);});   
}
function hideGame() {
	console.log("hide");
	var xhr = new XMLHttpRequest();
	var appurl = '';
	var id = document.input.newview.value;
	var vis = document.visinput.visible.value;
	console.log(id ," ", vis);
	appurl = appurl.concat("sql.admin.php?foodedit=3&id=", id ,"&vis=", vis ,"&submit=GO");
	console.log(appurl);	
	var appurl = 
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var
	//console.log(xhr);
		xhr.onload = function(){
			//console.log('onload');
			if(this.status == 200){
				//console.log('status');
				document.getElementById("feedback").innerHTML = (this.responseText);
			}
		}
	xhr.send(); 
	
}
function clearhistory(){
	console.log("delete");
	var xhr = new XMLHttpRequest();
	var appurl = '';
	var id = document.input.newview.value;
	var vis = document.visinput.visible.value;
	console.log(id ," ", vis);
	appurl = appurl.concat("sql.admin.php?foodedit=3&id=", id ,"&vis=", vis ,"&submit=GO");
	console.log(appurl);	
	var appurl = 
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var
	//console.log(xhr);
		xhr.onload = function(){
			//console.log('onload');
			if(this.status == 200){
				//console.log('status');
				document.getElementById("feedback").innerHTML = (this.responseText);
			}
		}
	xhr.send(); 
	
}

 function fa() {
    var x = document.getElementById("add");
    if (x.style.display === "none") {
		preview.style.display = "none";
        x.style.display = "block";
        form.style.display = "block";
		edit.style.display = "none";
		hide.style.display = "none";
		receipt.style.display = "none";
    } else {
        x.style.display = "none";
		form.style.display = "none";
    }
}
function fe() {
	
    var x = document.getElementById("edit");
    if (x.style.display === "none") {
		preview.style.display = "block";
        x.style.display = "block";
		form.style.display = "block";
		add.style.display = "none";
		hide.style.display = "none";
		receipt.style.display = "none";
    } else {
        x.style.display = "none";
		preview.style.display = "none";
		form.style.display = "none";
    }
}
function fh() {	
    var x = document.getElementById("hide");
    if (x.style.display === "none") {
		preview.style.display = "block";
        x.style.display = "block";
		form.style.display = "none";
		edit.style.display = "none";
		add.style.display = "none";
		receipt.style.display = "none";
    } else {
        x.style.display = "none";
		preview.style.display = "none";
    }
}
function fr() {	
    var x = document.getElementById("receipt");
    if (x.style.display === "none") {
		preview.style.display = "none";
		form.style.display = "none";
        x.style.display = "block";
		form.style.display = "none";
		edit.style.display = "none";
		add.style.display = "none";
		hide.style.display = "none";
		
		
    } else {
        x.style.display = "none";
		preview.style.display = "none";
    }
}  

  function tabClose(uname){
	console.log("user", uname);
	//var tnum = prompt("Please Enter your table number");
	var appurl = '';
	appurl = appurl.concat("sql.admin.php?foodedit=4&uname=", uname ,"&submit=GO");
	console.log(appurl);
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var 

	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			alert(this.responseText);
			//document.getElementById("feedback").innerHTML = (this.responseText);
		}
	}
	//document.getElementById("demo").innerHTML = xhr;
	xhr.send();
}	


</script>





  
<div class="pages">
    <div  class="page">
        <div class="page-content">
            <div class="content-block">
			 <button onclick="fa()">Add Food</button>
			 <button onclick="fe()">Edit Food</button>
			 <button onclick="fh()">Hide Food</button>
			 <button onclick="fr()">Open Tabs</button>
			</div>

			
			<div id="preview" style="display:none">
			
				<iframe id="app" src="" width="270" height="150"></iframe><div id="storeid"></div>
				<form name="input">
					<INPUT type="text" name="newview" id="newview">
					<button type="button" onclick="loadFrame()">Search</button>
				</form>
				
			</div>
			
			
		<div id="add" style="display:none">    
			<!--  new item form area-->
			<p>Here is where new games can be added to the database!</p>		
		</div>
		

		<div id="edit" style="display:none">	
			<!--  edit item form area
			1: see 'find game to edit: input it
			2: Previewed in iframe, and form is made from that id, from database
			3: user edits form, submits	
			-->
			<p>Here is where Food can be added to the menu!</p>
			<button type="button" onclick="editFrame()">Edit Item</button>	
		</div>
	
		<div id="form" style="display:none">
			<form name="photo" id="imageUploadForm" enctype="multipart/form-data" action="" method="post">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<!--<input type="submit" name="upload" value="Upload img" />-->
			</form>
			<div id="imgurl" ></div>
			<form name="newinput" action="" onsubmit="return addGame(this);">
				Food name: <input type="text" name="name" id="name"><br>
				Bhat: <input type="number" name="bhat" id="bhat" step=".01" max='999' min='.01'><br>
				Type:   <select name="type" id="type">	
					<option value=1>Drink</option>");
					<option value=2>Meal</option>");
					<option value=3>Snack</option>");
				</select><br>
				Short Description: <input type="text" name="des" id="des">
				<br>
				<input type="button" name="submitnew" onclick="addItem(
				[
				document.getElementById('imgurl').innerHTML,
				newinput.name.value,
				newinput.bhat.value,
				newinput.type.value,
				newinput.des.value, ''] )" value="Save as New Item">
				<!--document.getElementById('fileToUpload').value-->
				<input type="button" name="submitchange" onclick="updateItem(
				[
				document.getElementById('imgurl').innerHTML,
				newinput.name.value,
				newinput.bhat.value,
				newinput.type.value,
				newinput.des.value,
				document.getElementById('storeid').value
				] )" value="Update Menue Item">
			</form>	
		</div>

		<div id="hide" style="display:none">
				<!-- Don't want to allow deletion of games, if they are hidden from customers it should be sufficient. Changing a 'hidden' var to allow public visilibity-->
				<h2>Here is where games can be hidden!</h2>

				<!-- UPDATE `game_data` where  'id' = game id (`public`) VALUE ('0');-->
				<p>Find the game you want to hide in the preview pane <br>Then, confirm change below</p>

				<form name="visinput">
					<input type="radio" name="visible" value="1"> Visible<br>
					<input type="radio" name="visible" value="0"> Hide 
				</form>				
				<button type="hideGame" onclick="hideGame()">Submit Change</button> <!-- type="hideGame" onclick="hideGame()-->
			</div>
		<div id="receipt" > 
<div>		
			<!--  new item form area-->
			<p>Open Tabs</p><div>
			<?php
			#iterate through active tables
			#then, iterate through relivant orders in each table
			$itemsql = "SELECT DISTINCT `item` FROM `orders` WHERE `visible` = 0 ORDER BY `item`"; #get active AND visible user
			$usersql = "SELECT DISTINCT `uname` FROM `orders` WHERE `visible` = 0 ORDER BY `item`"; #get active AND visible user
			$itemresult = mysqli_query($db,$itemsql); 
			$userresult = mysqli_query($db,$usersql); 
			$usertotal = 0;
			$soldtotal = 0;
			$grosstotal = 0;

			if(mysqli_num_rows($userresult)>0){# If 
				while($urow = mysqli_fetch_array($userresult, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
					#in here, make box field for active table
					$uname = $urow['uname'];
					//$title = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `food` WHERE id =".$inum_i));
					echo ("<div style='display: inline-block; float: left;'><fieldset ><legend><h3>".$uname."</h3></legend>"); // 
					
					#Give the non-canceled items
					$reportsql = "SELECT * FROM `orders` WHERE `visible` = 0 AND `cancel` = 0 AND `uname` = '".$uname."' ORDER BY `cancel`, `item`"; #
					$result = mysqli_query($db,$reportsql); #runs when called
					$sold = 0;
					$gross = 0;
					$itemval = 0;
					$item = '';
					$itemnum = -1;
					$newbox = 1;
					
					#go through Bobbie's orders
					if(mysqli_num_rows($result)>0){
						#select COUNT(*) FROM orders WHERE  `item` = 1 <iterate this> AND `tnum` = $tnum_i
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #
							$myarr = $row;
							if($myarr['item'] == $itemnum){//iterate count
								//echo('second item');
								$sold = $sold+1;//
								$gross = $gross + $itemval;
							} else if ($itemnum == -1){ // the first item
								$itemnum = $myarr['item'];
								//echo('1st item ');
								//set new
								$r = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `food` WHERE id =".$myarr['item']));
								$sold++;
								$itemval = $r['bhat'];
								$gross = $gross + $itemval;
								$item = $r['fname'];
								
							}else if($myarr['item'] != $itemnum){//a second item
								//echo ('new item');
								//echo (' '.$myarr['item'] .' '. $itemnum.' ');
								//print old
								echo ( $sold .' '.$item." : ". $itemval." bhat<br>");
								$newbox = 0;
								//set new
								$itemnum = $myarr['item'];
								$r = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `food` WHERE id =".$myarr['item']));
								$sold++;
								$itemval = $r['bhat'];
								$gross = $gross + $itemval;
								$item = $r['fname'];
							}
						}   
					//if($newbox){
						//echo ('last item');
					echo ( $sold .' '.$item." : ". $itemval." bhat<br>"); 
					//}
					}
					echo (" Tab: ". $gross);
					$sold =0;
					$gross = 0;
					$itemnum = -1;
					$newbox = 1;
					//echo ($uname);
					echo ("<br><button type='button' onclick='tabClose(\"". $uname ."\")'>Close Tab</button>  ");
					
					echo ( "</fieldset> </div>"); #tdivs close
				}
				echo ("</div><p><b></p></b>");//
			}else{
			   echo 'There are no current Orders....';
			}
			?>
		</div>	
	</div>	
<div id="feedback" ></div><!--did it work?-->
<?php	
if (isset($_POST['submitnew'])) {
	echo ("<p>This is the just processed game</p>
	<p>gamename: $gname</p>
	<p>visible?: $vis</p>");
} 
?>
            </div>
        <!--did it work?-->
		</div>
    </div>
</div>
