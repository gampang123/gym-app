<DOCTYPE HTML>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Kelompok 3 Godzilla FullStack 4">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">

  <title>User Gym and Court App</title>

  <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('css/templatemo-training-studio.css') }}">
</head>
<body>
     <!-- ***** Schedule Starts***** -->
     <section class="section" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Jadwal <em>Kelas</em></h2>                      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="filters">
                        <ul class="schedule-filter">
                            <li data-tsfilter="Senin">Senin</li>
                            <li data-tsfilter="Selasa">Selasa</li>
                            <li data-tsfilter="Rabu">Rabu</li>
                            <li data-tsfilter="Kamis">Kamis</li>
                            <li data-tsfilter="Jumat">Jum'at</li>
                            <li data-tsfilter="Sabtu">Sabtu</li>
                            <li data-tsfilter="Minggu">Minggu</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="schedule-table filtering" >
                        <table id="data-table">
                            <thead>
                                <tr class="text-center">
                                    <td class="text-center">Kelas</td>
                                    <td class="text-center">Trainer</td>
                                    <td class="text-center">Waktu</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedClasses as $day => $classes)
                                    @foreach($classes as $class)                                       
                                            <tr>
                                                <td class="day-time">{{ $class->class_name }}</td>                                                                                  
                                                <td>{{ $class->trainer->name }}</td>
                                                <td class="{{ strtolower($day) }} ts-item carbon" style="border-right:none;">
                                                    {{ \Carbon\Carbon::parse($class->start_time)->format('g:iA') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('g:iA') }}
                                                </td>   
                                            </tr>                                      
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-md btn-primary"></button>
                    </div>
                </div>              
            </div>
        </div>
    </section>
    <!-- ***** Schedule Ends***** -->

     
        <!-- jQuery -->
        <script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                        
        <!-- Plugins -->
        <!-- ScrollReveal -->
        <script src="{{ asset('js/scrollreveal.min.js') }}"></script>

        <!-- Waypoints -->
        <script src="{{ asset('js/waypoints.min.js') }}"></script>

        <!-- CounterUp -->
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>

        <!-- ImgFix -->
        <script src="{{ asset('js/imgfix.min.js') }}"></script>

        <!-- MixItUp -->
        <script src="{{ asset('js/mixitup.js') }}"></script>

        <!-- Accordions -->
        <script src="{{ asset('js/accordions.js') }}"></script>

        <!-- Global Init -->
        <script src="{{ asset('js/custom.js') }}"></script>

        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        
        <script src="{{ asset('js/dataTables.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#data-table').DataTable();
            });
</script>
</body>
</html>