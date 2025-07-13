document.addEventListener("DOMContentLoaded", function () {
    // Imposta un cookie di test
    document.cookie = "test_cookie=enabled; path=/";

    // Controlla se il cookie è stato salvato
    const cookiesEnabled = document.cookie.indexOf("test_cookie=enabled") !== -1;

    if (!cookiesEnabled) {
        // Mostra il banner se i cookie sono disabilitati
        const warning = document.getElementById("cookie-disabled-warning");
        if (warning) {
            warning.style.display = "block";
        }
    } else {
        // Elimina il cookie di test
        document.cookie = "test_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
});
