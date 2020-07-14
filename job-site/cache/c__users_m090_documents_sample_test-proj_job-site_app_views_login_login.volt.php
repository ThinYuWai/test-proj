  <?= $this->assets->outputCss() ?>
  <div class="wrapper">
    <?= $this->tag->form(['login/login', 'method' => 'post', 'class' => 'form-signin']) ?> 
      <h2 class="form-signin-heading">Please login</h2>
       <span class = "error-color"><?php if (isset($error)) { ?><?= $error ?><?php } ?></span>
       <?= $this->tag->textField(['userEmail', 'class' => 'form-control', 'value' => $email, 'placeholder' => 'Email Address', 'required' => '', 'autofocus']) ?>
       <?= $this->tag->passwordField(['password', 'class' => 'form-control', 'value' => $password, 'placeholder' => 'password', 'required' => '']) ?>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <?= $this->tag->submitButton(['Login', 'name' => 'login', 'class' => 'btn btn-lg btn-primary btn-block']) ?>  
    <?= $this->tag->endForm() ?>
  </div>