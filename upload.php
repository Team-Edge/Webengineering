<?php 
	session_start();
	$datumaktuell = date("d.m.Y.H.i.s");
	$dateiname_neu = md5($datumaktuell);  
	
	if (!empty($_FILES))
	{
		echo "<pre>\r\n";
		echo htmlspecialchars(print_r($_FILES,1));
		echo "</pre>\r\n";
	}
	if (isset($_FILES[$fileupload]['error']))
    { 
        if ($_FILES[$fileupload]['error'] === UPLOAD_ERR_OK)
        {
            file_process($_FILES[$fileupload]);   ### Verarbeitungsfunktion erstellen wir im Folgenden
        }
        ### Namensangabe als Array ### 
        elseif (is_array($_FILES[$fileupload]['error']))
        {
            foreach($_FILES[$fileupload]['error'] as $key => $error)
            {
                if ($error === UPLOAD_ERR_OK)
                {
                    $_filerec = array();
                    $_filerec['name'] = $_FILES[$fileupload]['name'][$key];
                    $_filerec['type'] = $_FILES[$fileupload]['type'][$key];
                    $_filerec['tmp_name'] = $_FILES[$fileupload]['tmp_name'][$key];
                    $_filerec['error'] = $_FILES[$fileupload]['error'][$key];
                    $_filerec['size'] = $_FILES[$fileupload]['size'][$key];
 
                    file_process($_filerec);
                }
            } 
        }
        else
        {
            ### Fehlerbearbeitung, oder
            return false;
        }
    }
	else {
		$_imagesize = getimagesize($_FILES['dateiupload']['tmp_name'], $_imageinfo);
		$type = get_img_file_ext($_imagesize[2]);
		if($type){
			move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' .$dateiname_neu.$type);
		}
	}

	include("../../zugriffWE.php");
	if ($mysqli->connect_error) {
		$message['error'] = 'Datenbankverbindung fehlgeschlagen: ' . $mysqli->connect_error;
	}
	$stmt=$mysqli->prepare("INSERT INTO Bilder (Benutzer_ID, Image_URL) VALUES(?,?)");
	$stmt->bind_param('is',$user,$adresse);
	$adresse=$dateiname_neu;
	$user=strip_tags($_SESSION['user']['ID']);
	$stmt->execute();
	$mysqli->close();
	
	
	function get_img_file_ext($imagetype)
	{
		if($imagetype === false) return false;
	 
		$_types[IMAGETYPE_GIF]     = 'gif';
		$_types[IMAGETYPE_JPEG]    = 'jpg';
		$_types[IMAGETYPE_PNG]     = 'png';
		$_types[IMAGETYPE_SWF]     = 'swf';
		$_types[IMAGETYPE_PSD]     = 'psd';
		$_types[IMAGETYPE_BMP]     = 'bmp';
		$_types[IMAGETYPE_TIFF_II] = 'tif';
		$_types[IMAGETYPE_TIFF_MM] = 'tif';
		$_types[IMAGETYPE_JPC]     = 'jpc';
		$_types[IMAGETYPE_JP2]     = 'jp2';
		$_types[IMAGETYPE_JPX]     = 'jpx';
		$_types[IMAGETYPE_JB2]     = 'jb2';
		$_types[IMAGETYPE_SWC]     = 'swc';
		$_types[IMAGETYPE_IFF]     = 'iff';
		$_types[IMAGETYPE_WBMP]    = 'wbmp';
		$_types[IMAGETYPE_JPEG2000] = 'jpg';
		$_types[IMAGETYPE_XBM]     = 'xbm';
	 
		if (isset($_types[$imagetype])) return $_types[$imagetype];
	 
		return false;
	}
?>