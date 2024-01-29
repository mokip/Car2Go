var buttons = document.querySelectorAll('[id^="button"]');
var overlay = document.getElementById('overlay');

buttons.forEach(function(button) {
  button.addEventListener("click", function() {
    var popupId = "#popup" + button.id.slice(-1);
    var popup = document.querySelector(popupId);
    popup.style.display = "block";
    overlay.style.display = "block";
    
    overlay.addEventListener('click', function() {
      popup.style.display = 'none';
      overlay.style.display = 'none'; 
    });
  });
});

var closeButtons = document.querySelectorAll('[id^="close"]');
closeButtons.forEach(function(closeButton) {
  closeButton.addEventListener("click", function() {
    var popup = closeButton.closest(".ordercancelationpopup");
    popup.style.display = "none";
    overlay.style.display = "none"; 
  });
});