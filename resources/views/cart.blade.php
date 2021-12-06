
@extends('master')

@section('content')
  <main>
     
    <div class="row  text-center">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Cart::getContent() as $row)
                    <tr>
                        <th scope="row">#</th>
                        <td>
                            {{$row['name']}}
                        
                        </td>
                        <td>{{$row['price']}}</td>
                        <td>
                            <input data-id="{{$row['id']}}" type="button" value="-" class="update-cart">
                            {{$row['quantity']}}
                            <input data-id="{{$row['id']}}" type="button" value="+" class="update-cart">
                        </td>
                        <td>
                            {{$row['quantity']*$row['price']}}$
                            <a href="{{url("shop/remove-product/".$row['id'])}}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
        
        <p>
            <b>Total in cart:</b>{{Cart::getSubTotal()}}$
        </p>
        <p>
        <a href="{{url('shop/deleteCart')}}" class="btn btn-primary">Clear cart</a>
        </p>
        <p>
            <a href="{{url('shop/saveOrder')}}" class="btn btn-primary">Order now</a>
        </p>
    </div>

  </main>
@endsection