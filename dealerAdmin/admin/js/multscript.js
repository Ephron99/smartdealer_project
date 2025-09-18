const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}





// second form

const prevBtnsnew = document.querySelectorAll(".btn-prevnew");
const nextBtnsnew = document.querySelectorAll(".btn-nextnew");
const progressnew = document.getElementById("progressnew");
const formStepsnew = document.querySelectorAll(".form-stepnew");
const progressStepsnew = document.querySelectorAll(".progress-stepnew");

let formStepsNumnew = 0;

nextBtnsnew.forEach((btnnew) => {
  btnnew.addEventListener("click", () => {
    formStepsNumnew++;
    updateFormStepsnew();
    updateProgressbarnew();
  });
});

prevBtnsnew.forEach((btnnew) => {
  btnnew.addEventListener("click", () => {
    formStepsNumnew--;
    updateFormStepsnew();
    updateProgressbarnew();
  });
});

function updateFormStepsnew() {
  formStepsnew.forEach((formStepnew) => {
    formStepnew.classList.contains("form-stepnew-active") &&
      formStepnew.classList.remove("form-stepnew-active");
  });

  formStepsnew[formStepsNumnew].classList.add("form-stepnew-active");
}

function updateProgressbarnew() {
  progressStepsnew.forEach((progressStepnew, idx) => {
    if (idx < formStepsNumnew + 1) {
      progressStepnew.classList.add("progress-stepnew-active");
    } else {
      progressStepnew.classList.remove("progress-stepnew-active");
    }
  });

  const progressActivenew = document.querySelectorAll(".progress-stepnew-active");

  progressnew.style.width =
    ((progressActivenew.length - 1) / (progressStepsnew.length - 1)) * 100 + "%";
}
