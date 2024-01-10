<!-- gray bg -->
<section class="container tm-home-section-1" id="more">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <!-- Nav tabs -->
            <div class="tm-home-box-1">
                <ul class="nav nav-tabs tm-white-bg" role="tablist" id="hotelCarTabs">
                    <li role="presentation" class="active" >
                        <a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">پیگیری بلیط</a>
                    </li>
                    <li role="presentation" >
                        <a href="#car" aria-controls="car" role="tab" data-toggle="tab">جستجوی پیشرفته</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <?php
                    echo form_open('Site/Peygiri/');
                    ?>
                    <div role="tabpanel" class="tab-pane fade in active tm-white-bg" id="hotel">
                        <div class="tm-search-box effect2">
                            <form action="#" method="post" class="hotel-search-form">
                                <div class="tm-form-inner">
                                    <div class="form-group">
                                        <div class='input-group date-time' id='datetimepicker3'>
                                            <input type='text' class="form-control" name="CodeMelli" placeholder=" کد ملی" style="margin-bottom: 30px; border: 1px dashed #84DACC; background-color: #ffffff; box-shadow:none; width: 220px" />
                                        </div>
                                        <div class='input-group date-time' id='datetimepicker3'>
                                            <input type='text' class="form-control" name="ReserveCode" placeholder=" کد رزرو" style="margin-bottom: 0px; border: 1px dashed #84DACC; background-color: #ffffff; box-shadow:none; width: 220px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group tm-yellow-gradient-bg text-center">
                                    <button type="submit" name="submit" class="tm-yellow-btn">پیگیری کن  </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                    <div role="tabpanel" class="tab-pane fade tm-white-bg" id="car">
                        <div class="tm-search-box effect2">
                            <?php
                            echo form_open('Site/Search');
                            ?>
                            <div class="tm-form-inner">
                                <div class="form-group">
                                    <select class="form-control" name="parvaz_maghsad">
                                        <option value="تهران"> مقصد : </option>
                                        <option value="تهران"> تهران</option>
                                        <option value="تبریز"> تبریز</option>
                                        <option value="شیراز"> شیراز</option>
                                        <option value="قم"> قم</option>
                                        <option value="مشهد"> مشهد</option>
                                        <option value="اصفهان"> اصفهان</option>
                                        <option value="ارومیه"> ارومیه</option>
                                        <option value="کیش"> کیش</option>
                                        <option value="اردبیل"> اردبیل</option>
                                        <option value="گلستان"> گلستان</option>
                                        <option value="مازندران"> مازندران</option>
                                        <option value="گیلان"> گیلان</option>
                                        <option value="سیستان و بلوچستان"> سیستان و بلوچستان</option>
                                        <option value="دزفول"> دزفول</option>
                                        <option value="زاهدان"> زاهدان</option>
                                        <option value="کرمانشاه"> کرمانشاه</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class='input-group date-time' id='datetimepicker3'>
                                        <p>تاریخ پرواز :</p>
                                        <input type='text' class="form-control example1" name="parvaz_date" placeholder="Pickup Date" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group tm-yellow-gradient-bg text-center">
                                <button type="submit" class="tm-yellow-btn">جستجو کن </button>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
