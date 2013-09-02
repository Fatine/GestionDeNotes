<?php
/**
* views/excel_upload_form.php : vue téléchargement d'un fichier excel
* @author Fatine Nakkoubi
*/
?>
<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>
