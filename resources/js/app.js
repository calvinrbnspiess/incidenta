require("./bootstrap");

require("alpinejs");

window.MAIN_VIEW = true;

const loadModals = function() {
    const modal = document.querySelector("#modal");
    const modalTriggers = document.querySelectorAll(
        "[data-type='modal-trigger']"
    );

    for (const modalTrigger of modalTriggers) {
        modalTrigger.addEventListener("click", () => {
            fetch(modalTrigger.getAttribute("data-url"), {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
                .then(res => res.text())
                .then(text => {
                    modal.innerHTML = text;

                    const cancelButton = modal.querySelector(
                        "[data-type='modal-cancel']"
                    );

                    if (cancelButton) {
                        cancelButton.addEventListener("click", () => {
                            modal.innerHTML = "";
                        });
                    }
                });
        });
    }
};

document.addEventListener("DOMContentLoaded", function() {
    loadModals();
});
