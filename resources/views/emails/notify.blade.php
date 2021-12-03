<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        h1{
            color: #971914;
        }
        h2{
            color: #971914;
        }
        .container{
            margin:20px;
        }
        label{
            color: #971914;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{$subject}}</h1>
        <h2>Tienes un nuevo pedido!</h2>
        <strong>Pedido No: </strong><label>{{$order_data}}</label>
        <p>Realiza el seguimiento y actualizacion de tus pedidos en el sitio</p>
        <i><small>
            <footer class="text-footer">
                <!-- Grid container -->
                <span>SG Iluminacion SA de CV® | 2021 Tienda en linea<br>
                    Este documento contiene informacion confidencial de SG Iluminacion y sus Asociados, cualquier uso indebido<br>
                    sera castigado ante la ley de Diosito y Santa le traera carbon | 
                        a {{Carbon\Carbon::now()->format('d')}}
                        de {{Carbon\Carbon::now()->format('M')}}
                        del {{Carbon\Carbon::now()->format('Y')}}</span>
                <!-- Copyright -->
                <div>© 2021 |<a> SG Iluminacion.com</a></div>
                <!-- Copyright -->
                </footer>
            </small><i>
    </div>
</body>
</html>