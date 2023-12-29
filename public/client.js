function CustomerService() {}

CustomerService.prototype.init = function () {
    this.initDom();
    this.initWebSocket();
};

CustomerService.prototype.initDom = function () {
    const container = this.container = document.createElement('div');
    container.style.cssText = 'position: fixed; bottom: 0; right: 100px;';
};

CustomerService.prototype.initWebSocket = function () {
    // 创建 WebSocket 连接
    const socket = new WebSocket("ws://127.0.0.1:7272");

    // 连接成功时的回调函数
    socket.onopen = function () {
        console.log("WebSocket 连接已建立");

        // 发送消息到服务器
        socket.send("Hello, Server!");
    };

    // 接收到服务器发送的消息时的回调函数
    socket.onmessage = function (event) {
        const message = event.data;
        console.log("接收到服务器消息:", message);
    };

    // 连接关闭时的回调函数
    socket.onclose = function () {
        console.log("WebSocket 连接已关闭");
    };

    // 发生错误时的回调函数
    socket.onerror = function (error) {
        console.error("WebSocket 错误:", error);
    };
};
