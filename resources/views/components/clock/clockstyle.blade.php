
:root{
    --dark-backgroundcolor: rgb(0, 12, 46);
    --light-backgroundcolor: rgb(171, 188, 235);
    --dark-box-shadow: 3px 3px 9px rgb(0,0,0), inset -3px -3px 6px rgb(0,60,107), -3px -3px 8px rgb(0,60,107), inset 3px 3px 8px rgb(0,0,0);
    --circle-dark-shadow: inset -2px -2px 7px rgb(0,60,107), inset 3px 3px 8px rgb(0, 0, 0);
    --dark-btn-shadow: 2px 2px 5px rgb(0,0,0), -2px -2px 5px rgb(0,60,107);
    --light-box-shadow: 5px 3px 10px rgb(173 181 202), -5px -3px 10px rgb(185 193 243), inset -3px -3px 5px rgb(205 213 236), inset 3px 3px 8px rgb(196 204 225);
    --light-btn-shadow: 3px 3px 5px rgb(211 214 222), -3px -3px 5px rgb(187, 205, 255);
    --circle-light-shadow: inset -3px -3px 5px rgb(207 219 255), inset 3px 3px 8px rgb(127, 140, 175);
}

.clock-body{
    background-color:var(--light-backgroundcolor);
}
.clock-body-dark{
    background-color: var(--dark-backgroundcolor);
}
button{
    position: absolute;
    top: 20px;
    right: 25px;
    width: 100px;
    height: auto;
    padding: 8px;
}
.dark-btn{
    border-radius: 5px;
    outline: none;
    border: none;
    box-shadow: var(--dark-btn-shadow);
    color: #10b1cb;
    background-color: transparent;
}
.light-btn{
    border-radius: 5px;
    border: none;
    outline: none;
    box-shadow: var(--light-btn-shadow);
    color: #21232b;
    background-color:transparent;
}
.clock-container{
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 200px;
    height: 200px;
    border-radius: 100%;
    border: 3px solid rgb(202 207 222);
    box-shadow: var(--light-box-shadow);
}
.clock-dark-container{
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 200px;
    height: 200px;
    border-radius: 100%;
    border: 3px solid rgb(1, 16, 61);
    box-shadow: var(--dark-box-shadow);
}
.clock {
    position: relative;
    height: 120px;
    width: 120px;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.clock-dark{
    box-shadow: var(--circle-dark-shadow);
}
.clock-light{
    box-shadow: var(--circle-light-shadow);
}
.needle{
    height: 50px;
    width: 6px;
    position: relative;
    background-color: #C70039;
}
.hour{
    border-top-left-radius:50%;
    border-top-right-radius:50%;
    bottom: 20px;
    left: 2px;
    transform-origin: bottom;
    transform:rotate(10deg);
    box-shadow:rgb(255 255 255) 5px 3px 10px;
}
.minute{
    border-top-left-radius:50%;
    border-top-right-radius:50%;
    width: 3px;
    height: 70px;
    bottom: 30px;
    right:0px;
    transform-origin: bottom;
    transform: rotate(140deg);
    box-shadow:rgb(255 255 255) 5px 3px 10px;
}
.seconds{
    width: 1.5px;
    height: 80px;
    background-color: #171717;
    transform-origin: bottom;
    transform: rotate(120deg);
    bottom:35px;
    right:2px;
    box-shadow:rgb(255 255 255) 5px 3px 10px;
}
.center{
    width: 10px;
    height: 10px;
    background-color: #171717;
    border-radius: 50%;
    position: relative;
    top: 4px;
    right: 7px;
}
#dateContainer{
    position: relative;
    padding: 10px;
    font-size: 2rem;
    text-align: center;
    margin: 40px auto;
}
.date-dark{
    outline: none;
    border: none;
    border-radius: 10px;
    box-shadow: var(--dark-btn-shadow);
    color:#61D9F0 /*#caf0f8*/;
    background-color: transparent;
}
.date-light{
    border-radius: 10px;
    border: none;
    outline: none;
    box-shadow: var(--light-btn-shadow);
    color: #07616B;
    background-color:transparent;
}
