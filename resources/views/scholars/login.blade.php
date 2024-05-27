@include('partials.head')

    <x-navbar />
    <div class="container m-5">
        <div class="row">
          <div class="col ">
            <div class="box mx-auto col-md-4 border border-dark p-5 rounded-3">
                <form  id="initialRegistration" method="POST">
                    @csrf
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                                <form  method="POST" class="col-md-4 bg-light p-3 g-3" id="adminLogin" >
                                    @csrf
                                    
                                    <h2 class="fw-semibold mb-3 mt-3">Login to your account!</h2>
                                    <div class="col-md-12 mt-4">
                                        <label for="username" class="form-label">Username/Email Address</label>
                                        <input type="text" name="username" class="form-control" id="username" required>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div>
                                    <div class="col-md-12 mt-5 text-center">
                                        <button type="submit" class="btn btn-primary ">
                                            Login 
                                            <i class="	fas fa-power-off"></i>
                                        </button>
                                    </div>
                                </form>
                            <div class="col-md-4"></div>
                        </div>
                </form>
          </div>
        </div>
    </div>

@include('partials.footer')