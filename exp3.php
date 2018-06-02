<!DOCTYPE html>
<?php include("config.php");  ?>
<html>
<body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
<script>

//$_FILES["fileToUpload"]

$(document).ready(function (e) {
	//console.log("ready");
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
                //console.log("success");
				//document.getElementById("feedback").innerHTML = (this.responseText);
				document.getElementById("feedback").innerHTML = (data);
                //console.log(data);
            },
            error: function(data){
                console.log("error");
				document.getElementById("feedback").innerHTML = (data);
                //console.log(data);
            }
        });
    }));

    $("#fileToUpload").on("change", function() {
		console.log("imgbrowse change");
        $("#imageUploadForm").submit();
    });
});

function addGame(garr) {
	console.log(garr);
	console.log("adding");
	$.post("update.php",{gArray: garr},function(data,status){document.getElementById("feedback").innerHTML = (data);});   
}

</script>




			


	<div id="edit" >	
		<!--  edit item form area
		1: see 'find game to edit: input it
		2: Previewed in iframe, and form is made from that id, from database
		3: user edits form, submits	
		-->
		<p>Here is where games can be edited in the database!</p>
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
				
	
<div id="feedback" ></div>



</body>
</html>