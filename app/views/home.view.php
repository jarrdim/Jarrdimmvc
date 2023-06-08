<?php $this->view('header') ?>

<style>
    form{
        margin:auto;
        width:500px;
        text-align:center;
        font-family:tahoma;
        border-radius:10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>


<div class="container  mt-5  ">
<?php //echo message('',false)?>
        
    <div  method="POST" class="w-50 m-auto">
       
        <div class="row text-center">
            <div class="col-md-12 ">
                <div class="card w-100 ">
                    <div class="card-body">
                        <div class="card-title text-primary fw-bold">
                           WELCOME TO JARRDIM-FRANEWORK version 1.0
                        </div>
                        <div class="card-text">
                            <span>
                             
                              
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                       <strong> YOUR HOME PAGE</strong>
                </div>

                <div class="d-flex">
                <?php if(!Auth::logged_in()): ?>
                <div class="text-center me-4">
                         <span><a  href="<?php echo ROOT?>/signup">SignUp</a></span>
                </div>
                <div class="text-center me-3">
                         <span><a  href="<?= ROOT?>/login">Login</a></span>
                </div>
                <?php else:?>
                    <div class="text-center">
                         <span><a  href="<?= ROOT?>/logout">LogOut(<?=  Auth::getUsername()?>)</a></span>
                </div>
                    <?php endif;?>
                </div>



            </div>
        </div>
</div>
  
</div>



