<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="images/favicon.ico" />
        <title>Pasarela - Login</title>
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="main">
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Login</h2>
                            <form method="POST" class="register-form" id="register-form">
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Email"/>
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="email" id="email" placeholder="Contraseña"/>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="form-submit" value="Login"/>
                                    <input type="button" class="form-return" onclick="window.location='/'" value="Volver">
                                </div>
                            </form>
                        </div>
                        <div class="signup-image">
                            <figure><img src="images/loginpannel.png" alt="sing up image"></figure>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>