<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>天氣預報網站</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
    .heroImg {
        background-image: url("https://images.unsplash.com/photo-1512641406448-6574e777bec6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80");
        background-size: cover;
        border-radius: 0;
        height: 100vh;
        margin-bottom: 0;
    }

    .alert {
        display: none;
    }
</style>
<body>
<div class="jumbotron heroImg text-center">
    <div class="container pt-5">
        <h1 class="display-4 text-light">天氣預報</h1>
        <p class="lead text-light">請在如下輸入框輸入您要查詢的<strong class="text-warning">城市名稱</strong></p>

        <form>
            <div class="form-group col-md-7 mx-auto">
                <input id="city" type="text" name="city" class="form-control" placeholder="例如: London, Paris, San Francisco...">
            </div>
        </form>

        <button id="findMyWeather" type="submit" name="submit" class="btn btn-warning btn-lg">查 詢</button>
        <div class="col-8 mx-auto mt-3">
            <div id="success" class="alert alert-success">查詢成功</div>
            <div id="fail" class="alert alert-danger">無法找到您找尋的城市，請重新再試一次。</div>
            <div id="noCity" class="alert alert-danger">請輸入城市名稱。</div>
        </div>
        
    </div>
</div>

    <script>
        $("#findMyWeather").click(function(e) {
            e.preventDefault(); //暫停發送請求

            $(".alert").hide();

            if ($("#city").val() != "") {
                $.get("scraper.php?city="+$("#city").val(), function(data) {
                    if(data == "") {
                        $("#fail").fadeIn();
                    } else {
                        $("#success").html(data).fadeIn();
                    }


                });
            } else {
                $("#noCity").fadeIn();
            }
        });
    </script>
    
</body>
</html>