function upload_img($IMG, $ID = false, $PATH = 'images', $EXT = 'png'){
	if(!isset($_FILES["{$IMG}"])){return false;}
	
	if($ID){
		$_PATH = $_SERVER['DOCUMENT_ROOT'] . "/{$PATH}/{$ID}{$EXT}";
	}else{
		$_PATH = $_SERVER['DOCUMENT_ROOT'] . "/{$PATH}/{$IMG}{$EXT}";
	}
	
	if(!is_writable($_PATH)){return "Права на папку ты забыл :3";}
	
	$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
	if (in_array(end(explode(".", $_FILES["{$IMG}"]["name"])), $allowedExts)) {
		if(is_uploaded_file($_FILES["{$IMG}"]["tmp_name"])){
			if($ID){
				move_uploaded_file($_FILES["{$IMG}"]["tmp_name"], $_PATH);
			}else{
				move_uploaded_file($_FILES["{$IMG}"]["tmp_name"], $_PATH);
			}
			return true;
		} else {
			return "Ошибка загрузки файла <b>{$IMG}</b>";
		}
	}
}