import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// --- Theme toggle ---
(function () {
    const storageKey = "theme"; // 'dark' | 'light'
    const getSystemPref = () =>
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light";

    const applyTheme = (theme) => {
        const root = document.documentElement; // <html>
        if (theme === "dark") root.classList.add("dark");
        else root.classList.remove("dark");

        // Swap icons
        const sun = document.getElementById("icon-sun");
        const moon = document.getElementById("icon-moon");
        if (sun && moon) {
            if (theme === "dark") {
                sun.classList.remove("hidden");
                moon.classList.add("hidden");
            } else {
                moon.classList.remove("hidden");
                sun.classList.add("hidden");
            }
        }
    };

    // Initialize on page load (before paint if possible)
    let saved = localStorage.getItem(storageKey);
    if (saved !== "dark" && saved !== "light") saved = getSystemPref();
    applyTheme(saved);

    // Click handler
    window.addEventListener("DOMContentLoaded", () => {
        const btn = document.getElementById("theme-toggle");
        if (!btn) return;
        btn.addEventListener("click", () => {
            const current = document.documentElement.classList.contains("dark")
                ? "dark"
                : "light";
            const next = current === "dark" ? "light" : "dark";
            localStorage.setItem(storageKey, next);
            applyTheme(next);
        });
    });

    // React to system changes if user hasn't explicitly chosen
    try {
        const mql = window.matchMedia("(prefers-color-scheme: dark)");
        mql.addEventListener?.("change", (e) => {
            const explicit = localStorage.getItem(storageKey);
            if (explicit === "dark" || explicit === "light") return; // user chose; don't override
            applyTheme(e.matches ? "dark" : "light");
        });
    } catch {}
})();
