<?php

// ステータスコードの定義を含む設定ファイルを読み込む
require_once('config/status_codes.php');

// 配列 $status_codes からランダムに 4 つのキーを取得
$random_indexes=array_rand($status_codes,4);

// 取得したランダムなキーを使い、対応するステータスコードを $options 配列に格納
foreach($random_indexes as $index){
  $options[]=$status_codes[$index];
}

// 4 つの選択肢の中からランダムに 1 つをクイズの問題として選択
$question = $options[mt_rand(0,3)];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Code Quiz</title>
  
  <!-- CSSファイルの読み込み -->
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>

  <!-- ヘッダーの定義 -->
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        Status Code Quiz
      </a>
    </div>
  </header>

  <main>
    <div class="quiz__content">
      <div class="question">
        <!-- クイズの問題文を表示 -->
        <p class="question__text">Q. 以下の内容に当てはまるステータスコードを選んでください</p>
        <p class="question__text">
          <?php echo $question['description'] ?> <!-- 選ばれたステータスコードの説明を表示 -->
        </p>
      </div>

      <!-- クイズの回答フォーム -->
      <form class="quiz-form" action="result.php" method="post">
        <!-- ユーザーが選択したステータスコードを送信するための hidden フィールド -->
        <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>">

        <div class="quiz-form__item">
          <!-- 4 つの選択肢をループで生成 -->
          <?php foreach ($options as $option): ?>
          <div class="quiz-form__group">
            <!-- ラジオボタンを生成 -->
            <input class="quiz-form__radio" id="<?php echo $option['code'] ?>" type="radio" name="option"
              value="<?php echo $option['code'] ?>">
            <label class="quiz-form__label" for="<?php echo $option['code'] ?>">
              <?php echo $option['code'] ?> <!-- ステータスコードを表示 -->
            </label>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- 送信ボタン -->
        <div class="quiz-form__button">
          <button class="quiz-form__button-submit" type="submit">
            回答
          </button>
        </div>
      </form>
    </div>
  </main>

</body>
</html>
