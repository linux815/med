<?php 
	    {
	    	header('Location: index.php?c=find&w='.$_GET['c'].'&q='.$_POST['find_text'].'&f='.$_POST['field']);
	    	die();
	    }