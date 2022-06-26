<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Checkout</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
 <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>
	@include('components.navbar')
	
	
    <section class="checkout">
        <div class="container">
            <div class="row text-center ">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        YOUR FUTURE CAREER
                    </p>
                    <h2 class="primary-header">
                        Start Invest Today
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="images\rempel.png" alt="" class="cover">
                                <h1 class="package">
                                    Dres Rempel 
                                </h1>
								
								<p> Rp. 170.000</p>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio diam adipiscing suspendisse porttitor auctor pellentesque urna, molestie. 
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="#" class="basic-form">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="phonenumber" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Address</label>
									<textarea style="background:#F1F1F5" class="form-control" type="text"  id="address" aria-describedby="emailHelp"></textarea>
                                    
                                </div>
                                <div class="mb-5">
                                   <button style="background-color: #BF9270; border-color: #BF9270; border-radius: 20px; width: 410px; height: 45px"  type="submit" back >Pay Now</button>
                                <p class="text-center subheader mt-4">
                                    <img src="ic_secure.svg" alt=""> Your payment is secure and encrypted.
                                </p>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
