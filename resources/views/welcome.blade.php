<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <fieldset class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="proceed" type="checkbox" value="">
                      Proceed to site
                    </label>
                  </div>
            </fieldset>
        </div>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
   
    $("#proceed").click(function(){
        alert("Working");
    }); 

</script>