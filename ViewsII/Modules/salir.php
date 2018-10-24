
<section class="salir">	
    <script>
    	alert("¡Muchas gracias por tu visita, aun puedes seguir revisando nuestro contenido!")
    </script>
</section>


<?php

session_start();
session_destroy();

header('Location: ../../index.php?action=index')

?>