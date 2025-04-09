<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login page</title>
    <link rel="stylesheet" href="./LidaryFiles/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="body">

    <div class="container-fluid">

        <div class="row" style="height: 100vh;">

            <!-- Alert box  -->
            <div class="col-auto fixed-top mt-2 me-4" style="min-width:500px; max-height:75px; overflow:visible; display:flex; justify-content: end;">
                <div class="msg-box1 m-1" id="msg-box1">
                </div>
            </div>
            <!-- Alert box  -->


            <div class="col-12" style="align-items: center; display: flex; justify-content: center; flex-direction: column;">

                <div class="row" style="justify-content: center;">
                    <div class="col-10 login-window shadow" style="max-width: 650px; min-width:450px">


                        <div class="row mt-3" style="justify-content: center;">
                            <div class="col-11 text-center login-discription-col">
                                <span class="discription">Login
                                </span>
                            </div>
                        </div>


                        <!-- login  -->
                        <div class="container-fluid" id="login-window">
                            <!-- user infomation -->
                            <div class="user-infomation">


                                <div class="row mt-2 gap-0 row-gap-2">

                                    <div class="col-12">
                                        <span class="input">User Name</span>
                                        <input type="text" class="form-control input-box" id="loginUsername"
                                            placeholder="Ex. John" required>
                                    </div>

                                </div>

                                <div class="row mt-2 gap-0 row-gap-2">

                                    <div class="col-12">
                                        <span class="input">Password</span>
                                        <input type="password" class="form-control input-box" id="loginPassword"
                                            placeholder="••••••••" required>
                                    </div>

                                </div>

                            </div>

                            <div class="row m-2 mt-4" style="justify-content: center;">
                                <div class="col-auto ">
                                    <button class="btn btn-primary login-btn" id="Login_btn" onclick="login();">
                                        Login
                                        <i class="fa-solid fa-arrow-right-to-bracket" style="color:rgb(157, 208, 255);"></i>
                                    </button>
                                </div>

                            </div>

                        </div>
                        <!-- login  -->

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>
        function login() {
            var userName = document.getElementById("loginUsername").value;
            var password = document.getElementById("loginPassword").value;

            var f = new FormData();
            f.append("user", userName);
            f.append("pwd", password);

            var r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if (r.readyState == 4 && r.status == 200) {
                    var responce = JSON.parse(r.responseText);
                    alert_show(responce.alert_type, responce.msg);

                    if (responce.alert_type == "success") {
                        window.location.pathname = "/home.php";
                    }

                }
            }
            r.open("POST", "process.php", true);
            r.send(f);
        }


        // top alert showing funtion
        function alert_show(alertType, alertMsg) {
            var msg_box = document.getElementById("msg-box1");
            var box = document.createElement("div");

            box.innerHTML = `
                    <div class="alert ${alertType}-bg  alert-dismissible m-1 mb-2" id="" role="alert">
                        <div id="msg-box1-text">${alertMsg}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `;

            msg_box.append(box);
        }
    </script>
    <script src="LidaryFiles/bootstrap-5.3.3-dist/js/bootstrap.js"></script>

</body>

</html>