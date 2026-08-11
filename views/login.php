<h1>Sign In</h1>

<form class="form" action="<?php echo $_SERVER['REQUEST_URI'];  ?>" method="POST">
  <div>
    <label for="name">名前：</label>
    <input type="text" id="name" name="name" tabindex="1" autofocus required>
  </div>
  <div>
    <label for="password">password: </label>
    <input type="password" id="password" name="password" tabindex="2" required>
  </div>
  <input type="submit" value="ログイン">
</form>
<a href="<?php echo CONTEXT_PATH . 'register' ?>">新規登録はこちら</a>