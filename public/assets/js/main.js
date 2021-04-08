$(document).ready(function(){

    $.ajax({
        "url":"/getAdminApprovedBlogs",
        "method":"GET",
        "dataType":"json",
        success:function (data){
            //console.log(data)
            getApprovedBlogs(data)
        },
        error:function (err){
            console.log(err);
        }
    })
    $.ajax({
        "url":"/getAdminPendingBlogs",
        "method":"GET",
        "dataType":"json",
        success:function (data){
           //console.log(data)
            getPendingBlogs(data)
        },
        error:function (err){
            console.log(err);
        }
    })

    $.ajax({
        "url":"/getUserBlogs",
        "method":"GET",
        "dataType":"json",
        success:function (data){
            //console.log(data)
            getUserBlogs(data)
        },
        error:function (err){
            console.log(err);
        }
    })



    //Login
    $(document).on("click","#loginSubmit",loginUser);
    //Register
    $(document).on("click","#registerSubmit",registerUser);
    //Logout
    $(document).on("click","#logout",logoutUser);

    //Approve Blog
    $(document).on("click",".approveBlog",approveBlog);

    //Delete blog
    $(document).on("click",".delApproveBlog",deleteBlog);

    //Delete User Blog
    $(document).on("click",".deleteUserBlog",deleteUserBlog);

})

$(".regLabels").hide(); //labels za forme

function loginUser(e){
    e.preventDefault();

    var errorLog =[];
    var email = $("#emailLogin").val();
    var pass = $("#passLogin").val();

    var emailRegex=/^[a-zšđčćž,/.-_\d.!?]+@[a-z]+(.[a-z]+){1,2}$/; //mora da bude jedno ili vise malo slovo ili spec char, zatim ide @, pa onda jedna rec i moze da se doda nakon obavezne tacke jos jedna rec... primer: danilo@gmail.com
    var passRegex=/^[\w\d]{4,10}$/; //bilo koji char od 4 do 10 char-ova

    if(!(emailRegex.test(email))){
        errorLog.push("error");
        $("#emailLogLabel").css("color","red").show();
    }
    else{
        $("#emailLogLabel").hide();
    }
    if(!(passRegex.test(pass))){
        errorLog.push("error");
        $("#passLogLabel").css("color","red").show();
    }
    else{
        $("#passLogLabel").hide();
    }

    let getToken = document.getElementsByName('_token');
    let token;
    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }
    if(errorLog.length==0){
        $.ajax({
            "url":"/loginUser",
            "method":"POST",
            "data":{
                "email":email,
                "pass":pass,
                "_token":token,
                "button":true
            },
            success: function(data){
                alert("uspesno logovanje!");
                window.location.href=data;
            },
            error: function(xhr, errType, errMsg){
                console.log(xhr);
            }
        })
    }
}

