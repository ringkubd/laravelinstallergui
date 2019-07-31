<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configuration File List | {{env("APP_NAME")}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset("vendor/autoinstall/bootstrap-3.3.7/css/bootstrap.min.css")}}">
</head>
<body>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body well">
            <ol class="list-group">
                @forelse($filelist as $filename => $filelink)
                    <li><a href="{{url("confige_file",$filename)}}">{{$filename}}</a></li>
                @empty
                @endforelse
            </ol>
        </div>
    </div>
</div>

<script src="{{asset("vendor/autoinstall/bootstrap-3.3.7/js/bootstrap.min.js")}}"></script>
</body>
</html>
