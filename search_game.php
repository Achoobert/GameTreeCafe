	<!-- We don't need a full layout in this file because this page will be parsed with Ajax. -->
 <?php
	if(!isset($db)){
		include("config.php");
	}
 ?>
	
<!-- Top Navbar-->
<div class="navbar">
    <div class="navbar-inner">
        <div class="left">
            <a href="#" class="back link">
                <i class="icon icon-back"></i>
                <span>Back</span>
            </a>
        </div>
		
        <div class="center sliding">Search Games</div>
        <div class="right">
            <a href="#" class="link icon-only open-panel"><i class="icon icon-bars"></i></a>
        </div>
    </div>
</div>




<div class="pages">
    <div data-page="search" class="page">
        <div class="page-content">
            <div class="content-block">
            <p>Filter Options:</p>
			
            <p>	
			<form name="searchinput">
<!--			
				<label for="gname">Game Name:</label>
					<input type="text" name="gname" value="" id="gname">	
-->					
				Complexity:<select name="complex">
					  <label for="name">complex:</label>
					  <option value=''>-Any-</option>
					  <?php 
				   $sql = "SELECT * FROM com"; #is string
				   
				   $result = mysqli_query($db,$sql); #is query on sql, runs when called
				   #echo mysqli_num_rows($result);
				   if( mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
							$myarray = $row;
							#        <option value='                   '>                      </option>
							echo ( "<option value=' ". $myarray['id'] ."'>".$myarray['value']."</option>"); #
						}   
					}
					else{
					   echo 'no values :( ';
					}
				?>
				</select>
				<!--
				Genre:<select name="genre">	
				<option value=''>-Any-</option>
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
				-->
				Play Time:<select name="ptime">
				<option value=''>-Any-</option>				
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
				Players:<select name="pnum">
				<option value=''>-Any-</option>				
				<?php 
				
				$pn = 1;
				while($pn < 12) { #MYSQLI_USE_RESULT	
					#        <option value='                   '>                      </option>
					echo ( "<option value=' ". $pn ."'>".$pn."</option>"); #
					$pn = $pn+1;
				}   
			
				?>
				<option value='12'>12+</option>	
				</select>
			</form>
			</p>	

			<button type="button" onclick="loadAll()">Browse all</button>
			<button type="button" onclick="loadSearch()">Apply Filter</button>
			<body onload="loadAll()">
				</div></p>


				<p id="demo">
				
				</div>
				
            </div>
        </div>
    </div>
</div>
