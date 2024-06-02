<!DOCTYPE html>
<html>

<head>
    <title>Ticket PDF</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('assets/css/all.min.css')}}">
    <style>
        .teckit {
            background-color: #fff;
            color: #989898;
            margin-bottom: 10px;
            font-family: 'Oswald', sans-serif;
            border-radius: 4px;
        }

        .date {
            display: table-cell;
            width: 25%;
            position: relative;
            text-align: center;
            border-right: 2px dashed #dadde6
        }

        .date:before,
        .date:after {
            content: "";
            display: block;
            width: 30px;
            height: 30px;
            background-color: #DADDE6;
            position: absolute;
            top: -15px;
            right: -15px;
            z-index: 1;
            border-radius: 50%
        }

        .date:after {
            top: auto;
            bottom: -15px
        }

        .date time {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        .date time span {
            display: block
        }

        .date time span:first-child {
            color: #2b2b2b;
            font-weight: 600;
            font-size: 250%
        }

        .date time span:last-child {
            text-transform: uppercase;
            font-weight: 600;
            margin-top: -10px
        }

        .card-cont {
            display: table-cell;
            width: 75%;
            font-size: 85%;
            padding: 10px 10px 30px 50px
        }

        .card-cont h3 {
            color: #3C3C3C;
            font-size: 130%
        }

        .row:last-child .card:last-of-type .card-cont h3 {
            text-decoration: line-through
        }

        .card-cont>div {
            display: table-row
        }

        .card-cont .even-date i,
        .card-cont .even-info i,
        .card-cont .even-date time,
        .card-cont .even-info p {
            display: table-cell
        }

        .card-cont .even-date i,
        .card-cont .even-info i {
            padding: 5% 5% 0 0
        }

        .card-cont .even-info p {
            padding: 30px 50px 0 0
        }

        .card-cont .even-date time span {
            display: block
        }

        .card-cont a {
            display: block;
            text-decoration: none;
            width: 80px;
            height: 30px;
            background-color: #D8DDE0;
            color: #fff;
            text-align: center;
            line-height: 30px;
            border-radius: 2px;
            position: absolute;
            right: 26px;
            bottom: 36px;
        }

        .row:last-child .card:first-child .card-cont a {
            background-color: #037FDD
        }

        .row:last-child .card:last-child .card-cont a {
            background-color: #F8504C
        }

        @media screen and (max-width: 860px) {
            .card {
                display: block;
                float: none;
                width: 100%;
                margin-bottom: 10px
            }

            .card+.card {
                margin-left: 0
            }

            .card-cont .even-date,
            .card-cont .even-info {
                font-size: 75%
            }
        }

        @media print {
        body {
        -webkit-print-color-adjust: exact; /* Chrome, Safari */
        print-color-adjust: exact; /* Firefox */
        }
        }
    </style>
</head>

<body>
    <div style="background-color: #dadde6;">
        <div class="container py-5">
            <div class="row flex">
                <div class="p-2 col-md-6 position-relative">
                    <div class="teckit  w-100">
                        <section class="date">
                            <time datetime="23th feb">
                                <span>{{ $ticket->number_place }}</span><span>{{ $ticket->filmPlace->placeType->name }}</span>
                            </time>
                        </section>
                        <section class="card-cont">
                            <small>{{ $ticket->user->first_name }} {{ $ticket->user->last_name }}</small>
                            <h3 class="mb-1">{{ $ticket->filmPlace->film->title }} ({{ $ticket->filmPlace->price }} MAD)</h3>
                            <h3 class="m-0">({{ $ticket->filmPlace->price }} MAD)</h3>

                            <div class="even-date">
                                <i class="fa fa-calendar"></i>
                                <time>
                                    <span>{{ " " }} &#xa0;{{ $ticket->filmPlace->film->start_at->format('l d F Y') }}</span>
                                    <span>{{ $ticket->filmPlace->film->start_at->format('h:ia') }} -
                                    {{ $ticket->filmPlace->film->duree }} Hour</span>
                                </time>
                            </div>
                            <div class="even-info">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    {{ " " }} &#xa0; {{ $ticket->filmPlace->film->salle->cinema->ville->name }},
                                    {{ $ticket->filmPlace->film->salle->cinema->name }},
                                    {{ $ticket->filmPlace->film->salle->name }}
                                </p>
                            </div>
                            <a href="{{ route("ticket.show", $ticket->id) }}">Print</a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    window.print();
</script>
</html>
