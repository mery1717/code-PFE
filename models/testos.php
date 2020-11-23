<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_POST['ajouterSerie'])) {
      ?><script>
      	alert('testos');
      alert($_POST['numeroDeSerie']);</script>
      <?php
    }
    else{
    	 ?><script>alert('test failed');</script>
      <?php
    }
}
else{// test REQUEST_METHOD failed 
?><script>
      	alert('testos2');
      alert(' REQUEST_METHOD failed ');</script>
      <?php
}
?>