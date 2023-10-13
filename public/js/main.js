const scrollButton = document.getElementById('scrollButton');

window.addEventListener('scroll',function(){
    // const scrollPosition = window.scrollY;
    // console.log('Scroll Position:', scrollPosition);
    if (window.scrollY >= 700) {
        // If yes, show the button
        scrollButton.classList.remove('hidden');
    } else {
        // If not, hide the button
        scrollButton.classList.add('hidden');
    }
})
scrollButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Add smooth scrolling behavior
    });
});