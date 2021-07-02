let body = document.querySelector("clock-body");
const clock = document.querySelector(".clock-container");
const circle = document.querySelector(".clock");
const dateDay = document.querySelector(".date-light");
btn.addEventListener("click", ()=>{
  if(clock.classList.contains("clock-container")){
    clock.classList.remove("clock-container");
    clock.classList.add("clock-dark-container");
    body.classList.remove("clock-body");
    body.classList.add("clock-body-dark");
    circle.classList.add("clock-dark");
    circle.classList.remove("clock-light");
    dateDay.classList.add("date-dark");
    dateDay.classList.remove("date-light");
  }else if(clock.classList.contains("clock-dark-container")){
    clock.classList.remove("clock-dark-container");
    clock.classList.add("clock-container");
    body.classList.remove("clock-body-dark");
    body.classList.add("clock-body");
    circle.classList.add("clock-light");
    circle.classList.remove("clock-dark");
    dateDay.classList.remove("date-dark");
    dateDay.classList.add("date-light");
}
  });



function time(){
let date = new Date();
let hour = date.getHours();
let minutes = date.getMinutes();
let seconds = date.getSeconds();

  console.log(hour+":"+minutes+":"+seconds);
  
const hoursDeg = hour*360/12 + (minutes * 360/60)/12;
const minutesDeg = (minutes * 360/60) + (seconds* 360/60)/60;
const secondsDeg = seconds * 360/60;
  
document.querySelector(".hour").style.transform = "rotate("+hoursDeg+"deg)";
document.querySelector(".minute").style.transform = "rotate("+minutesDeg+"deg)";
document.querySelector(".seconds").style.transform = "rotate("+secondsDeg+"deg)";

  const currentDate = date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear()
  
  document.getElementById("dateContainer").textContent = currentDate;

}
setInterval(time, 1000);
