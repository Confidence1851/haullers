@extends('web.layouts.app')
@section('title')
Contact Us
@endsection
@section('content')
@include('web.includes.nav2')
    <main class="main">

        <section class="section__car-gallery section-padding">
            <div class="contact-box">
                <div class="container">
                 @if (Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                    </div>        
                @endif
                @if (Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('flash_message_success') !!}</strong>
                    </div>        
                @endif
                    <h1 class="contact__header-text">Please fill out the forms below <br> <i
                            class="fal fa-arrow-down"></i></h1>
                            <form  method="POST" action="{{ url('/contact') }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form__input--container">
                                <input type="text" placeholder="Firstname" value="{{ old('fname') }}" id="fname" name="fname" required="required" class="form__input" />
                                <label for="name" class="form__input--label">Firstname</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form__input--container">
                                <input type="text" placeholder="Lastname" value="{{ old('lname') }}" id="lname" name="lname"  required="required" class="form__input" />
                                <label for="name" class="form__input--label">Lastname</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form__input--container">
                                <input type="email" placeholder="Email address" value="{{ old('email') }}" id="email" name="email"  required="required" class="form__input" />
                                <label for="email" class="form__input--label">Email</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form__input--container">
                                <input type="text" placeholder="Subject" value="{{ old('subject') }}" id="subject" name="subject"  required="required" class="form__input" />
                                <label for="email" class="form__input--label">Subject</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form__input--container">
                                <textarea placeholder="Your text in here" id="message" name="message"   required="required" cols="30" rows="10">{{ old('message') }}</textarea>
                            </div>
                            @csrf

                            <input type="submit" value="Submit" class="car__item--btn" />
                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </section>

        <section class="section__map container-fluid">
            <div class="mapouter">
                <div class="gmap_canvas"><iframe style="height: 100%;width: 100%" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=lekki%20phase%201&t=&z=11&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no"></iframe><a
                        href="https://www.embedgooglemap.net/blog/elementor-pro-discount-code-review/"></a></div>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: center;
                        height: 100%;
                        width: 100% !important;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 100%;
                        width: 100%;
                    }
                </style>
            </div>
        </section>

    </main>
 @stop