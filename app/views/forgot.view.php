<?php $this->view('header') ?>


<section class="mt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-center py-md-5 py-4 h1">
               <span class="text-warning "> <strong>Welcome to</strong></span> 
               <div  style="font-family:cursive;">
                <span class="text-primary">Jacob FrameWork</span> 
               <span style="color:#6610f2; ">Progress</span>
               </div>
             
            </div>
            <div class="col-md-5">


                <!--ENTER EMAIL-->
                <div class="card containerDiv " lstyle="
                    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
                    ">
                    <p style="font-size:12px;" class="alert alert-danger text-center error"></p>
                    <form class="card-body  email">
                    
                        <?php if(!empty($errors['email'])):?>
                        <div class="text-danger"><?php echo $errors['email']?></div>
                        <?php endif; ?>
                        <label for="email"></label>
                        <input type="text" id="email" placeholder="Enter Your Email " name="email" class="form-control  containerInput" />
                        <div class="form-outline mt-2 ">
                            <div class="mb-4 text-center">
                                <a class="btn btn-dark text-light" href="<?php echo ROOT ?>/login">back</a>
                                <div onclick="send1_data()" class="btn w-50 btn-primary btn-block"> continue</div>

                            </div>
                            <div class="text-center">
                                <span><a href="signup">Sign Up</a></span>
                            </div>
                        </div>
                    </form>

                    <!--END-->

                    <!--ENTER CODE-->
                    <style>
                        .cs-code {
                            display: none;
                        }
                    </style>

                    <form  class="card-body code cs-code ">
                        <?php if(!empty($errors['email'])):?>
                        <div class="text-danger"><?php echo $errors['email']?></div>
                        <?php endif; ?>
    
                        <label for="email" class="text-warning text-center">Copy and Paste code from your email</label>
                        <input type="text" placeholder="Confirmation Code 12345" id="email" name="code" class="form-control mt-2  containerInput1" />
                        <div class="form-outline mt-2 ">
                            <div class="mb-4 text-center">
                                <a class="btn btn-dark text-light" href="<?php echo ROOT ?>/login">back</a>
                                <div  onclick="send2_data()" class="btn w-50 btn-primary btn-block ">continue</div>

                            </div>
                            <div class="text-center">
                                <span><a href="signup">Sign Up</a></span>
                            </div>
                        </div>
                    </form>

                    <!--END-->
                    <!--PASSWORD-->
                    <style>
                        .pass {
                            display: none;
                        }
                    </style>
                    <form class="card-body pass ">

                        <?php if(!empty($errors['email'])):?>
                        <div class="text-danger"><?php echo $errors['email']?></div>
                        <?php endif; ?>

                        <label for="password"></label>
                        <input type="text" id="password" placeholder="Enter New Password" name="password" class="form-control mt-2 containerInput2 " />
                        <label for="password2"></label>
                        <input type="text" id="password2" placeholder="Retype Password" name="password2" class="form-control mt-2 containerInput3" />

                        <div class="form-outline mt-2 ">


                            <div class="mb-4 text-center">
                                <a class="btn btn-dark text-light" href="<?php echo ROOT ?>/login">back</a>
                                <div onclick="send3_data()" class="btn w-50 btn-primary btn-block ">
                                    continue
                                </div>
                            </div>
                            <div class="text-center">
                                <span><a href="signup">Sign Up</a></span>
                            </div>
                        </div>
                    </form>
                    <!--END-->
                    <!--SUCCESSFUL RESET-->
                    <style>
                        .reset {
                            display: none;
                        }
                    </style>
                    <div class="reset text-center">
                        <div class="alert reset-message alert-danger"></div>
                        <a href="<?php echo ROOT ?>/login" class="btn w-100 btn-primary btn-block mb-4">login</a>
                    </div>
                </div>
                <!--END-->
            </div>
        </div>
    </div>
</section>



<script>
var error = document.querySelector(".error");
error.style.display = "none";
error.innerHTML= "";


    function send1_data() {
        var divContent = document.querySelectorAll(".containerInput");
        var input = divContent;


        var obj = {};
        for (let i = 0; i < input.length; i++) {
            var key = input[i].name;
            obj[key] = input[i].value;

        }
        obj['data_type'] = "enteremail";
       // alert(obj['data_type']);
        send_data(obj);

    }

    function send2_data() {
        var divContent = document.querySelectorAll(".containerInput1");
        var input = divContent;
        var obj = {};
      
        for(let i = 0; i < input.length; i++) {
            var key = input[i].name;
            obj[key] = input[i].value;

        }
         obj['data_type'] = "entercode";
        // alert(obj.code);
        send_data(obj);
    }

    function send3_data() {
        var divContent = document.querySelectorAll(".containerInput2, .containerInput3");
       
        var input = divContent;
        var obj = {};

        for(let i = 0; i < input.length; i++) {
            var key = input[i].name;
            obj[key] = input[i].value;
        }
        obj['data_type'] = "enterpassword";
        send_data(obj);
    }

    function send_data(obj) {
        var xml = new XMLHttpRequest();
        var form = new FormData();
        for (key in obj) {
            form.append(key, obj[key]);
        }
        xml.addEventListener('readystatechange', function () {

            if (xml.readyState == 4) {
                if (xml.status == 200) {
                    handle_result(xml.responseText)
                    //.log(xml.responseText)
                    //window.location.reload();
                }

            }
        });
        xml.open('post', '', true);
        xml.send(form);
    }

    function handle_result(result) {
       console.log(result);
       
        let string= result;
        let substring = '{"';



    if(string.includes(substring))
    {
        const obj = JSON.parse(result);
        
        if (typeof obj == 'object') {


            switch (obj.data_type) {
                case "entercode":
                  
                    var email = document.querySelector(".email");
                    email.style.display = "none";

                    var pass = document.querySelector(".pass");
                    pass.style.display = "none";

                    var code = document.querySelector(".code");
                    code.classList.remove('cs-code');
                    break;
                case "enterpassword":
                   
                    var email = document.querySelector(".email");
                    email.style.display = "none";

                    var code = document.querySelector(".code");
                    code.classList.add("cs-code");

                    var pass = document.querySelector(".pass");
                    pass.style.display = "block";

                    break;
                case "reset":
                    
                    var email = document.querySelector(".email");
                    email.style.display = "none";

                    var code = document.querySelector(".code");
                    code.classList.add("cs-code");

                    var pass = document.querySelector(".pass");
                    pass.style.display = "none";

                    var reset = document.querySelector(".reset");
                    reset.style.display = "block";
                    var message = document.querySelector(".reset-message");
                    message.innerHTML = obj.message;
                    break;
                default:
                    console.log(obj);

                    var error = document.querySelector(".error");
                    error.style.display = "block";
                    error.innerHTML = obj.error;
                    if(obj)
                   
                    break;
               
            }
        }
    
    }
    else{
        console.log(result);
    }
    }
</script>





