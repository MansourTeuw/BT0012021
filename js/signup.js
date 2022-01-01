//   signup 

// Get the modal

const toggleModal = () => {
    let lienModal = document.getElementById("modal");

    lienModal.style.display = "block";

    window.onclick = function(event) {
        if (event.target === lienModal) {
            lienModal.style.display = "none";
        }
    }
}

function closeToggle() {
    let lienModal = document.getElementById("modal");

    lienModal.style.display = 'none';

    window.onclick = function() {
        location.href = "index.php";
    }
}

