<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title> 

    <!-- Icons font CSS-->
    
    <link href="{{ asset('css/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('css/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
  

    <!-- Vendor CSS-->
    <link href="{{asset('css/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('css/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Edit product details</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="name">
                        </div>
                       
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="EXPIRY DATE" name="expirydate">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            
                           
                    <div class="row row-space"> 
                      <div class="col-6">
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <option disabled="disabled" selected="selected">---   ----CATEGORY---   ----</option>
                                    <option>Appliances</option>
                                    <option>Computer</option>
                                    <option>Kitchen utensils</option>
                                    <option>Men wear</option>
                                    <option>Women wear</option>
                                    <option>Men lotion</option>
                                    <option>Women lotion</option>
                                    <option>Textbooks</option>
                                    <option>Exercise books</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="input-group">
                                    <input class="file" type="file" placeholder="PRODUCT PHOTO/S" name="unitprice">
                    </div>
                    </div>

                    </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="UNIT PRICE" name="unitprice">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="BRAND" name="brand">
                                </div>
                            </div>
                        </div>
                        


                                 <div class="form-group shadow-textarea">
                                <label for="exampleFormControlTextarea6">Product description</label>
                                <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Update</button>
                            <button class="btn btn--radius btn--green" type="submit">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('js/global.js')}}"></script>

</body>
</html>