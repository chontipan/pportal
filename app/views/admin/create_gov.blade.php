<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/25/2015
 * Time: 17:50
 */?>

@extends('admin.layout')

@section('content')
    <style>
        .ui.form select{
            width: 80%;
            display: -webkit-inline-box;
        }
        .ui.form .tag{
            margin-top: 5px;
        }
        .ui.header{
            font-weight: 0;
        }
        .ui.header:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) {
            font-size: 1.0em;
        }
    </style>
    {{-- <div class="ui page grid">--}}

    <h1><i class="big settings teal icon"></i> เพิ่มหน่วยงาน </h1>
    {{ Form::open(array('url' => '/admin/gov/create','class' => 'ui warning form teal segment','files'=>false)) }}
        @if(!$errors->isEmpty())

            <div class="ui red message">
                <div class="header">{{ HTML::ul($errors->all()) }}</div>
            </div>
        @elseif(Session::has('message'))
            <div class="ui info message">
                <div class="header">{{ Session::get('message') }}</div>
            </div>
        @endif

        <div class="required field">
            {{ Form::label('name','ชื่อหน่วยงาน') }}
            {{ Form::text('name',null,['placeholder'=>'ชื่อหน่วยงาน']) }}
        </div>

        <div class="required field">
            {{ Form::label('ministry','กระทรวงที่หน่วยงานสังกัด:  ') }}
            <select class="ui" name="ministry" id="ministry">
                <option value="สำนักนายกรัฐมนตรี">สำนักนายกรัฐมนตรี</option>
                <option value="กระทรวงกลาโหม">กระทรวงกลาโหม</option>
                <option value="กระทรวงการคลัง">กระทรวงการคลัง</option>
                <option value="กระทรวงการต่างประเทศ">กระทรวงการต่างประเทศ</option>
                <option value="กระทรวงการท่องเที่ยวและกีฬา">กระทรวงการท่องเที่ยวและกีฬา</option>
                <option value="กระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์">กระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์</option>
                <option value="กระทรวงเกษตรและสหกรณ์">กระทรวงเกษตรและสหกรณ์</option>
                <option value="กระทรวงคมนาคม">กระทรวงคมนาคม</option>
                <option value="กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม">กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม</option>
                <option value="กระทรวงเทคโนโลยีสารสนเทศและการสื่อสาร">กระทรวงเทคโนโลยีสารสนเทศและการสื่อสาร</option>
                <option value="กระทรวงพลังงาน">กระทรวงพลังงาน</option>
                <option value="กระทรวงพาณิชย์">กระทรวงพาณิชย์</option>
                <option value="กระทรวงมหาดไทย">กระทรวงมหาดไทย</option>
                <option value="กระทรวงยุติธรรม">กระทรวงยุติธรรม</option>
                <option value="กระทรวงแรงงาน">กระทรวงแรงงาน</option>
                <option value="กระทรวงวัฒนธรรม">กระทรวงวัฒนธรรม</option>
                <option value="กระทรวงวิทยาศาสตร์และเทคโนโลยี">กระทรวงวิทยาศาสตร์และเทคโนโลยี</option>
                <option value="กระทรวงศึกษาธิการ">กระทรวงศึกษาธิการ</option>
                <option value="กระทรวงสาธารณสุข">กระทรวงสาธารณสุข</option>
                <option value="กระทรวงอุตสาหกรรม">กระทรวงอุตสาหกรรม</option>


            </select>
        </div>

        <div class="required field">
            {{ Form::label('where','สถานที่ตั้ง') }}
            {{ Form::text('where',null,['placeholder'=>'สถานที่ตั้ง']) }}
        </div>
        <div class="required field">
            {{ Form::label('contact','ติดต่อ') }}
            {{ Form::text('contact',null,['placeholder'=>'ติดต่อ']) }}
        </div>
        <div class="required field">
            {{ Form::label('link','จุดเชื่อมโยง(URL)') }}
            {{ Form::text('link',null,['placeholder'=>'จุดเชื่อมโยง(URL)']) }}
        </div>

        {{ Form::submit('บันทึก',array('class'=>'ui submit teal button')) }}
    {{ Form::close() }}
@stop