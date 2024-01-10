$(document).ready(function () {
    $("#action_data a").click(function () {
        $this=$(this);
        var action=$this.data('action');
        var code=$this.data('code');
        if(action=="delete"){
            var x=confirm("از حذف پرواز مورد نظر مطمئنید ؟");
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
                            $(".result p").html("<i class='fa fa-warning'></i> پرواز با موفقیت حذف شد  !");
                            function explode(){
                                location.reload();
                            }
                            setTimeout(explode, 2000);
                        } else {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> پرواز حذف نشد  !");
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
            var x=confirm("می خواهید پرواز را ویرایش کنید ؟");
            if(x==true)
                {
                    window.location="Parvaz_Update/"+code;
                }
            else
                {
                    window.location.href="";
                }
        }
    })
    $("#action_change div").click(function () {
        $this=$(this);
        var action=$this.data('action');
        var code=$this.data('code');
        var state=$this.data('state');
        if(action=="change"){
            var x=confirm("ایا میخواهید وضعیت پرواز را تغییر دهید ؟");
            if(x==true)
            {
                $(".result").css("display", "block");
                $(".result p").html("<i class='fa fa-refresh fa-spin'></i> صبور باشید در حال پردازش ...  !");
                $.ajax({
                    url: 'Change_State',
                    type: "POST",
                    data: {code:code,state:state},
                    success: function (data) {
                        if (data == 1) {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> وضعیت با موفقیت تغییر یافت  !");
                            function explode(){
                                location.reload();
                            }
                            setTimeout(explode, 2000);
                        } else {
                            $(".result").css("display", "block");
                            $(".result p").html("<i class='fa fa-warning'></i> وضعیت  تغییر نیافت  !");
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
            var x=confirm("می خواهید پرواز را ویرایش کنید ؟");
            if(x==true)
            {
                window.location="Parvaz_Update/"+code;
            }
            else
            {
                window.location.href="";
            }
        }
    })

})