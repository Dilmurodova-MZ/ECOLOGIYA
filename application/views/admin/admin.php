<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<style type="text/css">
    /*input
        {
            visibility:hidden;
        }
    #btn_brands_save, #btn_kat_save, #btn_sub_kat_save,#sub_kat_id,#btn_groups_save,#btn_menu_save,#btn_users_save
        {
            display: none;
        }
    #btn_insert
        {
            display:block ;
            width: 250%;
            margin-left: -270%;
        }*/
    thead tr
        {
            font-size: 90%;
        }
    .btn-success
        {
            opacity: 0;
        }
    .edit_upd
        {
            display:flex;
            flex-direction: row;
        }
    .edit_upd button
        {
            margin-left: 0.5rem;
        }
    ul
        {
            padding-top: 15px;
        }
    li
        {
            border-radius: 10em;
            transition: 1s all;
        }
    li:hover
        {
            background-color: #14295e;
            color:white;
                        
            transform: translateX(4%);
            transition: 1s all;
            text-align: center;
        }
    li:active
        {
            transform: translateY(3px);
            box-shadow: 5px 3px 1px #e6e6e6;
        }
    #user,#goods
        {
            border-radius: 25px;
        }

        /* graph */
    #container{
        display:none;
    }
        /* end */

        /* barchart */
    .highcharts-figure, .highcharts-data-table table {
    width: 100%;
   margin: 1em auto;
}

#container2 {
   height: 400px;
    width: 100%;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
   padding: 1em 0;
   font-size: 1.2em;
   color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
   padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
   padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
   background: #f8f8f8;
}
.highcharts-data-table tr:hover {
   background: #f1f7ff;
}

        /* end */
</style>
<head>
    <meta charset="utf-8">
    <title>Admin panel</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">

</head>
<body>

        <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-3 col-3">
                <ul class="list-group">
                    <li class="list-group-item" name="users" id="user">Foydalanuvchi yaratish</li>
                    <li class="list-group-item" name="brands">Brandlar</li>
                    <li class="list-group-item" name="brands">Brandlar</li>
                    <li class="list-group-item" name='kategories'>Kategoriya</li>
                    <li class="list-group-item" name='types'>Sub kategoriya</li>
                    <li class="list-group-item" name="groups">Groups</li>
                    <li class="list-group-item" name='menu'>Menu</li>
                    <li class="list-group-item" name="services">Xizmatlar</li>
                    <li class="list-group-item" name="graph" id="graph">Graph</li>
                    <li class="list-group-item" name='goods' id="goods">Mahsulotlar</li>
                </ul>
            </div>
            
            <div class="col-md-9 col-lg-9 col-xl-9 col-9" id="dinamic_menu">        
        </div>
            </div>

            <!-- graph -->
            <div id="container" style="height: 400px; min-width: 310px"></div>
            <!-- end -->

            <!-- barchart -->
<figure class="highcharts-figure">
        <div id="container2"></div>
        <p class="highcharts-description">
            Chart showing browser market shares. Clicking on individual columns
            brings up more detailed data. This chart makes use of the drilldown
            feature in Highcharts to easily switch between datasets.
        </p>
</figure>

            <!-- end -->
            <div id="container3" style="height: 400px; min-width: 310px"></div>
<!-- graph -->
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<!-- end  -->

