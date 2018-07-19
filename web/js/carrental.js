
var Login=false;
var Admin=false; // deals with a special Admin-User who's got administrator rights
var Sites; //gets data from server after login
var AdminSite; //link to special admin site is sent by server 
var GpsTracking; //link to special site for gps-tracking for admin is sent by server

$("#showOffices").click(function(){var iframe=`<iframe src="${Sites.offices}">`;
                                   //alert(iframe);
                                   $("#phpsite").html(iframe);
                                   $("#phpsite").show();
                                  });

$("#showCars").click(function(){var iframe=`<iframe src="${Sites.cars}">`;
                                   //alert(iframe);
                                   $("#phpsite").html(iframe);
                                   $("#phpsite").show();
                                  });

//alert(Sites.offices);

$.get("officelist.php",function(data){initOfficeSelect(data);});

function initOfficeSelect(data){ 
 var options=[];
 var o=`<option value='0'>---</option>`;
 var json=JSON.parse(data);
 options.push(o);
 json.map(function(x){var o=`<option value='${x.id}'>${x.name}</option>`;
                      options.push(o);
                     });
 $('#officeSelect').html(options.join(''));
}

$('#officeSelect').change(function(){var location=$('#officeSelect').val();
                                     var iframe=`<iframe src="${Sites.locFilter}?location=${location}">`;
                                     //alert(location);
                                     $("#phpsite").html(iframe);
                                     $("#phpsite").show();
                                    });

$('#register').click(function(){var iframe=`<iframe src="register.php">`;
                                   
                     $("#phpsite").html(iframe);
                     $("#phpsite").show();
                    });

$('#adminReport').click(function(){//alert('adminReport');
                                   var iframe=`<iframe src="${AdminSite}">`;
                                   $("#phpsite").html(iframe);
                                   $("#phpsite").show();
                                  });

$('#gpsTracking').click(function(){//alert(GpsTracking);
                                   var iframe=`<iframe src="${GpsTracking}">`;
                                   $("#phpsite").html(iframe);
                                   $("#phpsite").show();
                                  });


function doLogCheck(){
 var password=$('#password').val();
 //alert(password);
 $.post("login.php",{"username": $('#username').val(), "password": password},function(data){doLogin(data)});
}

function doLogin(data){
 //alert(data);
 var logdata=JSON.parse(data);
 Login=logdata.Login;
 Sites=logdata.Sites;
 Admin=logdata.Admin;
 if(Login)
  {$("#login").hide();
   $("#register").hide();
   $("#logout").show();
   $("#showCars").show();
   $("#showOffices").show();
   $("#officeSelect").show();
   $("#phpsite").text("you are successfully logged in");
   
   if(Admin)
    {$("#adminReport").show();
     $("#gpsTracking").show();
     AdminSite=logdata.AdminSite;
     GpsTracking=logdata.gpsTracking; 
     var message="<span color='red'><h1>You have now special administrator rights !!!</h1></span>";
     $('#phpsite').html(message); 
    }
  }
}



$('#login').click(function(){var loginForm=`<h1>LogIn Form</h1>

                                              <p><input type="text" placeholder="username" id="username"></p>
                                              <p><input type="password" placeholder="password" id="password"></p>
                                              <p><button onclick="doLogCheck()">logIn</button></p>
                                             `;

                     //alert('login'); 
                     $("#phpsite").html(loginForm);
                     $("#phpsite").show();
                    });

function initPage(){
 if(!Login)
  {$('#showCars').hide();
   $('#showOffices').hide();
   $('#officeSelect').hide();
   $('#logout').hide();
   $('#adminReport').hide();
   $('#gpsTracking').hide();
  }
 
}

initPage();

