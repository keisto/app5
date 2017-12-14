@extends('layouts.app')

@section('title')
  Add Employee
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('tabs')
  <div class="hero-foot">
      <nav class="tabs is-boxed">
        <div class="container">
          <ul>
            <li><a href="/user">Employees</a></li>
            <li><a href="/user/inactive">Inactive</a></li>
            <li class="is-active"><a href="/user/create">Add Employee</a></li>
          </ul>
        </div>
      </nav>
    </div>
@endsection

@section('content')
  <section class="section">
    <div class="container">
  {{-- <tabs>
    <tab name="Billable" selected="true">
      @include('po.form.billable')
    </tab>
    <tab name="Non-Billable">
      @include('po.form.nonbillable')
    </tab>
  </tabs> --}}
  <h1 class="title">Employee</h1>
{{ Form::open(['url' => '/user']) }}
<div class="columns is-widescreen">
  <div class="column is-half">
    {{ Form::label('name', 'Name', ['class' => 'label']) }}
    {{ Form::text('name', '', ['placeholder' => 'Name', 'class' => 'input']) }}
  </div>
  <div class="column is-half">
    {{ Form::label('phone', 'Phone Number', ['class' => 'label']) }}
    {{ Form::text('phone', '', ['placeholder' => 'Phone Number', 'class' => 'input']) }}
  </div>
</div>
<div class="columns is-mobile">
  <div class="column is-one-third">
    {{ Form::label('email', 'Email Address', ['class' => 'label']) }}
    {{ Form::text('email', '', ['placeholder' => 'Email Address', 'class' => 'input']) }}
  </div>
  <div class="column is-one-third">
    {{ Form::label('password', 'Password', ['class' => 'label']) }}
    {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'input']) }}
  </div>
  <div class="column is-one-third">
    {{-- <option value="0">Access Level</option>
    <option value="1">Level 1 : Foreman / Laborer</option>
    <option value="2">Level 2 : Shop Personel</option>
    <option value="3">Level 3 : Supervisor</option>
    <option value="4">Level 4 : Dispatcher</option>
    <option value="5">Level 5 : Office Personel</option>
    <option value="6">Level 6 : Management</option> --}}
    {{ Form::label('access', 'Access Level', ['class' => 'label']) }}
    <div class="select" style="width:100%">
    {{ Form::select('access', [0 => 'Access Level', 1 => 'Level 1 : Foreman / Laborer',
      2 => 'Level 2 : Shop Personel', 3 => 'Level 3 : Supervisor',
      4 => 'Level 4 : Dispatcher', 5 => 'Level 5 : Office Personel',
      6 => 'Level 6 : Management'], 0, ['style' => 'width:100%']) }}
    </div>
  </div>
</div>
<div class="columns is-mobile">
  <div class="column is-one-third">
    {{ Form::label('birthday', 'Birthday', ['class' => 'label']) }}
    {{ Form::text('birthday', '', ['id' => 'birthdaypicker', 'placeholder' => 'Birthday', 'class' => 'input']) }}
  </div>
  <div class="column is-one-third">
    {{ Form::label('hired_on', 'Hired Date', ['class' => 'label']) }}
    {{ Form::text('hired_on', '', ['id' => 'hiredonpicker', 'placeholder' => 'Hired Date', 'class' => 'input']) }}
  </div>
  <div class="column is-one-third">
    {{ Form::label('resigned_on', 'Resign Date', ['class' => 'label']) }}
    {{ Form::text('resigned_on', '', ['id' => 'resignonpicker', 'placeholder' => 'Resign Date', 'class' => 'input', 'disabled' => 'true']) }}
  </div>
</div>
<div class="columns is-mobile">
  <div class="column is-one-third has-text-centered">
    <br/>
    {{ Form::checkbox('has_license', true, false, ['id' => 'has_license', 'class' => 'is-checkradio has-background-color is-primary']) }}
    {{ Form::label('has_license', 'Drive for Us?') }}
  </div>
  <div class="column is-two-thirds">
    {{ Form::label('license', 'License Number', ['class' => 'label']) }}
    {{ Form::text('license', '', ['id' => 'license', 'placeholder' => 'License Number', 'class' => 'input', 'disabled' => true]) }}
  </div>
</div>
<div class="columns is-mobile">
  <div class="column is-one-third has-text-centered">
    <br/>
    {{ Form::checkbox('has_cdl', true, false, ['id' => 'has_cdl', 'class' => 'is-checkradio has-background-color is-primary', 'disabled' => true]) }}
    {{ Form::label('has_cdl', 'Have CDL?') }}
  </div>
  <div class="column is-two-thirds">
    {{ Form::label('cdl_expire', 'Expires on', ['class' => 'label']) }}
    {{ Form::date('cdl_expire', '', ['id' => 'cdl_expire', 'placeholder' => 'CDL Medical Expire Date', 'class' => 'input', 'disabled' => true]) }}
  </div>
</div>
<div class="is-pulled-left">
  <a href="/user">
   {{ Form::button('<span class="icon"><i class="fas fa-times"></i></span><span>Cancel</span>', ['class' => 'button is-light']) }}
 </a>
</div>
<div class="is-pulled-right">
   {{ Form::button('<span class="icon"><i class="fas fa-save"></i></span><span>Save</span>', ['type' => 'submit', 'class' => 'button is-primary is-pulled-right']) }}
 </div>
{{ Form::close() }}
</div>
</section>
@endsection

@section('footer')
  <script>
  $('#has_license').click(function () {
    if ($('#has_license').is(':checked')) {
      $('#has_cdl').removeAttr('disabled');
      $('#license').removeAttr('disabled');
      } else {
        $('#has_cdl').attr('disabled', 'disabled');
        $('#license').attr('disabled', 'disabled');
      }
  });
  $('#has_cdl').click(function () {
    if ($('#has_cdl').is(':checked')) {
      $('#cdl_expire').removeAttr('disabled');
      } else {
        $('#cdl_expire').attr('disabled', 'disabled');
      }
  });
  	!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){var c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){var h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);var p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(var a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){var c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){var b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){var a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){var b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){var c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){var k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){var c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){var b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}var B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);var a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){var a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});
  $('#phone').mask("999-999-9999",{placeholder:"#"});


  document.addEventListener( 'DOMContentLoaded', function () {
    var datePicker = new DatePicker( document.getElementById( 'birthdaypicker' ), { overlay: true } );
    var datePicker = new DatePicker( document.getElementById( 'hiredonpicker' ), { overlay: true } );
    var datePicker = new DatePicker( document.getElementById( 'resignonpicker' ), { overlay: true } );
  } );
  </script>
@endsection
