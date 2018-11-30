<?php
function mostrarAlerta($tipo, $vertical="top", $horizontal="center") {
	switch ($tipo) {
		case 'danger':
			$icone = "error";
			break;
		
		default:
			$icone = "notifications";
			break;
	}

    if(isset($_SESSION[$tipo])) : ?>
       <script>
		$(document).ready(
			gemini.showNotification(
				'<?php echo $_SESSION["$tipo"]?>', 
				'<?php echo $tipo?>', 
				'<?php echo $vertical?>',
				'<?php echo $horizontal?>', 
				'<?php echo $icone?>'
			)
		);
		</script>
<?php
        unset($_SESSION[$tipo]);
    endif;
}
