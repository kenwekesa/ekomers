 @extends('layout.app')
 @section('content')


<!--SETTING VARIABLES-->
 <?php 
     $payment_state=0;
     $total=0;
     $balance;
 ?>
 @if(isset($payment_status))
     <?php
          $payment_state = $payment_state + $payment_status->amount_paid;
          $balance = $payment_status->balance;
     ?>
  @else
     <?php $payment_state = 0;?>
    @endif


 
 <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="height:60px; text-align:center; color:white;">
     <b> Ekomers </b><a><span style="text-align:center; margin-left:70px;">My cart</span></a>
 </nav>
 <div class="container-fluid" style="margin:10px;">


 <!--AlERT MESSAGE-->
<div class="success">
            @if(session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
            @elseif(session()->has('error'))
                          <div class="alert alert-danger">
                              {{ session()->get('error') }}
                          </div>
            @endif
</div>
<br/>
    <div class="row">
            <div class="card text-center col-md-8">
            <div class="card-body" style="height:relative;">
               <table class="table table-striped">
                 <thead class="thead-dark">
                 <tr>
                  <th scope="col">Product Name </th>
                  <th scope="col">Quantity   </th>
                  <th scope="col">Unit price </th>
                  <th scope="col">Sub total</th>
                  <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                <!--initialising variable totla in -->
                

                @foreach($user_products as $productt)
                <?php $total += $productt->quantity * $productt->unitprice; ?>
                <tr>
                    <td>{{$productt->productname}}</td>
                    <td>{{$productt->quantity}}</td>
                    <td>{{$productt->unitprice}}</td>
                    <td> {{$productt->quantity * $productt->unitprice}}</td>
                    <td>

                          <form method="POST" action="remove/{{$productt->idd}}">
                              {{ csrf_field() }}

                                     <div class="form-group">
                                        <input type="submit" class="btn btn-danger remove-product" value="Remove">
                                    </div>
                           </form>
                    
                    <button class="btn btn-warning editbutton" data-id="{{$productt->id}}" data-idd="{{$productt->idd}}" data-unitprice="{{$productt->unitprice}}" data-quantity ="{{$productt->quantity}}" data-productname="{{$productt->productname}}" data-totalprice="{{$productt->totalprice}}">Edit</button></td>
                </tr>
                @endforeach
               
                <tr>
                     <th scope="row" colspan="3">GRAND TOTAL</th>
                     <td style="background-color:blue;color:white;"><b>Ksh. {{$total}}</b></td>
                     @if($payment_state >= $total)
                     <td style="background-color:green;color:white;"><i>Payment made</td>
                      @else

                      <td style="background-color:maroon;color:white;"><i>Balance: {{$total-$payment_state}} </td>
                      @endif
                </tr>
                 <tr>
                     <th scope="row" colspan="4" style="background-color:blue;color:white;">YOUR BOOK BALANCE</th>
                     
                     @if($balance>=0)
                     <td style="background-color:blue;color:white;"><i>{{$balance}}</td>
                      @else

                      <td style="background-color:red;color:white;"><i>{{$balance}}</td>
                      @endif
                </tr>

                </tbody>
               </table>
            </div>
            </div>
            <div class="col-md-4">
               <div class="col-md-12">
                 <a href="#" class="btn btn-danger col-12">Cancel Cart</a>
                 </div><br>
                 <div class="col-md-12 alert alert-success">
                 Your make an order of more than Ksh. 10000, you get a waiver on the price by 75% of the delivery fee.
                 </div>

                 <h3>Ways of payment</h3> <br/>
                 <a href="">
                 <div class="col-md-12" style="border-top: 1px solid grey;">
                 <aside class="aside"> <img width="70" heght="60" src="{{ asset('images/mastercard.png') }}"> </aside>
                     <div class="text-wrap small text-muted">
                            Pay by MasterCard and Save 40%.
                            <br> Lorem ipsum dolor
                     </div>
                 </div>
               </a>

                 <a href="#" class="paymentlink" id="paymentlink" data-meth="Mpesa" data-name="proname" data-totalcost={{$total}}>
                 <div class="col-md-12" style="border-top: 1px solid grey;">
                 <aside class="aside"> <img width="70" heght="60" src="{{ asset('images/mpesa.png') }}"> </aside>
                     <div class="text-wrap small text-muted">
                          Mpesa mobile money
                            <br> Lorem ipsum dolor
                     </div>
                 </div>
               </a>

                 <a href="">
                 <div class="col-md-12" style="border-top: 1px solid grey;">
                 <div class="col-4"> <img width="70" heght="60" src="{{ asset('images/visaa.png') }}"> </div>
                     <div class="text-wrap small text-muted col-6">
                            Visa card.
                            <br> Lorem ipsum dolor
                     </div>
                 </div>
               </a>

                 <a href="#">
                 <div class="col-md-12" style="border-top: 1px solid grey;">
                 <div class="col-4"> <img width="120" heght="110" src="{{ asset('images/paypal.png') }}"> </div>
                     <div class="text-wrap small text-muted col-6">
                            Paypal
                            <br> Lorem ipsum dolor
                     </div>
                 </div>
               </a>
                 <br>
                 <div class="col-md-12">
                 <form method="POST" id="order_form" action="placeorder">
                 {{ csrf_field() }}

                 <input type ="hidden" name="payment_method" value="M-Pesa">
                 <input type="hidden" name="due_date" value="12.23.2020">
                 <input type ="hidden" value="{{Auth::user()->id}}" name="customer_id">
                 <input type="hidden" value ="{{$total}}" name="total_price">
                     <button class="btn btn-success col-12" onclick="paymentvalidation()" data-total_cost={{$total}} data-total_paid={{$payment_state}}>Proceed to make an order</button>

                  </form>
                 </div>

            </div>
        </div>
        




      <!-- EDIT PRODUCT ON CART MODAL-->

 <div class="modal fade" id="editproductmodal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">

                                           <p class="text">Edit cart product</p>
                                        </div>
                                      
                                  
                                  <br/>
                                  
                                    <form method="POST" id="editform" action="{{url('/edit_cart')}}">
                                                    {{ csrf_field() }}
                                         <input type="hidden" name="customer_id" value="{{Auth::user()->id}}"/>
                                         

                                         
                                        <div class="modal-body">   
                                        <input type="hidden" class="prod_id" id="prod_id" name="prod_id" />
                                         <input type="hidden" class="product_id" id="product_id" name="product_id" />

 
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-4 col-form-label">Product Name: </label>
                                            <div class="col-sm-8">
                                              <input type="text" disabled name="product_name" class="form-control product_name" id="product_name"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="price" class="col-sm-4 col-form-label">Unit price</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control unitprice" name="unitprice" id="unitprice" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                          <label for="quantity" class="col-sm-4 col-form-label">Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="quantity" name="quantity" id="quantity" value="1" min="0" max="10" step="1"/>
                                            </div>
                                          </div>

                                          <div class="form-group row">
                                          <label for="totalprice" class="col-sm-4 col-form-label">Total Price</label>
                                            <div class="col-sm-8">
                                                <input class="btn btn-danger totalprice" name="totalprice" />
                                            </div>
                                          </div>
                                    
                                      </div>
                                    
                                      <div class="modal-footer">
                                                  <button  class=" btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                  <button  class=" btn btn-primary" data-toggle="modal" data-target="#myModalProduct">Update</button>
                                                  
                                            
                                      </div>
                                    </form>
                                          
                                      </div>
                                   </div>
                                
          </div>


            <!--PAYMENT MODAL-->
          <div class="modal fade" id="paymentmodal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">

                                           <p class="payment_header"></p>
                                        </div>
                                      
                                  
                                  <br/>
                                  
                                    <form method="POST" id="editform" action="{{url('/pay')}}">
                                                    {{ csrf_field() }}
                                         <input type="hidden" name="customer_id" value="{{Auth::user()->id}}"/>
                                         
                                        <div class="modal-body">   
                                        <input type="hidden" class="method" name="method" /> 
                                        <input type="hidden" class="totalcost2" name="totalcost2" /> 

                                        <div class="form-group row">
                                            <label for="total_paid" class="col-sm-4 col-form-label">Amount Paid: </label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control total_paid" name="total_paid"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-sm-4 col-form-label">Mpesa Code: </label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control code" id="code"/>
                                            </div>
                                        </div>

                                        
                                          <div class="form-group row">
                                          <label for="totalprice" class="col-sm-4 col-form-label">Order Cost</label>
                                            <div class="col-sm-8">
                                                <input class="btn btn-danger totalprice" name="totalprice" />
                                            </div>
                                          </div>
                                    
                                      </div>
                                    
                                      <div class="modal-footer">
                                                  <button  class=" btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                  <button  class=" btn btn-primary" data-toggle="modal" data-target="#paymentmodal">Finish Payment</button>
                                                  
                                            
                                      </div>
                                    </form>
                                          
                                      </div>
                                   </div>
                                
          </div>
          <!--MODAL TO REMIDN FOR PAYMENT BEFORE ORDER IS MADE-->
             <div class="modal fade" id="need_to_pay_modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">

                                           <p class="payment_header"></p>
                                        </div>
                                  <div class="modal-body">
                                    <p>Kindly pay bofore you proceed to make an order, thanks.</p>
                                  </div>
                                   
                                          
                                      </div>
                                   </div>
                                
          </div>




      
 <div class="futa footer bg-secondary" style="height:40px;">
        <div col-md-12 style="text-align:center; padding-top: 6px; color:white">ekomers confirm order</div>
 </div>

    
 </div>







<!--Javascript function to confirm removal of items from the cart-->
 <script>
  /*SCRIPT FOR MODAL*/
  
 // $(document).ready(function(){
 // $(".editbutton").click(function(e){
      
  //var aidii = $(this).data('id');
  //document.getElementById("editform").action = "{{'url/"+aidii+"'}}"; 

 /* var product_name = $(this).data('productname');
  var unitprice = $(this).data('unitprice');
  var product_id= $(this).data('id');

  $('.modal-body .product_name').val(product_name);
  $('.modal-body .unitprice').val(unitprice);
  $('.modal-body .prodid').val(product_id);
  

  $("#editproductmodal").modal("show");
  var quantity = $('.modal-body .quantity').val();

  $('.modal-body .totalprice').val(quantity*unitprice);
  });

//for payment
  $(".paymentlink").click(function(e){
      

  var method = $(this).data('method');

  $('.modal-header .text').val(method);
  $('.modal-body .method').val("Payment by "+method);
  

  $("#paymentmodal").modal("show");
  
 });
 
});

function actionn(aidii)
{
    return "url('/edit/'"+aidii")";
}*/
$('.remove-product').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

function myFunction() {
      if(!confirm("Are you sure you want to remove the item from the cart?"))
      event.preventDefault();
  }

   $(document).ready(function(){
  $(".editbutton").click(function(e){


  var product_name = $(this).data('productname');
  var unitprice = $(this).data('unitprice');
  var quantity = $(this).data('quantity');
  var prodid = $(this).data('idd');

  var product_id= $(this).data('id');
  $('.modal-body .product_name').val(product_name);
  $('.modal-body .unitprice').val(unitprice);
  $('.modal-body .quantity').val(quantity);
    $('.modal-body .prod_id').val(prodid);
        $('.modal-body .product_id').val(product_id);


  

  $("#editproductmodal").modal("show");
 // var quantity = $('.modal-body .quantity').val();

 // $('.modal-body .totalprice').val(quantity*unitprice);
  
  
  });

    $(".paymentlink").click(function(e){

  
  var method = $(this).data('meth');

  var product_name2 = $(this).data('name');
  var totalcost = $(this).data('totalcost');
  var product_id= $(this).data('id');

  $('.modal-header .payment_header').html("Payment by "+method);
  $('.modal-body .totalprice').val("Ksh. "+totalcost);
  $('.modal-body .totalcost2').val(totalcost);
    $('.modal-body .method').val(method);


 // $('.modal-body .product_name').val(product_name);
  //$('.modal-body .unitprice').val(unitprice);
  //$('.modal-body .prodid').val(product_id);
  

  $("#paymentmodal").modal("show");

 // var quantity = $('.modal-body .quantity').val();

 // $('.modal-body .totalprice').val(quantity*unitprice);
  
  
  });
  
});

   function paymentvalidation()
   {
     var total_paid=$(this).data(total_paid);
     var total_price=$(this).data(total_price);
     if(total_paid>=totalprice)
     {
        document.order_form.submit();
     }
     else
     {
         $("#need_to_pay_modal").modal("show");

     }

   }

 </script>
 
 @endsection