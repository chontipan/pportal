<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 3/30/2015
 * Time: 19:39
 */?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Phayao Portal | Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Semantic -->
    <link rel="icon" type="image/png" href="<?php echo Config::get('app.subdir')?>/favicon.ico">
    <link href="{{Config::get('app.subdir')}}/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css">
    <link href="{{Config::get('app.subdir')}}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{Config::get('app.subdir')}}/js/datetimepicker/jquery.datetimepicker.css" rel="stylesheet" type="text/css">

</head>
<body>

<style>
    table tbody td img{
        max-width: 25px;
    }
</style>


                    <div id="display">
                       <table class="ui celled striped teal table">
                           <thead>
                           <tr><th style="">
                                   No.
                               </th>
                               <th>
                                   ชื่อ
                               </th>
                               <th style="width: 140px;">
                                   หมวดหมู่ผู้ใช้
                               </th>
                               <th style="width: 140px;">
                                   หมวดหมู่หลัก
                               </th>
                               <th style="width: 140px;">
                                   หมวดหมู่ย่อย
                               </th>


                               <th>
                                   ความถี่ในการเข้าชม
                               </th>
                               <th style="  width: 100px;">
                                   จัดการ
                               </th>
                           </tr></thead><tbody>
                           <?php //var_dump($links);?>
                           <?php $i=0; foreach($links as $link): $i++;?>
                           <tr>
                               <td><?php echo $i;?></td>
                               <td>
                                   {{ $link->name }}
                               </td>
                               <td style="    width: 200px;white-space: pre-line;">
                                   {{ $link->MiddleCategories->MajorCategories->UserCategories->name}}
                               </td>
                               <td>
                                   {{ $link->MiddleCategories->MajorCategories->name}}
                               </td>
                               <td>
                                   {{ $link->MiddleCategories->name}}
                               </td>



                               <td>
                                {{$link->frequency}}
                               </td>
                               <td class="collapsing">
                                   <a href="{{Config::get('app.subdir')}}/admin/link/{{$link->id}}/show"><i class="search teal icon"></i></a>
                                   <a href="{{Config::get('app.subdir')}}/admin/link/{{$link->id}}/update"><i class="configure teal icon"></i></a>
                                   <a class="del" href="{{Config::get('app.subdir')}}/admin/link/{{ $link->id }}/delete"><i class="remove teal icon"></i></a>
                               </td>
                           </tr>
                           <?php endforeach;?>
                           </tbody>
                       </table>
                    </div>
</body>
</html>

@section('javascript')
    <script>
        $('.del').click(function(){
           if(confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')){
               return true;
           }else{
               return false;
           }

        });
    </script>

    <script>
        $(document).on('ready', function() {

            runUc('#ucs');


        });



    </script>

    <script>

        jQuery(function($) {
            jQuery('body').on('change','#ucs',function(){
                jQuery.ajax({
                    'type':'POST',
                    'url':'filter_links',
                    'cache':false,
                    'data': {ucs:$("#ucs").val()},
                    'success':function(html){
                        $("#display").html(html);
                    }
                });
                return false;
            });
        });
    </script>
    @stop
