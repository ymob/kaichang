
@extends('home.layout')

@section('head')
	<style type="text/css">
		.footlink{margin-top:30px;}
		.wrap-left{width:140px;height:auto;background:#fff;border:1px solid #848484;}
		.kaichang{width:100%;height:40px;line-height:40px;border-bottom:1px solid #afb5bc;color:#848484;font-size:18px;cursor:pointer;text-align: center}
		a:hover{color:#0E6EB8;font-size:110%;}
		.contain{width:800px;height:100%;border:1px solid #848484;margin-left:30px; border-radius: 10px;}
		/*.about-black{border-bottom: 3px solid #0E6EB8}*/	
		.zi1{font-size:25px;height:35px;margin-top:20px;}
		p{font-size: 18px;}
		.top-pic{text-align: center;}
		.border1{border-bottom: 2px solid #b6bcc4}
		.zi3{font-size:16px}

	</style>
@endsection

@section('content')
	<div class="top-pic">
		<img src="{{asset('home/images/about_1.png')}}">
	</div>
	<div class="footlink">
		<!-- 左边导航 -->
		<div class="col-xs-3">
			<div class="col-xs-6"></div>
			<div class="col-xs-4 wrap-left">
				<div class="aboutus kaichang">
					<div><a href="#">关于我们</a></div>
				</div>
				<div class="connectus kaichang">
					<div><a href="#">联系我们</a></div>				
				</div>
				<div class="connectkefu kaichang">
					<div><a href="#">联系客服</a></div>	
				</div>
				<div class="frindlink kaichang">
					<div><a href="#">友情链接</a></div>	
				</div>
				<div class="pripolicy kaichang">
					<div><a href="#">隐私政策</a></div>			
				</div>
			</div>
			<div class="col-xs-2"></div>
		</div>
		<!-- 右边详情 -->
		<div class="col-xs-9 border contain" >
			<div class="content-1 each" style="display:none">
				<div class="conter">
					<p class="zi1">关于开场</p>
					<p class="border1"></p>
					<p class="zi2">为什么选择开场?</p>
					<div class="zi3">关于开场目前开场已累计服务超过11万企业客户。互联网企业腾讯、百度、阿里巴巴、58同城等，知名品牌联想、中国工商银行、阿斯利康等，外企用户Amazon、IBM、SAP、Twitter等，公关公司奥美公关、扬思公关、康辉旅行社等，均从开场网平台采购场地等活动资源。</div>
				</div>
			</div>
			<div class="content-2 each" style="display:none">
				<div class="conter">
					<p class="zi1">联系我们</p>
					<p class="border1"></p>
					<p class="zi2">为什么选择开场?</p>
					<div class="zi3">联系我们目前开场已累计服务超过11万企业客户。互联网企业腾讯、百度、阿里巴巴、58同城等，知名品牌联想、中国工商银行、阿斯利康等，外企用户Amazon、IBM、SAP、Twitter等，公关公司奥美公关、扬思公关、康辉旅行社等，均从开场网平台采购场地等活动资源。</div>
				</div>
			</div>
			<div class="content-3 each" style="display:none" >
				<div class="conter">
					<p class="zi1">联系客服</p>
					<p class="border1"></p>
					<p class="zi2">为什么选择开场?</p>
					<div class="zi3">联系客服目前开场已累计服务超过11万企业客户。互联网企业腾讯、百度、阿里巴巴、58同城等，知名品牌联想、中国工商银行、阿斯利康等，外企用户Amazon、IBM、SAP、Twitter等，公关公司奥美公关、扬思公关、康辉旅行社等，均从开场网平台采购场地等活动资源。</div>
				</div>
			</div>
			<div class="content-4 each" style="display:none">
				<div class="conter">
					<p class="zi1">友情链接</p>
					<p class="border1"></p>
					<p class="zi2">为什么选择开场?</p>
					<div class="zi3">友情链接目前开场已累计服务超过11万企业客户。互联网企业腾讯、百度、阿里巴巴、58同城等，知名品牌联想、中国工商银行、阿斯利康等，外企用户Amazon、IBM、SAP、Twitter等，公关公司奥美公关、扬思公关、康辉旅行社等，均从开场网平台采购场地等活动资源。</div>
				</div>
			</div>
			<div class="content-5 each" style="display:block">
				<div class="conter">
					<p class="zi1">隐私政策</p>
					<p class="border1"></p>
					<p class="zi2">为什么选择开场?</p>
					<div class="zi3">隐私政策目前开场已累计服务超过11万企业客户。互联网企业腾讯、百度、阿里巴巴、58同城等，知名品牌联想、中国工商银行、阿斯利康等，外企用户Amazon、IBM、SAP、Twitter等，公关公司奥美公关、扬思公关、康辉旅行社等，均从开场网平台采购场地等活动资源。</div>
				</div>
			</div>

		</div>
	<div style="clear:both;"></div>
@endsection

@section('js')
	<script type="text/javascript">

		$('.kaichang').click(function(){
			// alert($(this).index());
			var index = $(this).index();
			$(".each").css('display','none');
			$(".each").eq(index).css('display','block');
		});
	</script>
@endsection


