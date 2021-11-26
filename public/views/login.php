<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Sign in and Sign Up Form</title>
    <link rel="stylesheet" href="public/css/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="login" class="sign-in-form" method="POST">
            <div class="logo">
              <img src="public/img/logo.svg" />
            </div>
            <div class="logo_mobile">
              <img src="public/img/logo_mobile.png" />
            </div>
            <h2 class="title">Sign in</h2>
              <div class="messages">
                  <?php if (isset($messages)) {
                      foreach ($messages as $message) {
                          echo $message;
                      }
                  }
                  ?>
              </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="email" type="text" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="password" type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn solid" value="Sign in" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>
        <form action="#" class="sign-up-form">
          <div class="logo">
            <img src="public/img/logo.svg" />
          </div>
          <div class="logo_mobile">
            <img src="public/img/logo_mobile.png" />
          </div>
          <h2 class="title">Sign Up</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Repeat password" />
          </div>
          <input type="submit" class="btn solid" value="Sign up" />
          <p class="social-text">Or Sign Up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
          </div>
        </form>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New to Astre?</h3>
            <p>Click the button below to create an account</p>
            <button class="btn transparent" id="sign-up-btn">Sign up</button>
          </div>
          <img src="public/img/undraw_pure_love_ay-8-a.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already a member?</h3>
            <p>Click the button below</p>
            <button class="btn transparent" id="sign-in-btn">Sign in</button>
          </div>
          <img src="public/img/undraw_love_re_mwbq.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="public/js/app.js"></script>
  </body>
</html>
