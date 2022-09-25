jQuery(document).ready(function(){

    $("#user1").on("input", function(){
      var us=document.getElementById("user1");
      us.style.backgroundColor="#4179B8";
    });

    $("#pass1").on("input", function(){
      var us=document.getElementById("pass1");
      us.style.backgroundColor="#4179B8";
    });
    $("#pass2").on("input", function(){
      var us=document.getElementById("pass2");
      us.style.backgroundColor="#4179B8";
    });
    $("#email").on("input", function(){
      var us=document.getElementById("email");
      us.style.backgroundColor="#4179B8";
    });

  jQuery('#ajaxSubmit1').click(function(e){
     e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
     jQuery.ajax({
        url: '/login',
        method: 'get',
        data: {
           username: jQuery('#username').val(),
           password: jQuery('#password').val(),
        },
        contentType: "application/json; charset=utf-8",
        success: function(result){
          $("body").html(result);
        }});
     });

     jQuery('#ajaxSubmit2').click(function(e){
        if(validate())
        {
          e.preventDefault();
          $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               }
           });
            jQuery.ajax({
           url: '/signup',
           method: 'get',
           data: {
              username: jQuery('#user1').val(),
              password: jQuery('#pass1').val(),
              email: jQuery('#email').val(),
              password_re: jQuery('#pass2').val(),

           },
           contentType: "application/json; charset=utf-8",
           success: function(result){
             $("body").html(result);
           }});
         }

        });

        jQuery('#ajaxSubmit3').click(function(e){
           {
             e.preventDefault();
             $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
              url: '/contact',
              method: 'get',
              data: {
                 name: jQuery('#name').val(),
                 email: jQuery('#email').val(),
                 notes: jQuery('#notes').val(),
              },
              contentType: "application/json; charset=utf-8",
              success: function(result){
                $("body").html(result);
              }});
            }

           });

});


function validate() {
   var valid_result = true;
    var password1=document.getElementById("pass1");
    var password2=document.getElementById("pass2");
    var name=document.getElementById("user1");
    var email=document.getElementById("email");

    if (name.value==null || name.value==""){
       name.placeholder="Username Is Required";
       name.style.backgroundColor = "#f1b3bd";
       name.focus();
       valid_result = false;
    }
    else if(name.value.length<3){
        name.placeholder="UserName Is TooShort, Minimum 4 Characters";
        name.style.backgroundColor ="#f1b3bd";
        name.value="";
        name.focus();
        valid_result = false;
    }

    if(password1.value==""||password1.value==null || password2.value==""||password2.value==null)
    {
       password1.placeholder="Password Field Is Empty";
       password1.style.backgroundColor ="#f1b3bd";
       password2.placeholder="Password Field Is Empty";
       password2.style.backgroundColor ="#f1b3bd";
       password1.focus();
       valid_result = false;
    }
	
    else if(password1.value==password2.value){
        if(password1.value.length<8){
          password1.placeholder="Password TooShort, Minimum 8 Characters";
          password1.style.backgroundColor ="#f1b3bd";
		  password2.placeholder="Password TooShort, Minimum 8 Characters";
          password2.style.backgroundColor ="#f1b3bd";
          password1.value="";
          password2.value="";
          password1.focus();
          valid_result = false;
        }
	}
	else if(password1.value!=password2.value){
     password1.placeholder="Passwords MisMatch";
     password1.style.backgroundColor ="#f1b3bd";
	 password2.placeholder="Passwords MisMatch";
     password2.style.backgroundColor ="#f1b3bd";
     password1.value="";
     password2.value="";
     password1.focus();
     valid_result = false;
        }
    else if(password1.value==name.value)
        {
           password1.placeholder="UserName And Password Cannot Be The Same";
           password1.style.backgroundColor ="#f1b3bd";
           password1.value="";
           password2.value="";
           password1.focus();
           valid_result = false;
         }

     const sub="@";
     const sub2=".com";
     if (email.value==null || email.value==""){
        email.placeholder="Email Is Required";
        email.style.backgroundColor ="#f1b3bd";
        email.focus();
        valid_result = false;
     }
     else if(email.value.includes(sub)==0 || email.value.includes(sub2)==0){
       email.placeholder="Email Is invalid";
       email.value="";
       email.style.backgroundColor ="#f1b3bd";
       email.focus();
       valid_result = false;
     }

     return valid_result;
}
