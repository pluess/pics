<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script>
    $(function () {
        var socket = io('http://192.168.1.102:3000');
        $('#next-button').click(function () {
            socket.emit('pics message', 'next');
            return false;
        });
    });
</script>
<style>
    #next-button {
        background-color: #957bbe;
        border-radius: 1rem;
        color: white;
        text-align: center;
        vertical-align: middle;
        font-family: sans-serif;
        line-height: 10rem;
        font-size: 2rem;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .border {
        margin: 1rem;
    }
</style>

<body>
    <div class="border">
        <div id="next-button" class="container-fluid">
            <h1>Next</h1>
        </div>
    </div>

    @foreach ($pics as $pic)
        <p>The name of the pic is {{$pic->id}}</p>
    @endforeach 

    {{ $pics->links() }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html> 