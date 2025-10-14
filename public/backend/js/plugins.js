document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector("[toast-list]")) {
        const toastScript = document.createElement('script');
        toastScript.src = "https://cdn.jsdelivr.net/npm/toastify-js";
        document.head.appendChild(toastScript);
    }

    if (document.querySelector("[data-choices]")) {
        const choicesScript = document.createElement('script');
        choicesScript.src = "libs/choices.js/public/scripts/choices.min.js";
        document.head.appendChild(choicesScript);
    }

    if (document.querySelector("[data-provider]")) {
        const flatpickrScript = document.createElement('script');
        flatpickrScript.src = "backend/libs/flatpickr/flatpickr.min.js";
        document.head.appendChild(flatpickrScript);
    }
});
