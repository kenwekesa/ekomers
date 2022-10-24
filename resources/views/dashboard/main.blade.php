
            @extends('layout.app')
            @section('content')
              <body>
                <nav class="navbar navbar-expand-md navbar-light bg-info">
                <div class="container">
                <a href="#" class="navbar-brand">EKOMERS</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">Offers</a>
                          @if(Auth::check()) 
                              <a href="{{route('cart')}}" class="nav-item nav-link" style="color:white;">Cart <i class="fa fa-shopping-cart"></i>@if(isset($productsNo)&&(count($productsNo)>0))<span class="badge badge-pill badge-danger"> {{count($productsNo)}} </span>
                              @endif
                            </a>
                          @endif
                        
                        
                    </div>
                    <form class="form-inline ">
                        <div class="input-group">                    
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="navbar-nav">
                    @if(Auth::check())
                        <div class="nav-item dropdown">
                   
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} Logged in</a>
                            <div class="dropdown-menu">
                                <a href="{{route('login')}}" class="dropdown-item">Profile</a>
                                <a href="{{route('logoutcustomer')}}" class="dropdown-item">Logout</a>
                                
                            </div>
                        </div>
                    @else
                    <div class="nav-item dropdown">
                   
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Login/Signup</a>
                            <div class="dropdown-menu">
                                <a href="{{route('login')}}" class="dropdown-item">Login</a>
                                <a href="{{route('loginadmin')}}" class="dropdown-item">Admin login</a>
                                <a href="{{route('signup')}}" class="dropdown-item">Signup</a>
                                
                            </div>
                        </div>
                    @endif
                    

                    </div>
                </div>
                </div>
            </nav>

        <div class="row">
           <div class="col-lg-2 sidediv">
               <p>CATEGORIES</p>
            <ul id="sidebar" class="sidemenu">
            <li><a href="/?category=clothing">Clothing</a></li>
            <li><a href="/?category=electronics">Electronics</a></li>
            <li><a href="/?category=computing">Computing</a></li>
            <li><a href="#">Kitchen</a></li>
            <li><a href="#">Food stuffs</a></li>
            <li><a href="#">Shoes</a></li>
           </ul>
           </div>

           <div class="col-lg-9 body">
             




           <section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade mt-2" data-ride="carousel">
        <div class="carousel-inner" role="listbox" style="width:1300px !important; max-height:600px !important;">
            <div class="carousel-item active">
                <img src="{{URL::asset('images/appliances.webp')}}" class="d-block w-100" style="max-height:100%; max-width:100%; object-fit:contain" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{URL::asset('images/comp.webp')}}" class="d-block w-100" style="max-height:100%; max-width:100%" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{URL::asset('images/monitor.webp')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{URL::asset('images/menclothing.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{URL::asset('images/womenwear.webp')}}" class="d-block w-100" alt="...">
            </div>
  
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>





<br/><br/>


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
    @if(isset($product))

            @foreach($product as $prod)
                            <div class="col-md-3">
                      <div class="card mb-2 h-100 shadow border-0">
                        <img class="card-img-top"
                          src="{{URL::asset($prod->photo)}}"
                          alt="Card image cap" height='120' width='100'/>
                        <div class="card-body">
                          <div>           
                          <h4 class="card-title">{{$prod->productname}}</h4>
                          <p class="card-text">{{$prod->description}}</p>
                          </div><br>
                          <div class="row pricing">
                                <div class="col-md-6">
                                    <div class="normalprice"><strike>Ksh. {{$prod->unitprice + 80}}</strike></div>
                                    <div class="offerprice">{{$prod->unitprice}}({{round(((80/($prod->unitprice + 80))*100),2)}}%)</div>
                                </div>
                                <div class="col-md-6 availability">
                                    <p>Available or shipped from overseas</p>
                                </div>
                                
                          </div>

                          <!--ADD TO CART FORM-->
                          @if(Auth::check())

                                    <button class="align-self-end btn btn-md-3 btn-block btn-primary addbutton" style="margin-top: auto; margin-bottom: 0; margin-right:0;" data-id="{{$prod->id}}" data-unitprice="{{$prod->unitprice}}" data-name="{{$prod->productname}}">Add to my cart</button>
                              
                          
                          @else
                          
                          <form method="POST" action="logintobuy">
                                  {{ csrf_field() }}
                                <button type="Submit"  class="align-self-end btn btn-md-3 btn-block btn-primary" style="margin-top: auto; margin-bottom: 0; margin-right:0;">Add to my cart</button>


                                <!--alert for user to login before adding to cart-->
                                
                          </form>
                          
                          @endif

                        </div>
                        
                      </div>
                    </div>
          @endforeach

        @else
        <div class="alert alert-warning col-12">
                      <h4>No product available in your stock at the momrent</h4>
          </div>

      @endif
               
               </div>
          </div>
          
        </div>





