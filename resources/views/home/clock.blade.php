  <div class="clock">
    <div class="clock__strokes">
      <div id="strokesHours" class="clock__strokes-hours"></div>
      <div id="strokesMinutes" class="clock__strokes-minutes"></div>
    </div>
    <div class="clock__pointers">
      <div class="clock__pointers-hours" id="hours"></div>
      <div class="clock__pointers-minutes" id="minutes"></div>
      <div class="clock__pointers-seconds" id="seconds"></div>
      <div class="clock__pointers-dot"></div>
    </div>
  </div>


<style>


.clock{
  margin: 0 0 0 auto;
  flex-shrink: 0;
  position: relative;
  height: 200px;
  width: 200px;
  border-radius: 50%;
  box-shadow: 
      1rem 1rem 2rem rgba(0, 0, 0, .1),
      -1rem -1rem 2rem rgba(255, 255, 255, .5);
}

@media only screen and (max-width: 991px){
	.clock {
        margin:0 auto;
    }
}

.clock__strokes,
.clock__strokes-hours,
.clock__strokes-minutes,
.clock__pointers{
  position: absolute;
  height: 100%;
  width: 100%;
}

.clock__strokes-hours{
  z-index: 200;
}

.clock__strokes-hours span,
.clock__strokes-minutes span{
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  display: inline-block;
}

.clock__strokes-hours span::before{
  content: "";
  background-color: #b6bbc5;
  background-color: #848484;
  height: 24px;
  height: 15px;
  width: 3px;
  border-radius: 10px;
  display: inline-block;
  position: absolute;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
}

.clock__strokes-minutes span::before{
  content: "";
  background-color: #b6bbc5;
  height: 12px;
  height: clamp(7.76px, 2.11vw, 12px);
  width: 2px;
  border-radius: 10px;
  display: inline-block;
  position: absolute;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
}

.clock__pointers-hours,
.clock__pointers-minutes,
.clock__pointers-seconds,
.clock__pointers-dot {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.clock__pointers-dot{
  height: clamp(13px, 3.53vw, 20px);
  width: clamp(13px, 3.53vw, 20px);
  border-radius: 50%;
  background-color: #848484;
  border: 2px solid #dae1eb;
  z-index: 600;
}
.clock__pointers-hours{
  z-index: 300;
}

.clock__pointers-minutes{
  z-index: 400;
}

.clock__pointers-seconds{
  z-index: 500;
}

.clock__pointers-hours::before{
  content: "";
  background-color: #848484;
  height: 60px;
  width: 5px;
  border-radius: 10px;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.clock__pointers-hours::after{
  content: "";
  background-color: #848484;
  height: clamp(13px, 3.53vw, 20px);
  width: 6px;
  border-radius: 10px;
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
}

.clock__pointers-minutes::before{
  content: "";
  background-color: #b6bbc5;
  height: 85px;
  width: 4px;
  border-radius: 10px;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.clock__pointers-minutes::after{
  content: "";
  background-color: #b6bbc5;
  height: clamp(15px, 4.41vw, 25px);
  width: 5px;
  border-radius: 10px;
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
}

.clock__pointers-seconds::before{
  content: "";
  background-color: #e57373;
  height: 88px;
  width: 2.5px;
  border-radius: 10px;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.clock__pointers-seconds::after{
  content: "";
  background-color: #e57373;
  height: clamp(19px, 5.29vw, 30px);
  width: 3px;
  border-radius: 10px;
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
}

</style>


<script>

const hours = document.getElementById('hours');
const minutes = document.getElementById('minutes');
const seconds = document.getElementById('seconds');
const strokesHours = document.getElementById('strokesHours');
const strokesMinutes = document.getElementById('strokesMinutes');

function strokeClock(elementWrapper, deg, strokeTotal) {
  let degRotate = 0;
  for (let index = 0; index < strokeTotal; index++) {
    const span = document.createElement('span');
    degRotate += deg;
    span.style.transform = `rotateZ(${degRotate}deg)`;
    elementWrapper.append(span);
  }
}

strokeClock(strokesHours, 30, 12);
strokeClock(strokesMinutes, 6, 60);

function animate() {
  requestAnimationFrame(animate)
  const date = new Date();
  const hrs = date.getHours() * 30;
  const mins = date.getMinutes() * 6;
  const secs = date.getSeconds() * 6;
  
  hours.style.transform = `rotateZ(${hrs+(mins/12)}deg)`;
  minutes.style.transform = `rotateZ(${mins}deg)`;
  seconds.style.transform = `rotateZ(${secs}deg)`;
}
animate()</script>

