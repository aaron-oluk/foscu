let circularProgress = document.querySelector(".circular-progress");
let progressValue = document.querySelector(".progress-value");

if (circularProgress && progressValue) {
  let progressStartValue = 0;
  let progressEndValue = 90;
  let speed = 100;

  let progress = setInterval(() => {
    progressStartValue++;
    progressValue.textContent = `${progressStartValue}%`;
    circularProgress.style.background = `conic-gradient(orangered ${progressStartValue * 3.6}deg, #ededed 0deg)`;

    if (progressStartValue == progressEndValue) {
      clearInterval(progress);
    }
  }, speed);
}