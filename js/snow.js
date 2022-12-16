var canvas = document.getElementById("canvas");
var resize = function () {
    canvas.width = document.body.clientWidth;
    canvas.height = document.body.clientHeight;
};
window.addEventListener("resize", resize);
resize();
var context = canvas.getContext("2d");
var stars = [];
var speed = 8;
var numStars = 42;
var v = function () { return Math.random() * speed - speed / 2; };
/**
 * Adapted from: https://slicker.me/javascript/starfield.htm
 */
function animate() {
    var w = canvas.width, h = canvas.height;
    var color;
    var r;
    if (stars.length < numStars && Math.random() < 0.5) {
        stars.push({ x: 0, y: 0, vx: v(), vy: v() });
    }
    context.clearRect(0, 0, w, h);
    for (var i = 0; i < stars.length; i++) {
        var _a = stars[i], x = _a.x, y = _a.y, vx = _a.vx, vy = _a.vy;
        stars[i].x = x = x + vx;
        stars[i].y = y = y + vy;
        if (x > w / 2 || x < 0 - w / 2) {
            stars[i].x = x = 0;
            stars[i].y = y = 0;
        }
        color = Math.floor(30 + (Math.abs(x) + Math.abs(y)) / 2);
        r = Math.abs(y / 100 + i / 200);
        context.fillStyle = "rgb(".concat(color, ", ").concat(color, ", ").concat(color, ")");
        context.beginPath();
        context.arc(w / 2 + x, h / 2 + y, r, 0, 2 * Math.PI);
        context.fill();
    }
    window.requestAnimationFrame(animate);
}
window.requestAnimationFrame(animate);