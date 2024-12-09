// Dark Mode Toggle Functionality
document.addEventListener("DOMContentLoaded", function () {
    const darkModeToggle = document.getElementById("darkModeToggle");

    if (darkModeToggle) {
        const savedMode = localStorage.getItem("darkMode");
        if (savedMode === "enabled") {
            document.body.classList.add("dark-mode");
            darkModeToggle.classList.add("dark-mode");
        } else {
            document.body.classList.remove("dark-mode");
            darkModeToggle.classList.remove("dark-mode");
            darkModeToggle.textContent = "Dark Mode";
        }

        darkModeToggle.addEventListener("click", () => {
            const isDarkMode = document.body.classList.contains("dark-mode");

            if (isDarkMode) {
                document.body.classList.remove("dark-mode");
                darkModeToggle.classList.remove("dark-mode");
                darkModeToggle.textContent = "Dark Mode";
                localStorage.setItem("darkMode", "disabled");
            } else {
                document.body.classList.add("dark-mode");
                darkModeToggle.classList.add("dark-mode");
                darkModeToggle.textContent = "Light Mode";
                localStorage.setItem("darkMode", "enabled");
            }
        });
    }
});

// Toggle Text Style Function
function toggleTextStyle() {
    const targetText = document.querySelectorAll('.section-paragraph');
    const button = document.getElementById("toggle-style-button");
    
    if (button.innerHTML === "Change Text Style") {
        targetText.forEach((element) => {
            element.style.fontWeight = "500";
            element.style.fontStyle = "italic";
            const Mode = localStorage.getItem("darkMode");
            element.style.color = Mode === "enabled" ? "blue" : "black";
        });
        button.innerHTML = "Reset Text Style";
    } else {
        targetText.forEach((element) => {
            element.style.fontWeight = "";
            element.style.fontStyle = "";
            element.style.color = "";
        });
        button.innerHTML = "Change Text Style";
    }
}

// Form Validation Logic
function validateForm(event) {
    event.preventDefault();

    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const message = document.getElementById("message");

    const nameError = document.getElementById("name-error");
    const emailError = document.getElementById("email-error");
    const phoneError = document.getElementById("phone-error");
    const messageError = document.getElementById("message-error");
    const successMessage = document.getElementById("success-message");

    nameError.innerHTML = "";
    emailError.innerHTML = "";
    phoneError.innerHTML = "";
    messageError.innerHTML = "";
    successMessage.innerHTML = "";

    let isValid = true;

    if (name.value.trim() === "") {
        nameError.innerHTML = "* Name is required.";
        isValid = false;
    }

    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailPattern.test(email.value)) {
        emailError.innerHTML = "* Please enter a valid email.";
        isValid = false;
    }

    const phonePattern = /^\d+$/;
    if (!phonePattern.test(phone.value)) {
        phoneError.innerHTML = "* Phone number must contain only digits.";
        isValid = false;
    }

    if (message.value.trim() === "") {
        messageError.innerHTML = "* Message cannot be empty.";
        isValid = false;
    }

    if (isValid) {
        successMessage.innerHTML = "Message sent successfully!";
        successMessage.classList.add("visible");

        setTimeout(function() {
            successMessage.classList.remove("visible");
        }, 3000);

        document.getElementById("contact-form").reset();
    }

    return false;
}

// Initial list of products and services
let products = [
    { 
        title: "Woman Sculpture", 
        description: "Elegantly draped figure in shawl, capturing feminine grace with lifelike, flowing detail.",
        price: "$199.00", 
        image: "assets/images/product-1.jpg" 
    },
    { 
        title: "Veiled Lady Sculpture", 
        description: "A veiled lady with delicate features and intricate design, adding mystery to any space.", 
        price: "$149.00", 
        image: "assets/images/product-2.jpg" 
    },
    { 
        title: "Hand Sculpture", 
        description: "A realistic hand sculpture embodying craftsmanship, perfect as a unique art centerpiece.", 
        price: "$99.00", 
        image: "assets/images/product-3.jpg" 
    }
];

