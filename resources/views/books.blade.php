<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content" id="content">
        <div class="title m-b-md">
            Books Accounting
        </div>

        <div class="links">
            <input class="getBooks" id="getBooks" type="button" value="Аренды">
            <input class="reserves" id="reserves" type="button" value="Новая аренда" onclick="top.location.href='/reserves/'"><br>
            <label id="label">Аренды</label>
        </div>
    </div>
    <script>
        $(document).on("click", "#getBooks", function () {
            $.ajax({
                method: "GET",
                url: '/api/reserves',
                type: 'JSON',
                success: function (jsondata) {
                    console.log(jsondata);
                    let div = document.createElement('ul');

                    jsondata.forEach(element => div.innerHTML += "<li>" + element['renter'] + " Дата начала аренды:" + element['date_start'] + " Дата окончания аренды:" + element['date_end'] + "</li>");
                    content.append(div);
                }
            })
        });
    </script>
</div>
</body>
</html>
