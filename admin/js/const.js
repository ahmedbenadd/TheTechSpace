document.addEventListener("DOMContentLoaded", function() {
    var rowsPerPage = 8;

    // Function to initialize pagination for a specific table
    function initializePagination(tableId) {
        var tableRows = document.querySelectorAll("#" + tableId + " tbody tr");
        var totalPages = Math.ceil(tableRows.length / rowsPerPage);
        var currentPage = 1;

        showPage(currentPage, tableRows); // Show the initial page

        function showPage(page, rows) {
            var startIndex = (page - 1) * rowsPerPage;
            var endIndex = startIndex + rowsPerPage;

            rows.forEach(function(row, index) {
                if (index >= startIndex && index < endIndex) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });

            updatePagination();
        }

        function updatePagination() {
            var pagination = document.getElementById(tableId + "-pagination");
            pagination.innerHTML = ""; // Clear existing pagination links

            for (var i = 1; i <= totalPages; i++) {
                var link = document.createElement("a");
                link.href = "#";
                link.textContent = i;
                link.addEventListener("click", function() {
                    currentPage = parseInt(this.textContent);
                    showPage(currentPage, tableRows);
                });

                if (i === currentPage) {
                    link.classList.add("active");
                }

                pagination.appendChild(link);
            }
        }
    }

    // Initialize pagination for customers table
    initializePagination("users-table");

    // Initialize pagination for products table
    initializePagination("products-table");
});
