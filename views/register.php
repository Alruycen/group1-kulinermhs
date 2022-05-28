<div class="modal fade" id="registerForm" tabindex="-1" role="dialog" aria-labelledby="registerlabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold" id="registerlabel">Sign Up</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="process/proses_tentangkami.php" class="row g-3 needs-validation" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="form-control mb-5">
                        <input type="text" id="registerForm-name" class="form-control validate" name="uname" required>
                        <label data-error="wrong" data-success="right" for="registerForm-name">Username</label>
                    </div>

                    <div class="form-control mb-4">
                        <input type="password" id="registerForm-pass" class="form-control validate" name="upass" maxlength="11" required>
                        <label data-error="wrong" data-success="right" for="registerForm-pass">Password</label>
                    </div>

                    <div class="form-control mb-4">
                        <input type="file" id="registerForm-file" class="form-control validate" name="ufoto" required>
                        <label data-error="wrong" data-success="right" for="registerForm-file">Foto</label>
                    </div>

                </div>
                <div class="modal-footer d-flex">
                    <button type="submit" name="submit-register" class="btn btn-default">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="text-center">
    <div class="d-grid gap-2">
        <a class="btn btn-outline-dark btn-rounded mb-4" data-bs-toggle="modal" data-bs-target="#registerForm">REGISTER HERE</a>
    </div>
</div>