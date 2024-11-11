document.addEventListener('DOMContentLoaded', (event) => {
    const submitBtn = document.getElementById('submitBtn');

    submitBtn.addEventListener('mouseover', () => {
        submitBtn.style.transform = 'scale(1.1)';
    });

    submitBtn.addEventListener('mouseout', () => {
        submitBtn.style.transform = 'scale(1)';
    });

    const labels = document.querySelectorAll('label');
    labels.forEach((label) => {
        label.style.opacity = '0';
        setTimeout(() => {
            label.style.opacity = '1';
            label.style.transition = 'opacity 1s ease-in-out';
        }, 500);
    });
});
