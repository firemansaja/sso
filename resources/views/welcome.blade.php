
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="http://60.60.60.48/dapodik/dapodik_v04/public/logo.png">
        <link rel="stylesheet" href="http://60.60.60.48/dapodik/dapodik_v04/public/style.css">
        <meta name="author" content="Firman Hidayatulloh">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap-grid.min.css" integrity="sha512-EAgFb1TGFSRh1CCsDotrqJMqB2D+FLCOXAJTE16Ajphi73gQmfJS/LNl6AsjDqDht6Ls7Qr1KWsrJxyttEkxIA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="http://60.60.60.48/dapodik/dapodik_v04/public/bower_components/jquery/dist/jquery.min.js"></script>
        <title>SMKN 1 Slawi || Single Sign On</title>
        <style>
            .text-danger {color: salmon}
            body {font-family: Tahoma}
        </style>
    </head>
    <body>
        <div class="container" id="container">
            <div class="form-container log-in-container">
                <form method="POST" action="http://60.60.60.48/dapodik/dapodik_v04/public/login" accept-charset="UTF-8">
                    <input name="_token" type="hidden" value="dmLkGDJdvEcN956vQ5uBMxSSKvNqHYPeHIoYSsB1">
                    <div><img src="http://60.60.60.48/dapodik/dapodik_v04/public/logo.png" height="100"></div>
                    <div style="margin-top: 15px;">SMK Negeri 1 Slawi Kab. Tegal</div>
                    <div style="margin-bottom: 15px; font-size: 32pt; line-height: 90%;"><b>SINGLE SIGN ON</b></div>
                    <input type="email" name="username" placeholder="Username" />
                    <input type="password" name="password" class="form-password" placeholder="Password" />
                    <div><input type="checkbox" class="form-checkbox"> Lihat password</div>
                    <button name="submit" style="margin-top: 10px;">Log In</button>
                </form>
            </div>
            <div class="overlay-container hidden-xs">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>SMK NEGERI 1 SLAWI</h1>
                        <br>
                        <div>Jl. H. Agus Salim Procot Kecamatan Slawi Kabupaten Tegal Kode Pos 52412</div>
                        <div>Telepon (0283) 491366 Fax (0283) 491336</div>
                        <div>smkn1_slawi@yahoo.co.id</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.form-checkbox').click(function(){
                if($(this).is(':checked')){
                    $('.form-password').attr('type','text');
                }else{
                    $('.form-password').attr('type','password');
                }
            });
        });
    </script>
</html>
