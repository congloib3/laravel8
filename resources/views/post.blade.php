<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infinite Scroll Pagination</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                   <h2 class="text-center">
                       Infinite Scroll Pagination
                   </h2>
               </div>
               <div class="col-md-12" id="post-data">
                    @include('data')
               </div>
            </div>
        </div>
    </section>
    <div class="ajax-load text-center" style="display: none">
        <p><img src="https://wpamelia.com/wp-content/uploads/2018/11/ezgif-2-6d0b072c3d3f.gif" alt="">Loading More Post</p>
    </div>

    <script>
        var page = 1;
        function loadMoreData(page){
            $.ajax({
                url: '?page='+page,
                type: 'get',
                beforeSend: function(){
                    $(".ajax-load").show()
                }
            })
            .done(function(data){
                if(data.html == ""){
                    $(".ajax-load").html("No More Records Found");
                    return
                }
                setTimeout(()=> {
                    $("#post-data").append(data.html);
                    $(".ajax-load").hide();
                }, 3000)

            })
            .fail(function(jqXHR, ajaxOptions, thrownError){
                alert("Server not responding...");
            });
        }

        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() >= $(document).height()){
                page++;
                loadMoreData(page);
            }
        });
    </script>
</body>
</html>
