$(document).ready(function () {
    $("#action_data a").click(function () {
        $this=$(this);
        var action=$this.data('action');
        var code=$this.data('code');
        if(action=="delete"){
            var x=confirm("از حذف هواپیما مورد نظر مطمئنید ؟");
            if(x==true)
            {
                $(".result").css("display", "block");
                $(".result p").html("<i class='fa fa-refresh fa-spin'></i> صبور باشید در حال پردازش ...  !");
                $.ajax({
                    url: 'Delete',
                    type: "POST",
                    data: {code:code},
                    success: function (data) {
                        if (data == 1) {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> هواپیما با موفقیت حذف شد  !");
                            function explode(){
                                location.reload();
                            }
                            setTimeout(explode, 2000);
                        } else {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> هواپیما حذف نشد  !");
                        }
                    }
                });
            }
            else
            {
                window.location.href="";
            }
        }
        if(action=="edit"){
            var x=confirm("می خواهید هواپیما را ویرایش کنید ؟");
            if(x==true)
                {
                    window.location="Havapeima_Update/"+code;
                }
            else
                {
                    window.location.href="";
                }
        }
    })
})