function logout() {
        $.ajax({
            url: "/TheTechSpace/php/logout.php",
            type: "POST",
            success: function(data){ 
                console.log('Logout successful');
                localStorage.clear();
                window.location.href = '/TheTechSpace/index.php';
            },
            error: function(xhr, status, error){
                console.log('Error during logout:', error);
                localStorage.clear();
                window.location.href = '/TheTechSpace/index.php';
            }
        });
};