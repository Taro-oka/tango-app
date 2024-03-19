// カウントダウンする秒数
let count = 10;

// カウントダウン関数
const countdown = () => {
  console.log(count); // 現在のカウントを表示
  count--;
  if (count < 0) {
    // カウントが0になったらサーバーにリクエストを送る
    fetch("サーバーのURL", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ message: "カウントダウンが0になりました" }),
    })
      .then((response) => response.json())
      .then((data) => console.log(data))
      .catch((error) => console.error("エラー:", error));
  } else {
    // 1秒後に再度カウントダウン関数を呼び出す
    setTimeout(countdown, 1000);
  }
};

// カウントダウン開始
// countdown();
