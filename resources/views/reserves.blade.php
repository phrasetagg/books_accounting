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
        <div class="title m-b-md" id="h1">
            Books Accounting
        </div>

        <form id="reserveForm" method="POST">

            <div class="row">
                <div>
                    <input type="text" name="name" placeholder="* Введите ваше имя" required/>
                </div>
                <div>
                    <input type="text" name="renter" placeholder="* Название книги" required/>
                </div>
                <div>
                    <input type="text" name="quantity" placeholder="* Количество" required/>
                </div>
                <div>
                    <input type="date" name="date_start" placeholder="* Дата начала аренды" required/>
                </div>
                <div>
                    <input type="date" name="date_end" placeholder="* Дата окончания аренды" required/>
                </div>
                <div>
                    <input type="text" name="deposit" placeholder="* Сумма залога" required/>
                </div>
                <div>
                    <input type="text" name="total_price" placeholder="* Итого" required/>
                </div>
                <div>
                    <button class="btn-reserve" type="submit">Подтвердить</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $("document").ready(function () {
            $("#reserveForm").submit(function () {
                data = $(this).serialize();
                $.ajax({
                    method: "POST",
                    dataType: "json",
                    url: '/api/reserves',
                    data: data,
                    type: 'JSON',
                    success: function (answer) {
                        $("#h1").text("Аренда прошла успешно!");
                        $("#reserveForm")[0].reset();
                    }
                });
                return false;
            });
        });
    </script>
</div>
</body>
</html>
