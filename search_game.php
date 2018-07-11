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
			<div id="showopt">
			 <button onclick="searchOptions()">Show Options</button>
			 <button type="button" onclick="loadAll()">Browse all</button>
			</div>
			
            <p>	
		<div id="options" style="display:none">    
			<form name="searchinput">
<!--			
				<label for="gname">Game Name:</label>
					<input type="text" name="gname" value="" id="gname">	
-->					

				<b>Complexity</b>:<br>
				<?php 
				   $sql = "SELECT * FROM com"; #is string
				   
				   $result = mysqli_query($db,$sql); #is query on sql, runs when called
				   #echo mysqli_num_rows($result);
				   if( mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
							$myarray = $row;
							#<input type="radio" name="gender" value="female"> Female<br>
							echo ( "<input type='radio' name='complex' value='".$myarray['id']."'>". $myarray['value']."<br>");
						}   
					}
					else{
					   echo 'no values :( ';
					}
				?>
				<b>Play Time</b>:<br>
				<?php 
				   $sql = "SELECT * FROM time"; #is string
				   
				   $result = mysqli_query($db,$sql); #is query on sql, runs when called
				   #echo mysqli_num_rows($result);
				   if( mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
							$myarray = $row;
							#<input type="radio" name="gender" value="female"> Female<br>
							echo ( "<input type='radio' name='ptime' value='".$myarray['id']."'>". $myarray['trange']."<br>");
						}   
					}
					else{
					   echo 'no values :( ';
					}
				?>
				</select>
				Players:
				  <input type="number" name="pnum" step="1" max='12' min='1'>
				  
			</form>	
			<button type="button" onclick="loadSearch()">Apply Filter</button>			
		</div>
		</p>

			<!--<button type="button" onclick="loadAll()">Browse all</button>-->
			
				</div></p>


				<p id="demo">
				
				</div>
				
            </div>
        </div>
    </div>
</div>
