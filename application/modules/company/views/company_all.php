<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">    

            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder">
                <div id="image_banner">

                    <?php foreach($advertise as $row){ if($row['post_name']=='company page banner'){?>

                    <div id="image_banner">
                        <a target="_blank" href="<?=$row['link'];?>"><img class="img-responsive" style="height:200px;width:100%;margin-top:5px;" src="uploads/<?=$row['image'];?>" alt="Add"></a>
                    </div>
                    <?php break; } } ?>

                </div>

            </div>

          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="product_header">
                <div class="col-xs-12 col-sm-12" id="product_menu">
                    <h5 style="float:left">Products by Category:</h5>
                    <ul class="list-unstyled list-inline" style="margin: 2px">
                        <li><a href="product/#abcd">
                                <button> <?php if($a_category == NULL){ ?><span class="text-muted">A</span>  <?php } else{?>A<?php }?> <?php if($b_category == NULL){ ?><span class="text-muted">B</span>  <?php } else{?>B<?php }?> <?php if($c_category == NULL){ ?><span class="text-muted">C</span>  <?php } else{?>C<?php }?> <?php if($d_category == NULL){ ?><span class="text-muted">D</span>  <?php } else{ ?>D<?php }?></button>
                            </a>|
                        </li>
                        
                        <li><a href="product/#ef">
                                <button> <?php if($e_category == NULL){ ?><span class="text-muted">E</span>  <?php } else{?>E<?php }?> <?php if($f_category == NULL){ ?><span class="text-muted">F</span>  <?php } else{?>F<?php }?> </button>
                            </a>|
                        </li>
                        <li>
                            <a href="product/#ghijkl">
                               <button> <?php if($g_category == NULL){ ?><span class="text-muted">G</span>  <?php } else{?>G<?php }?> <?php if($h_category == NULL){ ?><span class="text-muted">H</span>  <?php } else{?>H<?php }?> <?php if($i_category == NULL){ ?><span class="text-muted">I</span>  <?php } else{?>I<?php }?> <?php if($j_category == NULL){ ?><span class="text-muted">J</span>  <?php } else{?>J<?php }?> <?php if($k_category == NULL){ ?><span class="text-muted">K</span>  <?php } else{?>K<?php }?> <?php if($l_category == NULL){ ?><span class="text-muted">L</span>  <?php } else{ ?>L<?php }?></button>
                            </a>|
                        </li>
                        <li>
                            <a href="product/#mnopqr">
                               <button> <?php if($m_category == NULL){ ?><span class="text-muted">M</span>  <?php } else{?>M<?php }?> <?php if($n_category == NULL){ ?><span class="text-muted">N</span>  <?php } else{?>N<?php }?> <?php if($o_category == NULL){ ?><span class="text-muted">O</span>  <?php } else{?>O<?php }?> <?php if($p_category == NULL){ ?><span class="text-muted">P</span>  <?php } else{?>P<?php }?> <?php if($q_category == NULL){ ?><span class="text-muted">Q</span>  <?php } else{?>Q<?php }?> <?php if($r_category == NULL){ ?><span class="text-muted">R</span>  <?php } else{ ?>R<?php }?></button>
                            </a>|
                        </li>
                        <li>
                            <a href="product/#stuvxyz">
                                <button> <?php if($s_category == NULL){ ?><span class="text-muted">S</span>  <?php } else{?>S<?php }?><?php if($t_category == NULL){ ?><span class="text-muted">T</span>  <?php } else{?>T<?php }?> <?php if($u_category == NULL){ ?><span class="text-muted">U</span>  <?php } else{?>U<?php }?> <?php if($v_category == NULL){ ?><span class="text-muted">V</span>  <?php } else{?>V<?php }?> <?php if($x_category == NULL){ ?><span class="text-muted">X</span>  <?php } else{?>X<?php }?> <?php if($y_category == NULL){ ?><span class="text-muted">Y</span>  <?php } else{?>Y<?php }?> <?php if($z_category == NULL){ ?><span class="text-muted">Z</span>  <?php } else{ ?>Z<?php }?></button>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-8 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <div class="col-xs-12 col-sm-12 col-md-12" >
                    <div id="hero">
                        <h1 id="abcd" style="font-size: 22px;">A B C D</h1><div class="col-xs-10 col-sm-10" id="line-separatore"></div>
                        <div class="A_Div" style="">
                            
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Agriculture</p>
                                
                            <div class="list-group" id="agriculture_list">
                                <ul>
                                    <?php
                                    $count = 0;
                                        foreach ($sub_category_1 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showAgricultureList()" style="display: anything" id="more_agriculture" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideAgriculture">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_1 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideAgricultureList()" id="less_agriculture" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                       <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Apparel & cloth</p>
                                
                            <div class="list-group" id="apparel_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_2 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showApparelList()" style="display: anything" id="more_apparel" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideApparel">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_2 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideApparelList()" id="less_apparel" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Automobiles</p>
                                
                            <div class="list-group" id="automobile_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_3 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showAutomobileList()" style="display: anything" id="more_automobile" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideAutomobile">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_3 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideAutomobileList()" id="less_automobile" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            
                    </div>
                        <div class="B_Div">
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Beauty & personal care</p>
                                
                            <div class="list-group" id="beauty_list">
                                <ul>
                                    <?php
                                    $count = 0;
                                        foreach ($sub_category_5 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showBeautyList()" style="display: anything" id="more_beauty" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideBeauty">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_5 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_beauty/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideBeautyList()" id="less_beauty" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Business Services</p>
                                
                            <div class="list-group" id="business_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_4 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showBusinessList()" style="display: anything" id="more_business" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideBusiness">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_4 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideBusinessList()" id="less_business" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            
                            </div>
                        <div class="C_Div">
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Computer Hardware & software </p>
                                
                            <div class="list-group" id="computer_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_7 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showComputerList()" style="display: anything" id="more_computer" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideComputer">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_7 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideComputerList()" id="less_computer" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Consumer Electronics </p>
                                
                            <div class="list-group" id="consumer_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_6 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showConsumerList()" style="display: anything" id="more_consumer" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideConsumer">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_6 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id  ?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideConsumerList()" id="less_consumer" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Construction Real-estate  </p>
                                
                            <div class="list-group" id="construction_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_8 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showConstructionList()" style="display: anything" id="more_construction" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideConstruction">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_8 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideConstructionList()" id="less_construction" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Chemical & paper </p>
                                
                            <div class="list-group" id="chemical_list">
                                <ul>
                                    <?php
                                    $count = 0;
                                        foreach ($sub_category_9 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showChemicalList()" style="display: anything" id="more_chemical" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideChemical">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_9 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideChemicalList()" id="less_chemical" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            </div>
                        
                         
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div id="hero">
                        <h1 id="ef" style="font-size: 22px;">E F</h1><div class="col-xs-10 col-sm-10" id="line-separatore"></div>
                        <div class="E_Div">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Electric & electronics Suppliers </p>
                                
                            <div class="list-group" id="electronics_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_10 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showElectronicsList()" style="display: anything" id="more_electronics" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideElectronics">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_10 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideElectronicsList()" id="less_electronics" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P> Energy Products  </p>
                                
                            <div class="list-group" id="energy_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_11 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showEnergyList()" style="display: anything" id="more_energy" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideEnergy">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_11 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ; ?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideEnergyList()" id="less_energy" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            </div>
                         
                        <div class="F_Div">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P> Food & Beverage </p>
                                
                            <div class="list-group" id="food_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_12 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showFoodList()" style="display: anything" id="more_food" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideFood">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_12 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideFoodList()" id="less_food" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Fashion & jewelry  </p>
                                
                            <div class="list-group" id="fashion_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_13 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showFashionList()" style="display: anything" id="more_fashion" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideFashion">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_13 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideFashionList()" id="less_fashion" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P> Furniture  </p>
                                
                            <div class="list-group" id="furniture_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_14 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showFurnitureList()" style="display: anything" id="more_furniture" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideFurniture">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_14 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideFurnitureList()" id="less_furniture" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                            </div>
                        
                        
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div id="hero">
                        <h1 id="ghijkl" style="font-size: 22px;">G H I J K L</h1><div class="col-xs-10 col-sm-10" id="line-separatore"></div>
                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Gifts & Crafts</p>
                                
                            <div class="list-group" id="gifts_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_15 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showGiftsList()" style="display: anything" id="more_gifts" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideGifts">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_15 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideGiftsList()" id="less_gifts" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Health & Medicines</p>
                                
                            <div class="list-group" id="health_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_16 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showHealthList()" style="display: anything" id="more_health" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideHealth">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_16 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideHealthList()" id="less_health" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Home & garden </p>
                                
                            <div class="list-group" id="homegarden_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_17 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showHomeGardenList()" style="display: anything" id="more_homegarden" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideHomeGarden">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_17 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideHomeGardenList()" id="less_homegarden" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Home application </p>
                                
                            <div class="list-group" id="homeapplication_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_18 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showHomeApplicationList()" style="display: anything" id="more_homeapplication" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideHomeApplication">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_18 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideHomeApplicationList()" id="less_homeapplication" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Hardware & Mechanical Parts</p>
                                
                            <div class="list-group" id="hardware_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_19 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showHardwareList()" style="display: anything" id="more_hardware" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideHardware">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_19 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideHardwareList()" id="less_hardware" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Industrial Machinery  </p>
                                
                            <div class="list-group" id="industrial_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_20 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showIndustrialList()" style="display: anything" id="more_industrial" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideIndustrial">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_20 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideIndustrialList()" id="less_industrial" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Luggage & bags </p>
                                
                            <div class="list-group" id="luggage_list">
                                <ul>
                                    <?php
                                    $count = 0;
                                        foreach ($sub_category_21 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showLuggageList()" style="display: anything" id="more_luggage" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideLuggage">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_21 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideLuggageList()" id="less_luggage" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12" id="mnopqr">
                    <div id="hero">
                        <h1 id="mnopqr" style="font-size: 22px;">M N O P Q R</h1><div class="col-xs-10 col-sm-10" id="line-separatore"></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Minerals & Metallurgy </p>
                                
                            <div class="list-group" id="mineral_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_22 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showMineralsList()" style="display: anything" id="more_minerals" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideMinerals">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_22 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideMineralsList()" id="less_minerals" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Packaging & printing </p>
                                
                            <div class="list-group" id="packaging_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_23 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showPackagingList()" style="display: anything" id="more_packaging" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hidePackaging">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_23 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hidePackagingList()" id="less_packaging" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Rubber & plastic </p>
                                
                            <div class="list-group" id="rubber_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_24 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showRubberList()" style="display: anything" id="more_rubber" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideRubber">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_24 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideRubberList()" id="less_rubber" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12"></div>
                <div id="hero">
                    <h1 id="stuvxyz" style="font-size: 22px;">S T U V X Y Z</h1><div class="col-xs-10 col-sm-10" id="line-separatore"></div>
                     <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Shoes & Footwear </p>
                                
                            <div class="list-group" id="shoes_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_25 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showShoesList()" style="display: anything" id="more_shoes" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideShoes">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_25 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideShoesList()" id="less_shoes" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                     <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Sports & entertainment </p>
                                
                            <div class="list-group" id="sports_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_26 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showSportsList()" style="display: anything" id="more_sports" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideSports">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_26 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideSportsList()" id="less_sports" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                     <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Security & protection </p>
                                
                            <div class="list-group" id="security_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_27 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showSecurityList()" style="display: anything" id="more_security" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideSecurity">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_27 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideSecurityList()" id="less_security" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Textile & leather product  </p>
                                
                            <div class="list-group" id="textile_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_28 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showTextileList()" style="display: anything" id="more_textile" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideTextile">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_28 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideTextileList()" id="less_textile" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Telecommunication  </p>
                                
                            <div class="list-group" id="telecommunication_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_29 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showTelecommunicationList()" style="display: anything" id="more_telecommunication" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideTelecommunication">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_29 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideTelecommunicationList()" id="less_telecommunication" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Transportation </p>
                                
                            <div class="list-group" id="transportation_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_30 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showTransportationList()" style="display: anything" id="more_transportation" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideTransportation">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_30 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideTransportationList()" id="less_transportation" class="text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Tours & travel  </p>
                                
                            <div class="list-group" id="tours_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_31 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showTourList()" style="display: anything" id="more_tour" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideTour">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_31 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideTourList()" id="less_tour" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <P>Toys</p>
                                
                            <div class="list-group" id="toys_list">
                                <ul>
                                     <?php
                                    $count = 0;
                                        foreach ($sub_category_32 as $row){
                                    
                                        if ($count ==4) { break; }
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                       <?php 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="showToyList()" style="display: anything" id="more_toys" class=" text-center">More ...</a></li>
                                    <div style="display: none" id="hideToys">
                                        <?php
                                    $count = 0;
                                        foreach ($sub_category_32 as $row){
                                    
                                        if ($count > 3) {
                                        ?>
                                    <li><a href="company/select_company/<?php echo $row->cat_id ;?>" class=" text-center"><?php echo $row->sub_cat_name?></a></li>
                                        <?php } 
                                        $count++;
                                        }
                                        ?>
                                    <li><a onclick="hideToyList()" id="less_toys" class=" text-center" style="display: none">Less ...</a></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                </div>

            </div>
            
            <div class="info-boxes wow fadeInUp">
                <section id="featured_product" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <h2 style="font-size: 20px;margin: 15px;color: rgb(87, 171, 245);">Featured Products</h2>
                   <?php foreach($feature_product_1 as $row){ ?>
                    <div class="col-xs-6 col-md-6 featured">
                       <a href="product/Product_detail/<?=$row['product_id']?>">
                        <div class="thumbnail" style="height: 100px">
		            <img src="assets/product_images/<?=$row['product_image'];?>" style="width: 100%;height: 100%">
                        </div>
                        <h4><?=$row['product_name'];?></h4>
                       </a>
                    </div>
                   <?php } ?>
                </section>
            </div>
            <div class="info-boxes wow fadeInUp">
                <section id="featured_product" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <h2 style="font-size: 20px;margin: 15px;color: rgb(87, 171, 245);">Innovative Products</h2>
                   <?php foreach($innovative_product_1 as $row){ ?>
                    <div class="col-xs-6 col-md-6 featured">
                       <a href="product/Product_detail/<?=$row['product_id']?>">
                        <div class="thumbnail" style="height: 100px">
		            <img src="assets/product_images/<?=$row['product_image'];?>" style="width: 100%;height: 100%">
                        </div>
                        <h4><?=$row['product_name'];?></h4>
                      </a>
                    </div>
                   <?php } ?>
                </section>
            </div>
			 
            </div>

        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->


<script>
    var showAgriculture = document.getElementById('hideAgriculture');
    var more_agriculture_button = document.getElementById('more_agriculture');
    var less_agriculture_button = document.getElementById('less_agriculture');
    
    var showApparel = document.getElementById('hideApparel');
    var more_apparel_button = document.getElementById('more_apparel');
    var less_apparel_button = document.getElementById('less_apparel');
    
    var showAutomobile = document.getElementById('hideAutomobile');
    var more_automobile_button = document.getElementById('more_automobile');
    var less_automobile_button = document.getElementById('less_automobile');
    
    var showBeauty = document.getElementById('hideBeauty');
    var more_beauty_button = document.getElementById('more_beauty');
    var less_beauty_button = document.getElementById('less_beauty');
    
     var showBusiness = document.getElementById('hideBusiness');
    var more_business_button = document.getElementById('more_business');
    var less_business_button = document.getElementById('less_business');


     var showComputer = document.getElementById('hideComputer');
    var more_computer_button = document.getElementById('more_computer');
    var less_computer_button = document.getElementById('less_computer');


    var showConsumer = document.getElementById('hideConsumer');
    var more_consumer_button = document.getElementById('more_consumer');
    var less_consumer_button = document.getElementById('less_consumer');  

    var showConstruction = document.getElementById('hideConstruction');
    var more_construction_button = document.getElementById('more_construction');
    var less_construction_button = document.getElementById('less_construction');
    
    var showChemical = document.getElementById('hideChemical');
    var more_chemical_button = document.getElementById('more_chemical');
    var less_chemical_button = document.getElementById('less_chemical');


   var showElectronics = document.getElementById('hideElectronics');
    var more_electronics_button = document.getElementById('more_electronics');
    var less_electronics_button = document.getElementById('less_electronics');

    var showEnergy = document.getElementById('hideEnergy');
    var more_energy_button = document.getElementById('more_energy');
    var less_energy_button = document.getElementById('less_energy');

    var showFood = document.getElementById('hideFood');
    var more_food_button = document.getElementById('more_food');
    var less_food_button = document.getElementById('less_food');  
       
   
    var showFashion = document.getElementById('hideFashion');
    var more_fashion_button = document.getElementById('more_fashion');
    var less_fashion_button = document.getElementById('less_fashion');

    var showFurniture = document.getElementById('hideFurniture');
    var more_furniture_button = document.getElementById('more_furniture');
    var less_furniture_button = document.getElementById('less_furniture');

    var showGifts = document.getElementById('hideGifts');
    var more_gifts_button = document.getElementById('more_gifts');
    var less_gifts_button = document.getElementById('less_gifts'); 
      
    var showHealth = document.getElementById('hideHealth');
    var more_health_button = document.getElementById('more_health');
    var less_health_button = document.getElementById('less_health');  

    var showHomeApplication = document.getElementById('hideHomeApplication');
    var more_homeapplication_button = document.getElementById('more_homeapplication');
    var less_homeapplication_button = document.getElementById('less_homeapplication');
    
//    var showHomeGarden = document.getElementById('hideHomeGarden');
//    var more_homegarden_button = document.getElementById('more_homegarden');
//    var less_homegarden_button = document.getElementById('less_homegarden');

    var showHomeGarden = document.getElementById('hideHomeGarden');
    var more_homegarden_button = document.getElementById('more_homegarden');
    var less_homegarden_button = document.getElementById('less_homegarden');

    var showHardware = document.getElementById('hideHardware');
    var more_hardware_button = document.getElementById('more_hardware');
    var less_hardware_button = document.getElementById('less_hardware'); 

    var showIndustrial = document.getElementById('hideIndustrial');
    var more_industrial_button = document.getElementById('more_industrial');
    var less_industrial_button = document.getElementById('less_industrial');

    var showLuggage = document.getElementById('hideLuggage');
    var more_luggage_button = document.getElementById('more_luggage');
    var less_luggage_button = document.getElementById('less_luggage');
    
   ////iti/// 
    var showMinerals= document.getElementById('hideMinerals');
    var more_minerals_button = document.getElementById('more_minerals');
    var less_minerals_button = document.getElementById('less_minerals');
    
    var showPackaging = document.getElementById('hidePackaging');
    var more_packaging_button = document.getElementById('more_packaging');
    var less_packaging_button = document.getElementById('less_packaging');
    
    var showRubber = document.getElementById('hideRubber');
    var more_rubber_button = document.getElementById('more_rubber');
    var less_rubber_button = document.getElementById('less_rubber');
    
    var showShoes= document.getElementById('hideShoes');
    var more_shoes_button = document.getElementById('more_shoes');
    var less_shoes_button = document.getElementById('less_shoes');
    
    var showSports = document.getElementById('hideSports');
    var more_sports_button = document.getElementById('more_sports');
    var less_sports_button = document.getElementById('less_sports');
    
    var showSecurity = document.getElementById('hideSecurity');
    var more_security_button = document.getElementById('more_security');
    var less_security_button = document.getElementById('less_security');
    
    var showTextile = document.getElementById('hideTextile');
    var more_textile_button = document.getElementById('more_textile');
    var less_textile_button = document.getElementById('less_textile');
    
    var showTelecommunication  = document.getElementById('hideTelecommunication');
    var more_telecommunication_button = document.getElementById('more_telecommunication');
    var less_telecommunication_button = document.getElementById('less_telecommunication');
    
    var showTransportation  = document.getElementById('hideTransportation');
    var more_transportation_button = document.getElementById('more_transportation');
    var less_transportation_button = document.getElementById('less_transportation');
    
    var showTour  = document.getElementById('hideTour');
    var more_tour_button = document.getElementById('more_tour');
    var less_tour_button = document.getElementById('less_tour');
    
    var showToy  = document.getElementById('hideToys');
    var more_toy_button = document.getElementById('more_toys');
    var less_toy_button = document.getElementById('less_toys');



function showAgricultureList(){
    if(showAgriculture.style.display === 'none'){
        showAgriculture.style.display = 'block';
        more_agriculture_button.style.display = 'none';
        less_agriculture_button.style.display = 'inline';
    }
  }  
  
  function showApparelList(){
     if(showApparel.style.display === 'none'){
        showApparel.style.display = 'block';
        more_apparel_button.style.display = 'none';
        less_apparel_button.style.display = 'inline';
    }
 }
 
 function showAutomobileList(){
      if(showAutomobile.style.display === 'none'){
        showAutomobile.style.display = 'block';
        more_automobile_button.style.display = 'none';
        less_automobile_button.style.display = 'inline';
    }
 }
 
 function showBeautyList(){
      if(showBeauty.style.display === 'none'){
        showBeauty.style.display = 'block';
        more_beauty_button.style.display = 'none';
        less_beauty_button.style.display = 'inline';
    }
 }

function showBusinessList(){
     if(showBusiness.style.display === 'none'){
        showBusiness.style.display = 'block';
        more_business_button.style.display = 'none';
        less_business_button.style.display = 'inline';
    }
}

function showComputerList(){
     if(showComputer.style.display === 'none'){
        showComputer.style.display = 'block';
        more_computer_button.style.display = 'none';
        less_computer_button.style.display = 'inline';
    }
}


function showConsumerList(){
     if(showConsumer.style.display === 'none'){
        showConsumer.style.display = 'block';
        more_consumer_button.style.display = 'none';
        less_consumer_button.style.display = 'inline';
    }
}


function showConstructionList(){
     if(showConstruction.style.display === 'none'){
        showConstruction.style.display = 'block';
        more_construction_button.style.display = 'none';
        less_construction_button.style.display = 'inline';
    }
}


function showChemicalList(){
     if(showChemical.style.display === 'none'){
        showChemical.style.display = 'block';
        more_chemical_button.style.display = 'none';
        less_chemical_button.style.display = 'inline';
    }
}


function showElectronicsList(){
     if(showElectronics.style.display === 'none'){
        showElectronics.style.display = 'block';
        more_electronics_button.style.display = 'none';
        less_electronics_button.style.display = 'inline';
    }
}


function showEnergyList(){
     if(showEnergy.style.display === 'none'){
        showEnergy.style.display = 'block';
        more_energy_button.style.display = 'none';
        less_energy_button.style.display = 'inline';
    }
}


function showFoodList(){
     if(showFood.style.display === 'none'){
        showFood.style.display = 'block';
        more_food_button.style.display = 'none';
        less_food_button.style.display = 'inline';
    }
}


function showFashionList(){
     if(showFashion.style.display === 'none'){
        showFashion.style.display = 'block';
        more_fashion_button.style.display = 'none';
        less_fashion_button.style.display = 'inline';
    }
}


function showFurnitureList(){
     if(showFurniture.style.display === 'none'){
        showFurniture.style.display = 'block';
        more_furniture_button.style.display = 'none';
        less_furniture_button.style.display = 'inline';
    }
}


function showGiftsList(){
     if(showGifts.style.display === 'none'){
        showGifts.style.display = 'block';
        more_gifts_button.style.display = 'none';
        less_gifts_button.style.display = 'inline';
    }
}


function showHealthList(){
     if(showHealth.style.display === 'none'){
        showHealth.style.display = 'block';
        more_health_button.style.display = 'none';
        less_health_button.style.display = 'inline';
    }
}


function showHomeApplicationList(){
     if(showHomeApplication.style.display === 'none'){
        showHomeApplication.style.display = 'block';
        more_homeapplication_button.style.display = 'none';
        less_homeapplication_button.style.display = 'inline';
    }
}

function showHomeGardenList(){
     if(showHomeGarden.style.display === 'none'){
        showHomeGarden.style.display = 'block';
        more_homegarden_button.style.display = 'none';
        less_homegarden_button.style.display = 'inline';
    }
}


function showHardwareList(){
     if(showHardware.style.display === 'none'){
        showHardware.style.display = 'block';
        more_hardware_button.style.display = 'none';
        less_hardware_button.style.display = 'inline';
    }
}


function showIndustrialList(){
     if(showIndustrial.style.display === 'none'){
        showIndustrial.style.display = 'block';
        more_industrial_button.style.display = 'none';
        less_industrial_button.style.display = 'inline';
    }
}


function showLuggageList(){
     if(showLuggage.style.display === 'none'){
        showLuggage.style.display = 'block';
        more_luggage_button.style.display = 'none';
        less_luggage_button.style.display = 'inline';
    }
}

function showMineralsList(){
     if(showMinerals.style.display === 'none'){
        showMinerals.style.display = 'block';
        more_minerals_button.style.display = 'none';
        less_minerals_button.style.display = 'inline';
    }
}

function showPackagingList(){
     if(showPackaging.style.display === 'none'){
        showPackaging.style.display = 'block';
        more_packaging_button.style.display = 'none';
        less_packaging_button.style.display = 'inline';
    }
}

function hidePackagingList(){
     if(showPackaging.style.display === 'block'){
        showPackaging.style.display = 'none';
        more_packaging_button.style.display = 'inline';
        less_packaging_button.style.display = 'none';
    }
}

function showRubberList(){
     if(showRubber.style.display === 'none'){
        showRubber.style.display = 'block';
        more_rubber_button.style.display = 'none';
        less_rubber_button.style.display = 'inline';
    }
}

function hideRubberList(){
     if(showRubber.style.display === 'block'){
        showRubber.style.display = 'none';
        more_rubber_button.style.display = 'inline';
        less_rubber_button.style.display = 'none';
    }
}

function showShoesList(){
     if(showShoes.style.display === 'none'){
        showShoes.style.display = 'block';
        more_shoes_button.style.display = 'none';
        less_shoes_button.style.display = 'inline';
    }
}

function hideShoesList(){
     if(showShoes.style.display === 'block'){
        showShoes.style.display = 'none';
        more_shoes_button.style.display = 'inline';
        less_shoes_button.style.display = 'none';
    }
}
function showSportsList(){
     if(showSports.style.display === 'none'){
        showSports.style.display = 'block';
        more_sports_button.style.display = 'none';
        less_sports_button.style.display = 'inline';
    }
}

function hideSportsList(){
     if(showSports.style.display === 'block'){
        showSports.style.display = 'none';
        more_sports_button.style.display = 'inline';
        less_sports_button.style.display = 'none';
    }
}
function showSecurityList(){
     if(showSecurity.style.display === 'none'){
        showSecurity.style.display = 'block';
        more_security_button.style.display = 'none';
        less_security_button.style.display = 'inline';
    }
}

function hideSecurityList(){
     if(showSecurity.style.display === 'block'){
        showSecurity.style.display = 'none';
        more_security_button.style.display = 'inline';
        less_security_button.style.display = 'none';
    }
}
function showTextileList(){
     if(showTextile.style.display === 'none'){
        showTextile.style.display = 'block';
        more_textile_button.style.display = 'none';
        less_textile_button.style.display = 'inline';
    }
}

function hideTextileList(){
     if(showTextile.style.display === 'block'){
        showTextile.style.display = 'none';
        more_textile_button.style.display = 'inline';
        less_textile_button.style.display = 'none';
    }
}
function showTelecommunicationList(){
     if(showTelecommunication.style.display === 'none'){
        showTelecommunication.style.display = 'block';
        more_telecommunication_button.style.display = 'none';
        less_telecommunication_button.style.display = 'inline';
    }
}

function hideTelecommunicationList(){
     if(showTelecommunication.style.display === 'block'){
        showTelecommunication.style.display = 'none';
        more_telecommunication_button.style.display = 'inline';
        less_telecommunication_button.style.display = 'none';
    }
}
function showTransportationList(){
     if(showTransportation.style.display === 'none'){
        showTransportation.style.display = 'block';
        more_transportation_button.style.display = 'none';
        less_transportation_button.style.display = 'inline';
    }
}

function hideTransportationList(){
     if(showTransportation.style.display === 'block'){
        showTransportation.style.display = 'none';
        more_transportation_button.style.display = 'inline';
        less_transportation_button.style.display = 'none';
    }
}
function showTourList(){
     if(showTour.style.display === 'none'){
        showTour.style.display = 'block';
        more_tour_button.style.display = 'none';
        less_tour_button.style.display = 'inline';
    }
}

function hideTourList(){
     if(showTour.style.display === 'block'){
        showTour.style.display = 'none';
        more_tour_button.style.display = 'inline';
        less_tour_button.style.display = 'none';
    }
}
function showToyList(){
     if(showToy.style.display === 'none'){
        showToy.style.display = 'block';
        more_toy_button.style.display = 'none';
        less_toy_button.style.display = 'inline';
    }
}

function hideToyList(){
     if(showToy.style.display === 'block'){
        showToy.style.display = 'none';
        more_toy_button.style.display = 'inline';
        less_toy_button.style.display = 'none';
    }
}

function hideMineralsList(){
        if(showMinerals.style.display === 'block'){
        showMinerals.style.display = 'none';
        more_minerals_button.style.display = 'inline';
        less_minerals_button.style.display = 'none';
    }
 }
 
function hideLuggageList(){
        if(showLuggage.style.display === 'block'){
        showLuggage.style.display = 'none';
        more_luggage_button.style.display = 'inline';
        less_luggage_button.style.display = 'none';
    }
 }


function hideIndustrialList(){
        if(showIndustrial.style.display === 'block'){
        showIndustrial.style.display = 'none';
        more_industrial_button.style.display = 'inline';
        less_industrial_button.style.display = 'none';
    }
 }


function hideHardwareList(){
        if(showHardware.style.display === 'block'){
        showHardware.style.display = 'none';
        more_hardware_button.style.display = 'inline';
        less_hardware_button.style.display = 'none';
    }
 }


function hideHomeGardenList(){
        if(showHomeGarden.style.display === 'block'){
        showHomeGarden.style.display = 'none';
        more_homegarden_button.style.display = 'inline';
        less_homegarden_button.style.display = 'none';
    }
 }

function hideHomeApplicationList(){
        if(showHomeApplication.style.display === 'block'){
        showHomeApplication.style.display = 'none';
        more_homeapplication_button.style.display = 'inline';
        less_homeapplication_button.style.display = 'none';
    }
 }


function hideHealthList(){
        if(showHealth.style.display === 'block'){
        showHealth.style.display = 'none';
        more_health_button.style.display = 'inline';
        less_health_button.style.display = 'none';
    }
 }


function hideGiftsList(){
        if(showGifts.style.display === 'block'){
        showGifts.style.display = 'none';
        more_gifts_button.style.display = 'inline';
        less_gifts_button.style.display = 'none';
    }
 }


function hideFurnitureList(){
        if(showFurniture.style.display === 'block'){
        showFurniture.style.display = 'none';
        more_furniture_button.style.display = 'inline';
        less_furniture_button.style.display = 'none';
    }
 }


function hideFashionList(){
        if(showFashion.style.display === 'block'){
        showFashion.style.display = 'none';
        more_fashion_button.style.display = 'inline';
        less_fashion_button.style.display = 'none';
    }
 }


function hideFoodList(){
        if(showFood.style.display === 'block'){
        showFood.style.display = 'none';
        more_food_button.style.display = 'inline';
        less_food_button.style.display = 'none';
    }
 }


function hideEnergyList(){
        if(showEnergy.style.display === 'block'){
        showEnergy.style.display = 'none';
        more_energy_button.style.display = 'inline';
        less_energy_button.style.display = 'none';
    }
 }


function hideElectronicsList(){
        if(showElectronics.style.display === 'block'){
        showElectronics.style.display = 'none';
        more_electronics_button.style.display = 'inline';
        less_electronics_button.style.display = 'none';
    }
 }



function hideChemicalList(){
        if(showChemical.style.display === 'block'){
        showChemical.style.display = 'none';
        more_chemical_button.style.display = 'inline';
        less_chemical_button.style.display = 'none';
    }
 }


function hideConstructionList(){
        if(showConstruction.style.display === 'block'){
        showConstruction.style.display = 'none';
        more_construction_button.style.display = 'inline';
        less_construction_button.style.display = 'none';
    }
 }


function hideConsumerList(){
        if(showConsumer.style.display === 'block'){
        showConsumer.style.display = 'none';
        more_consumer_button.style.display = 'inline';
        less_consumer_button.style.display = 'none';
    }
 }


function hideComputerList(){
        if(showComputer.style.display === 'block'){
        showComputer.style.display = 'none';
        more_computer_button.style.display = 'inline';
        less_computer_button.style.display = 'none';
    }
 }

function hideBusinessList(){
        if(showBusiness.style.display === 'block'){
        showBusiness.style.display = 'none';
        more_business_button.style.display = 'inline';
        less_business_button.style.display = 'none';
    }
 }

function hideBeautyList(){
        if(showBeauty.style.display === 'block'){
        showBeauty.style.display = 'none';
        more_beauty_button.style.display = 'inline';
        less_beauty_button.style.display = 'none';
    }
 }

    function hideAgricultureList(){
        if(showAgriculture.style.display === 'block'){
        showAgriculture.style.display = 'none';
        more_agriculture_button.style.display = 'inline';
        less_agriculture_button.style.display = 'none';
    }
    }
    
    function hideApparelList(){
    if(showApparel.style.display === 'block'){
        showApparel.style.display = 'none';
        more_apparel_button.style.display = 'inline';
        less_apparel_button.style.display = 'none';
    }
 }
 
 function hideAutomobileList(){
    if(showAutomobile.style.display === 'block'){
        showAutomobile.style.display = 'none';
        more_automobile_button.style.display = 'inline';
        less_automobile_button.style.display = 'none';
    }
 }

</script>


