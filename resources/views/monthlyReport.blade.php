
    <!-- Styles -->
    <style>
    h2{
        font-family: Arial, Helvetica, sans-serif;
        text-align:center;
    }
    .header{
        margin:auto;
        font-family: Arial, Helvetica, sans-serif;
        border-collapse:collapse;
        width:100%;
        margin-bottom:15px;
        font-size:14px;
    }
    .orders{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse:collapse;
        width:100%;
    }
    .orders td, .orders th{
        border: 1px solid #DDDDDD;
        padding: 8px;
    }
    .orders tr:nth-child(even){
        background-color: #F4F4F4;

    }
    thead th{
        padding-top:12px;
        padding-bottom:12px;
        text-align: left;
        background-color:#EFEFEF;
        color: #971914
    }
    .text-break{
        font-family: Arial, Helvetica, sans-serif;
        text-align:left;
    }
    .text-footer{
        font-family: Arial, Helvetica, sans-serif;
        text-align:center;
        color:#7b7b7b;
        padding-top:10px;
        font-size:13px;
        position:absolute;
        bottom:0;
        padding-left:2%;
    }
</style>

<div class="container">
    <div class="container">
        <h2>REPORTE DE VENTAS</h2>
    <table class="header">
                <tbody>
                    <tr>
                        <td><span class="text-break">SG Iluminacion SA de CV</span></td>
                        <td><span class="text-break">Fecha: {{Carbon\Carbon::now()->format('d/M/Y')}}</span></td>
                    </tr>
                    <tr>
                        <td><span class="text-break">Proveedor: <b>{{Auth::user()->provider->name}}</b></span></td>
                        <td><span class="text-break">Hora: {{Carbon\Carbon::now()->format('H:i')}} hrs.</span></td>
                    </tr> 
                    <tr>
                        <td><span class="text-break">
                            Periodo: {{Carbon\Carbon::now()->startOfMonth()->format('d/M/Y')}}
                            - {{Carbon\Carbon::now()->endOfMonth()->format('d/M/Y');}}</span></td>
                        <td><span class="text-break">Generado por: {{Auth::user()->name}}</span></td>
                    </tr>  
                </tbody>
            </table>
    <div class="col">
            <table class="orders">
                <thead class="bg-light">
                    <tr>
                        <th>SKU</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Monto</th>
                        <th>Comision (10%)</th>
                        <th>Monto Neto</th>
                </thead>
                <tbody>
                    <!--{{$subtotal_acum=0}}-->
                    <!--{{$quant_acum=0}}-->
                    <!--{{$comission_acum=0}}-->
                    <!--{{$total_acum=0}}-->
                @foreach( $carts as $cart)
                    <tr>
                        <td> {{ $cart->product->sku}} </td>
                        <td> {{ \Carbon\Carbon::parse($cart->created_at,'America/Mexico_City')->format('d-M-Y')}}</td>
                        <td> {{ $cart->quant_product}} </td>
                        <td> {{ $cart->subtotal}} </td>
                        <td> {{ ($cart->subtotal)*.10}} </td>
                        <td> {{ ($cart->subtotal)-(($cart->subtotal)*.10)}} </td>
                    </tr>
                    <!--{{$quant_acum=$quant_acum+($cart->quant_product)}}-->
                    <!--{{$subtotal_acum=$subtotal_acum+($cart->subtotal)}}-->
                    <!--{{$comission_acum=$comission_acum+($cart->subtotal)*.10}}-->
                    <!--{{$total_acum=$total_acum+(($cart->subtotal)-(($cart->subtotal)*.10))}}-->
                @endforeach
                <tr style="background-color:#F4F4F4;">
                    <td></td>
                    <td><b>Total</b></td>
                    <td> <b> {{$quant_acum}} </b></td>
                    <td> <b> {{$subtotal_acum}} </b></td>
                    <td> <b> {{$comission_acum}} </b></td>
                    <td> <b> {{$total_acum}} </b></td>
                </tr>  
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <footer class="text-footer">
  <!-- Grid container -->
  <span>SG Iluminacion SA de CV® | 2021 Reporte de ventas mensual<br>
    Este documento contiene informacion confidencial de SG Iluminacion y sus Asociados, cualquier uso indebido<br>
    sera castigado ante la ley de Diosito y Santa le traera carbon,
        a {{Carbon\Carbon::now()->format('d')}}
        de {{Carbon\Carbon::now()->format('M')}}
        del {{Carbon\Carbon::now()->format('Y')}}</span>
  <!-- Copyright -->
  <div>© 2021 |<a> SG Iluminacion.com</a></div>
  <!-- Copyright -->
</footer>
