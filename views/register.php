<h1>Sign Up</h1>

<form class="form" action="<?php echo CONTEXT_PATH . 'register';  ?>" method="POST">
  <div>
    <label for="name">名前：</label>
    <input type="text" id="name" name="name" tabindex="1" autofocus required>
  </div>
    <div>
    <label for="password">password: </label>
    <input type="password" id="password" name="password" tabindex="2" required>
  </div>
  <div>
    <label for="nickname">ニックネーム：</label>
    <input type="text" id="nickname" name="nickname" tabindex="3" required>
  </div>
  <button type="submit">新規登録する</button>
</form>

<a href="<?php echo CONTEXT_PATH . 'login'?>">ログインはこちら</a>
