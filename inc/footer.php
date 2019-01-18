    <!-- <div class="container-fluid cyan darken-3">
      <div class="row">
				<div class="col s12 m12 l12">
					Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam necessitatibus reiciendis animi repellat quo numquam, alias, perspiciatis, aspernatur obcaecati sed porro nemo ducimus assumenda quae blanditiis id tempore iure deserunt.
				</div>
			</div>
    </div> -->
    <!-- <script src="js/autocomplete.js"></script> -->
    <script>
			function autoload(){
				var xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
     			document.getElementById("mega-search").innerHTML = this.responseText;
    		}
  		};
			xhttp.open("GET", "aj_search.php?", true);
			xhttp.send();        
			}
    </script>
		<script src="js/cleave.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script> -->
    <script src="js/pace-master/pace.js"></script>
    <script src="js/num-spinner/jquery.nice-number.js"></script>
    <script src="js/main.js"></script>
</body>
</html>