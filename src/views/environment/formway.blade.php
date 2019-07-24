<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Auto Installer</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body style="background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);">
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="" method="post">
                {{csrf_field()}}
                {!! $renderdInput !!}
                <div class="form-group">
                    <button id="prev" class="btn btn-sm btn-info">Prev</button>
                    <input type="submit" id="submitnext" class="btn btn-success" value="Next">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(function () {
        var part =  $(".part");
        historyActiveIndex =  localStorage.getItem("activeindex");
        window.activeIndex = historyActiveIndex == null ? parseInt($(".active").attr("id")) : parseInt(historyActiveIndex);

        lastIndex = part.length - 1;
        part.each(function (index) {
            var obj = $(this);


            if (index == lastIndex) {
                $(this).addClass("lastpart");
            }


            if (historyActiveIndex != null){
                obj.removeClass("active")
                if (obj.hasClass("active") && parseInt(obj.attr("id") != historyActiveIndex)) {
                    obj.removeClass("active");
                    obj.hide();
                }

                if (parseInt(obj.attr("id")) == historyActiveIndex) {
                    obj.addClass("active")
                    obj.show()
                }
            }else {

            }

            if (!obj.hasClass("active")){
                obj.hide()
            }
        })



        window.LastIndex = parseInt($(".lastpart").attr("id"))


        var sbmitBtn = $("#submitnext");

        $(document).on("click","#submitnext",function (e) {
            if (activeIndex != LastIndex){

                e.preventDefault();
            }
            var nextActive = activeIndex + 1;
            if (nextActive > LastIndex) {
                nextActive = 1;
            }

            part.each(function (index) {
                partObj = $(this)
                if (parseInt(partObj.attr("id")) == activeIndex){
                    partObj.removeClass("active")
                    partObj.hide();
                }


                if (parseInt(partObj.attr("id")) == parseInt(activeIndex) +1){
                    partObj.addClass("active");
                    partObj.show();
                }

                if (parseInt(partObj.attr("id")) == LastIndex){
                    window.activeIndex = parseInt($(".active").attr("id"))
                   localStorage.setItem("activeindex",parseInt(nextActive))

                }

            })
            envinput  = $(".env");
            envinput.each(function (index) {
                name = $(this).attr("name");
                valu = $(this).val();
                localStorage.setItem(name,valu);
            })


        })


        /**
         * Form value set to locastorage
         */
        envinput  = $(".env");

        envinput.each(function (index) {
            obj = $(this)
            objname = obj.attr("name");
            localValue = localStorage.getItem(objname);
            if ( localValue != null){
                obj.val(localValue)
            }
        })

        $(document).on("click","#prev",function (e) {
            e.preventDefault();

            var prevActive = activeIndex - 1;
            if (prevActive < 1) {
                prevActive = LastIndex;
            }

            part.each(function (index) {
                partObj = $(this)
                if (parseInt(partObj.attr("id")) == activeIndex){
                    partObj.removeClass("active")
                    partObj.hide();
                }


                if (parseInt(partObj.attr("id")) == parseInt(prevActive)){
                    partObj.addClass("active");
                    partObj.show();
                }

                if (parseInt(partObj.attr("id")) == LastIndex){
                    window.activeIndex = parseInt($(".active").attr("id"))
                    localStorage.setItem("activeindex",parseInt(prevActive))

                }

            })
        })

        //
        // $(document).on("keyup",".env",function () {
        //     name = $(this).attr("name");
        //     valu = $(this).val();
        //     localStorage.setItem(name,valu);
        // })
        

    })
</script>
</body>
</html>
