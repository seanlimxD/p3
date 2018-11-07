<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>

    <link href='/css/diagnosis.css' rel='stylesheet'>
</head>
<body>
    <h1> Formal Diagnosis Machine </h1>
    
    <section>
    	@yield('content')
    </section>
</body>
</html>