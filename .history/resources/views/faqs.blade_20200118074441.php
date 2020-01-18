<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <meta property="og:title" content="ASwiftConnect" />
    <meta property="og:image" content="{{ asset('assets/frontend/css/landing/images/hero-bg.jpg') }}" />
    <meta property="og:type" content="website" />
    <!-- The title tag shows in email notifications, like Android 4.4. -->
    <title>Frequently Asked Questions | ASwiftConnect</title>

    <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="{{ asset('assets/frontend/css/landing/favicon.ico')}}" type="image/x-icon">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/css/landing/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/frontend/css/landing/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/css/landing/favicon-16x16.png')}}">
	<link rel="manifest" href="{{ asset('assets/frontend/css/landing/site.webmanifest')}}">
	<link rel="mask-icon" href="{{ asset('assets/frontend/css/landing/safari-pinned-tab.svg')}}" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
    <link rel="icon" href="{{ asset('assets/frontend/css/landing/favicon.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <style>
        @import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

        body {
            margin-top: 30px;
            background-color: #eee;
        }

        .btn {
            white-space: normal;
        }


        .faq-nav {
            flex-direction: column;
            margin: 0 0 32px;
            border-radius: 2px;
            border: 1px solid #ddd;
            box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);

            .nav-link {
                position: relative;
                display: block;
                margin: 0;
                padding: 13px 16px;
                background-color: #fff;
                border: 0;
                border-bottom: 1px solid #ddd;
                border-radius: 0;
                color: #616161;
                transition: background-color .2s ease;

                &:hover {
                    background-color: #f6f6f6;
                }

                &.active {
                    background-color: #f6f6f6;
                    font-weight: 700;
                    color: rgba(0, 0, 0, .87);
                }

                &:last-of-type {
                    border-bottom-left-radius: 2px;
                    border-bottom-right-radius: 2px;
                    border-bottom: 0;
                }

                i.mdi {
                    margin-right: 5px;
                    font-size: 18px;
                    position: relative;
                }
            }
        }

        .tab-content {
            box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);

            .card {
                border-radius: 0;
            }

            .card-header {
                padding: 15px 16px;
                border-radius: 0;
                background-color: #f6f6f6;

                h5 {
                    margin: 0;

                    button {
                        display: block;
                        width: 100%;
                        padding: 0;
                        border: 0;
                        font-weight: 700;
                        color: rgba(0, 0, 0, .87);
                        text-align: left;
                        white-space: normal;

                        &:hover,
                        &:focus,
                        &:active,
                        &:hover:active {
                            text-decoration: none;
                        }
                    }
                }
            }

            .card-body {
                p {
                    color: #616161;

                    &:last-of-type {
                        margin: 0;
                    }
                }
            }
        }


        .accordion {
            >.card {
                &:not(:first-child) {
                    border-top: 0;
                }
            }
        }

        .collapse.show {
            .card-body {
                border-bottom: 1px solid rgba(0, 0, 0, .125);
            }
        }
    </style>

</head>

