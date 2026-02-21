document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-button").forEach((button) => {
        button.addEventListener("click", function () {
            let form = this.closest(".delete-form");

            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1f2937",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });


    //bulk delete
     document.querySelectorAll(".bulk-button").forEach((button) => {
        button.addEventListener("click", function () {
            let form = document.querySelector("#bulkForm");

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const value = document.querySelector('#bulk-form-select').value;

                if(value === "delete") {
                    
                    Swal.fire({
                        title: "Are you sure?",
                        text: "This action cannot be undone!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#1f2937",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }

            });

        });
    });
});
