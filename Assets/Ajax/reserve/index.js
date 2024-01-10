$(document).ready(function () {
    $("#action_data a").click(function () {
        $this=$(this);
        var action=$this.data('action');
        var code=$this.data('code');
        var pcode=$this.data('pcode');
        if(action=="delete"){
            var x=confirm("از حذف رزرو مورد نظر مطمئنید ؟");
            if(x==true)
            {
                $(".result").css("display", "block");
                $(".result p").html("<i class='fa fa-refresh fa-spin'></i> صبور باشید در حال پردازش ...  !");
                $.ajax({
                    url: 'Delete',
                    type: "POST",
                    data: {code:code,pcode:pcode},
                    success: function (data) {
                        if (data == 1) {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> رزرو با موفقیت حذف شد  !");
                            function explode(){
                                location.reload();
                            }
                            setTimeout(explode, 2000);
                        } else {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> رزرو حذف نشد  !");
                        }
                    }
                });
            }
            else
            {
                window.location.href="";
            }
        }
    })
})