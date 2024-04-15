document.addEventListener("DOMContentLoaded", function() {
    var rowsPerPage = 10;
    function initializePagination(tableId) {
        var tableRows = document.querySelectorAll("#" + tableId + " tbody tr");
        if(tableRows > rowsPerPage) {
            var totalPages = Math.ceil(tableRows.length / rowsPerPage);
            var currentPage = 1;

            showPage(currentPage, tableRows);

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
                pagination.innerHTML = "";

                for (var i = 1; i <= totalPages; i++) {
                    var link = document.createElement("a");
                    link.textContent = i;
                    link.addEventListener("click", function() {
                        currentPage = parseInt(this.textContent);
                        showPage(currentPage, tableRows);
                    });

                    if (i === currentPage) {
                        link.classList.add("clicked");
                    }

                    pagination.appendChild(link);
                }
            }
        }
    }

    initializePagination("table");
});

document.querySelectorAll('.trash').forEach(trash => {
    trash.addEventListener('click', function (){
        const userId = this.getAttribute('data-userid');
        darkOverlay = document.querySelector('.dark-overlay');
        modal = document.querySelector('#myModal');
        closeBtn = document.querySelector('.close');
        cancelBtn = document.querySelector('#cancel');
        deleteBtn = document.querySelector("#delete");
        darkOverlay.style.display = "block";
        modal.style.display = "block";
        darkOverlay.addEventListener('click', function (){
            darkOverlay.style.display = "none";
            modal.style.display = "none";
        });
        closeBtn.addEventListener('click', function (){
            darkOverlay.style.display = "none";
            modal.style.display = "none";
        });
        cancelBtn.addEventListener('click', function (){
            darkOverlay.style.display = "none";
            modal.style.display = "none";
        });
        deleteBtn.addEventListener('click', function () {
            $.ajax({
                url: 'php/delete_user.php',
                type: 'POST',
                data: { user_id: userId },
                error: function(error) {
                    console.error('Error:', error);
                },
                complete: function () {
                    cancelBtn.click();
                    window.location.reload();
                }
            });
        });
    });
});