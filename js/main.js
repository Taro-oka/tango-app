document.addEventListener("DOMContentLoaded", () => {
  addEventToEditForm();
  addEventToSortBtn();
});

function addEventToSortBtn() {
  const btn = document.querySelector(".sort-words");
  const list = document.querySelector(".word-list");

  if (!btn || !list) {
    return;
  }

  btn.addEventListener("click", () => {
    const liItems = Array.from(list.querySelectorAll("li"));
    const sortedLiItems = liItems.sort((a, b) => {
      const textA = a.querySelector("a").textContent.toUpperCase();
      const textB = b.querySelector("a").textContent.toUpperCase();
      return textA.localeCompare(textB);
    });

    list.innerHTML = "";

    sortedLiItems.forEach((li) => {
      list.appendChild(li);
    });
  });
}

function addEventToEditForm() {
  const editForm = document.querySelector(".edit-form");
  const textAreas = document.querySelectorAll(".text-area");
  if (!editForm) {
    return;
  }

  textAreas.forEach((textArea) => {
    if (!textArea) {
      return;
    }
  });

  editForm.addEventListener("submit", (event) => {
    let isValid = true;

    for (const textArea of textAreas) {
      if (!textArea.value) {
        alert("空白では登録できません。");
        event.preventDefault();
        isValid = false;
        break;
      }
    }

    if (isValid) {
      const isConfirmed = confirm("以下の内容で編集してよろしいですか？");

      if (!isConfirmed) {
        event.preventDefault();
      }
    }
  });
}
