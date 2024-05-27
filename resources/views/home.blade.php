@include('partials.head')
    <x-navbar />
    <div class="position-relative">
        <img
            src="{{ asset('images/BANNER2.jpg') }}"
            class="img-fluid"
            alt="Banner"
        />
        <a href="/register" class="btn btn-light position-absolute btn-lg fw-bold text-primary" style="bottom: 20%; right: 13%;">
            Apply Now!
        </a>
    </div>
    <div class="container m-5 text-center">
        <h3 class="display-5 fw-bold text-primary" id="about">
            What is CHED Tulong Dunong Scholarship?
        </h3>
    </div>
    <div class="bg-primary text-white ">
        <div class="row  p-5">
            <div class="col-md-8">
                <p class="fw-semibold fs-2 text-justify">The CHED Tulong Dunong Program Scholarship is a program provided by the Philippines COmmission on Higher Education(CHED). Its goal is to provide financial assistance to qualified and deserving students pursuing a college degree.</p>
            </div>
            <div class="col-md-4">
                <img
                    src="{{ asset('images/tulong-dunong-talisay4.jpg') }}"
                    class="img-fluid"
                    alt="Banner"
                />
            </div>
        </div>
    </div>
    
@include('partials.footer')
