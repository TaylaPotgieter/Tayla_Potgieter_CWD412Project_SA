document.addEventListener("DOMContentLoaded", function () {
    // Smooth scroll to anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            // Scroll smoothly to the target anchor
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Highlight active section in the navigation
    window.addEventListener('scroll', function () {
        // Get all sections and navigation links
        var sections = document.querySelectorAll('section');
        var navLinks = document.querySelectorAll('nav a');

        // Check each section's visibility
        sections.forEach(function (section, index) {
            var rect = section.getBoundingClientRect();
            var isInView = (
                rect.top >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
            );

            // If the section is in view, highlight the corresponding navigation link
            if (isInView) {
                navLinks.forEach(function (link) {
                    link.classList.remove('active');
                });
                navLinks[index].classList.add('active');
            }
        });
    });
});
