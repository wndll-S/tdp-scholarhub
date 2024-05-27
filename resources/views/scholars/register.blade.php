@include('partials.head')

    <x-navbar />
    <div class="container mt-5">
        <div class="row">
          <div class="col ">
            <div class="box mx-auto col-md-6 border border-dark p-5 rounded-3">
                <form  id="initialRegistration" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <h4>Full Name</h4>
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="John">
                        </div>
                        <div class="col-md-6">
                            <label for="middleName" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Lipa">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Salleva">
                        </div>
                        <div class="col-md-6">
                            <label for="nameExtension" class="form-label">Name Extension</label>
                            <select id="nameExtension" name="nameExtension" class="form-select">
                                <option selected>Choose...</option>
                                <option value="Jr.">Jr.</option>
                                <option value="Sr.">Sr.</option>
                                <option value="III">III</option>
                              </select>
                        </div>
                        <div class="col-md-12 text-md-end mt-5">
                            <a href="#address" type="button" class="btn btn-primary " id="next">
                                Next 
                                <i class="	far fa-arrow-alt-circle-right"></i>
                            </a>
                        </div>
                    </div>
                
            </div>
            <div class="box mx-auto col-md-6 border border-dark p-5 rounded-3 mt-5" id="address">
                <div class="row g-3">
                    <div class="col-md-12">
                        <h4>Address</h4>
                    </div>
                    <div class="col-md-6">
                        <label for="district" class="form-label">District</label>
                        <select id="district" name="district" class="form-select">
                          <option selected disabled>Choose...</option>
                          <option value="Lone District">Lone District</option>
                          <option value="1">I</option>
                          <option value="2">II</option>
                          <option value="3">III</option>
                          <option value="4">IV</option>
                          <option value="5">V</option>
                          <option value="6">VI</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="cityTowm" class="form-label">City/Town</label>
                        <select id="cityTown" class="form-select">
                          <option value="Bacolod City">Choose...</option>
                          <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="barangay" class="form-label">Barangay</label>
                        <select id="barangay" class="form-select">
                          <option value="Alijis" selected>Choose...</option>
                          <option>...</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                      <label for="zipCode" class="form-label">Zip Code</label>
                      <input type="text" class="form-control" id="zipCode" value="6100" disabled>
                    </div>
                    <div class="col-md-12 text-md-end mt-5">
                        <a href="#login" type="button" class="btn btn-primary " id="next2">
                            Next 
                            <i class="	far fa-arrow-alt-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="box mx-auto col-md-6 border border-dark p-5 rounded-3 mt-5">
                <div class="row g-3">
                    <div class="col-md-12" id="login">
                        <h4>Login Details</h4>
                    </div>
                    <div class="col-md-6">
                      <label for="emailAddress" class="form-label">Email Address</label>
                      <input type="text" name="emailAddress" class="form-control" id="emailAddress">
                    </div>
                    <div class="col-md-6">
                      <label for="mobileNumber" class="form-label">Mobile Number</label>
                      <input type="text" name="mobileNumber" class="form-control" id="mobileNumber">
                    </div>
                    <div class="col-md-6">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="col-md-6">
                      <label for="confirmPassword" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" id="confirmPassword">
                    </div>
                    <div class="col-md-12 text-md-end mt-5">
                        <button type="submit" class="btn btn-primary ">
                            Register 
                            <i class="fas fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
          </div>
        </div>
    </div>

@include('partials.footer')