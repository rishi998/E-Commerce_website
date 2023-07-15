const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');

const registerLink = document.querySelector('.register-link');
registerLink.addEventListener('click',()=>{
    wrapper.classList.add('active');
});



loginLink.addEventListener('click',()=>{
    wrapper.classList.remove('active');
});


window.onload = function() {
    var inputField = document.getElementById('');
    inputField.focus();
  };

  
  startTimer();
      
      
  function startTimer() {
    var presentTime = document.getElementById('timer').innerHTML;
    var timeArray = presentTime.split(/[:]+/);
    var m = timeArray[0];
    var s = checkSecond((timeArray[1] - 1));
    if(s==59){m=m-1}
    if(m<0){
      return
    }
    
    document.getElementById('timer').innerHTML =
     m + ":" + s;
    console.log(m)
    setTimeout(startTimer, 1000);
    
  }
  
  function checkSecond(sec) {
    if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
    if (sec < 0) {sec = "59"};
    return sec;
  }
  document.getElementById().removeAttribute
