<?php 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap');

* {
  margin: 0;
  padding: 0;
  font-family: 'Quicksand', sans-serif;
  box-sizing: border-box;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #000;
}

section {
  position: absolute;
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  overflow: hidden;
}

section span {
  position: relative;
  display: flex;
  width: calc(6.25vw - 2px);
  height: calc(6.25vw - 2px);
  background: #181818;
  z-index: 2;
  margin-left: 2px;
  margin-bottom: 2px;
  transition: 0.5s;
}

section::before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background: linear-gradient(#000, #0f0, #000);
  animation: animate 5s linear infinite;
}

@keyframes animate {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(100%);
  }
}

section span:hover {
  background: #0f0;
  transition: 0s;
}

section .signin {
  position: absolute;
  width: 400px;
  background: #222;
  z-index: 1000;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px;
  border-radius: 4px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
}

section .signin form {
  width:100%;
}

section .signin .content {
  position: relative;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

section .signin .content h2 {
  padding-bottom: 40px;
  font-size: 2em;
  color: #0f0;
  text-transform: uppercase;
}

section .signin .content .form {
  width: 100%;
  display: flex;
  flex-direction: column;
}

section .signin .content .form .inputBx {
  padding-bottom: 25px;
  position: relative;
  width: 100%;
}

section .signin .content .form .inputBx input {
  position: relative;
  width: 100%;
  background: #333;
  border: none;
  outline: none;
  padding: 25px 10px 7.5px;
  color: #fff;
  font-weight: 500;
  font-size: 1em;
  border-radius: 5px;
}

section .signin .content .form .inputBx i {
  position: absolute;
  left: 0;
  padding: 15px 10px;
  font-style: normal;
  color: #aaa;
  transition: 0.5s;
  pointer-events: none;
}

.signin .content .form .inputBx input:focus ~ i,
.signin .content .form .inputBx input:valid ~ i {
  transform: translateY(-7.5px);
  font-size: 0.8em;
  color: #fff;
}

section .signin .content .form .links {
  padding-bottom: 25px;
  position: relative;
  width: 100%;
  display: flex;
  justify-content: space-between;
}

section .signin .content .form .links a {
  color: #fff;
  text-decoration: none;
}


section .signin .content .form .links a:nth-child(2) {
  color: #0f0;
}

.signin .content .form .inputBx input[type="submit"] {
  padding: 10px;
  background: #0f0;
  color: #111;
  font-weight: 600;
  font-size: 1.25em;
  letter-spacing: 0.05em;
  cursor: pointer;
}

@media (max-width: 900px) {
  section span {
    width: calc(10vw - 2px);
    height: calc(10vw - 2px);
  }
}


@media (max-width: 600px) {
  section span {
    width: calc(20vw - 2px);
    height: calc(20vw - 2px);
  }
}
  </style>
</head>
<body>
  <section>
  
  <?php 
    for($i = 1; $i <= 507; $i++) {
      echo '<span></span>';
    }
  ?>
    
    <div class="signin">
      <form action="homepage.php">
      <div class="content">
        <h2>SIGNUP</h2>
        <div class="form">
          <div class="inputBx">
            <input type="text" required>
            <i>Username</i>
          </div>
          <div class="inputBx">
            <input type="password" required>
            <i>Password</i>
          </div>
          <div class="links">
            <a href="#">Forgot Password</a>
            <a href="#">Signup</a>
          </div>
          <div class="inputBx">
            <input type="submit" value="Login">
          </div>
        </div>
      </div>
      </form>
    </div>
  </section>
</body>
</html>