let services = [
    { 
        title: "Basic Sculpting Course", 
        description: "Perfect for beginners, this course introduces the fundamentals of sculpting. Participants will learn how to shape, carve, and model clay into creative designs, focusing on foundational techniques like hand-building, forming basic structures, and understanding tools and materials.", 
        duration: "3 weeks", 
        image: "assets/images/course-2.jpg" 
    },
    { 
        title: "Advanced Sculpting Course", 
        description: "This course is designed for individuals with prior sculpting experience looking to enhance their skills. Participants will explore advanced techniques such as complex molding, creating textures, and working with mixed media. The curriculum emphasizes creative expression and refinement, guiding students to design detailed sculptures.", 
        duration: "5 weeks", 
        image: "assets/images/course-1.jpg" 
    }
];

// Open and close modal functions
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'flex';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Function to preview image
function previewImage(inputId, imgPreviewId) {
    const file = document.getElementById(inputId).files[0];
    const imgPreview = document.getElementById(imgPreviewId);
    const reader = new FileReader();

    reader.onload = function(e) {
        imgPreview.src = e.target.result;
        imgPreview.style.display = 'block';
    };
    
    if (file) reader.readAsDataURL(file);
}

// Add Product with Form Data
function submitProductForm() {
    const title = document.getElementById('productTitle').value;
    const description = document.getElementById('productDescription').value;
    const price = document.getElementById('productPrice').value;
    const imageFile = document.getElementById('productImage').files[0];
    
    const reader = new FileReader();
    reader.onload = function(e) {
        const newProduct = { title, description, price, image: e.target.result };
        products.push(newProduct);
        renderProducts();
        closeModal('productModal');
    };
    
    if (imageFile) reader.readAsDataURL(imageFile);
}

// Add Service with Form Data
function submitServiceForm() {
    const title = document.getElementById('serviceTitle').value;
    const description = document.getElementById('serviceDescription').value;
    const duration = document.getElementById('serviceDuration').value;
    const imageFile = document.getElementById('serviceImage').files[0];
    
    const reader = new FileReader();
    reader.onload = function(e) {
        const newService = { title, description, duration, image: e.target.result };
        services.push(newService);
        renderServices();
        closeModal('serviceModal');
    };
    
    if (imageFile) reader.readAsDataURL(imageFile);
}

// Render functions for products and services with Details toggle button
function renderProducts() {
    const productList = document.getElementById("productList");
    if (!productList) return;

    productList.innerHTML = ""; 
    products.forEach((product, index) => {
        const li = document.createElement("li");
        li.classList.add("product-card");
        li.innerHTML = `
            <img src="${product.image}" alt="${product.title}">
            <div class="product-info">
                <h3>${product.title}</h3>
                <p class="short-description">${truncateText(product.description)}</p>
                <p class="full-description hidden">${product.description}</p>
                <p class="price">${product.price}</p>
                <button class="product-button btn-width">Add to Cart</button>
                <button class="product-button btn-width" onclick="toggleDetails(this)">Show Details</button>
            </div>
        `;
        productList.appendChild(li);
    });
}

function renderServices() {
    const serviceList = document.getElementById("serviceList");
    if (!serviceList) return;

    serviceList.innerHTML = ""; 
    services.forEach((service, index) => {
        const li = document.createElement("li");
        li.classList.add("service-card");
        li.innerHTML = `
            <img src="${service.image}" alt="${service.title}">
            <div class="service-info">
                <h4>${service.title}</h4>
                <p class="short-description">${truncateText(service.description)}</p>
                <p class="full-description hidden">${service.description}</p>
                <div class="service-details">
                        <p>Duration: ${service.duration}</p>
                        <button class="btn-width">Get Enroll</button>
                </div>
                <button class="toggle-button product-button btn-width" onclick="toggleDetails(this)">Show Details</button>
            </div>
        `;
        serviceList.appendChild(li);
    });
}

// Toggle Details Function
function toggleDetails(button) {
    const productInfo = button.parentElement;
    const shortDescription = productInfo.querySelector(".short-description");
    const fullDescription = productInfo.querySelector(".full-description");

    if (fullDescription.classList.contains("hidden")) {
        shortDescription.classList.add("hidden");
        fullDescription.classList.remove("hidden");
        button.textContent = "Hide Details";
    } else {
        shortDescription.classList.remove("hidden");
        fullDescription.classList.add("hidden");
        button.textContent = "Show Details";
    }
}

function truncateText(text) {
    return text.length > 50 ? text.slice(0, 45) + "..." : text;
}

function removeLastProduct() {
    products.pop();
    renderProducts();
}

function removeLastService() {
    services.pop();
    renderServices();
}

// renderProducts();
// renderServices();
