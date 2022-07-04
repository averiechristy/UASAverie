<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body> 
    @include('components.navbar')
	
	<section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Product
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include ('components.alert')
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $checkout)
                        <tr class="align-middle">
                            <td width="18%">
                                <img src="{{asset('images/produknew.png')}}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{$checkout->Product->title}}</strong>
                                </p>
                                <p>
                                {{$checkout->created_at-> format('M d, Y')}}
                                </p>
                            </td>
                            <td>
                                    <strong>
                                        Rp. {{$checkout->total}}
                                        @if ($checkout->discount_id)
                                            <span class="badge bg-success">Disc {{$checkout->discount_percentage}}%</span>
                                        @endif
                                    </strong>
                                </td>
                                <td>
                                    <strong>
                                    ${{$checkout->total}}
                                    </strong>
                                </td>
                            <td>
                                  <strong>{{$checkout->payment_status}}</strong>
                                </td>
                                <td>
                             @if ($checkout->payment_status == 'waiting')
                                        <a href="{{$checkout->midtrans_url}}" class="btn btn-primary">Pay Here</a>
                                    @endif
                            </td>
                            
                            <td>
                                <a href="https://wa.me/087727606097?text=Hi, saya ingin bertanya tentang {{$checkout->Product->title}}" class="btn btn-primary">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5"></td>
                                <h3> No Product Checkouted </h3>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
