function fadeOutAlerts(){
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        alert.style.transition = 'opacity, 0.5s';
        alert.style.opacity = '0';
        alert.style.transform = 'translateX(-100%)';
    });
}

setTimeout(() => {
    fadeOutAlerts();
}, 3000);