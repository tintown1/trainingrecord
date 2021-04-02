
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Form Login</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="logintem.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>

  <center>
    <p> </p>
    <h1 class="h1 mb-3 font-weight-normal" style="text-align: center">Training Record</h1>
    <div id="logreg-forms">

    <form  name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="email"  name="username" class="form-control" required placeholder="E-mail" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="password" name="password" class="form-control" required placeholder="Password" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" id="btn">
            <span class="glyphicon glyphicon-log-in"> </span>
             Login </button>
               <br><label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
               </label>
          </div>
        </div>
      </form>
    </div>
  </center>
</body>

</html>