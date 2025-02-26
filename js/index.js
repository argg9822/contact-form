import Animation from './Animation.js';

function fadeOutAlerts(){
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        alert.style.transition = 'opacity, 0.5s';
        alert.style.opacity = '0';
        alert.style.transform = 'translateX(-100%)';
    });
}

function handleAnimationBackground(){
    const canvas = document.getElementById('canvas-bg');
    canvas.width = innerWidth;
    canvas.height = innerHeight;
    
    const bolas = [];
    const screenWidth = window.innerWidth;
    let numBolas = screenWidth <= 768 ? 20 : 70;
    let velocidad = screenWidth <= 768 ? 0.5 : 1;
    
    for (let i = 0; i < numBolas; i++) {
        const initX = Math.random() * canvas.width;
        const initY = Math.random() * canvas.height;
        bolas.push(new Animation(initX, initY, velocidad));
    }

    const animar = () => {
        const ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        bolas.forEach(bola=> {
            bola.dibujar(ctx);
            bola.mover(canvas);
    
            bolas.forEach(bola2=> {
                let dx = bola2.x - bola.x;
                let dy = bola2.y - bola.y;
                let dt = Math.sqrt(dx**2 + dy**2)
    
                if(dt <130){
                    ctx.beginPath();
                    ctx.moveTo(bola.x, bola.y);
                    ctx.lineTo(bola2.x, bola2.y);
                    ctx.lineWidth = 0.1;
                    ctx.strokeStyle = "rgb(255, 255, 255, 0.3)";
                    ctx.stroke();
                    ctx.closePath();
                }
            });
        })
        requestAnimationFrame(animar);
    }

    animar();
}

handleAnimationBackground();

setTimeout(() => {
    fadeOutAlerts();
}, 3000);