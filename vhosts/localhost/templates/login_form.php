<!DOCTYPE html>
<html>

<form name="loginform" action="login.php" method="post">
    <fieldset>
        </br>
        </br>
        <div class="sub">
            <span class="message">
                Welcome to Inkblot!
                </br>1. Sign Up
                </br>2. Receive emails, and simply reply to them
                </br>3. Your replies will automatically save to your ever-growing journal
                </br>4. Revisit past entries and decorate & personalize them when you sign in
                </br></br>That's it! Enter your email address and start your journal now
            </span>
        </div>
        </br> 
        <div class="control-group">
            <input name="email" placeholder="Email Address" type="text" class="email"/> 
            <a href="signup" class="signup" style="padding-left:5px">Go</a>
        </div>                
    </fieldset>
</form>

<div id="container">
<div id="topnav" class="topnav"> Already have an account? <a href="login" class="signin"><span>Sign in</span></a> </div>
<fieldset id="signin_menu" style=display:none>
    <form method="post" id="signin" action="localhost/">
    </br>
    <label for="email">Email</label>
    <input id="email" name="email" value="" title="email" tabindex="4" type="text">
    </p>
    <p>
    <label for="password">Password</label>
    <input id="password" name="password" value="" title="password" tabindex="5" type="password">
    </p>
    <p class="remember">
    <input id="signin_submit" value="Sign in" tabindex="6" type="submit">
    </br></br>
    <input id="remember" name="remember_me" value="1" tabindex="7" type="checkbox">  Remember me</input>
    </p>
    <p class="forgot"> <a href="#" id="resend_password_link">Forgot your password?</a> </p>
    </form>
</fieldset>
</div>

<script src="javascripts/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $(".signin").click(function(e) {
        e.preventDefault();
        $("fieldset#signin_menu").toggle();
        $(".signin").toggleClass("menu-open");
        });
    $("fieldset#signin_menu").mouseup(function() {
        return false
    });
    $(document).mouseup(function(e) {
        if($(e.target).parent("a.signin").length==0) {
        $(".signin").removeClass("menu-open");
        $("fieldset#signin_menu").hide();
        }
    });
    });
</script>

<!--

<div>
    Already have an account? <input type="submit" onclick= "appear()" value ="Log in">
</div>
<div>
    <a href="#">
    <form name="loginform" style = "display:none" onclick="display:show">
        Email: <input type="text" name="email">
        </br>
        Password: <input type="password" name="password">
        </br>
        <input type="submit" value="Log In" onsubmit="logged()">
    </form>
    </a>
</div>

<script type= "text/javascript">
    //xmlhttp.onsubmit = 
    function validator()
    {
        var x = document.getElementbyId["email"].value;
        var at = x.indexOf("@");
        var dot = x.lastIndexOf(".");
        if (at < 1 || dot < at + 2 || dot + 2 >= x.length)
        {
            error += "Please enter a valid email address.";
            return "error hide";
        }
        return true;
    }
           
    var userid = '';
    var password = '';
    var windowReference;

    function popup() 
    {
        var w = 480, h = 340;

        if (window.screen) 
        {
            w = screen.availWidth;
            h = screen.availHeight;
        }

        var popW = 300, popH = 150;
        var leftPos = (w-popW)/2, topPos = (h-popH)/2;

        window.open('popup.htm','windowName','width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos);

        if (!windowReference.opener)
            windowReference.opener = self;
    }

    function done() 
    {
      alert('userid = ' + userid + '\npassword = ' + password);
    }

    function logged(form) {
      opener.userid = form.userid.value;
      opener.password = form.password.value;
      opener.done();
      self.close();
      return false;
    }
    
    function appear()
    {
        document.getElementByID['loginform'].style.visibility = 'visible';
    }
    
    function disappear()
    {
        document.getElementByID['loginform'].style.visibility = 'hidden';
    }
    
    /*function popup()
    {
        var emailpass = prompt("Email \n Password");

        if (emailpass != NULL)
        {
            // check email and pass are in system w/ ajax to connect to server side                             
        }
        else
            return false;
    }  */   
</script>  
-->

