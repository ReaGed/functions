/**
* Upload images from _POST request
* 
 *param Type [post name image] [Required]
 *param Type [ID picture] [optional]
 *param Type [path to save the image] [optional]
 *param Type [extension under which the stored image] [optional]
 *return True [if no errors]
*/

/**
Example of use:
$UPL_INFO = upload_img('img_name' , $id , 'upl_images', 'jpg');
if(!$UPL_INFO)exit($UPL_INFO);
*/


function upload_img($IMG, $ID = false, $PATH = 'images', $EXT = 'png'){
	if(!isset($_FILES["{$IMG}"])){return false;}
	
	if($ID){
		$_PATH = $_SERVER['DOCUMENT_ROOT'] . "/{$PATH}/{$ID}{$EXT}";
	}else{
		$_PATH = $_SERVER['DOCUMENT_ROOT'] . "/{$PATH}/{$IMG}{$EXT}";
	}
	
	if(!is_writable($_PATH)){return "The rights to the folder you've forgotten: 3";}
	
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
			return "Error loading file <b>{$IMG}</b>";
		}
	}
}
