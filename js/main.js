document.addEventListener("DOMContentLoaded", function () {
  const links = document.querySelectorAll(".confirm-link");

  links.forEach(function (link) {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const destination = this.getAttribute("href");

      if (confirm(message)) {
        window.location.href = destination;
      }
    });
  });
});

const message =
  "この先の遷移先リンクはまだ未実装です。\nもしここで「はい」を選択すると、検索結果は失われ、HOME画面に遷移します。\nよろしいですか？";
