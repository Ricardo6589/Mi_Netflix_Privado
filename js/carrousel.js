window.onload = function(e) {
    const carousel = document.querySelector('#carousel-items');
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

    const carousel2 = document.querySelector('#top_5-contain');
    let isDragging = false;
    let currentX;
    let initialX;
    let xOffset = 0;

    carousel2.addEventListener('mousedown', (e) => {
        initialX = e.clientX - xOffset;
        isDragging = true;
    });
    carousel2.addEventListener('mouseup', () => {
        isDragging = false;
    });
    carousel2.addEventListener('mousemove', (e) => {
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
            carousel2.style.transform = `translateX(${currentX}px)`;
        }
    });
}