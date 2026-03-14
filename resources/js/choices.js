import "choices.js/public/assets/styles/choices.css";
import Choices from "choices.js";

document.addEventListener("DOMContentLoaded", () => {
    const allSearchableElements = document.querySelectorAll(".searchable");

    if(allSearchableElements.length > 0) {
        allSearchableElements.forEach(element => {
            const choices = new Choices(element);
        });
    }
});