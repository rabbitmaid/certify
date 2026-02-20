document.addEventListener("DOMContentLoaded", () => {
    const selectAllCheckBox = document.querySelector("#selectAllCheckBoxes");
    const checkBoxes = document.querySelectorAll(".selectCheckBox");

    selectAllCheckBox.addEventListener("input", (e) => {
        if (selectAllCheckBox.checked === true) {
            checkBoxes.forEach((checkBox) => {
                checkBox.checked = true;
            });

        } else {
            checkBoxes.forEach((checkBox) => {
                checkBox.checked = false;
            });
        }
    });
});
