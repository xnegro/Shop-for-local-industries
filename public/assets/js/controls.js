$(function() {
	 "use strict"; // Start of use strict  
    //Simple filter controls
    $('.simplefilter li').on('click', function () {
        $('.simplefilter li').removeClass('active');
        $(this).addClass('active');
    });
    //Multifilter controls
    $('.multifilter li').on('click', function () {
        $(this).toggleClass('active');
    });
    //Shuffle control
    $('.shuffle-btn').on('click', function () {
        $('.sort-btn').removeClass('active');
    });
    //Sort controls
    $('.sort-btn').on('click', function () {
        $('.sort-btn').removeClass('active');
        $(this).addClass('active');
    });
});
