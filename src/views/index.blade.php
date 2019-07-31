<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Auto installer | {{env("APP_NAME")}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body  style="background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);">

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="card-title">Server Requirements</h2>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>Extention Name</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($requirements as $require => $status)
                        <tr>
                            <td>{{$require}}</td>
                            <td>@if($status) <i class="fa fa-thumbs-o-up" style="color: green"></i> @else <i class="fa fa-window-close" style="color: red" aria-hidden="true"></i>  @endif</td>
                        </tr>
                            @empty
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
