<!DOCTYPE html>
<html>
<head>
	<title>heloo</title>
</head>
<body>
{{auth()->guard('customer')->user()->fullname}}
<a href="{{route('ClientLogout')}}">Logout</a>
</body>
</html>