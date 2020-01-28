<footer>
  <!-- Footer Subscribe -->
  <div class="subscription-area section-padding theme-bg">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <h3 class="wow fadeInLeft" data-wow-duration="1.5s" style="
                  font-size: 3rem;">Subscribe to the newsletter</h3>
              </div>
              <div class="col-md-6">
                  <form class="subscription subscription-form wow fadeInRight" data-wow-duration="1.5s" accept-charset="UTF-8" id="newsletterForm">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <p class="errorSubEmail alert alert-danger hidden" style="text-align: left;"></p>
                    <input type="email" name="email" class="email" placeholder="Enter your mail here" required>
                    <button type="button" class="send-btn">Submit</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- Footer Subscribe -->

  <!-- Footer logo and social media button -->
  <div class="logo-social-area section-padding">
      <div class="container text-center">
          <div class="socials wow fadeInUp" data-wow-duration="1.5s">
              <h4>Follow Us on</h4>
               <a href="https://www.facebook.com/Rwanda-Youth-Volunteers-in-Community-Policing-551811041688240/" target="_blank"><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com/RwandaVolunteer" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-google-plus"></i></a>
              <a href="#"><i class="fa fa-youtube-play"></i></a>
              <a href="#"><i class="fa fa-vimeo"></i></a>
          </div>
      </div>
  </div>
  <!-- Footer logo and social media button -->

  <!-- Footer copyrgiht and navigation -->
  <div class="copyright-footer">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-xs-12">
                  <p class="copyright">Copyright 2019, <a href="#">RYVCP</a>. All Right Reserved</p>
              </div>
              <div class="col-md-6 col-xs-12">
                  <ul class="footer-nav">
                      <li class="disabled"><a href="#">Terms &amp; Conditions</a></li>
                      <li class="disabled"><a href="#">Legal</a></li>
                      <li class="disabled"><a href="#">Blog</a></li>
                      <li><a href="{{ route('faqs.all') }}">FAQ</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- Login modal contents -->
  <div id="login-link" class="login_modal">
    <form class="login-modal-content animate">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="imgcontainer">
        <span onclick="document.getElementById('login-link').style.display='none'" class="login_close" title="Close Modal">&times;</span>
      </div>
      <div class="modalcontainer cont-login">
        <h4 class="text-center">Login</h4>
        <div class="alert alert-danger login-alert" style="display:none"></div>
        <label for="name"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" id="email-login" required>
        <div class="alert alert-danger login-alert-email" style="display:none"></div>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password-login"  required>
        <div class="alert alert-danger login-alert-password" style="display:none"></div>
          
        <button type="button" id="button" class="login-btn">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
        </label>
      </div>

      <div class="modalcontainer cont-login" style="background-color:#f1f1f1">
        <button  type="button" onclick="document.getElementById('login-link').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>
  </div>

  <!--Regitration modal contents -->
  <div id="register-link" class="register_modal">
    <form class="register_modal-content animate" action="/action_page.php">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="imgcontainer">
        <span onclick="document.getElementById('register-link').style.display='none'" class="login_close" title="Close Modal">&times;</span>
      </div>

      <div class="modalcontainer cont-login">
        <h4 class="text-center">Register</h4>
        <div class="alert alert-danger register-alert" style="display:none"></div>
        <p class="errorRegName alert alert-danger hidden"></p>
        <label for="names"><b>Names</b></label>
        <input type="text" placeholder="Enter your name" id="reg_name" name="name" autocomplete="off">

        <p class="errorRegEmail alert alert-danger hidden"></p>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter your email" id="reg_email" name="email" autocomplete="off">

        <p class="errorRegTel alert alert-danger hidden"></p>
        <label for="tel"><b>Phone Number</b></label>
        <input type="tel" name="tel" id="reg_tel" placeholder="Phone Number" autocomplete="off">

        <p class="errorRegDis alert alert-danger hidden"></p>
        <label for="tel"><b>Discrict</b></label>
        <select class="form-control" id="reg_dis" name="district">
        <option selected="selected" value="">--Select One--</option>
          <optgroup label="City of Kigali">
            <option value="Gasabo">Gasabo</option>
            <option value="Kicukiro">Kicukiro</option>
            <option value="Nyarugenge">Nyarugenge</option>
          </optgroup>
          <optgroup label="Eastern Province">
            <option value="Bugesera">Bugesera</option>
            <option value="Gatsibo">Gatsibo</option>
            <option value="Kayonza">Kayonza</option>
            <option value="Kirehe">Kirehe</option>          
            <option value="Ngoma">Ngoma</option>
            <option value="Nyagatare">Nyagatare</option>
            <option value="Rwamagana">Rwamagana</option>      
          </optgroup>
          <optgroup label="Northern Province">
            <option value="Burera">Burera</option>
            <option value="Gakenke">Gakenke</option>
            <option value="Gicumbi">Gicumbi</option>
            <option value="Musanze">Musanze</option>
            <option value="Rulindo">Rulindo</option>    
          </optgroup>
          <optgroup label="Southern Province">
            <option value="Gisagara">Gisagara</option>
            <option value="Huye">Huye</option>
            <option value="Kamonyi">Kamonyi</option>
            <option value="Muhanga">Muhanga</option>        
            <option value="Nyamagabe">Nyamagabe</option>
            <option value="Nyanza">Nyanza</option>
            <option value="Nyaruguru">Nyaruguru</option>
            <option value="Ruhango">Ruhango</option>         
         
          </optgroup>
          <optgroup label="Western Province">
            <option value="Karongi">Karongi</option>
            <option value="Ngororero">Ngororero</option>
            <option value="Nyabihu">Nyabihu</option>
            <option value="Nyamasheke">Nyamasheke</option>       
            <option value="Rubavu">Rubavu</option>
            <option value="Rusizi">Rusizi</option>
            <option value="Rutsiro">Rutsiro</option>  
          </optgroup>

        </select>

        <p class="errorRegPsw alert alert-danger hidden"></p>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" id="reg_password" name="psw">

        <label for="psw"><b>Comfirm Password</b></label>
        <input type="password" placeholder="Confirm Password" id="reg_conf_password" name="conf_psw">

        <button type="button" id="button" class="registerBtn">Register</button>
      </div>

    </form>
  </div>
</footer>