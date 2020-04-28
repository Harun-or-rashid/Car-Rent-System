@extends('admin.master')

@section('dashboard_menu_class','active')
@section('page_location')
<ul class="breadcrumb">
	<li>
		<i class="ace-icon fa fa-home home-icon"></i>
		<a href="{{ route('admin.index') }}">Dashboard</a>
	</li>
</ul><!-- /.breadcrumb -->
@endsection


@section('page_header')
<h1>
	Dashboard
	<small>
		<i class="ace-icon fa fa-angle-double-right"></i>
		overview &amp; stats
	</small>
</h1>
@endsection

@section('main_content')
	<div class="row">
		<div class="space-6"></div>


		<div class="vspace-12-sm"></div>

		<div class="col-sm-8 col-sm-offset-2">
			<div class="widget-box">


				<div class="widget-body">
					<div class="widget-main">
						<div id="piechart-placeholder"></div>

						<div class="clearfix">
							<div class="grid3">
								<span class="grey">
									<i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
									&nbsp; likes
								</span>
								<h4 class="bigger pull-right">1,255</h4>
							</div>

							<div class="grid3">
								<span class="grey">
									<i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
									&nbsp; tweets
								</span>
								<h4 class="bigger pull-right">941</h4>
							</div>

							<div class="grid3">
								<span class="grey">
									<i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
									&nbsp; pins
								</span>
								<h4 class="bigger pull-right">1,050</h4>
							</div>
						</div>
					</div><!-- /.widget-main -->
				</div><!-- /.widget-body -->
			</div><!-- /.widget-box -->
		</div><!-- /.col -->
	</div><!-- /.row -->

	<div class="hr hr32 hr-dotted"></div>

	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="widget-box transparent">
				<div class="widget-header widget-header-flat">
					<h4 class="widget-title lighter">
						<i class="ace-icon fa fa-star orange"></i>
						Popular Domains
					</h4>

					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="ace-icon fa fa-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						<table class="table table-bordered table-striped">
							<thead class="thin-border-bottom">
								<tr>
									<th>
										<i class="ace-icon fa fa-caret-right blue"></i>name
									</th>

									<th>
										<i class="ace-icon fa fa-caret-right blue"></i>price
									</th>

								</tr>
							</thead>

							<tbody>
								<tr>
									<td>internet.com</td>

									<td class="hidden-480">
										<span class="label label-info arrowed-right arrowed-in">on sale</span>
									</td>
								</tr>

								<tr>
									<td>online.com</td>

									<td class="hidden-480">
										<span class="label label-success arrowed-in arrowed-in-right">approved</span>
									</td>
								</tr>

								<tr>
									<td>newnet.com</td>

									<td class="hidden-480">
										<span class="label label-danger arrowed">pending</span>
									</td>
								</tr>

								<tr>
									<td>web.com</td>

									<td class="hidden-480">
										<span class="label arrowed">
											<s>out of stock</s>
										</span>
									</td>
								</tr>

								<tr>
									<td>domain.com</td>

									<td class="hidden-480">
										<span class="label label-warning arrowed arrowed-right">SOLD</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div><!-- /.widget-main -->
				</div><!-- /.widget-body -->
			</div><!-- /.widget-box -->
		</div><!-- /.col -->

	</div><!-- /.row -->

@endsection