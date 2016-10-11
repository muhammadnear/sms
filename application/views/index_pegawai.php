			<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> Pegawai</span></h1>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<ul id="sparks" class="">
							<li class="sparks-info">
								<h5> Kotak Masuk Tahun ini <span class="txt-color-blue"><?php echo $masuk;?></span></h5>
							</li>
							<li class="sparks-info">
								<h5> Kotak Keluar tahun ini <span class="txt-color-purple"><?php echo $keluar;?></span></h5>
							</li>
							<li class="sparks-info">
								<h5> Pertanyaan Tahun ini <span class="txt-color-green"><?php echo $tanya;?></span></h5>
							</li>
							<li class="sparks-info">
								<h5> Keluhan tahun ini <span class="txt-color-red"><?php echo $keluh;?></span></h5>
							</li>
						</ul>
					</div>
				</div>
				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">
						<article class="col-sm-12">
							<!-- new widget -->
							<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->
								<header>
									<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
									<h2>Grafik SMS</h2>

									<ul class="nav nav-tabs pull-right in" id="myTab">
										<li class="active">
											<a data-toggle="tab" href="#s2"> <span class="hidden-mobile hidden-tablet">Tahun 2016</span></a>
										</li>
									</ul>
								</header>

								<!-- widget div-->
								<div class="no-padding">
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										test
									</div>
									<!-- end widget edit box -->

									<div class="widget-body">
										<!-- content -->
										<div id="myTabContent" class="tab-content">
											<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
												<div class="padding-10">
													<div id="statsChart" class="chart-large has-legend-unique"></div>
												</div>

											</div>
											<!-- end s2 tab pane -->

										</div>

										<!-- end content -->
									</div>

								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->

						</article>
					</div>

					<!-- end row -->

					<!-- row -->

					<!-- end row -->

				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->