let expression = "";

function pressButton(symbol) {
  expression += symbol;
  document.getElementById("display").value = expression;
}

function pressClear() {
  expression = "";
  document.getElementById("display").value = "";
}

function pressEquals() {
  if (expression === "") return;

  fetch("calculator.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "expression=" + encodeURIComponent(expression),
  })
    .then(function (response) {
      return response.text();
    })
    .then(function (text) {
      var data = JSON.parse(text);
      document.getElementById("display").value = data.result;
      expression = String(data.result);
    })
    .catch(function () {
      document.getElementById("display").value = "Ошибка сети";
    });
}