function registerUser(e){
    e.preventDefault();

    var error = [];
    var name = $("#firstName").val();
    var lastName = $("#lastName").val();
    var emailRegister = $("#emailReg").val();
    var passRegister = $("#passwordReg").val();
    var passRepeatRegister = $("#passwordRepeat").val();

    //ovde ide regex
    var nameReg =/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,20}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,20})?$/;
    var emailRegex=/^[a-zšđčćž,/.-_\d.!?]+@[a-z]+(\.[a-z]+){1,2}$/;
    var passRegex=/^.{4,10}$/;

    if(!(nameReg.test(name))){
        error.push("error");
        $("#nameRegLabel").css("color","red").show();
    }
    else{
        $("#nameRegLabel").hide();

    }

    if(!(nameReg.test(lastName))){
        error.push("error");
        $("#lastNameRegLabel").css("color","red").show();
    }
    else{
        $("#lastNameRegLabel").hide();

    }

    if(!(emailRegex.test(emailRegister))){
        error.push("error");
        $("#emailRegLabel").css("color","red").show();
    }
    else{
        $("#emailRegLabel").hide();

    }

    if(!(passRegex.test(passRegister))){
        error.push("error");
        $("#passRegLabel").css("color","red").show();
    }
    else{
        $("#passRegLabel").hide();

    }

    if(passRegister != passRepeatRegister){
        error.push("error");
        $("#passRepeatRegLabel").css("color","red").show();
    }
    else{
        $("#passRepeatRegLabel").hide();

    }


    let getToken = document.getElementsByName('_token');
    let token;
    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }

    if(error.length==0){
        $.ajax({
            "url":"/registerUser",
            "method":"POST",
            "data":{
                "name":name,
                "lastName":lastName,
                "emailReg":emailRegister,
                "passReg":passRegister,
                "_token":token,
                "button":true
            },
            success: function(data){
                console.log(data);
                if(data == "This email is taken!"){
                    alert(data);
                }
                else{
                    alert("uspesno registrovanje!");
                    window.location.href=data;
                }
            },
            error: function(xhr, errType, errMsg){
                console.log(xhr.responseText);
            }
        });
    }
}
function logoutUser(){
    $.ajax({
        "url":"/logout",
        "method":"GET",
        success: function(data){
            window.location.href=data;
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}

//ADMIN DEO

function getApprovedBlogs(data){
    var getApproved = "";
      // console.log(data);
    for(let approved of data){
        getApproved+=`

        <div class="col-12 userBlogs">
            <div class="row d-flex justify-content-lg-between align-items-center">
                <div class="col-lg-3 col-12 blogsAdminRes">
                    <figure><img class="img-fluid imgBlogAdmin" src="assets/images/${approved.images[0].src}" alt="${approved.title}"/></figure>
                </div>
                <div class="col-lg-3 col-12 blogsAdminRes">
                    <h4>${approved.title}</h4>
                </div>
                <div class="col-lg-3 col-12 blogsAdminRes">
                    <p>${approved.user.firstName} ${approved.user.lastName}</p>
                </div>
                <div class="col-lg-3 col-12 blogsAdminRes">
                    <button class="delApproveBlog" data-delId="${approved.id}">Obrisi Blog</button>
                </div>
            </div>
        </div>

        `
    }
    $("#adminApprovedBlogs").html(getApproved);
}

function getPendingBlogs(data){
    // console.log(data)
    var getPending = "";
    for(let pending of data){
        getPending+=`

                <div class="col-12 userBlogs">
                    <div class="row d-flex justify-content-lg-between align-items-center">
                        <div class="col-lg-3 col-12 blogsAdminRes">
                            <figure><img class="img-fluid imgBlogAdmin" src="assets/images/${pending.images[0].src}" alt="${pending.title}"/></figure>
                        </div>
                        <div class="col-lg-3 col-12 blogsAdminRes">
                            <h4>${pending.title}</h4>
                        </div>
                        <div class="col-lg-2 col-12 blogsAdminRes">
                            <p>${pending.user.firstName} ${pending.user.lastName}</p>
                        </div>
                        <div class="col-lg-2 col-12 blogsAdminRes">
                            <button class="approveBlog" data-appId="${pending.id}">Odobri Blog</button>
                        </div>
                        <div class="col-lg-2 col-12 blogsAdminRes">
                            <button class="delApproveBlog" data-delId="${pending.id}">Obrisi Blog</button>
                        </div>
                    </div>

                </div>

        `
    }
    $("#adminPendingBlogs").html(getPending);
}

function approveBlog(){

    var blogApproveId = $(this).attr("data-appId");

    let getToken = document.getElementsByName('_token');
    let token;
    for(let el of getToken) {

        token = el.value;

    }
    //console.log(token);
    $.ajax({
        "url":"/approveBlog",
        "method":"POST",
        "dataType":"json",
        "data":{
            "blogApproveId":blogApproveId,
            "_token":token
        },
        success:function (data){
            getPendingBlogs(data)
        },
        error:function (err){
            console.log(err);
        }
    })
}
 function deleteBlog(){
     var blogDeleteId = $(this).attr("data-delId");
     let getToken = document.getElementsByName('_token');
     let token;
     for(let el of getToken) {

         token = el.value;

     }

     $.ajax({
         "url":"/deleteBlog",
         "method":"POST",
         "dataType":"json",
         "data":{
             "blogDeleteId":blogDeleteId,
             "_token":token
         },
         success:function (data){
             console.log(data);
             var url = window.location.href;
             if(url.includes("adminApprovedBlogs")){
                  getApprovedBlogs(data[0])
             }
             else{
                 getPendingBlogs(data[1])
             }

         },
         error:function (err){
             console.log(err);
         }
     })
 }

 function getUserBlogs(data){
    var getBlogsUser="";
    for(let userBlogs of data){
        getBlogsUser+=`

            <div class="col-12 userBlogs">
                <div class="row d-flex justify-content-lg-between align-items-center">
                    <div class="col-lg-3 col-12 blogsAdminRes">
                        <figure><img class="img-fluid imgBlogAdmin" src="assets/images/${userBlogs.images[0].src}" alt="${userBlogs.title}"/></figure>
                    </div>
                    <div class="col-lg-3 col-12 blogsAdminRes">
                        <h4>${userBlogs.title}</h4>
                    </div>
                    <div class="col-lg-2 col-12 blogsAdminRes">
                    `
                    if(userBlogs.active==0){
                        getBlogsUser+=`<p style="color:orange">Pending</p>`
                    }
                    else{
                        getBlogsUser+=`<p style="color:green">Approved</p>`
                    }
        getBlogsUser+=` </div>
                    <div class="col-lg-2 col-12 blogsAdminRes">
                        <a href="/updateBlog/${userBlogs.id}"><button class="updateUserBlog">Izmeni Blog</button></a>
                    </div>
                    <div class="col-lg-2 col-12 blogsAdminRes">
                        <button class="deleteUserBlog" data-userDelId="${userBlogs.id}">Obrisi Blog</button>
                    </div>
                </div>

            </div>
        `


    }
    $("#userBlogsUnique").html(getBlogsUser);
 }

 function deleteUserBlog(){
     var deleteBlogId = $(this).attr("data-userDelId");
     let getToken = document.getElementsByName('_token');
     let token;
     for(let el of getToken) {

         token = el.value;

     }
     $.ajax({
         "url":"/deleteUserBlog",
         "method":"POST",
         "dataType":"json",
         "data":{
             "deleteBlogId":deleteBlogId,
             "_token":token
         },
         success:function (data){
             getUserBlogs(data);
         },
         error:function (err){
             console.log(err);
         }
     })
}
