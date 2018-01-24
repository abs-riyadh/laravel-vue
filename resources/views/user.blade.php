<!DOCTYPE html>
<html>
<head>
	<title>Simple Vue Crud</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
<div id="app">
	<Myheader></Myheader>
		<div class="row">
			<router-view></router-view>			
		</div>
	<Myfooter></Myfooter>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>