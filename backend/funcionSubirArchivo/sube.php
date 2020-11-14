<?php
$nombre = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

if (!file_exists('backend/files')) {
	mkdir('backend/files', 0777, true);
	if (file_exists('backend/files')) {
		if (move_uploaded_file($guardado, 'backend/files/' . $nombre)) {
			echo 'Archivo guardado con exito';
			header("Location: ?archivo=$nombre");
			die();
		} else {
			echo 'Archivo no se pudo guardar';
		}
	}
} else {
	if (move_uploaded_file($guardado, 'backend/files/' . $nombre)) {
		echo 'Archivo guardado con exito';
		header("Location: ?archivo=$nombre");
		die();
	} else {
		echo 'Archivo no se pudo guardar';
	}
}
