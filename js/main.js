document.addEventListener("DOMContentLoaded", () => {
  addEventToSortBtn();
  addEventToEditForm();
});

function getElementsForSorting() {
  let sorted = false;
  const btn = document.querySelector(".sort-words");
  const list = document.querySelector(".word-list");
  const liItems = Array.from(list.querySelectorAll("li"));
  const sortedLiItems = [...liItems].sort((a, b) => {
    const textA = a.querySelector("a").textContent.toUpperCase();
    const textB = b.querySelector("a").textContent.toUpperCase();
    return textA.localeCompare(textB);
  });

  return {
    domElements: {
      btn,
      list,
    },
    elements: {
      liItems,
      sortedLiItems,
    },
    flag: {
      sorted,
    },
  };
}

function addEventToSortBtn() {
  const { domElements, elements, flag } = getElementsForSorting();
  const { btn, list } = domElements;
  const { liItems, sortedLiItems } = elements;
  let { sorted } = flag;

  if (!btn || !list) {
    return;
  }

  btn.addEventListener("click", () => {
    list.innerHTML = "";

    if (sorted) {
      liItems.forEach((li) => {
        list.appendChild(li);
      });
      btn.textContent = "並べ替える";
    } else {
      sortedLiItems.forEach((li) => {
        list.appendChild(li);
      });
      btn.textContent = "もとに戻す";
    }

    sorted = !sorted;
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
