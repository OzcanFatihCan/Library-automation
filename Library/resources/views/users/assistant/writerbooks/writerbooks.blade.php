<div id="wrapper">
    <!-- Work -->

   
    <section id="casestudies" class="casestudies">

        @foreach ($writer_book as $val)
            <article class="content">
                <a href="{{ route('assistant.book', $val->id) }}">
                    <div class="content-overlay"></div>
                    <img class="content-image" src="{{ str_replace('public', '/storage', $val->image) }}" class="image">
                    <div class="content-details fadeIn-bottom">
                        <h2 class="content-title">{{ $val->kitap_adi }}</h2>
                    </div>
                </a>
            </article>
        @endforeach
    </section>


    <style>
        .wrapper {
            display: grid;
            grid-template-columns: auto;
            grid-template-rows: auto 30% 40% auto auto;
            grid-template-areas:
                "hd"
                "hero  "
                "casestudies"
                "contact"
                "ft";
        }

        /* case studies */
        .casestudies {
            align-items: stretch;
            display: grid;
            grid-area: casestudies;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-template-rows: auto auto;
            justify-self: stretch;
            margin: 0%;
        }

        .work {
            background-color: #F4FAFF;
            grid-column: span 3;
            height: auto;
            padding: 1rem;
            margin: 0;
        }

        .work h2 {
            color: #333745;
            font-size: 3rem;
            font-weight: 300;
            text-align: center;
        }

        .content {
            position: relative;
        }

        .content .content-overlay {
            background: rgba(0, 0, 0, 0.7);
            position: absolute;
            width: 250px;
            left: 0;
            top: 0;
            bottom: 50px;
            right: 0;
            opacity: 0;
            margin: 0;
            padding: 0;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }

        .content:hover .content-overlay {
            opacity: 1;
        }

        .content-image {
            width: 250px;
            height: 350px;
            margin-bottom: 50px;
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding: 0 8rem;
            width: 100%;
            top: 40%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
        }

        .content:hover .content-details {
            top: 45%;
            left: 30%;
            opacity: 1;
        }

        .content-details h2 {
            color: #F4FAFF;
            font-weight: 100;
            margin-bottom: 0.5rem;
        }

        .content-details p {
            color: #F4FAFF;
            font-size: 1rem;
        }

        .fadeIn-bottom {
            top: 80%;
        }
    </style>
