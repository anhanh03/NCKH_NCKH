<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Fogot Password</title>
</head>
<style>
#code{
    display: none;
}
#email{
    position: relative;
}
</style>
<script>
    
    function validate(){
        if (document.getElementById('Email').value === ""){
            document.getElementById('err').innerHTML="Vui lòng nhập email!";
            document.getElementById('err').style.color="red";
            console.log("á");
            return false;
        }else{
            
            document.getElementById('email').style.transition = "all 0.5s ease-in-out";
            document.getElementById('email').style.transform = "translateX(200px)";
            document.getElementById('email').style.display = "none";
            document.getElementById('code').style.transition = "all 0.5s ease-in-out";
            document.getElementById('code').style.display = "block";
            return true;
        }
    }

</script>
<body class="bg-primary-subtle">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-3 col-1"></div>
            <div class="col-sm-6 col-10 shadow p-3 mb-5 bg-body-tertiary rounded">
                <h3 class="text-center" style="color: blue">Fogot Password</h3>
                <form action="">
                    <div id="email">
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email address:</label>
                            <input type="email" class="form-control" id="Email" aria-describedby="emailHelp">    
                        </div>
                        <p id="err"></p>
                          <button type="button" onclick="return validate()" id="continue" class="btn btn-primary">Continue</button>
                    </div>
                    <div id="code">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter the code sent to your email address:</label>
                            <input type="text" class="form-control" id="Code" aria-describedby="emailHelp">    
                        </div>
                        <a href="#" class="text-decoration-none"><p>Gửi lại mã code?</p></a>
                          <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                        
                      
                </form>
            </div>
            <div class="col-sm-3 col-1"></div>
        </div>
    </div>
</body>
</html>