<!-- barchart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- end -->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>  
<script type="text/javascript">


    $(document).ready(function(){

        $("li").on("click",function(){

            // graph show and hide
      $('#graph').on('click',function(){
            $('#container').css('display','block')
        });
            // 

            var menu = $(this).attr('name');
            var url_menu  = "<?php echo base_url('index.php/ajax/menu');?>"; 

            $.ajax({
                url  : url_menu,
                type : "POST",
                data :{'menu' : menu},
                beforeSend: function() 
                {
                    $("#dinamic_menu").html("<img src=<?php echo base_url('img/loader/loader.gif');?> >");
                    
                },
                success : function(get_menu)
                    {
                        $("#dinamic_menu").html(get_menu);
                    } 
            });
        });

/*                  create user start                */

       $('body').on('click', '.btn-outline-info', function(){
         $('.btn-success').css('opacity','100');
       });

       

       $('body').on('click','#btn_users_save', function()
       {
         var first_name = $("#first_name").val(),
             last_name  = $("#last_name").val(),
             company    = $("#Company_name").val(),
             email      = $("#user_email").val(),
             phone      = $("#user_mobile").val(),
             password   = $("#user_password").val();
         var url_user_create="<?php echo base_url('index.php/ajax/user_create')?>";
           $.ajax({
              url   : url_user_create,
              type  :'POST',
              data  :{'firstname':first_name,
                      'lastname':last_name, 
                      'company':company,
                      'email':email,
                      'phone':phone,
                      'password':password},
              success:function(form)
                    {
                        alert(form);
                        location.reload();
                    }       
            });
       });

/*                    create user finish         */

        $("body").on("click","#btn_brands_save", function()
        {
            var brand_name = $("#brand_name").val();
            var republic   = $("#republic").val();
            var end_date   = $("#end_date").val();
            var url_brand  = "<?php echo base_url('index.php/ajax/brands_ins');?>";


            $.ajax({
                url  : url_brand,
                type : "POST",
                data : {'b_name' : brand_name,'b_republic' : republic, 'b_end_date' : end_date },
                success :  function(get_ins)
                    {
                        alert(get_ins);
                        location.reload();
                    }
            });

            
        });

        $("body").on('click','#btn_kat_save',function(){
          var   kat_name   = $("#kat_name").val(),
                d_create   = $("#kat_c_date").val(),
                img        = $("#kat_image_path").val();

            var url_kategories  = "<?php echo base_url('index.php/ajax/kategories_ins');?>";
            $.ajax({
                url  : url_kategories,
                type : "POST",
                data : {'kat_name' : kat_name,'d_create' : d_create, 'img' : img },
                success :  function(get_ins)
                    {
                        alert(get_ins);
                        location.reload();
                    }
            });
        });

        $("body").on("click", "#btn_sub_kat_save", function(){

            var id_kat        = $("#sub_kat_id").val(),
                type_name     = $("#sub_kat_name").val(),
                d_create      = $("#sub_kat_c_date").val(),
                date_delete   = $("#sub_kat_del_date").val(),
                sub_kat_state = $("#sub_kat_state").val();
            var url_types  = "<?php echo base_url('index.php/ajax/types_ins');?>";
            $.ajax({
                url  : url_types,
                type : "POST",
                data : {'kat_id'   : id_kat,
                        'kat_name' : type_name, 
                        'd_create' : d_create,
                        'd_delete' : date_delete,
                        'state'    : sub_kat_state},
                success :  function(get_ins)
                    {
                        alert(get_ins);
                        location.reload();
                    }
            });

        });


        $("body").on('click','#btn_groups_save', function(){

            var groups_name        =  $('#groups_name').val(),
                groups_discription =  $('#groups_Description').val();
            var url_groups = "<?php echo base_url('index.php/ajax/groups_ins');?>";
            $.ajax({
                url    :  url_groups,
                type   :  'POST',
                data   : {'groups_name':groups_name,'groups_Description':groups_discription},
                success: function(groups_save)
                    {
                        alert(groups_save);
                        location.reload();
                    }
            });
        });

        $("body").on('click','#btn_menu_save', function(){
            var menu      = $('#menu_menu').val(),
                parent    = $('#menu_parent').val(),
                id_parent = $('#menu_id_parent').val();
            var url_menu ="<?php echo base_url('index.php/ajax/menu_ins')?>";
            $.ajax({
                url    : url_menu,
                type   : "POST",
                data   : {'menu':menu, 
                          'parent':parent, 
                          'id_parent':id_parent},
                success: function(get_menu)
                    {
                        alert(get_menu);
                        location.reload();
                    }
            });
        });

         $("body").on('click','#btn_goods_save', function(){
           var  goods_name      = $('#goods_name').val(),
               goods_subkat    = $('#goods_subkat').val(),
               goods_brand     = $('#goods_brand').val(),
               goods_price     = $('#goods_price').val(),
               goods_service   = $('#goods_service').val(),
               goods_title     = $('#goods_title').val();
            var url_goods ="<?php echo base_url('index.php/ajax/goods_ins')?>";
            $.ajax({
                url    : url_goods,
                type   : "POST",
                data   : {'t_name'     :goods_name,
                        'id_type'    :goods_subkat,
                        'id_brand'   :goods_brand,
                        'price'      :goods_price,
                        'id_services':goods_service,
                        'title'      :goods_title},
                success: function(get_menu)
                    {
                        alert(get_menu);
                    }
            });
        });

        $("body").on("click","#btn_service_save",function(){
            var ser_name = $("#service_name").val();
            var url_service = "<?php echo base_url('index.php/ajax/service_ins'); ?>";
            $.ajax({
                url : url_service,
                type : "POST",
                data : {'ser_name' : ser_name},
                success : function(ser)
                    {
                        alert(ser);
                        location.reload();
                    }
            });
        });
 
/*                        users  update  starts         */
        /*$('body').on('click','.edit_users',function(){
            var id= $(this).attr('name');
            var first_name   = $("#"+id+" td:eq(0)").text(),
                last_name    = $("#"+id+" td:eq(1)").text(),
                company_name = $("#"+id+" td:eq(2)").text(),
                email        = $("#"+id+" td:eq(3)").text(),
                phone        = $("#"+id+" td:eq(4)").text();
            $("#"+id+" td:eq(0)").html("<input class='form-control' id='first_name"+id+"' value='"+first_name+"'>");
            $("#"+id+" td:eq(1)").html("<input class='form-control' id='last_name'"+id+"' value='"+last_name+"'>");
            $("#"+id+" td:eq(2)").html("<input class='form-control' id='company_name"+id+"' value='"+company_name+"' >");
            $("#"+id+" td:eq(3)").html("<input class='form-control' id='email"+id+"' value='"+email+"'>");
            $("#"+id+" td:eq(4)").html("<input class='form-control' id='phone"+id+"' value='"+phone+"'>");          
        });

        $('body').on('click','.updusers',function(){
            var id =$(this).attr('name');
            var first_name   = $("#first_name"+id).val(),
                last_name    = $("#last_name"+id).val(),
                company_name = $("#company_name"+id).val(),
                email        = $("#email"+id).val(),
                phone        = $("#phone"+id).val();
            var  url_users_upd = "<?php echo base_url('index.php/ajax/users_upd')?>";
                $.ajax({
                    url : url_users_upd,
                    type: "POST",
                    data: {'id':id, 
                           'first_name  ':first_name,
                           'last_name'   :last_name,
                           'company_name':company_name,
                           'email'       :email,
                           'phone'       :phone},
                    success: function(user_upd)
                    {
                        alert(user_upd);
                        location.reload();
                    }
                }); 
        }); */
/*                         users  update  finish          */

/*                       service     update   start             */
        $("body").on("click", ".edit_service", function(){
            var id = $(this).attr('name');
            var name = $("#"+id+" td:eq(0)").text();
            $("#"+id+" td:eq(0)").html("<input class='form-control' id='service_save"+id+"' value='"+name+"'>");

        });

        $("body").on("click",".updservice",function(){
            var id = $(this).attr('name');
            var save_name = $("#service_save"+id).val();
            var url_service_upd = "<?php echo base_url('index.php/ajax/service_upd'); ?>";
            $.ajax({
                url : url_service_upd,
                type: "POST",
                data: {'id':id, 'ser_name':save_name},
                success: function(ser_upd)
                    {
                        alert(ser_upd);
                        location.reload();
                    }
            })
        }); 
/*                       service     update   finish             */

/*        subkategoriya update start     */
        $("body").on("click", ".edit_types", function(){
            var id = $(this).attr('name');
            var type_name = $("#"+id+" td:eq(1)").text(),
                d_create_save = $("#"+id+" td:eq(2)").text(); 
            $("#"+id+" td:eq(1)").html("<input class='form-control' id='types_save"+id+"' value='"+type_name+"'>");
            $("#"+id+" td:eq(2)").html("<input class='form-control' id='d_create_save"+id+"' value='"+d_create_save+"'>");
        
        });

        $("body").on("click",".updtypes",function(){
            var id = $(this).attr('id');
            var type_name     = $("#types_save"+id).val(),
                d_create_save = $("#d_create_save"+id).val();
            var url_types_upd = "<?php echo base_url('index.php/ajax/types_upd'); ?>";
            $.ajax({
                url : url_types_upd,
                type: "POST",
                data: {'id':id, 
                       'type_name':type_name,
                       'd_create' :d_create_save},
                success: function(types_upd)
                    {
                        alert(types_upd);
                    }
            });
        }); 
/*        subkategoriya update finish     */


/*               Delete knopkalari  start                */

        $('body').on('click','#btn_users_del',function(){
         var id = $(this).attr('name');
         var url_users_del="<?php echo base_url('index.php/ajax/users_btn_del')?>";
           $.ajax({ 
              url    :  url_users_del,
              type   : 'POST',
              data   :{'id':id},
              success:function(users_del)
                {
                    alert(users_del);
                    location.reload();
                }
           });
        });

        $("body").on('click','#btn_groups_del',function(){
            var id=$(this).attr('name');
            var url_del="<?php echo base_url('index.php/ajax/group_btn_del')?>";

            $.ajax({
                url   : url_del,
                type  :"POST",
                data  :{'id':id},
                success: function(btn_del)
                    {
                        alert(btn_del);
                        location.reload();
                    }
            });
        });

         $("body").on('click','#btn_kat_del',function(){
            var id=$(this).attr('name');
            var url_del="<?php echo base_url('index.php/ajax/btn_kat_del')?>";

            $.ajax({
                url   : url_del,
                type  :"POST",
                data  :{'id':id},
                success: function(btn_del)
                    {
                        alert(btn_del);
                        location.reload();
                    }
            });
        });  

        $('body').on('click','#btn_types_del',function(){
            var id=$(this).attr('name');
            var url_del="<?php echo base_url('index.php/ajax/btn_type_del')?>";

            $.ajax({
                url   : url_del,
                type  :"POST",
                data  :{'id':id},
                success: function(btn_del)
                    {
                        alert(btn_del);
                        location.reload();
                    }
            });
        }); 

        $('body').on('click','#btn_menu_del', function(){
            var id=$(this).attr('name');
            var url_menu_del= "<?php echo base_url('index.php/ajax/menu_btn_del')?>";
            $.ajax({
                url    : url_menu_del,
                type   : 'POST',
                data   : {'id':id},
                success: function(menu_del)
                    {
                        location.reload();
                    }
            });
        });
 
        
       $('body').on('click','#btn_service_del', function(){
            var id=$(this).attr('name');
            var url_service_del= "<?php echo base_url('index.php/ajax/service_btn_del')?>";
            $.ajax({
                url    :  url_service_del,
                type   : 'POST',
                data   : {'id':id},
                success: function(service_del)
                    {
                        alert(service_del);
                        location.reload();
                    }
            });
        });

       $('body').on('click','#btn_brands_del', function(){
        var id=$(this).attr('name');
        var url_brand_del="<?php echo base_url('index.php/ajax/btn_brands_del')?>";
          $.ajax({ 
             url    : url_brand_del,
             type   :'POST',
             data   :{'id':id},
             success:function(brands_del)
                {
                    alert(brands_del);
                    location.reload();
                }
          });
       });

       $('body').on('click','#btn_goods_del', function(){
        var id= $(this).attr('name');
        var url_goods_del="<?php echo base_url('index.php/ajax/btn_goods_del')?>";
        $.ajax({
            url   :  url_goods_del,
            type  :'POST',
            data  :{'id':id},
            success: function(goods_del)
                {
                    alert(goods_del);
                    location.reload();
                }
        });
       }); 
/*                 Delete knopkalari  finish                 */

    });
</script>
</body>
</html>