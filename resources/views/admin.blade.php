<!doctype html>
<html>

<head>
    <title>Pics Controller</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        width: 100%;
        margin: 1rem;
        background-color: #957bbe;
        border-radius: .25rem;
        color: white;
        text-align: center;
        vertical-align: middle;
        font-family: sans-serif;
        line-height: 10rem;
        font-size: 2rem;
    }
</style>

<body>
    <div id="next-button" class="container-fluid">
        <h1>Next</h1>
    </div>

    @foreach ($pics as $pic)
        <p>The name of the pic is {{$pic->id}}</p>
    @endforeach 

    {{ $pics->links() }}
</body>

</html> 