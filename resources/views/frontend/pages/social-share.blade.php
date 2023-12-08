<html>
<head>
    <title>social share page</title>
</head>
<body>
<h2>Social Share Links</h2>
<ul>
    @foreach($shareData as $key => $s_data)
    <li>
        <a href="{{$s_data}}" target="_blank">{{$key}}</a>
    </li>
    @endforeach
</ul>
</body>
</html>