<body style=" word-wrap: break-word;">
    <div class="container">
        <div class="pull-left" style="margin:10px;">
            <a href="{{route('landing')}}" title="Go Back to Homepage" style="margin:0 auto;">
                <i class="fa fa-arrow-left fa-lg"></i>
                <img style="border-radius: 50%;" width="50" height="50"
                    src="{{ asset('assets/frontend/css/login/images/avatar-01.png')}}" alt="AVATAR"></a>
            <span><strong>ASWIFTCONNECT</strong></span>
        </div><br>
    </div>
    <div class="container" style="clear:both;">

        <div class="row">
            <div class="col-lg-4">
                <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                    <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1"
                        aria-selected="true">
                        <i class="mdi mdi-help-circle"></i> Frequently Asked Questions
                    </a>
                    {{-- <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        <i class="mdi mdi-account"></i> Profile
                    </a>
                    <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3"
                        aria-selected="false">
                        <i class="mdi mdi-account-settings"></i> Account
                    </a>
                    <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4"
                        aria-selected="false">
                        <i class="mdi mdi-heart"></i> Favorites
                    </a>
                    <a href="#tab5" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab5"
                        aria-selected="false">
                        <i class="mdi mdi-coin"></i> Payment
                    </a>
                    <a href="#tab6" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab6"
                        aria-selected="false">
                        <i class="mdi mdi-help"></i> General help
                    </a> --}}
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content" id="faq-tab-content">
                    <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                        <div class="accordion" id="accordion-tab-1">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-1-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-1-content-1">
                                            Can I work on more than one Job at once?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-1-content-1"
                                    aria-labelledby="accordion-tab-1-heading-1" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>
                                            No, you can't. Only one job at a time is allowed and you should be aware we
                                            will be the ones
                                            assigning freelancers to projects to work on. In the case of a team, we will
                                            handle the assignment
                                            off site.
                                        </p>
                                        <p><strong>Hint: </strong>Add to favorites,the projects you would love to work
                                            on.!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-1-content-2" aria-expanded="false"
                                            aria-controls="accordion-tab-1-content-2">
                                            As an author, when am I to pay for a job?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-2"
                                    aria-labelledby="accordion-tab-1-heading-2" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>Once a project is posted, our administrators will review it and when you
                                            receive an invoice,
                                            that is when you will be allowed to make a payment on our website.
                                        </p>
                                        <p><strong>Hint: </strong> Pay within 24 hours so a freelancer will be assigned
                                            to the project.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-1-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-1-content-3">
                                            What happens if the Freelancer doesn't do my job to my satisfaction?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-3"
                                    aria-labelledby="accordion-tab-1-heading-3" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>If this happens, we will first review the project in your description and
                                            understand what was and wasn't done. If our freelancer is at fault, we will
                                            assign
                                            a new freelancer to work on the project.If that doesn't work well with the
                                            project owner,
                                            a refund will be made.
                                        </p>
                                        <p><strong>Hint: </strong>Always make your requirements clear when posting a
                                            project.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-1-heading-4">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-1-content-4" aria-expanded="false"
                                            aria-controls="accordion-tab-1-content-4">
                                            How do I rate the freelancer?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-1-content-4"
                                    aria-labelledby="accordion-tab-1-heading-4" data-parent="#accordion-tab-1">
                                    <div class="card-body">
                                        <p>
                                            Rating a freelancer can be done on the comments section of the project
                                            posted.There we will
                                            get to know how you feel about the job done and how it could be made better.
                                        </p>
                                        <p><strong>Hint: </strong>Mention all which you described in the project which
                                            wasn't done well.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2">
                        <div class="accordion" id="accordion-tab-2">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-2-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-2-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-2-content-1">
                                            How do I leave a review for the platform ?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-2-content-1"
                                    aria-labelledby="accordion-tab-2-heading-1" data-parent="#accordion-tab-2">
                                    <div class="card-body">
                                        <p>A review of the platform for now is not set.You can simply email us at
                                            info@aswiftconnect.com
                                            for feedback
                                        </p>
                                        <p><strong>Hint: </strong>Be clear as to what you need.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-2-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-2-content-2" aria-expanded="false"
                                            aria-controls="accordion-tab-2-content-2">
                                            Is my personal information safe?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-2-content-2"
                                    aria-labelledby="accordion-tab-2-heading-2" data-parent="#accordion-tab-2">
                                    <div class="card-body">
                                        <p>Your personal information is safe with us.Our system is secure and we do not
                                            give out information to
                                            any third party.
                                        </p>
                                        <p><strong>Hint: </strong>We have a safe way to recover password in case you
                                            forgot.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-2-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-2-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-2-content-3">
                                            Why was my payment declined?
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-2-content-3"
                                    aria-labelledby="accordion-tab-2-heading-3" data-parent="#accordion-tab-2">
                                    <div class="card-body">
                                        <p>If your payment was declined, you either do not have enough money in the
                                            paypal Account
                                            you were trying to access or your connection was interupted at the moment of
                                            payment.
                                        </p>
                                        <p><strong>Hint: </strong> Ensure you have a good internet connection.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-2-heading-4">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-2-content-4" aria-expanded="false"
                                            aria-controls="accordion-tab-2-content-4">I haven't felt much of anything
                                            since my guinea pig died?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-2-content-4"
                                    aria-labelledby="accordion-tab-2-heading-4" data-parent="#accordion-tab-2">
                                    <div class="card-body">
                                        <p>And I'm his friend Jesus. Oh right. I forgot about the battle. OK, if
                                            everyone's finished being stupid. We'll need to have a look inside you with
                                            this camera. I'm just glad my fat, ugly mama isn't alive to see this day.
                                        </p>
                                        <p><strong>Example: </strong> Isn't it true that you have been paid for your
                                            testimony? Quite possible.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                        <div class="accordion" id="accordion-tab-3">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-3-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-3-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-3-content-1">Michelle, I don't regret this, but
                                            I both rue and lament it?</button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-3-content-1"
                                    aria-labelledby="accordion-tab-3-heading-1" data-parent="#accordion-tab-3">
                                    <div class="card-body">
                                        <p>Look, last night was a mistake. We'll need to have a look inside you with
                                            this camera. Good news, everyone! There's a report on TV with some very bad
                                            news! You know, I was God once. You lived before you met me?!</p>
                                        <p><strong>Example: </strong>I'm Santa Claus! Pansy. That's a popular name
                                            today. Little "e", big "B"?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-3-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-3-content-2" aria-expanded="false"
                                            aria-controls="accordion-tab-3-content-2">Why am I sticky and
                                            naked?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-3-content-2"
                                    aria-labelledby="accordion-tab-3-heading-2" data-parent="#accordion-tab-3">
                                    <div class="card-body">
                                        <p>Did I miss something fun? Humans dating robots is sick. You people wonder why
                                            I'm still single? It's 'cause all the fine robot sisters are dating humans!
                                            Kids don't turn rotten just from watching TV.</p>
                                        <p><strong>Example: </strong>I usually try to keep my sadness pent up inside
                                            where it can fester quietly as a mental illness.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-3-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-3-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-3-content-3">Is that a cooking show?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-3-content-3"
                                    aria-labelledby="accordion-tab-3-heading-3" data-parent="#accordion-tab-3">
                                    <div class="card-body">
                                        <p>OK, this has gotta stop. I'm going to remind Fry of his humanity the way only
                                            a woman can. You seem malnourished. Are you suffering from intestinal
                                            parasites? Check it out, y'all. Everyone who was invited is here. I am
                                            Singing Wind, Chief of the Martians.</p>
                                        <p><strong>Example: </strong>Man, I'm sore all over. I feel like I just went ten
                                            rounds with mighty Thor.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-3-heading-4">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-3-content-4" aria-expanded="false"
                                            aria-controls="accordion-tab-3-content-4">You are the last hope of the
                                            universe?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-3-content-4"
                                    aria-labelledby="accordion-tab-3-heading-4" data-parent="#accordion-tab-3">
                                    <div class="card-body">
                                        <p>I don't want to be rescued. I videotape every customer that comes in here, so
                                            that I may blackmail them later. Ah, computer dating. It's like pimping, but
                                            you rarely have to use the phrase "upside your head."</p>
                                        <p><strong>Example: </strong>Tell them I hate them.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                        <div class="accordion" id="accordion-tab-4">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-4-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-4-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-4-content-1">You, minion. Lift my arm?</button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-4-content-1"
                                    aria-labelledby="accordion-tab-4-heading-1" data-parent="#accordion-tab-4">
                                    <div class="card-body">
                                        <p>AFTER HIM! A true inspiration for the children. What are you hacking off? Is
                                            it my torso?! 'It is!' My precious torso! I saw you with those two "ladies
                                            of the evening" at Elzars. Explain that. She also liked to shut up! Why not
                                            indeed!</p>
                                        <p><strong>Example: </strong>I feel like I was mauled by Jesus. Hello, little
                                            man. I will destroy you!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-4-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-4-content-2" aria-expanded="false"
                                            aria-controls="accordion-tab-4-content-2">No, I'm Santa Claus?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-4-content-2"
                                    aria-labelledby="accordion-tab-4-heading-2" data-parent="#accordion-tab-4">
                                    <div class="card-body">
                                        <p>I meant 'physically'. Look, perhaps you could let me work for a little food?
                                            I could clean the floors or paint a fence, or service you sexually? When the
                                            lights go out, it's nobody's business what goes on between two consenting
                                            adults.</p>
                                        <p><strong>Example: </strong>Nay, I respect and admire Harold Zoid too much to
                                            beat him to death with his own Oscar.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-4-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-4-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-4-content-3">Belligerent and numerous?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-4-content-3"
                                    aria-labelledby="accordion-tab-4-heading-3" data-parent="#accordion-tab-4">
                                    <div class="card-body">
                                        <p>Hey, what kinda party is this? There's no booze and only one hooker. I'm just
                                            glad my fat, ugly mama isn't alive to see this day. Wow! A superpowers drug
                                            you can just rub onto your skin? You'd think it would be something you'd
                                            have to freebase. Well, let's just dump it in the sewer and say we delivered
                                            it. You guys realize you live in a sewer, right? </p>
                                        <p><strong>Example: </strong>Oh Leela! You're the only person I could turn to;
                                            you're the only person who ever loved me.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-4-heading-4">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-4-content-4" aria-expanded="false"
                                            aria-controls="accordion-tab-4-content-4">Take me to your leader?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-4-content-4"
                                    aria-labelledby="accordion-tab-4-heading-4" data-parent="#accordion-tab-4">
                                    <div class="card-body">
                                        <p>PUNY HUMAN NUMBER ONE, PUNY HUMAN NUMBER TWO, and Morbo's good friend,
                                            Richard Nixon. Interesting. No, wait, the other thing: tedious. All I want
                                            is to be a monkey of moderate intelligence who wears a suit… that's why I'm
                                            transferring to business school! Morbo can't understand his teleprompter
                                            because he forgot how you say that letter that's shaped like a man wearing a
                                            hat.</p>
                                        <p><strong>Example: </strong>If rubbin' frozen dirt in your crotch is wrong, hey
                                            I don't wanna be right.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab5" role="tabpanel" aria-labelledby="tab5">
                        <div class="accordion" id="accordion-tab-5">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-5-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-5-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-5-content-1">Say what?</button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-5-content-1"
                                    aria-labelledby="accordion-tab-5-heading-1" data-parent="#accordion-tab-5">
                                    <div class="card-body">
                                        <p>That could be 'my' beautiful soul sitting naked on a couch. If I could just
                                            learn to play this stupid thing. Oh, I don't have time for this. I have to
                                            go and buy a single piece of fruit with a coupon and then return it, making
                                            people wait behind me while I complain. I'm just glad my fat, ugly mama
                                            isn't alive to see this day. For one beautiful night I knew what it was like
                                            to be a grandmother. Subjugated, yet honored. But existing is basically all
                                            I do! I never loved you.</p>
                                        <p><strong>Example: </strong>A sexy mistake. And I'd do it again!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-5-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-5-content-2" aria-expanded="false"
                                            aria-controls="accordion-tab-5-content-2">Who's brave enough to fly into
                                            something we all keep calling a death sphere?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-5-content-2"
                                    aria-labelledby="accordion-tab-5-heading-2" data-parent="#accordion-tab-5">
                                    <div class="card-body">
                                        <p>Maybe I love you so much I love you no matter who you are pretending to be.
                                            Ah, the 'Breakfast Club' soundtrack! I can't wait til I'm old enough to feel
                                            ways about stuff! Now Fry, it's been a few years since medical school, so
                                            remind me.</p>
                                        <p><strong>Example: </strong>Disemboweling in your species: fatal or non-fatal?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-5-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-5-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-5-content-3">You mean while I'm sleeping in
                                            it?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-5-content-3"
                                    aria-labelledby="accordion-tab-5-heading-3" data-parent="#accordion-tab-5">
                                    <div class="card-body">
                                        <p>We can't compete with Mom! Her company is big and evil! Ours is small and
                                            neutral! Look, everyone wants to be like Germany, but do we really have the
                                            pure strength of 'will'? I just told you! You've killed me!</p>
                                        <p><strong>Example: </strong>But, like most politicians, he promised more than
                                            he could deliver.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-5-heading-4">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-5-content-4" aria-expanded="false"
                                            aria-controls="accordion-tab-5-content-4">And until then, I can never
                                            die?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-5-content-4"
                                    aria-labelledby="accordion-tab-5-heading-4" data-parent="#accordion-tab-5">
                                    <div class="card-body">
                                        <p>I don't know what you did, Fry, but once again, you screwed up! Now all the
                                            planets are gonna start cracking wise about our mamas. Well, let's just dump
                                            it in the sewer and say we delivered it.</p>
                                        <p><strong>Example: </strong>Have you ever tried just turning off the TV,
                                            sitting down with your children, and hitting them? Hey, tell me something.
                                            You've got all this money. How come you always dress like you're doing your
                                            laundry?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab6" role="tabpanel" aria-labelledby="tab6">
                        <div class="accordion" id="accordion-tab-6">
                            <div class="card">
                                <div class="card-header" id="accordion-tab-6-heading-1">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-6-content-1" aria-expanded="false"
                                            aria-controls="accordion-tab-6-content-1">Doomsday device?</button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="accordion-tab-6-content-1"
                                    aria-labelledby="accordion-tab-6-heading-1" data-parent="#accordion-tab-6">
                                    <div class="card-body">
                                        <p>Ah, now the ball's in Farnsworth's court! We'll need to have a look inside
                                            you with this camera. Stop it, stop it. It's fine. I will 'destroy' you!
                                            Bender! Ship! Stop bickering or I'm going to come back there and change your
                                            opinions manually!</p>
                                        <p><strong>Example: </strong>So I really am important? How I feel when I'm drunk
                                            is correct?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-6-heading-2">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-6-content-2" aria-expanded="false"
                                            aria-controls="accordion-tab-6-content-2">And so we say goodbye to our
                                            beloved pet, Nibbler?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-6-content-2"
                                    aria-labelledby="accordion-tab-6-heading-2" data-parent="#accordion-tab-6">
                                    <div class="card-body">
                                        <p>Nibbler, who's gone to a place where I, too, hope one day to go. The toilet.
                                            But existing is basically all I do! I suppose I could part with 'one' and
                                            still be feared. I just told you! You've killed me!</p>
                                        <p><strong>Example: </strong>What's with you kids? Every other day it's food,
                                            food, food.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-6-heading-3">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-6-content-3" aria-expanded="false"
                                            aria-controls="accordion-tab-6-content-3">Tell her you just want to
                                            talk?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-6-content-3"
                                    aria-labelledby="accordion-tab-6-heading-3" data-parent="#accordion-tab-6">
                                    <div class="card-body">
                                        <p>It has nothing to do with mating. Soon enough. There, now he's trapped in a
                                            book I wrote: a crummy world of plot holes and spelling errors! Daylight and
                                            everything. Hey! I'm a porno-dealing monster, what do I care what you think?
                                        </p>
                                        <p><strong>Example: </strong>Is that a cooking show? It doesn't look so shiny to
                                            me. And why did 'I' have to take a cab?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="accordion-tab-6-heading-4">
                                    <h5>
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#accordion-tab-6-content-4" aria-expanded="false"
                                            aria-controls="accordion-tab-6-content-4">Good man. Nixon's pro-war and
                                            pro-family?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="accordion-tab-6-content-4"
                                    aria-labelledby="accordion-tab-6-heading-4" data-parent="#accordion-tab-6">
                                    <div class="card-body">
                                        <p>I don't 'need' to drink. I can quit anytime I want! THE BIG BRAIN AM WINNING
                                            AGAIN! I AM THE GREETEST! NOW I AM LEAVING EARTH, FOR NO RAISEN! There's one
                                            way and only one way to determine if an animal is intelligent. Dissect its
                                            brain!</p>
                                        <p><strong>Example: </strong>Guess again. Yeah, I do that with my stupidness.
                                            And when we woke up, we had these bodies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>