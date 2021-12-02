$(document).ready(function() {
    $('#navbarSupportedContent .navbar-nav .nav-item').click(function() {
        localStorage.setItem('lastTab', $(this).children().attr('href'));
    });
    var lastTab = localStorage.getItem('lastTab');
  
    if (lastTab) {
        $('#navbarSupportedContent .navbar-nav .nav-item').each(function() {
            if ($(this).children().attr('href') == lastTab) {
                $(this).addClass('tab-active');
            }
        });
    }
});
