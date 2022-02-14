@extends('admin.default')

@section('page-header')
	شاشة الاعدادات
@stop

@section('content')
	
	{!! Form::model($item, [
			'action' => ['ConfigurationController@update', $item->id],
			'method' => 'put', 
			'files' => true
		])
	!!}
		<div class="row">
		  <div class="col-sm-4">
				<div class="box box-info">
				  <div class="box-body">
						{!! Form::myTextArea('about_almahajja_waqf', 'عن الوقف', ['rows' => 3]) !!}
						
						{!! Form::myTextArea('about_almahajja_project', 'عن مشروع الحلقات الهاتفية', ['rows' => 3]) !!}
						
						{!! Form::myTextArea('vision', 'رؤيتنا', ['rows' => 3]) !!}
						
						{!! Form::myTextArea('mission', 'رسالتنا', ['rows' => 3]) !!}
						
						{!! Form::myTextArea('values', 'قيمنا', ['rows' => 3]) !!}
						
						{!! Form::myTextArea('goals', 'أهدافنا', ['rows' => 3]) !!}
						
						{!! Form::myTextArea('history', 'نبذة تاريخية', ['rows' => 3]) !!}
						
				  </div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="box box-info">
				  <div class="box-body">

						{!! Form::myInput('text', 'website', 'الموقع الالكتروني') !!}

						{!! Form::myInput('text', 'email', 'البريد الالكتروني') !!}

						{!! Form::myInput('text', 'mobile', 'الجوال') !!}

						{!! Form::myInput('text', 'phone', 'الهاتف') !!}
	{!! Form::myInput('text', 'whatsapp', 'واتساب') !!}

						{!! Form::myInput('text', 'fax', 'الفاكس') !!}

						{!! Form::myInput('text', 'toll_free', 'الرقم المجاني') !!}

						{!! Form::myInput('text', 'twitter', 'تويتر') !!}

						{!! Form::myInput('text', 'instagram', 'انستغرام') !!}

						{!! Form::myInput('text', 'facebook', 'التلقرام') !!}

						{!! Form::myInput('text', 'youtube', 'اليوتيوب') !!}

						{!! Form::myInput('text', 'snapchat', 'سناب شات') !!}

						{!! Form::myInput('text', 'address', 'عنوان المكتب') !!}
						
				  </div>
				</div>

		  </div>

		  <div class="col-sm-4">
				<div class="box box-info">
				  <div class="box-body">

					{!! Form::myFile('logo', 'الشعار') !!}

					@if ($item->logo)
						<h3>الشعار</h3>
						<div class="text-center">
							<img style="width: 100%" src="{{ $item->logo }}" alt="">
							<hr>
						</div>
					@endif

					@include('admin.commun.map', [
						'lat' => (isset($item) && $item->lat) ? $item->lat : 21.389680447254825, 
						'lng' => (isset($item) && $item->lng) ? $item->lng : 39.85845143389895
					])


				  </div>
				</div>
		  </div>

		</div>

		<div class="box-footer">
		  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
		</div>
	
  {!! Form::close() !!}
	
@stop
