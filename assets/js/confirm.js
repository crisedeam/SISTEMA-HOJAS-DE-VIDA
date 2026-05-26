class ConfirmDialog {
    constructor(options = {}) {
        this.title = options.title || "Confirmar acción";
        this.message = options.message || "¿Estás seguro?";
        this.confirmText = options.confirmText || "Aceptar";
        this.cancelText = options.cancelText || "Cancelar";
    }

    show(onConfirm, onCancel) {
        // Crear overlay
        const overlay = document.createElement("div");
        overlay.classList.add("confirm-overlay");

        // Crear caja del diálogo
        const dialog = document.createElement("div");
        dialog.classList.add("confirm-dialog");

        dialog.innerHTML = `
            <h3>${this.title}</h3>
            <p>${this.message}</p>
            <div class="buttons">
                <button class="btn-confirm">${this.confirmText}</button>
                <button class="btn-cancel">${this.cancelText}</button>
            </div>
        `;

        overlay.appendChild(dialog);
        document.body.appendChild(overlay);

        // Eventos
        dialog.querySelector(".btn-confirm").addEventListener("click", () => {
            document.body.removeChild(overlay);
            if (onConfirm) onConfirm();
        });

        dialog.querySelector(".btn-cancel").addEventListener("click", () => {
            document.body.removeChild(overlay);
            if (onCancel) onCancel();
        });
    }
}