<!--PRODUCT MODAL-->


        <div class="modal fade" id="productmodal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">

                                           <p class="text">Confirm product details</p>
                                        </div>
                                      
                                  @if(Auth::check())
                                  <br/>
                                  
                                    <form method="POST" action="{{url('/addtocart')}}">
                                                    {{ csrf_field() }}
                                         <input type="hidden" name="customer_id" value="{{Auth::user()->id}}"/>
                                         
                                        <div class="modal-body">   
                                        <input type="hidden" class="prodid" name="product_id" /> 
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-4 col-form-label">Product Name: </label>
                                            <div class="col-sm-8">
                                              <input type="text" disabled class="form-control product_name" id="product_name"/>
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
                                                <input type="number" class="quantity" name="quantity" value="1" min="0" max="30" step="1"/>
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
                                                  <button  class=" btn btn-primary" data-toggle="modal" data-target="#myModalProduct">Add to my cart</button>
                                                  
                                            
                                      </div>
                                    </form>
                                          @endif
                                      </div>
                                   </div>
                                
          </div>




        <!-- Footer -->
        <footer class="page-footer font-small blue-grey lighten-5 futa">

          <div style="background-color: #21d192;">
            <div class="container">

              <!-- Grid row-->
              <div class="row py-4 d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                  <h6 class="mb-0">Get connected with us on social networks!</h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-7 text-center text-md-right">

                  <!-- Facebook -->
                  <a class="fb-ic">
                    <i class="fab fa-facebook-f white-text mr-4"> </i>
                  </a>
                  <!-- Twitter -->
                  <a class="tw-ic">
                    <i class="fab fa-twitter white-text mr-4"> </i>
                  </a>
                  <!-- Google +-->
                  <a class="gplus-ic">
                    <i class="fa fa-google-plus-g white-text mr-4"> </i>
                  </a>
                  <!--Linkedin -->
                  <a class="li-ic">
                    <i class="fa fa-linkedin white-text mr-4"> </i>
                  </a>
                  <!--Instagram-->
                  <a class="ins-ic">
                    <i class="fa fa-instagram white-text"> </i>
                  </a>

                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row-->

            </div>
          </div>

          <!-- Footer Links -->
          <div class="container text-center text-md-left mt-5">

            <!-- Grid row -->
            <div class="row mt-3 dark-grey-text">

              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

                <!-- Content -->
                <h6 class="text-uppercase font-weight-bold">Company name</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                  consectetur
                  adipisicing elit.</p>

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Products</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                  <a class="dark-grey-text" href="#!">MDBootstrap</a>
                </p>
                <p>
                  <a class="dark-grey-text" href="#!">MDWordPress</a>
                </p>
                <p>
                  <a class="dark-grey-text" href="#!">BrandFlow</a>
                </p>
                <p>
                  <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
                </p>

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                  <a class="dark-grey-text" href="#!">Your Account</a>
                </p>
                <p>
                  <a class="dark-grey-text" href="#!">Become an Affiliate</a>
                </p>
                <p>
                  <a class="dark-grey-text" href="#!">Shipping Rates</a>
                </p>
                <p>
                  <a class="dark-grey-text" href="#!">Help</a>
                </p>

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                  <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                <p>
                  <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                <p>
                  <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                <p>
                  <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
          <!-- Footer Links -->

          <!-- Copyright -->
          <div class="footer-copyright text-center text-black-50 py-3">© 2018 Copyright:
            <a class="dark-grey-text" href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
          </div>
          <!-- Copyright -->

        </footer>
        <!-- Footer -->

<script>
     $(document).ready(function(){
  $(".addbutton").click(function(e){


  var product_name = $(this).data('name');
  var unitprice = $(this).data('unitprice');
  var product_id= $(this).data('id');
  $('.modal-body .product_name').val(product_name);
  $('.modal-body .unitprice').val(unitprice);
  $('.modal-body .prodid').val(product_id);
  

  $("#productmodal").modal("show");
  var quantity = $('.modal-body .quantity').val();

  $('.modal-body .totalprice').val(quantity*unitprice);
  
  
  });
  $("#productmodal").on('show.bs.modal', function(){
    console.log('this is it...');
  });
});
</script>
</body>
 @endsection