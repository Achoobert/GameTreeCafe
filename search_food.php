	<!-- We don't need a full layout in this file because this page will be parsed with Ajax. -->
 <?php
	if(!isset($db)){
		include("config.php");
	}
 ?>
<script> 
	// wait for the DOM to be loaded 
//$(document).ready(function() { 
	// bind 'myForm' and provide a simple callback function 
	//$('#myForm').ajaxForm(function() { alert("Thank you for your comment!"); 
	//XMLHttpRequest("GET", "sql.php", true);  = a variable}); 
//}); 
//document.getElementById('button').addEventListener('click', loadText);
	


	
</script>	
<!-- Top Navbar-->
<div class="navbar">
    <div class="navbar-inner">
        <div class="left">
            <a href="#" class="back link">
                <i class="icon icon-back"></i>
                <span>Back</span>
            </a>
        </div>
		
        <div class="center sliding">Browse Food</div>
        <div class="right">
            <a href="#" class="link icon-only open-panel"><i class="icon icon-bars"></i></a>
        </div>
    </div>
</div>




<div class="pages">
    <div data-page="search" class="page">
        <div class="page-content">
            <div class="content-block">
            <p>
			<button type="button" onclick="loadDrink()">Drinks</button>
			<button type="button" onclick="loadFood()">Food</button>
			</div></p>


				<p id="demo1">   </div>
				
            </div>
        </div>
    </div>
</div>
