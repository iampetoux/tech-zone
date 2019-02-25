@extends('layouts.app')

@section('content')
    @if (Auth::user() != null)
        <?php $number = 1 ?>
        <?php $total = 0 ?>
        <div class="panier">

            <div class="top"><h1 class="title">Your cart</h1></div>
            <table class="info" id="info">
                <tr class ="tr">
                    <td>N °</td>
                    <td>Picture</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                </tr>
                <script>
                var student;
                for (var i = 0; i < localStorage.length; i++) {
                    student = {
                        picture: "<img src=\"" + JSON.parse(localStorage.getItem('item'))[i]['picture'] + "\">",
                        name: JSON.parse(localStorage.getItem('item'))[i]['name'],
                        price: JSON.parse(localStorage.getItem('item'))[i]['price'],
                        select:JSON.parse(localStorage.getItem('item'))[i]['quantity']
                    };
                    var table = document.getElementById("info");
                    var row = table.insertRow(i + 1);
                    row.className="tr";

                    var cell0 = row.insertCell(0);
                    var cell1 = row.insertCell(1);
                    var cell2 = row.insertCell(2);
                    var cell3 = row.insertCell(3);
                    var cell4 = row.insertCell(4);
                    var select = document.createElement('select');
                    select.id = i;
                    for (var j = 1; j < 5; j++) {
                        var option = document.createElement('option');
                        option.value = student.select;
                        option.innerHTML = j;
                        select.append(option);
                    }
                    cell4.append(select);
                    cell0.innerHTML = i;
                    cell1.innerHTML = student.picture,
                    cell2.innerHTML = student.name,
                    cell3.innerHTML = student.price;
                    localStorage.setItem('item', JSON.stringify(student));
                }
               </script>

            </table>
        </div>

        <div class="pay">
            <h1>Total :</h1>
            <label for="text">{{$total}},00 $</label>
            <br><br>

            <a href="/pay/{{$total}}"><div class="enjoy-css">Pay</div></a>
            <br><br>
            @if(\Session::has('message'))
                <a href="/update_profile/{{Auth::user()->id}}" style="color: #960023; text-decoration: none">{!! \Session::get('message') !!}</a>
            @endif
            <div></div>
            <br>
        </div>
    @endif
@endsection
