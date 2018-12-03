<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">التسجيل</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="index.html">الرئيسية</a> / <span>التسجيل</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="userccount">
          
<!--
          <div class="alert alert-success" role="alert"><strong>Well done!</strong> Your account successfully created.</div>
          <div class="alert alert-warning" role="alert"><strong>Warning!</strong> Better check yourself, you're not looking too good.</div>
          <div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Change a few things up and try submitting again.</div>
-->
<!--
          <div class="userbtns">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#wsell">أريد أن ابيع</a></li>
              <li><a data-toggle="tab" href="#wbuy">أريد أن أشترى</a></li>
            </ul>
          </div>
-->
          <form id="regiterMe" method="POST">
            <div class="tab-content">
              <div id="wsell" class="formpanel tab-pane fade in active">
                <h2>بيانات المنشأة</h2>
                <div class="formrow">
                  <input type="text" name="nameAr" class="form-control nameAr" placeholder="اسم المنشأة بالعربى">
                </div>
                <div class="formrow classMe">
                  <input type="text" name="nameEn" class="form-control nameEn" placeholder="اسم المنشأة بالأنجليزية">
                  
                </div>

                <div class="formrow classMe">
                  <input type="text"  name="company_mobile[]" class="form-control mobile classMe" placeholder="رقم موبايل المنشأة">
                  <input type="text" name="mobile_desc[]" class="form-control telephone classMe" placeholder="مثال: خاص بقسم المبيعات">
                </div>
                <div class="geneMobile"></div>
                
                <div class="formrow classMe">
                  <button type="button" class="bty addInput buttonMe addInputMob" data-type="mobile" data-number="1"><i class="fa fa-plus"></i></button>
                  <button type="button" class="bty delInput buttonMe delInputMob"><i class="fa fa-trash"></i></button>
                </div>
                <div class="formrow classMe">
                  <input type="text" name="telephone[]" class="form-control telephone classMe" placeholder="رقم التليفون الأرضى">
                  <input type="text" name="tele_desc[]" class="form-control telephone classMe" placeholder="مثال: خاص بالسكرتارية">
                </div>
                <div class="geneTele"></div>
                <div class="formrow classMe">
                  <button type="button" class="bty addInput buttonMe addInputMob" data-type="tele"><i class="fa fa-plus"></i></button>
                  <button type="button" class="bty delInput buttonMe delInputTele" data-type="tele"><i class="fa fa-trash"></i></button>
                </div>
                
                <div class="formrow">
                  <select name="companyType" class="form-control">
                    <option>نوع المنشأة</option>
                    <option value="1">كصاحب نشاط</option>
                    <option value="2">كزائر</option>
                  </select>
                </div>
                <div class="formrow">
                  <select name="area" class="form-control">
                  	<option>المنطقة</option>
                    <?php foreach($areas as $area): ?>
                      <option value="<?= $area->gover_id ?>"><?= $area->gover_title_ar ?></option>
                    <?php endforeach; ?>
                  </select>
                  
                </div>
                <div class="formrow">
                  <select name="mohafaza" class="form-control">
                    <option>المحافظة</option>
                    <?php foreach($mohafazat as $mohafaza): ?>
                      <option value="<?= $mohafaza->moha_id ?>"><?= $mohafaza->moha_title_ar ?></option>
                    <?php endforeach; ?> 
                  </select>
                </div>
                <div class="formrow">
                  <select name="city" class="form-control">
                    <?php foreach($city as $cities): ?>
                      <option value="<?= $cities->city_id ?>"><?= $cities->city_name_ar ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="formrow">
                  <select name="dist" class="form-control">
                    <option>الحى</option>
                    <?php foreach($district as $districts): ?>
                      <option value="<?= $districts->gover_id ?>"><?= $districts->gover_title_ar ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="formrow">
                  <input type="text" name="building_number_stname_ar" class="form-control building_number_stname_ar" placeholder="رقم العماره و اسم الشارع بالعربى">
                </div>
                <div class="formrow">
                  <input type="text" name="building_number_stname_en" class="form-control building_number_stname_en" placeholder="رقم العماره و اسم الشارع بالأنجليزية">
                </div>
                <div class="formrow">
                  <input type="text" name="email" class="form-control email" placeholder="البريد الألكترونى">
                </div>
                <div class="formrow">
                  <input type="password" name="password" class="form-control password" placeholder="كلمة السر">
                </div>

                <div class="formrow">
                  <input type="password" name="conpass" class="form-control conpass" placeholder="تأكيد كلمة السر">
                </div>

                <div class="formrow">
                  <textarea name="nabza" class="textareas" placeholder="نبذه عن النمشأة"></textarea>
                </div>

                <div class="formrow">
                  <textarea name="nabzaEn" class="textareas" placeholder="نبذه عن النمشأة باللغة الأنجليزية"></textarea>
                </div>



                <div class="formrow">
                  <div class="form-group">
                    <input type="file" name="imgLogo" class="file">
                    <div class="input-group col-xs-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                      <input type="text" class="form-control input-lg" disabled placeholder="إرفع لوجو المنشأة">
                      <span class="input-group-btn">
                       <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> أختر</button>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="formrow">
                  <div class="form-group">
                    <input type="file" name="imgPic" class="file">
                    <div class="input-group col-xs-12">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                      <input type="text" class="form-control input-lg" disabled placeholder="إرفع صورة المنشأة">
                      <span class="input-group-btn">
                       <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> أختر</button>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="formrow">
                  <h4>البيانات الشخصية لمسجل البيانات</h4>
                </div>

                <div class="formrow">
                    <input type="text" name="employee_regsiter" class="form-control employee_regsiter" placeholder="اسم مسجل البيانات">
                </div>

                <div class="formrow">
                    <input type="text" name="employee_job" class="form-control employee_job" placeholder="الوظيفة">
                </div>

                <div class="formrow">
                    <input type="text" name="employee_phone" class="form-control employee_phone" placeholder="الموبايل">
                </div>

                

                <div class="formrow">
                  <input type="checkbox" value="checked" name="agree" />
                  برجاء قبول التسجيل الخاص بى واتعهد بقبول جميع الشروط الخاصة بفاترينا</div>
                  <input type="submit" class="btn" value="حفظ التسجيل">
              </div>
                
            </div>
          </form>  
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> امتلك حساب شخصي هنا بالفعل <a href="register.html">تسجيل الدخول هنا</a></div>
    
        </div>
      </div>
    </div>
  </div>
</div>
