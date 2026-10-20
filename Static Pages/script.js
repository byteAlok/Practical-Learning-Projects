// Navbar Scroll Effect
window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
        navbar.classList.add('shadow-sm');
    } else {
        navbar.classList.remove('scrolled');
        navbar.classList.remove('shadow-sm');
    }
});

// Add to Cart Functionality
const cartButtons = document.querySelectorAll('.add-to-cart');
const cartBadge = document.querySelector('.badge');
let cartCount = 0;

cartButtons.forEach(button => {
    button.addEventListener('click', function () {
        cartCount++;
        cartBadge.innerText = cartCount;

        // Optional: Animation or Toast
        button.innerHTML = '<i class="bi bi-check-lg"></i>';
        setTimeout(() => {
            button.innerHTML = '<i class="bi bi-cart-plus"></i>';
        }, 1500);

        // Create a simple toast notification
        showToast('Product added to cart!');
    });
});

function showToast(message) {
    // Check if toast container exists
    let toastContainer = document.querySelector('.toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
        document.body.appendChild(toastContainer);
    }

    const toastId = 'toast-' + Date.now();
    const toastHtml = `
        <div id="${toastId}" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;

    toastContainer.innerHTML += toastHtml; // Append new toast

    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement);
    toast.show();

    // Cleanup DOM after hidden
    toastElement.addEventListener('hidden.bs.toast', function () {
        toastElement.remove();
    });
}
