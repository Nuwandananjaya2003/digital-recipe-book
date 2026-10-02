// JavaScript Features: Event Handling, Form Validation, DOM manipulation

document.addEventListener("DOMContentLoaded", function() {
    
    // 1. Form Validation for Contact and Registration Forms
    const forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // 2. Smooth Scrolling to top button (Event Handling & DOM manipulation)
    let mybutton = document.getElementById("scrollToTopBtn");
    
    if(mybutton) {
        window.onscroll = function() { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        mybutton.addEventListener("click", function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });
    }

    // 3. Dynamic Content Update - Filter Recipes in Dashboard
    const searchInput = document.getElementById('recipeSearch');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            let filter = searchInput.value.toLowerCase();
            let cards = document.querySelectorAll('.recipe-card');
            
            cards.forEach(card => {
                let title = card.querySelector('.card-title').textContent.toLowerCase();
                if (title.indexOf(filter) > -1) {
                    card.parentElement.style.display = "";
                } else {
                    card.parentElement.style.display = "none";
                }
            });
        });
    }
});
