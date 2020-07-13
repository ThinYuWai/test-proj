  {{ assets.outputCss() }}
  <div class="wrapper">
    {{ form('login/login', 'method': 'post','class':'form-signin') }} 
      <h2 class="form-signin-heading">Please login</h2>
       <span class = "error-color">{% if error is defined %}{{ error }}{% endif %}</span>
       {{ text_field("userEmail", "class": "form-control","value" : email, "placeholder":"Email Address","required":"","autofocus") }}
       {{ password_field("password", "class": "form-control","value" : password, "placeholder":"password","required":"") }}
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      {{ submit_button('Login', "name":"login", "class":"btn btn-lg btn-primary btn-block") }}  
    {{ end_form() }}
  </div>