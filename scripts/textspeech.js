let allVoicesObtained = new Promise(function (resolve, reject) {
  let voices = window.speechSynthesis.getVoices();
  if (voices.length !== 0) {
    resolve(voices);
  } else {
    window.speechSynthesis.addEventListener("voiceschanged", function () {
      voices = window.speechSynthesis.getVoices();
      resolve(voices);
    });
  }
});
$(document).ready(() => {
  $("#resume").hide();
  $("#stop").hide();
  $("#pause").hide();

  "speechSynthesis" in window;
  const synth = window.speechSynthesis;

  $("#play").click(function (e) {
    $("#stop").show();
    $("#pause").show();
    $("#play").hide();

    e.preventDefault();
    allVoicesObtained.then(async (voice) => {
      console.log(voice[14]);
      let textContent = $("#text").text();
      console.log(textContent);
      const textContentToSpeak = new SpeechSynthesisUtterance(textContent);
      textContentToSpeak.voice = voice[14];
      synth.speak(textContentToSpeak);
    });
  });
  synth.onend = (e) => {
    $("#play").show();
    $("#stop").hide();
    $("#pause").hide();
    $("#resume").hide();
  };

  $("#resume").click(function () {
    speechSynthesis.resume();
    $("#pause").show();
    $("#resume").hide();
  });
  $("#pause").click(function () {
    speechSynthesis.pause();
    $("#pause").hide();
    $("#resume").show();
  });
  $("#stop").click(function () {
    speechSynthesis.cancel();
    $("#play").show();
    $("#stop").hide();
    $("#pause").hide();
    $("#resume").hide();
  });
});
