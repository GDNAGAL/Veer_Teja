<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
*{
  margin:0px;
  box-sizing:border-box;
  font-family: 'Poppins', sans-serif;
}
.row{
  margin:auto;
  box-sizing: border-box;
/*   border:1px solid #333; */
  width: 350px;
  background:#fff;
  padding:15px;
}
body{
  background-image: url("https://png.pngtree.com/background/20210715/original/pngtree-abstract-background-technology-of-data-applications-picture-image_1316468.jpg"); /* The image used */
  background-color: #cccccc; /* Used if the image is unavailable */
  height: 100vh; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}
.logo{
  width:100%;
  padding:10% 0% 5% 0%;
}
.logo img{
    width: 120px;
    margin: auto;
    display: block;
    border:5px solid #0D5C63;
    border-radius:50%;
    padding:2px;
}
.input-field{
  position: relative;
  margin-bottom:12px;
  letter-spacing: 1px;
}
.input-field input{
  width: 96%;
  margin-left:2%;
  border-radius: 4px;
  font-size: 16px;
  padding: 7px 2%;
  border: 1px solid #0D5C63;
  background: #fff;
  color: #333;
  outline: none;
  box-sizing:border-box;
}
.input-field label{
  position: absolute;
  top: 50%;
  left: 4%;
  transform: translateY(-50%);
  color: #333;
  font-size: 16px;
  pointer-events: none;
  transition: 0.3s;
}
input:focus{
  border: 1px solid #00a67e;
}
input:focus ~ label{
  color:#00a67e !important;
}
input:valid ~ label{
  top: 0;
  left: 4%;
  font-size: 12px;
  padding: 0px 5px;
  color:#040321;
  background:#fff;
  border-radius:4px;
}
.field-icon {
  float: right;
  right:4%;
  margin-left: -25px;
  margin-top: 12px;
  position: relative;
  z-index: 2;
  color:#040321;
}
button{
  width:96%;
  margin-left:2%;
  padding:7px;
  border-radius:4px;
  border:none;
  background:#0D5C63;
  color:#fff;
  font-size:16px;
  cursor:pointer;
  outline:none;
  letter-spacing: 1px;
}
button:hover{
  opacity:0.8;
}
button:disabled{
  opacity: 0.5;
  cursor: not-allowed !important;
}
h2{
  text-align:center;
  color:#0D5C63;
}
#error{
    display: block;
    margin-left:2%;
    color: red;
    font-size: 10px;
    padding-bottom: 7px;
}
/* button loader  */
.loading:after {
  content: ' .';
  animation: dots 1s steps(5, end) infinite;}

@keyframes dots {
  0%, 20% {
    color: rgba(0,0,0,0);
    text-shadow:
      .25em 0 0 rgba(0,0,0,0),
      .5em 0 0 rgba(0,0,0,0);}
  40% {
    color: white;
    text-shadow:
      .25em 0 0 rgba(0,0,0,0),
      .5em 0 0 rgba(0,0,0,0);}
  60% {
    text-shadow:
      .25em 0 0 white,
      .5em 0 0 rgba(0,0,0,0);}
  80%, 100% {
    text-shadow:
      .25em 0 0 white,
      .5em 0 0 white;}
}


@media (max-width: 767px) {
  body{
  background-image: url(""); /* The image used */
  background-color: #fff; /* Used if the image is unavailable */
  height: 100vh; /* You must set a specified height */
}
.row{
  margin:auto;
  box-sizing: border-box;
/*   border:1px solid #333; */
  width: 100%;
  background:#fff;
  padding:15px;
}
}
  </style>


<script>
    function check(){

        function isMobile() {
            const regex = /Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i;
            return regex.test(navigator.userAgent);
        }
        
        if (isMobile()) {
            //alert("Mobile device detected");
        } else {
            window.location.assign("https://google.com")
            window.close();
        }
    }
</script>
</head>
<body onload="">
<br><br>
  <div class='row'>
    <div class="logo">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSy_JmafxKbli9Es5QUvL6d-qIdOd5RmExsvA&usqp=CAU" alt="">
    </div>
    <h2>Log In</h2><br>
    <form action="" autocomplete="off" method="post" id="loginForm">
        <span id="error"></span>
        <div class="input-field">
            <input type="number" pattern="[0-9]*" inputmode="numeric" id="mobile" name="UserMobileNo" > 
            <label>Enter Mobile No.</label>
        </div>
        <div class="input-field">
            <input type="password" id="password" name="UserPassword" > 
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            <label>Enter Password</label>
        </div>
        <button type="submit" id="loginbtn" name="TryLogin">Log in</button>
    </form>
    <a href="" style='margin-left:5px'>Reset Password</a>
    <br><br>
  </div>

<script src="assets/js/login.js"></script>
</body>
</html>