window.requestAnimFrame = (function () {
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
})();

/*
Particle.prototype.draw = function () {
    ctx.beginPath();
    ctx.arc(this.position.x, this.position.y, this.scale, 0, 2 * Math.PI, false);
    ctx.fillStyle = this.color;
    ctx.fill();
};
*/

var Particle = function (scale, color, vx, vy, gv) {
    this.scale = scale; //大きさ
    this.color = color; //色
    this.vx = vx; //X速度
    this.vy = vy; //Y速度
    this.gv = gv; //重力
    this.position = {   // 位置
        x: 0,
        y: 0
    };
};

Particle.prototype.update = function (i) {
    this.vy += this.gv;
    this.position.x += this.vx;
    this.position.y += this.vy;

    var vx_val = 0.85;
    var vy_val = 0.6;
    

    // 地面の衝突判定
    if (this.position.y > canvas.height - this.scale) {
        this.vy *= -vy_val;
        this.vx *= vx_val;
        this.position.y = canvas.height - this.scale;
    }
    // 側面（右）の衝突判定
    if (this.position.x > canvas.width - this.scale) {
        this.vy *= vy_val;
        this.vx *= -vx_val;
        this.position.x = canvas.width - this.scale;
    }
    // 側面（左）の衝突判定
    if (this.position.x < 0) {
        this.vy *= vy_val;
        this.vx *= -vx_val;
        this.position.x = -(this.position.x);
    }

    for (var ii = 0; ii < particles.length; ii++) {

        if (i != ii) {

            var other = particles[ii];
            var mine = particles[i];
            var this_scale = this.scale;
            var distance = Math.sqrt(Math.pow(mine.position.x - other.position.x, 2) + Math.pow(mine.position.y - other.position.y, 2));// ２点間の距離

            if (distance < this_scale) {

                if (mine.position.x < other.position.x) {
                    this.vy *= vy_val;
                    this.vx *= -vx_val;
                    this.position.x = mine.position.x - (this_scale - (other.position.x - mine.position.x));
                } else {
                    this.vy *= vy_val;
                    this.vx *= -vx_val;
                    this.position.x = mine.position.x + (this_scale - (mine.position.x - other.position.x));
                }
            }
        }
    }

    //this.draw();
    objmove(i, this.position.x, this.position.y);
};

$(function () {

    particles = []; //パーティクルをまとめる配列
    var density = 4;  //パーティクルの密度
    var color = '#fff';
    var scale = $('.menubox').eq(0).width();
    var canvas_width = $('#canvas_container').width();
    var start_position = (canvas_width / 2) - (scale * density);
    var x = 0;
    var y = 0;
    var g = 0;

    for (var i = 0; i < density; i++) {
        x = (Math.random() * 10) - 5;
        y = (Math.random() * 9) + 4;
        g = (Math.random() * 0.2) + 0.3;
        
        particles[i] = new Particle(scale, color, x, -y, g);
        particles[i].position.x = start_position;
        particles[i].position.y = (scale * 2);
        start_position += (scale * 2);
    }

    setTimeout(function () {
        loop();
    }, 500);
    

});

$(window).on('load', function () {

    canvas = document.querySelector('#canvas_container');
    ctx = canvas.getContext('2d');

});

// ループ処理
function loop() {
    requestAnimFrame(loop);
    // 描画をクリアー
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    for (var i in particles) {
        particles[i].update(i);
    }
}

function objmove(i, x, y) {
    $('#objbox' + i).css({ 'top': y });
    $('#objbox' + i).css({ 'left': x });
};

$(window).on('load resize', function () {

    

    //　canvasサイズ指定　リサイズ
    //canvas.width = $('#canvas_container').width();
    //canvas.height = $('#canvas_container').height();

    CanvasResizeToSame(document.getElementById('canvas_container'));

    /*
    var w = $('#obj_container').width();
    var h = $('#obj_container').height();
    $('#canvas_container').attr('width', w);
    $('#canvas_container').attr('height', h);
    */
});

// ------------------------------------------------------------
// キャンバスのサイズを等倍に補正する関数
// ------------------------------------------------------------
function CanvasResizeToSame(mycanvas) {
    var style = mycanvas.ownerDocument.defaultView.getComputedStyle(mycanvas, "");
    mycanvas.width = Math.round(parseFloat(style.width));
    mycanvas.height = Math.round(parseFloat(style.height));
}