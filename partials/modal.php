<!-- Button trigger modal -->

<!-- Modal -->
<!-- Log in  -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Log in to iDiscuss Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- You may need to change it  action="/php/forum/partials/handlesignup.php"-->

            <form action="/partials/handlelogin.php" method="post">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" name="lusername" id="" aria-describedby="emailHelpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="lpassword" id="" aria-describedby="emailHelpId" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Sign up  -->
<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign up for iDiscuss Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- You may need to change it  action="/php/forum/partials/handlesignup.php"-->
            <form action="/partials/handlesignup.php" method="post">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" name="susername" id="" aria-describedby="emailHelpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="spassword" id="" aria-describedby="emailHelpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input type="password" class="form-control" name="scpassword" id="" aria-describedby="emailHelpId" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>