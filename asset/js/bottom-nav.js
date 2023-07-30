var navItems = document.querySelectorAll(".mobile-bottom-nav__item");
navItems.forEach(function(e, i) {
	e.addEventListener("click", function(e) {
		navItems.forEach(function(e2, i2) {
			e2.classList.remove("mobile-bottom-nav__item--active");
		})
		this.classList.add("mobile-bottom-nav__item--active");
	});
});

// Set the date we're counting down to
var countDownDate = new Date("Aug 29, 2023 12:00:00");

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date();
  var currentOffset = now.getTimezoneOffset();

  var ISTOffset = 330;   // IST offset UTC +5:30 

  var ISTTime = new Date(now.getTime() + (ISTOffset + currentOffset)*60000);
    
  // Find the distance between now and the count down date
  var distance = countDownDate - ISTTime;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element
  document.querySelectorAll('[id="timer"]').forEach(element => {
    element.innerHTML = `${setzero(days)} Days ${setzero(hours)} Hours ${setzero(minutes)} Minutes ${setzero(seconds)} Seconds`;
  })
  //set zero on singal digit
  function setzero(id){
    if(id<10){
        return "0"+id;
    }else{
        return id;
    }
  }
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    //document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);