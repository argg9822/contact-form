export default class Bola {

    constructor(x, y, velocidad){
        this.x = x;
        this.y = y;
        this.radio = 2;
        this.dx = (Math.random() * 2) - 1;
        this.dy = (Math.random() * 2) - 1;
        this.velocidad = velocidad;
    }

    dibujar(ctx){
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radio, 0, Math.PI*2);
        ctx.fill();
        ctx.closePath();
        ctx.fillStyle = "rgb(0, 83, 172)";
    }

    mover(canvas) {    
        this.x += this.dx * this.velocidad;
        this.y += this.dy * this.velocidad;

        // Evitar que las bolas salgan del canvas
        if (this.x + this.radio > canvas.width) {
            this.x = canvas.width - this.radio;
            this.dx *= -1;
        }
        if (this.x - this.radio < 0) {
            this.x = this.radio;
            this.dx *= -1;
        }
        if (this.y + this.radio > canvas.height) {
            this.y = canvas.height - this.radio;
            this.dy *= -1;
        }
        if (this.y - this.radio < 0) {
            this.y = this.radio;
            this.dy *= -1;
        }
    }
}