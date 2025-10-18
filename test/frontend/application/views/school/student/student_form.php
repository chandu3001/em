
<div class="modal fade" tabindex="-1" id="studentModal">
   <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
         <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross-sm"></em></a>
         <div class="modal-body modal-body-md">
            <h5 class="modal-title student-modal-title">Student</h5>
            <form action="#" id="studentForm" class="mt-2 is-alter">
               <div class="row g-gs">

                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="first-name">First Name</label>
                        <div class="form-control-wrap">
                           <input type="text" class="form-control" autofocus name="first_name_english" id="first-name" 
                           data-msg="Firstname is required" required 
                           />
                        </div>
                     </div>
                  </div>
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="second-name">Second Name</label>
                        <div class="form-control-wrap">
                           <input type="text" class="form-control" name="second_name_english" id="second-name" />
                           </div>
                     </div>
                  </div>
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="email">Email ID</label>
                        <div class="form-control-wrap">
                           <input type="email" class="form-control direction--email" name="email" id="email" 
                           data-msg="Email ID is required" required 
                           data-msg-email="Specify valid Email ID"
                           />
                        </div>
                     </div>
                  </div>
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="mobile-number">Mobile No</label>
                        <div class="form-control-wrap">
                           <input type="tel" class="form-control direction--rtl" name="mobile" id="mobile-number" placeholder="" 
                              data-msg="Mobile number is required" required 
                              data-rule-digits="true" data-msg-digits="Mobile number must be numeric"
                           />
                        </div>
                     </div>
                  </div>
                  <div class="col-6 mb-2">  
                     <div class="form-group">
                        <label class="form-label" for="dob">DOB</label>
                        <div class="form-control-wrap">
                           <!--<input type="text" class="form-control date-picker-alt" date-format="dd/mm/yyyy" name="dob" id="dob" placeholder="DD/MM/YYYY" required data-msg="DOB is required" />-->
                           <input type="text" class="form-control" date-format="DD/MM/YYYY" name="dob" id="dob" placeholder="DD/MM/YYYY" required data-msg="DOB is required" maxlength="10"/>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="gender">Gender</label>
                        <div class="form-control-wrap" id="gender-list-area" ></div>
                     </div>
                  </div>
                  
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="city">City</label>
                        <div class="form-control-wrap">
                           <input type="text" class="form-control" name="city" id="city" data-msg="City is required" required />
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="id-type">ID Type</label>
                        <div class="form-control-wrap inner">
                           <select class="form-select js-select2" data-placeholder="Select ID Type" name="id_type" id="id-type" required data-msg="Select ID Type">
                              <option value="">Select</option>
                              <option value="0">Aadhar</option>
                              <option value="1">PAN</option>
                              <option value="2">License</option>
                              <option value="3">Passport</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="id-number">National ID</label>
                        <div class="form-control-wrap">
                           <input type="text" name="id_number" class="form-control" id="id-number" placeholder=""
                           data-msg="National ID is required" required 
                           />
                        </div>
                     </div>
                  </div>                  

                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="userna">Username</label>
                        <div class="form-control-wrap">
                           <input type="text" name="username" class="form-control" id="username" placeholder="" 
                           data-msg="Username is required" required  />
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label password" for="password">Password</label>
                        <div class="form-control-wrap">
                           <input type="password" name="password" class="form-control" id="password" data-msg="Password is required" />
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="confirm-password">Confirm Password</label>
                        <div class="form-control-wrap">
                           <input type="password" name="password_confirmation" data-rule-equalTo="#password" class="form-control" id="confirm-password" data-msg="Confirm password is required" />
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label license-type" for="license-type-selectbox">License Type</label>
                        <div class="form-control-wrap inner">
                           <select class="form-select js-select2 license-type-select" data-placeholder="Select License Type" name="license_type" id="license-type-selectbox" required data-msg="Select license type">
                              <option value="">Select License Type</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="sub-name">Sub License Type</label>
                        <div class="form-control-wrap inner">
                          <select class="form-select js-select2" data-placeholder="Select Sub License Type" data-placeholder="Select Sub License" name="sub_license" id="sub-license-selectbox">
                              <option value="">Select Sub License</option>
                           </select>
                        </div>
                     </div>
                  </div>

                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label level" for="level-selectbox">Level</label>
                        <div class="form-control-wrap inner">
                           <select class="form-select js-select2" data-placeholder="Select Level" name="level_id" id="level-selectbox" required data-msg="Select Level">
                              <option value="">Select Level</option>
                              <option value="1">Beginner</option>
                              <option value="2">Intermediate</option>
                              <option value="3">Expert</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-6 mb-2">
                     <div class="form-group">
                        <label class="form-label plans" for="plans-selectbox">Subscription Plan</label>
                        <div class="form-control-wrap inner">
                           <select class="form-select js-select2" data-placeholder="Select Plan" name="subscription_id" id="plans-selectbox" required data-msg="Select plan">
                              <option value="">Select Plan</option>
                           </select>
                        </div>
                     </div>
                  </div>

                  <div class="col-12 mb-2">
                     <div class="form-group">
                        <label class="form-label" for="stud-photo">Student Photo</label>
                        <div class="form-control-wrap">
                           <div class="form-file"><input type="file" multiple="" name="photo" class="form-file-input"
                                 id="customFile" accept="image/x-png,image/gif,image/jpeg" >
                              <label class="form-file-label" for="customFile">Choose file</label>
                           </div>
                           <span id='spanFileName'></span>

                           <div id="preview-photo">
                              <div class="row preview-block"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-12">
                     <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                        <li><button type="submit" class="btn btn-md  btn-primary">Add Student</button></li>
                        <li><a href="#" data-bs-dismiss="modal" class="btn btn-md btn-danger cancel">Cancel</a></li>
                     </ul>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

