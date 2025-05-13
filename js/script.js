/**
 * 3-Letter Words Dictionary - Main JavaScript
 * Provides interactive functionality for the website
 */

document.addEventListener('DOMContentLoaded', function() {
    // Handle position tabs (First Letter, Second Letter, Third Letter)
    const positionTabs = document.querySelectorAll('.tab-btn');
    if (positionTabs.length > 0) {
        positionTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Get the position from the clicked tab
                const position = this.getAttribute('data-position');

                // Update the hidden position input
                const positionInput = document.getElementById('selected-position');
                if (positionInput) {
                    positionInput.value = position;
                }

                // Update active tab style
                positionTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Reset letter selection to A by default when changing position
                const letterInput = document.getElementById('selected-letter');
                if (letterInput) {
                    letterInput.value = 'A';
                }

                // Submit the form to reload the page with the new position
                const letterForm = document.getElementById('letter-filter-form');
                if (letterForm) {
                    letterForm.submit();
                }
            });
        });
    }

    // Handle letter filter buttons
    const letterButtons = document.querySelectorAll('.letter-btn:not(.disabled)');
    if (letterButtons.length > 0) {
        letterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Get the selected letter
                const letter = this.getAttribute('data-letter');

                // Update the hidden letter input
                const letterInput = document.getElementById('selected-letter');
                if (letterInput) {
                    letterInput.value = letter;
                }

                // Update active letter button style
                letterButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Update URL with the selected position and letter
                const positionInput = document.getElementById('selected-position');
                if (positionInput) {
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.set('position', positionInput.value);
                    currentUrl.searchParams.set('letter', letter);
                    window.history.pushState({}, '', currentUrl);
                }

                // Submit the form to reload the page with the selected filters
                const letterForm = document.getElementById('letter-filter-form');
                if (letterForm) {
                    letterForm.submit();
                }
            });
        });
    }

    // Word hover effect (highlight same letters)
    const wordItems = document.querySelectorAll('.word-item');
    if (wordItems.length > 0) {
        wordItems.forEach(item => {
            const wordTitle = item.querySelector('.word-title');
            if (wordTitle) {
                const word = wordTitle.textContent.trim();

                item.addEventListener('mouseenter', function() {
                    wordTitle.innerHTML = highlightLetters(word);
                });

                item.addEventListener('mouseleave', function() {
                    wordTitle.textContent = word;
                });
            }
        });
    }

    // Helper function to highlight letters in a word
    function highlightLetters(word) {
        const letters = word.split('');
        return `<span class="letter-1">${letters[0]}</span><span class="letter-2">${letters[1]}</span><span class="letter-3">${letters[2]}</span>`;
    }

    // Mobile navigation toggle
    const navToggle = document.getElementById('nav-toggle');
    const mainNav = document.querySelector('.main-nav');
    if (navToggle && mainNav) {
        navToggle.addEventListener('click', function() {
            mainNav.classList.toggle('show');
        });
    }
});
