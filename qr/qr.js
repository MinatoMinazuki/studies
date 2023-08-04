const container = document.querySelector(".container");
const qr = document.querySelector(".qr");
const btn = document.querySelector(".btn");
const input = document.querySelector(".input");
const qrCode = document.querySelector(".qrCode");

btn.addEventListener("click", () => {
  let url = input.value;
  console.log(url);
  if (!url) return;

  btn.innerText = "読み込み中...";

  qrCode.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${url}`;

  qrCode.addEventListener("load", () => {
    qr.classList.add("active");
    btn.innerText = "QR生成"
  });
});