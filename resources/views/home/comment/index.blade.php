@extends('home.layout')

@section('head')
	<style>
		.o-title{
			font:700 20px "Microsoft YaHei";
			color:#333;
			text-align: center;
		}
		.o-detail
		{
			text-align: center;
			margin-top: 10px;
		}
	</style>
@endsection

@section('content')
	<div class="mycomment">
		<div class="col-xs-2" ></div>
		<div class="col-xs-8">
			<div class="col-xs-4"></div>
			<div class="comtitle col-xs-4">
				<div class="o-title">评价订单</div>
				<div>
					<div class="o-detail">订单号:123223489898989&nbsp;&nbsp;&nbsp;&nbsp;2016-3-13 10:23</div>
					<div></div>
				</div>
			</div>
			<div class="col-xs-4"></div>
		</div>
		<div class="col-xs-2" ></div>
	</div>

	<div class="mycomment">
		<div class="col-xs-2" ></div>
		<div class="col-xs-8">
			<div class="col-xs-4"></div>
			<div class="comtitle col-xs-4">
				<div class="o-title">评价订单</div>
				<div>
					<div class="o-detail">订单号:123223489898989&nbsp;&nbsp;&nbsp;&nbsp;2016-3-13 10:23</div>
					<div></div>
				</div>
			</div>
			<div class="col-xs-4"></div>
		</div>
		<div class="col-xs-2" ></div>
	</div>
		<div class="col-xs-2" ></div>
		<div class="placename col-xs-8">
			<div>
				<div><img src=""></div>
				<div>
					<div>人民大会堂</div>
					<div>
						<table border="1px solid red">
							<tr>
								<td>综合</td>
								<td>条件</td>
								<td>服务</td>
							</tr>
							<tr>
								<td>111</td>
								<td>222</td>
								<td>333</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div>会场新旧度 ※※※※※※ 0分 &nbsp;&nbsp;&nbsp;会场新旧度 ※※※※※※ 0分&nbsp;&nbsp;&nbsp;会场新旧度 ※※※※※※ 0分&nbsp;&nbsp;&nbsp;会场新旧度 ※※※※※※ 0分</div>
		</div>
		<div class="col-xs-2" ></div>


		<div class="placedetail">
			<div>
				<div>图</div>
				<div>世界第一大好世界第一大号</div>
				<div>¥111111</div>
			</div>
			<div>
				<div>
					<div>场地满意度</div>
					<div>※※※※※※ 0分</div>
				</div>
				<div>
					<div>用户印象</div>
					<div>
						体验佳&nbsp;&nbsp;&nbsp;&nbsp;服务周到&nbsp;&nbsp;&nbsp;&nbsp;服务周到&nbsp;&nbsp;&nbsp;&nbsp;服务周到&nbsp;&nbsp;&nbsp;&nbsp;服务周到&nbsp;&nbsp;&nbsp;&nbsp;服务周到
					</div>
				</div>
				<div>
					<div>留下你的评价</div>
					<div></div>
				</div>
				<div>
					<div>上传你的图片</div>
					<div></div>
				</div>
			</div>
		</div>
	</div>


@endsection