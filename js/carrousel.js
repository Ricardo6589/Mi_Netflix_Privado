window.onload = function(e) {
    const carousel = document.querySelector('.carousel-items');
    let isDragging = false;
    let currentX;
    let initialX;
    let xOffset = 0;

    carousel.addEventListener('mousedown', (e) => {
        initialX = e.clientX - xOffset;
        isDragging = true;
    });
    carousel.addEventListener('mouseup', () => {
        isDragging = false;
    });
    carousel.addEventListener('mousemove', (e) => {
        if (isDragging) {
            e.preventDefault();
            currentX = e.clientX - initialX;
            xOffset = currentX;
            console.log(currentX)
            if (currentX > 0) {
                currentX = 0;
            }
            console.log(currentX)
            if (currentX < -850) {
                currentX = -850;
            }
            carousel.style.transform = `translateX(${currentX}px)`;
        }
    });
}