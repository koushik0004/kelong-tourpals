<style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
<link href="<?php echo $this->webroot;?>css/uploadfilemulti.css" rel="stylesheet">
<script src="<?php echo $this->webroot;?>js/jquery-1.8.0.min.js"></script>
<script src="<?php echo $this->webroot;?>js/jquery.fileuploadmulti.min.js"></script>
<div id="mulitplefileuploader">Upload</div>

<div id="status"></div>
<script>

$(document).ready(function()
{

var settings = {
	url: "<?php echo $this->webroot;?>Hotels/upload",
	method: "POST",
	allowedTypes:"jpg,png,gif,doc,pdf,zip",
	fileName: "myfile",
	multiple: true,
	onSuccess:function(files,data,xhr)
	{
		$("#status").html("<font color='green'>Upload is success</font>");
		
	},
    afterUploadAll:function()
    {
        alert("all images uploaded!!");
    },
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
$("#mulitplefileuploader").uploadFile(settings);

});
</script>