document.addEventListener("DOMContentLoaded", () => {
    const userMenu = document.getElementById("userMenu");

    // Crea un utente fisso nel localStorage se non esiste
    if (!localStorage.getItem("user")) {
        const defaultUser = {
            nome: "TestUser",
            email: "test@example.com",
            password: "password123"
        };
        localStorage.setItem("user", JSON.stringify(defaultUser));
    }

    // Se l'utente è loggato, aggiorna la navbar
    const user = JSON.parse(localStorage.getItem("user"));
    const isLoggedIn = localStorage.getItem("isLoggedIn");

    if (user && isLoggedIn === "true") {
        userMenu.innerHTML = `
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    ${user.nome}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">${user.nome}</a></li>
                    <li><a class="dropdown-item" id="logoutBtn" href="#">Logout</a></li>
                </ul>
            </div>
        `;

        document.getElementById("logoutBtn").addEventListener("click", () => {
            localStorage.removeItem("isLoggedIn");
            window.location.href = "index.html";
        });
    }

    // Precompilazione login
    const loginEmail = document.getElementById("loginEmail");
    const loginPassword = document.getElementById("loginPassword");
    if (loginEmail && loginPassword) {
        loginEmail.value = user.email;
        loginPassword.value = user.password;
    }

    // Login Utente
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const email = document.getElementById("loginEmail").value.trim();
            const password = document.getElementById("loginPassword").value.trim();
            const user = JSON.parse(localStorage.getItem("user"));

            if (!user || user.email !== email || user.password !== password) {
                alert("Credenziali errate! Usa:\nEmail: test@example.com\nPassword: password123");
                return;
            }

            localStorage.setItem("isLoggedIn", "true"); // Segna l'utente come loggato
            window.location.href = "index.html"; // Porta alla home page
        });
    }
});
