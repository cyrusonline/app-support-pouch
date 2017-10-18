// Initialize your app



var myApp = new Framework7({
    animateNavBackIcon:true,
	pushState: true,

});

// myApp.onPageInit('progress',function(page){
//
// myApp.alert('Hello');
//
// });

// Export selectors engine
var $$ = Dom7;

// Add main View
var mainView = myApp.addView('.view-main', {
    // Enable dynamic Navbar
    dynamicNavbar: true,
    // Enable Dom Cache so we can use all inline pages
    domCache: true
});


var calendarDefault = myApp.calendar({
    input: '#calendar-default',
});
