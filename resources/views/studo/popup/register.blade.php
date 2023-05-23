<!-- Modal -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="border-top-left-radius: 30% !important;border-top-right-radius:30%;">
                    <div style="display:flex; justify-content:space-between;align-items:center;width:100%;">
                    <div>
                        <p class="title-text-login modal-title black">
                            Daftar.
                        </p>
                    </div>
                    <div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <a href=""  class="btn-google btn-block effect8" style="border: 1px solid #636466;border-radius:5px;padding: 10px 16px;text-decoration:none;">
                            <center><span class="google-text-login" >Buat dengan Google</span></center>
                        </a>
                    </div>
                    <hr style="border-color:#20A2EB !important">
                    <form>
                        <div class="form-group">
                            <p class="desc-text-login">
                                Nama lengkap
                            </p>
                            <input type="name" placeholder="Nama" name="name" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <p class="desc-text-login">
                                Email
                            </p>
                            <input type="email" placeholder="Email" name="email" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
                        </div>
                        <div class="form-group pass">
                            <p class="desc-text-login">
                                Password
                            </p>
                            <input id="password-field" placeholder="Password" style="border: 1px solid black;border-radius:5px;" type="password" class="form-control" name="password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password-nav"></span>
                        </div>
                        <div class="form-group">
                            <button class="button-text-login btn-masuk" style="">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>