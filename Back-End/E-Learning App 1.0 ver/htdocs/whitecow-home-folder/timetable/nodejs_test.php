<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.socket.io/socket.io-1.3.5.js"></script>
<script>

var socket = io.connect('https://localhost:9001');

socket.emit('call', 'hi nodejs');

socket.on('answer', function(data){
  $('#answer').text(data);
});

</script>

<div id="answer"></div>
