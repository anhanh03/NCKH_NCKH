<div id="chat-widget">Chat</div>

<div id="chat-container">
    <div id="close-button">X</div>
    <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/274285a7-1150-45d0-87cb-47470a1d6e19">dfs
</iframe>
</div>

<script>
    // Lấy các phần tử từ DOM
    var chatWidget = document.getElementById('chat-widget');
    var chatContainer = document.getElementById('chat-container');
    var closeButton = document.getElementById('close-button');

    // Sự kiện khi click vào nút chat-widget
    chatWidget.addEventListener('click', function() {
        chatContainer.style.display = 'block';
    });

    // Sự kiện khi click vào nút đóng
    closeButton.addEventListener('click', function() {
        chatContainer.style.display = 'none';
    });
</script>