<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>

    <link href='/css/diagnosis.css' rel='stylesheet'>
</head>
<body>
	<section>
    	@yield('content')
    </section>
</body>
</html>