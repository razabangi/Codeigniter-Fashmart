<!DOCTYPE html>
<html lang="en">
<head>
<style>
	body
	{
		background-image: url('/assets/admin/img/work.jpg');
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		overflow: hidden;
	}
	.container
	{
	    padding-top: 20px;
	    margin-top: 20px;
	    text-align: center;
	    width: 100%;
	    height: 500px;
	    box-shadow: 0px 0px 3px lightgrey;
	}

    h1{ color: #32bd30; font-family: arial; font-size: 20px; }
    p{ color: grey; font-family: arial; font-size: 16px; }
  </style>
</head>
<body>

<div class="container">
  <h1>Reset Password</h1>
  <p>To reset your password, complete this form:</p>
  <a href="<?php echo site_url('password/reset/' . $token); ?>"><?php echo site_url('password/reset/' . $token); ?></a>  
</div>

</body>
</html>