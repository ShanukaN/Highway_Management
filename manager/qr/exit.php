<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/all.css">

    <title>Exit QR</title>
</head>

<body>
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="border shadow p-4 mt-5">
                    <div class="row mb-2">
                        <div class="col-sm ">
                            <h1 class="m-0 ">Exit QR</h1>
                        </div>
                    </div>
                    <hr>
                    <a href="../qr_code.php" class="btn btn-primary mb-2">Back</a>
                    <div class="row">
                        <div class="col-md-6 ">
                            <video id="preview" width="100%"></video>
                        </div>
                        <div class="col-md-6">
                            <form action="exit_qrcode.php" method="post" class="horizontal">
                                <label for="">Scan QR</label>
                                <input type="password" name="nic" id="nic" class="form-control">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert('No cameras');
        }
    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan', function(c) {
        document.getElementById('nic').value = c;
        document.forms[0].submit();
    });
    </script>




</body>

</html>