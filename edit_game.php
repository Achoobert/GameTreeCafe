<!-- We don't need a full layout in this file because this page will be parsed with Ajax. 

This page will containt the form and the php->sql code for edit/update, add, and hiding games
Unnecciary code will be rmove as this will be embeded in edit.php
-->

<?php
   #include("config.php");
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
	#echo ('opening the edit game page');
		#$viewid = $_GET['viewid'];

 ?>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"
 src="http://malsup.github.com/jquery.form.js"
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
				document.getElementById("feedback").innerHTML = (data);
                console.log(data);
            },
            error: function(data){
                console.log("error");
				document.getElementById("feedback").innerHTML = (data);
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
function loadFrame() {
//?viewid=".($myarray['id'])."&submit=GO' 
	var view = document.input.newview.value;
	var appurl = `view_game.php?viewid="${view}"&submit=GO`;
	document.getElementById("app").src = appurl;
}
function addGame(garr) {
	console.log(garr);
	console.log("adding");
	$.post("add.php",{gArray: garr},function(data,status){document.getElementById("feedback").innerHTML = (data);});   
}
function hideGame() {
	console.log("hide");
	var xhr = new XMLHttpRequest();
	var appurl = '';
	var id = document.input.newview.value;
	var vis = document.visinput.visible.value;
	console.log(id ," ", vis);
	appurl = appurl.concat("sql.php?edit=3&id=", id ,"&vis=", vis ,"&submit=GO");
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
    } else {
        x.style.display = "none";
		preview.style.display = "none";
    }
} 
</script>




  
<div class="pages">
    <div  class="page">
        <div class="page-content">
		
            <div class="content-block">
			 <button onclick="fa()">Add Game</button>
			 <button onclick="fe()">Edit Game</button>
			 <button onclick="fh()">Hide Game</button>
			</div>

			
			<div id="preview" style="display:none">
				<iframe id="app" src="" width="270" height="150"></iframe>
				<form name="input">
					<INPUT type="text" name="newview">
				</form>
				<button type="button" onclick="loadFrame()">preview By ID</button>
			</div>
			
			
		<div id="add" >    
			<!--  new item form area-->
			<p>Here is where new games can be added to the database!</p>		
		</div>

		<div id="edit" style="display:none">	
			<!--  edit item form area
			1: see 'find game to edit: input it
			2: Previewed in iframe, and form is made from that id, from database
			3: user edits form, submits	
			-->
			<p>Here is where games can be edited in the database!</p>
				
		</div>
	
		<div id="form" >
			<form name="photo" id="imageUploadForm" enctype="multipart/form-data" action="" method="post">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<!--<input type="submit" name="upload" value="Upload img" />-->
			</form>
			<form name="newinput" action="" onsubmit="return addGame(this);">
				Game name: <input type="text" name="gname"><br>
				Ideal Player Number:
				<select name="pnum">
					<?php for ($x = 1; $x <= 12; $x++) {echo "<option value='$x'>$x</option>";} ?>
				</select>
				Minimum:
				<select name="pnummin">
					<?php for ($x = 1; $x <= 12; $x++) {echo "<option value='$x'>$x</option>";} ?>
				</select>
				Maximum:
				<select name="pnummax">
				  <?php for ($x = 1; $x <= 12; $x++) {echo "<option value='$x'>$x</option>";} ?>
				</select>
				<br>
				Mechanics:<select name="mech1">	
				<?php 
				   $sql = "SELECT * FROM mechanics"; #is string
				   $result = mysqli_query($db,$sql); #is query on sql, runs when called
				   #echo mysqli_num_rows($result);
				   if( mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
							$myarray = $row;
							#        <option value='                   '>                      </option>
							echo ( "<option value=' ". $myarray['id'] ."'>".$myarray['mech']."</option>"); #

						}   
					}
				?>
				</select>
				<select name="mech2">	
				<?php 
				   $sql = "SELECT * FROM mechanics"; #is string
				   $result = mysqli_query($db,$sql); #is query on sql, runs when called
				   #echo mysqli_num_rows($result);
				   if( mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
							$myarray = $row;
							#        <option value='                   '>                      </option>
							echo ( "<option value=' ". $myarray['id'] ."'>".$myarray['mech']."</option>"); #

						}   
					}
				?>
				</select>
				<br>
				Genre:<select name="genre1">	
				<?php 
				   $sql = "SELECT * FROM genera"; #is string
				   
				   $result = mysqli_query($db,$sql); #is query on sql, runs when called
				   #echo mysqli_num_rows($result);
				   if( mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
							$myarray = $row;
							#        <option value='                   '>                      </option>
							echo ( "<option value=' ". $myarray['id'] ."'>".$myarray['genera']."</option>"); #

						}   
					}
					else{
					   echo 'no values :( ';
					}
				?>
				</select>
				<select name="genre2">	
				<?php 
				   $sql = "SELECT * FROM genera"; #is string
				   
				   $result = mysqli_query($db,$sql); #is query on sql, runs when called
				   #echo mysqli_num_rows($result);
				   if( mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
							$myarray = $row;
							#        <option value='                   '>                      </option>
							echo ( "<option value=' ". $myarray['id'] ."'>".$myarray['genera']."</option>"); #

						}   
					}
					else{
					   echo 'no values :( ';
					}
				?>
				</select>
				<br>
			Playtime:<select name="ptime">	
				<?php 
				   $sql = "SELECT * FROM time"; #is string
				   
				   $result = mysqli_query($db,$sql); #is query on sql, runs when called
				   #echo mysqli_num_rows($result);
				   if( mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
							$myarray = $row;
							#        <option value='                   '>                      </option>
							echo ( "<option value=' ". $myarray['id'] ."'>".$myarray['trange']."</option>"); #

						}   
					}
					else{
					   echo 'no values :( ';
					}
				?>
				</select>
				<br>
				Short game Description: <input type="text" name="des">
				<br>
				<input type="button" name="submitnew" onclick="addGame(
				[newinput.gname.value, 
				document.getElementById('fileToUpload').value,
				
				newinput.genre1.value,
				newinput.genre2.value,
				newinput.mech1.value,
				newinput.mech2.value,
				newinput.pnum.value,
				newinput.pnummin.value,
				newinput.pnummax.value,
				
				newinput.ptime.value,
				newinput.ptime.value,
				
				newinput.des.value] )" value="GO">
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
			
			
		<div id="feedback" ></div><!--did it work?-->
		<?php
// if the form has been submitted it echos the local variables to the screen

if (isset($_POST['submitnew'])) {
	echo ("<p>This is the just processed game</p>
	<p>gamename: $gname</p>
	<p>player num: $pnum</p>
	<p>mechanic: $mech</p>
	<p>genre: $genre</p>
	<p>visible?: $vis</p>");
} 
?>
            </div>
        </div>
    </div>
</div>