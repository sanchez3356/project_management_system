@extends('layouts.app')


@section('content')
<!-- resume section start -->
<div class="row bg-light text-black">
    <div class="col-12 col-md-4 col-lg-4 image-container p-0 bg-warning">
        <div class="position-relative float-none image h-100 float-md-end float-lg-end mh-100 ms-4" style="width: 90%;">
            <img src="{{asset('storage/' . $profile->avatar) ?: asset('storage/avatars/male.png') }}"
                alt="profile image" class="img-fluid h-100" id="profile_photo">
        </div>
    </div>
    <div class="col-12 col-md-8 col-lg-8 about-container px-4 fs-5">
        <div class="text-center text-lg-start text-md-start w-100 mt-5">
            <h2 class="fw-bold mb-3 banner_name">MY names</h2>
            <b class="badge bg-warning text-dark fs-4 banner_title">Web designer</b>
        </div>
        <header class="fw-bold text-uppercase my-4">
            <h2>profile</h2>
        </header>
        <div class="pt-4 mb-5 banner_about">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum nostrum cupiditate ipsum qui,
                numquam modi dolor. Esse nulla excepturi accusamus laboriosam, quae vero voluptate doloremque
                officiis voluptatem! Natus, eius expedita.</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-4 col-lg-4 left bg-dark text-light p-5  fs-5">
        <section class="education">
            <header class="fw-bold text-uppercase my-4">
                <h2>education</h2>
            </header>
            <!-- education elements here -->
            <div class="my-2 p-1">
                <b>Enter your major</b>
                <p>name of your School</p>
                <strong>2013-2015</strong>
            </div>
            <div class="my-2 p-1">
                <b>Enter your major</b>
                <p>name of your School</p>
                <strong>2013-2015</strong>
            </div>
        </section>
        <section class="skills">
            <header class="fw-bold text-uppercase my-4">
                <h2>expertise</h2>
            </header>
            <ul class="list-unstyled mt-5">
                <!-- skills progress bars  -->
            </ul>
        </section>
        <section class="language">
            <header class="fw-bold text-uppercase my-4">
                <h2>language</h2>
            </header>
            <ul class="list-unstyled mt-5">
            </ul>
        </section>
        <section class="contact">
            <div class="row mt-5 px-3 gap-2">
                <div class="col-2 bg-warning py-5 d-flex justify-content-start align-items-center flex-column">
                    <div class="w-100 position-relative h-auto my-4 text-dark cont_card">
                        <i class="fas fa-phone fs-1 mt-3"></i>
                    </div>
                    <div class="w-100 position-relative h-auto my-4 text-dark cont_card">
                        <i class="fas fa-envelope-open-text fs-1 mt-3"></i>
                    </div>
                    <div class="w-100 position-relative h-auto my-4 text-dark cont_card">
                        <i class="fas fa-location-dot fs-1 mt-3"></i>
                    </div>
                </div>
                <div
                    class="col-9 position-relative text-start d-flex justify-content-center align-items-center flex-column py-5">
                    <div
                        class="position-relative text-light justify-content-start d-flex flex-column h-auto my-4 phone_cont text-nowrap text-start">
                        <b>Phone</b>
                        <a href="">+254826255</a>
                    </div>
                    <div class="position-relative text-light d-flex flex-column h-auto my-4 email_cont text-nowrap">
                        <b>Email</b>
                        <a href="">+254826255</a>
                    </div>
                    <div class="position-relative text-light d-flex flex-column h-auto my-4 address_cont text-nowrap">
                        <b>Address</b>
                        <a href="">+254826255</a>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <div class="col-12 col-md-8 col-lg-8 right bg-black text-dark p-5 fs-5">
        <section class="experience">
            <header class="fw-bold text-uppercase my-4">
                <h2>experience</h2>
            </header>
            <div class="p-2 my-2">
                <b>Enter job position</b>
                <div class="d-block my-2"><span
                        class="badge bg-warning text-dark fw-bold me-3">Current</span><strong>Job
                        location</strong></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis modi officiis, repellendus
                    aliquam placeat veniam asperiores laboriosam, hic obcaecati vitae rem, nam velit. Natus
                    tempora officia deserunt quo hic reiciendis!</p>
            </div>
            <div class="p-2 my-2">
                <b>Enter job position</b>
                <div class="d-block my-2"><span
                        class="badge bg-warning text-dark fw-bold me-3">Current</span><strong>Job
                        location</strong></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis modi officiis, repellendus
                    aliquam placeat veniam asperiores laboriosam, hic obcaecati vitae rem, nam velit. Natus
                    tempora officia deserunt quo hic reiciendis!</p>
            </div>
        </section>
        <section class="reference">
            <header class="fw-bold text-uppercase my-4">
                <h2>reference</h2>
            </header>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 my-3">
                    <h4>Referer name</h4>
                    <p><span>Phone:</span>+254790257198</span></p>
                    <p><span>Email:</span>sjkshja@kdks.com</p>
                </div>
                <div class="col-12 col-md-6 col-lg-6 my-3">
                    <h4>Referer name</h4>
                    <p><span>Phone:</span>+254790257198</span></p>
                    <p><span>Email:</span>sjkshja@kdks.com</p>
                </div>
            </div>
        </section>
        <section class="interests">
            <header class="fw-bold text-uppercase my-4">
                <h2>interests</h2>
            </header>
            <div class="d-flex flex-wrap justify-content-lg-start justify-content-md-start gap-5 pt-4">
                <div class="rounded-circle px-5 text-center">
                    <i class="fab fa-accessible-icon text-warning fs-1 mb-2"></i>
                    <p>words</p>
                </div>
                <div class="rounded-circle px-5 text-center">
                    <i class="fab fa-accessible-icon text-warning fs-1 mb-2"></i>
                    <p>words</p>
                </div>
                <div class="rounded-circle px-5 text-center">
                    <i class="fab fa-accessible-icon text-warning fs-1 mb-2"></i>
                    <p>words</p>
                </div>
                <div class="rounded-circle px-5 text-center">
                    <i class="fab fa-accessible-icon text-warning fs-1 mb-2"></i>
                    <p>words</p>
                </div>
            </div>
        </section>

    </div>
</div>
<!-- resume section end -->
@endsection