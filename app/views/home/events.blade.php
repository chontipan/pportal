<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/16/2015
 * Time: 12:03
 */?>
@extends('home.layout')
@section('head')
    <title>กิจกรรม | Phayao Portal</title>
@stop
@section('content')
    <div id="title-event" class="slide header">
        <div class="events" id="events">
            <div style="text-align:-webkit-center;" class="container">
                <div style="background-color: transparent;border: 0" class="terminal">
                    <div class="title-search">
                        <div class="row">
                            {{--<h1> กิจกรรม </h1>--}}
                            <div class="col-xs-12 col-sm-12 col-lg-12 nav-event">
                                <div class="row">
                                    <div class="btn-group btn-group-justified" role="group" aria-label="..." id="event-tab">
                                        <div class="btn-group" role="group">
                                            <a class="a-tab" href="#tab_live" role="tab" data-toggle="tab">
                                                <button id="tab_live_nav" type="button" class="btn btn-default">
                                                    กำลังดำเนิน <span class="badge">{{$countEvent['live']}}</span>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <a class="a-tab" href="#tab_future" role="tab" data-toggle="tab">
                                                <button id="tab_future_nav" type="button" class="btn btn-default">
                                                    เร็วๆนี้ <span class="badge">{{$countEvent['future']}}</span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div style="text-align:-webkit-left;min-height: 51vh;" class="row content-event">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="tab_live">

                              <div>ค้นหากิจกรรมตามอำเภอ
                              <br>        <select class="ui dropdown" name="location" id="location">
                                          <option value="">---เลือกอำเภอ---</option>
                                          <option value="เมือง">เมือง</option>
                                          <option value="เชียงคำ">เชียงคำ</option>
                                          <option value="ดอกคำใต้">ดอกคำใต้</option>
                                          <option value="จุน">จุน</option>
                                          <option value="แม่ใจ">แม่ใจ</option>
                                          <option value="ปง">ปง</option>
                                          <option value="ภูซาง">ภูซาง</option>
                                          <option value="เชียงม่วน">เชียงม่วน</option>
                                          <option value="ทั้งหมด">ทั้งหมด</option>
                                      </select>
                            </div>

                            <div id="display" name="display">
                                @foreach($events as $event)
                                    @if($event->status!=-2&&$event->status==-1)
                                        <div class="col-xs-12 col-sx-6 col-sm-6 col-md-6 col-lg-4">
                                            <div class="feature">
                                                <a href="{{url("/events/$event->id/show")}}">
                                                    <div class="event-title">
                                                        {{$event->name}}
                                                    </div>
                                                    <div class="event-img">
                                                        <img class="lazy img-responsive" data-original="{{Config::get('app.subdir')}}/uploads/events/{{$event->img}}" src="{{Config::get('app.subdir')}}/uploads/events/{{$event->img}}" style="display: block;">

                                                    </div>
                                                    <div class="event-desc">
                                                        @if(!$event->repeat)
                                                            <p>{{$event->format}}</p>
                                                            <p>@ {{$event->where}}, {{$event->location}}</p>


                                                        @else
                                                            <p>ทุก{{$event->day}} เริ่ม {{$event->start}}</p>
                                                            <p>@ {{$event->where}}, {{$event->location}}</p>

                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_future">

                              <div>ค้นหากิจกรรมตามอำเภอ
                              <br>        <select class="ui dropdown" name="location" id="location">
                                          <option value="">---เลือกอำเภอ---</option>
                                          <option value="เมือง">เมือง</option>
                                          <option value="เชียงคำ">เชียงคำ</option>
                                          <option value="ดอกคำใต้">ดอกคำใต้</option>
                                          <option value="จุน">จุน</option>
                                          <option value="แม่ใจ">แม่ใจ</option>
                                          <option value="ปง">ปง</option>
                                          <option value="ภูซาง">ภูซาง</option>
                                          <option value="เชียงม่วน">เชียงม่วน</option>
                                          <option value="ทั้งหมด">ทั้งหมด</option>
                                      </select>
                            </div>

                            <div id="display" name="display">
                                @foreach($events as $event)
                                    @if($event->status!=-2&&$event->status==-3)
                                        <div class="col-xs-12 col-sx-6 col-sm-6 col-md-6 col-lg-4">
                                            <div class="feature">
                                                <a href="{{url("/events/$event->id/show")}}">
                                                    <div class="event-title">
                                                        {{$event->name}}
                                                    </div>
                                                    <div class="event-img">
                                                        <img class="lazy img-responsive" data-original="{{Config::get('app.subdir')}}/uploads/events/{{$event->img}}" src="{{Config::get('app.subdir')}}/uploads/events/{{$event->img}}" style="display: block;">



                                                    </div>
                                                    <div class="event-desc">
                                                        @if(!$event->repeat)
                                                            <p>{{$event->format}}</p>
                                                            <p>{{$event->where}}</p>
                                                        @else
                                                            <p>ทุก{{$event->day}} เริ่ม {{$event->start}}</p>
                                                            <p>{{$event->where}}</p>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')
    <script>

    jQuery(function($) {
            jQuery('body').on('change','#location',function(){
                jQuery.ajax({
                    'type':'POST',
                    'url':'filter_events',
                    'cache':false,
                    'data': {location:$("#location").val()},
                    'success':function(html){
                        $("#display").html(html);
                    }
                });
                return false;
            });
        });



    $(function() {
       $("img.lazy").lazyload();
    });

        $("#tab_live_nav").addClass("border-bot");
        $('#event-tab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            if(e.target.id=='tab_live_nav'){
                $('#'+e.target.id).addClass("border-bot");
                $("#tab_future_nav").removeClass("border-bot");
            }else if(e.target.id=='tab_future_nav'){
                $('#'+e.target.id).addClass("border-bot");
                $("#tab_live_nav").removeClass("border-bot");
            }
        });
       /* $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            e.target // newly activated tab
            if(e.target.hash=='#tab_live'){
                $(e.target.hash+"_nav").addClass("border-bot");
                $("#tab_live_nav").removeClass("border-bot");
            }else if(e.target.hash=='#tab_future'){
                $(e.target.hash+"_nav").addClass("border-bot");
                $("#tab_future_nav").removeClass("border-bot");
            }
        })*/
    </script>
@stop
