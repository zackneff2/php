<!DOCTYPE html>
<html lang="en">
  <head>
    <title>UM Schedule Me - Sign In</title>
  </head>

  {% extends "base.html" %}

  {% block content %}

  <body id="signin">


  <div class="container">
    <div class="row signin">
      <img class="logosignin" src="{{ url_for('static', filename='logo.png')  }}" />
      <form role="signin" id="signin" method="post" action="signinProcess.php">
        <input type="text" id="username" name="username" placeholder="Username" required/>
        <input type="password" id="password" placeholder="Password" name="password"  required/>
        <input type="submit" class="signin" value="Sign In" />
      </form>
        <span class="forgot-password">
          <a href="forgotPassword.php"><p>Forgot Password?</p></a>
        </span>
        <span class="return-home">
          <a href="index.php"><p>Return Home</p></a>
        </span>
    </div>
  </div>

</body>
{% endblock %}
</html>