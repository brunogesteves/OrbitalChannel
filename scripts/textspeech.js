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

  let wholeText = [];
  currentPosition = 0;

  const oi = [
    "Brasil x Cuba: onde assistir ao jogo da Liga das Nações masculina de vôlei O Brasil estreia na Liga das Nações masculina de vôlei nesta terça-feira (21). O adversário será a seleção de",
    "Cuba e a partida será realizada no Maracanãzinho, n...",
  ];

  "speechSynthesis" in window;

  function toStop() {
    console.log("depois");
    if (currentPosition < wholeText.length) {
      currentPosition++;
      toSpeak();
    } else {
      $("#play").show();
      $("#stop").hide();
      $("#pause").hide();
      $("#resume").hide();
      speechSynthesis.cancel();
    }
  }

  function toSpeak() {
    let textContent = $("#text")
      .text()
      .replace(/^\s+|\s+$/gm, "");
    allVoicesObtained.then(async (voice) => {
      const textContentToSpeak = new SpeechSynthesisUtterance(
        // `${wholeText[currentPosition].toString().replaceAll(",", " ")}`
        textContent
      );

      textContentToSpeak.voice = voice[14];
      speechSynthesis.speak(textContentToSpeak);

      textContentToSpeak.onend = (event) => {
        console.log("primeiro");
        toStop();
      };
    });
  }

  $("#play").click(function (e) {
    speechSynthesis.cancel();
    $("#stop").show();
    $("#pause").show();
    $("#play").hide();

    e.preventDefault();
    let textContent = $("#text")
      .text()
      .replace(/^\s+|\s+$/gm, "");

    const splitTextContent = textContent.split(" ");

    const perChunk = 10; // items per chunk

    const result = splitTextContent.reduce((resultArray, item, index) => {
      const chunkIndex = Math.floor(index / perChunk);

      if (!resultArray[chunkIndex]) {
        resultArray[chunkIndex] = []; // start a new chunk
      }

      resultArray[chunkIndex].push(item);
      return resultArray;
    }, []);
    wholeText = result;
    toSpeak();
  });

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
