<h1>プロフィール編集ページ</h1>
<form class="form" action="<?php echo $_SERVER['REQUEST_URI'];  ?>" method="POST">
  <div>
    <label for="name">名前：</label>
    <input type="text" id="name" name="name" tabindex="1" autofocus required>
  </div>
  <div>
    <label for="password">password: </label>
    <input type="password" id="password" name="password" tabindex="2" required>
  </div>
  <div>
    <label for="nickname">nickname: </label>
    <input type="text" id="nickname" name="nickname" tabindex="3" required>
  </div>
  <button type="submit">編集を確定</button>
</form>
<a href="<?php echo CONTEXT_PATH . 'dashboard'; ?>">ダッシュボードへ戻る</a>