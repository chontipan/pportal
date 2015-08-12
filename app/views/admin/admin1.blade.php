<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 3/30/2015
 * Time: 19:39
 */?>
@extends('admin.layout')

@section('content')
   {{-- <div class="ui page grid">--}}
<style>
    table tbody td img{
        max-width: 25px;
    }
</style>
                    <h1><i class="big settings teal icon"></i> จัดการจุดเชื่อมโยง(Link)</h1>
                           @if(Session::has('message'))
                           <div class="ui info message">
                               <div class="header">{{ Session::get('message') }}</div>
                           </div>
                           @endif


   <div class="field" >
       {{ Form::label('ucs','กลุ่มผู้ใช้') }}
       <select class="ui" name="ucs" id="ucs">

       </select>

   </div>

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
                                   {{ $link->frequency}}
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


@stop

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
