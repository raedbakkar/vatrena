

		
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
						<div class="m-grid__item m-grid__item--fluid m-wrapper">
							<!-- BEGIN: Subheader -->
							<div class="m-subheader ">
								<div class="d-flex align-items-center">
									<div class="mr-auto">
										<h3 class="m-subheader__title ">
											Dashboard
										</h3>
									</div>
									<div>
										<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
											<span class="m-subheader__daterange-label">
												<span class="m-subheader__daterange-title"></span>
												<span class="m-subheader__daterange-date m--font-brand"></span>
											</span>
											<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
												<i class="la la-angle-down"></i>
											</a>
										</span>
									</div>
								</div>
							</div>
							<!-- END: Subheader -->
							<div class="m-content">
								<!--Begin::Section-->
								<div class="m-portlet">
									<div class="m-portlet__body  m-portlet__body--no-padding">
										<div class="row m-row--no-padding m-row--col-separator-xl">
											<div class="col-xl-4">
												<!--begin:: Widgets/Daily Sales-->
												<div class="m-widget14">
													<div class="m-widget14__header m--margin-bottom-30">
														<h3 class="m-widget14__title">
															Daily Sales
														</h3>
														<span class="m-widget14__desc">
															Check out each collumn for more details
														</span>
													</div>
													<div class="m-widget14__chart" style="height:120px;">
														<canvas  id="m_chart_daily_sales"></canvas>
													</div>
												</div>
												<!--end:: Widgets/Daily Sales-->
											</div>
											<div class="col-xl-4">
												<!--begin:: Widgets/Profit Share-->
												<div class="m-widget14">
													<div class="m-widget14__header">
														<h3 class="m-widget14__title">
															Profit Share
														</h3>
														<span class="m-widget14__desc">
															Profit Share between customers
														</span>
													</div>
													<div class="row  align-items-center">
														<div class="col">
															<div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
																<div class="m-widget14__stat">
																	45
																</div>
															</div>
														</div>
														<div class="col">
															<div class="m-widget14__legends">
																<div class="m-widget14__legend">
																	<span class="m-widget14__legend-bullet m--bg-accent"></span>
																	<span class="m-widget14__legend-text">
																		37% Sport Tickets
																	</span>
																</div>
																<div class="m-widget14__legend">
																	<span class="m-widget14__legend-bullet m--bg-warning"></span>
																	<span class="m-widget14__legend-text">
																		47% Business Events
																	</span>
																</div>
																<div class="m-widget14__legend">
																	<span class="m-widget14__legend-bullet m--bg-brand"></span>
																	<span class="m-widget14__legend-text">
																		19% Others
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--end:: Widgets/Profit Share-->
											</div>
											<div class="col-xl-4">
												<!--begin:: Widgets/Revenue Change-->
												<div class="m-widget14">
													<div class="m-widget14__header">
														<h3 class="m-widget14__title">
															Revenue Change
														</h3>
														<span class="m-widget14__desc">
															Revenue change breakdown by cities
														</span>
													</div>
													<div class="row  align-items-center">
														<div class="col">
															<div id="m_chart_revenue_change" class="m-widget14__chart1" style="height: 180px"></div>
														</div>
														<div class="col">
															<div class="m-widget14__legends">
																<div class="m-widget14__legend">
																	<span class="m-widget14__legend-bullet m--bg-accent"></span>
																	<span class="m-widget14__legend-text">
																		+10% New York
																	</span>
																</div>
																<div class="m-widget14__legend">
																	<span class="m-widget14__legend-bullet m--bg-warning"></span>
																	<span class="m-widget14__legend-text">
																		-7% London
																	</span>
																</div>
																<div class="m-widget14__legend">
																	<span class="m-widget14__legend-bullet m--bg-brand"></span>
																	<span class="m-widget14__legend-text">
																		+20% California
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--end:: Widgets/Revenue Change-->
											</div>
										</div>
									</div>
								</div>
								<!--End::Section-->

<!--Begin::Section-->
								<div class="row">
									<div class="col-xl-6">
										<!--begin:: Widgets/Product Sales-->
										<div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height  m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															Product Sales
															<span class="m-portlet__head-desc">
																Total Sales By Products
															</span>
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="m-portlet__nav">
														<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
															<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
																Filter
															</a>
															<div class="m-dropdown__wrapper">
																<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
																<div class="m-dropdown__inner">
																	<div class="m-dropdown__body">
																		<div class="m-dropdown__content">
																			<ul class="m-nav">
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-share"></i>
																						<span class="m-nav__link-text">
																							Activity
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-chat-1"></i>
																						<span class="m-nav__link-text">
																							Messages
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-info"></i>
																						<span class="m-nav__link-text">
																							FAQ
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																						<span class="m-nav__link-text">
																							Support
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="m-widget25">
													<span class="m-widget25__price m--font-brand">
														$237,650
													</span>
													<span class="m-widget25__desc">
														Total Revenue This Month
													</span>
													<div class="m-widget25--progress">
														<div class="m-widget25__progress">
															<span class="m-widget25__progress-number">
																63%
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-danger" role="progressbar" style="width: 63%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget25__progress-sub">
																Sales Growth
															</span>
														</div>
														<div class="m-widget25__progress">
															<span class="m-widget25__progress-number">
																39%
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-accent" role="progressbar" style="width: 39%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget25__progress-sub">
																Product Growth
															</span>
														</div>
														<div class="m-widget25__progress" >
															<span class="m-widget25__progress-number">
																54%
															</span>
															<div class="m--space-10"></div>
															<div class="progress m-progress--sm">
																<div class="progress-bar m--bg-warning" role="progressbar" style="width: 54%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
															<span class="m-widget25__progress-sub">
																Community Growth
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Product Sales-->
									</div>
									<div class="col-xl-6">
										<!--begin:: Widgets/Adwords Stats-->
										<div class="m-portlet m-portlet--full-height m-portlet--skin-light m-portlet--fit  m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															AdWords Stats
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="m-portlet__nav">
														<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
															<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
																Today
															</a>
															<div class="m-dropdown__wrapper">
																<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
																<div class="m-dropdown__inner">
																	<div class="m-dropdown__body">
																		<div class="m-dropdown__content">
																			<ul class="m-nav">
																				<li class="m-nav__section m-nav__section--first">
																					<span class="m-nav__section-text">
																						Quick Actions
																					</span>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-share"></i>
																						<span class="m-nav__link-text">
																							Activity
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-chat-1"></i>
																						<span class="m-nav__link-text">
																							Messages
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-info"></i>
																						<span class="m-nav__link-text">
																							FAQ
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																						<span class="m-nav__link-text">
																							Support
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__separator m-nav__separator--fit"></li>
																				<li class="m-nav__item">
																					<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
																						Cancel
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="m-widget21" style="min-height: 420px">
													<div class="row">
														<div class="col">
															<div class="m-widget21__item m--pull-right">
																<span class="m-widget21__icon">
																	<a href="#" class="btn btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
																		<i class="fa flaticon-alert-2 m--font-light"></i>
																	</a>
																</span>
																<div class="m-widget21__info">
																	<span class="m-widget21__title">
																		Sales
																	</span>
																	<br>
																	<span class="m-widget21__sub">
																		IPO, Margins, Transactions
																	</span>
																</div>
															</div>
														</div>
														<div class="col m--align-left">
															<div class="m-widget21__item m--pull-left">
																<span class="m-widget21__icon">
																	<a href="#" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
																		<i class="fa flaticon-coins m--font-light m--font-light"></i>
																	</a>
																</span>
																<div class="m-widget21__info">
																	<span class="m-widget21__title">
																		Profit
																	</span>
																	<br>
																	<span class="m-widget21__sub">
																		Expenses, Loses, Profits
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="m-widget21__chart m-portlet-fit--sides" style="height:310px;">
														<canvas id="m_chart_adwords_stats"></canvas>
													</div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Adwords Stats-->
									</div>
								</div>
								<!--End::Section--> 

<!--Begin::Section-->
								<div class="row">
									<div class="col-xl-12">
										<!--begin::Portlet-->
										<div class="m-portlet  m-portlet--rounded" id="m_portlet">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<span class="m-portlet__head-icon">
															<i class="flaticon-map-location"></i>
														</span>
														<h3 class="m-portlet__head-text">
															Calendar
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="m-portlet__nav">
														<li class="m-portlet__nav-item">
															<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
																<span>
																	<i class="la la-plus"></i>
																	<span>
																		Add Event
																	</span>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<div id="m_calendar"></div>
											</div>
										</div>
										<!--end::Portlet-->
									</div>
								</div>
								<!--End::Section-->

<!--Begin::Section-->
								<div class="row">
									<div class="col-xl-6 col-lg-12">
										<!--Begin::Portlet-->
										<div class="m-portlet  m-portlet--full-height  m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															Recent Activities
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="m-portlet__nav">
														<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
															<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
																<i class="la la-ellipsis-h m--font-brand"></i>
															</a>
															<div class="m-dropdown__wrapper">
																<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
																<div class="m-dropdown__inner">
																	<div class="m-dropdown__body">
																		<div class="m-dropdown__content">
																			<ul class="m-nav">
																				<li class="m-nav__section m-nav__section--first">
																					<span class="m-nav__section-text">
																						Quick Actions
																					</span>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-share"></i>
																						<span class="m-nav__link-text">
																							Activity
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-chat-1"></i>
																						<span class="m-nav__link-text">
																							Messages
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-info"></i>
																						<span class="m-nav__link-text">
																							FAQ
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																						<span class="m-nav__link-text">
																							Support
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__separator m-nav__separator--fit"></li>
																				<li class="m-nav__item">
																					<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
																						Cancel
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide" data-scrollbar-shown="true" data-scrollable="true" data-max-height="380" style="overflow: visible; height: 380px; max-height: 380px; position: relative;">
													<!--Begin::Timeline 2 -->
													<div class="m-timeline-2">
														<div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
															<div class="m-timeline-2__item">
																<span class="m-timeline-2__item-time">
																	10:00
																</span>
																<div class="m-timeline-2__item-cricle">
																	<i class="fa fa-genderless m--font-danger"></i>
																</div>
																<div class="m-timeline-2__item-text  m--padding-top-5">
																	Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																	<br>
																	incididunt ut labore et dolore magna
																</div>
															</div>
															<div class="m-timeline-2__item m--margin-top-30">
																<span class="m-timeline-2__item-time">
																	12:45
																</span>
																<div class="m-timeline-2__item-cricle">
																	<i class="fa fa-genderless m--font-success"></i>
																</div>
																<div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
																	AEOL Meeting With
																</div>
																<div class="m-list-pics m-list-pics--sm m--padding-left-20">
																	<a href="#">
																		<img src="assets/dashboard/app/media/img/users/100_4.jpg" title="">
																	</a>
																	<a href="#">
																		<img src="assets/dashboard/app/media/img/users/100_13.jpg" title="">
																	</a>
																	<a href="#">
																		<img src="assets/dashboard/app/media/img/users/100_11.jpg" title="">
																	</a>
																	<a href="#">
																		<img src="assets/dashboard/app/media/img/users/100_14.jpg" title="">
																	</a>
																</div>
															</div>
															<div class="m-timeline-2__item m--margin-top-30">
																<span class="m-timeline-2__item-time">
																	14:00
																</span>
																<div class="m-timeline-2__item-cricle">
																	<i class="fa fa-genderless m--font-brand"></i>
																</div>
																<div class="m-timeline-2__item-text m--padding-top-5">
																	Make Deposit
																	<a href="#" class="m-link m-link--brand m--font-bolder">
																		USD 700
																	</a>
																	To ESL.
																</div>
															</div>
															<div class="m-timeline-2__item m--margin-top-30">
																<span class="m-timeline-2__item-time">
																	16:00
																</span>
																<div class="m-timeline-2__item-cricle">
																	<i class="fa fa-genderless m--font-warning"></i>
																</div>
																<div class="m-timeline-2__item-text m--padding-top-5">
																	Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																	<br>
																	incididunt ut labore et dolore magna elit enim at minim
																	<br>
																	veniam quis nostrud
																</div>
															</div>
															<div class="m-timeline-2__item m--margin-top-30">
																<span class="m-timeline-2__item-time">
																	17:00
																</span>
																<div class="m-timeline-2__item-cricle">
																	<i class="fa fa-genderless m--font-info"></i>
																</div>
																<div class="m-timeline-2__item-text m--padding-top-5">
																	Placed a new order in
																	<a href="#" class="m-link m-link--brand m--font-bolder">
																		SIGNATURE MOBILE
																	</a>
																	marketplace.
																</div>
															</div>
															<div class="m-timeline-2__item m--margin-top-30">
																<span class="m-timeline-2__item-time">
																	16:00
																</span>
																<div class="m-timeline-2__item-cricle">
																	<i class="fa fa-genderless m--font-brand"></i>
																</div>
																<div class="m-timeline-2__item-text m--padding-top-5">
																	Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																	<br>
																	incididunt ut labore et dolore magna elit enim at minim
																	<br>
																	veniam quis nostrud
																</div>
															</div>
															<div class="m-timeline-2__item m--margin-top-30">
																<span class="m-timeline-2__item-time">
																	17:00
																</span>
																<div class="m-timeline-2__item-cricle">
																	<i class="fa fa-genderless m--font-danger"></i>
																</div>
																<div class="m-timeline-2__item-text m--padding-top-5">
																	Received a new feedback on
																	<a href="#" class="m-link m-link--brand m--font-bolder">
																		FinancePro App
																	</a>
																	product.
																</div>
															</div>
														</div>
													</div>
													<!--End::Timeline 2 -->
												</div>
											</div>
										</div>
										<!--End::Portlet-->
									</div>
									<div class="col-xl-6 col-lg-12">
										<!--Begin::Portlet-->
										<div class="m-portlet m-portlet--full-height  m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															Recent Notifications
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab1_content" role="tab">
																Today
															</a>
														</li>
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content" role="tab">
																Month
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="tab-content">
													<div class="tab-pane active" id="m_widget2_tab1_content">
														<!--Begin::Timeline 3 -->
														<div class="m-timeline-3">
															<div class="m-timeline-3__items">
																<div class="m-timeline-3__item m-timeline-3__item--info">
																	<span class="m-timeline-3__item-time">
																		09:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Bob
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--warning">
																	<span class="m-timeline-3__item-time">
																		10:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Lorem ipsum dolor sit amit
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Sean
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--brand">
																	<span class="m-timeline-3__item-time">
																		11:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Lorem ipsum dolor sit amit eiusmdd tempor
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By James
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--success">
																	<span class="m-timeline-3__item-time">
																		12:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Lorem ipsum dolor
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By James
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--danger">
																	<span class="m-timeline-3__item-time">
																		14:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Lorem ipsum dolor sit amit,consectetur eiusmdd
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Derrick
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--info">
																	<span class="m-timeline-3__item-time">
																		15:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Lorem ipsum dolor sit amit,consectetur
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Iman
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--brand">
																	<span class="m-timeline-3__item-time">
																		17:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Lorem ipsum dolor sit consectetur eiusmdd tempor
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Aziko
																			</a>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<!--End::Timeline 3 -->
													</div>
													<div class="tab-pane" id="m_widget2_tab2_content">
														<!--Begin::Timeline 3 -->
														<div class="m-timeline-3">
															<div class="m-timeline-3__items">
																<div class="m-timeline-3__item m-timeline-3__item--info">
																	<span class="m-timeline-3__item-time m--font-focus">
																		09:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Contrary to popular belief, Lorem Ipsum is not simply random text.
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Bob
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--warning">
																	<span class="m-timeline-3__item-time m--font-warning">
																		10:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			There are many variations of passages of Lorem Ipsum available.
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Sean
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--brand">
																	<span class="m-timeline-3__item-time m--font-primary">
																		11:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Contrary to popular belief, Lorem Ipsum is not simply random text.
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By James
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--success">
																	<span class="m-timeline-3__item-time m--font-success">
																		12:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			The standard chunk of Lorem Ipsum used since the 1500s is reproduced.
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By James
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--danger">
																	<span class="m-timeline-3__item-time m--font-warning">
																		14:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Latin words, combined with a handful of model sentence structures.
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Derrick
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--info">
																	<span class="m-timeline-3__item-time m--font-info">
																		15:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Contrary to popular belief, Lorem Ipsum is not simply random text.
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Iman
																			</a>
																		</span>
																	</div>
																</div>
																<div class="m-timeline-3__item m-timeline-3__item--brand">
																	<span class="m-timeline-3__item-time m--font-danger">
																		17:00
																	</span>
																	<div class="m-timeline-3__item-desc">
																		<span class="m-timeline-3__item-text">
																			Lorem Ipsum is therefore always free from repetition, injected humour.
																		</span>
																		<br>
																		<span class="m-timeline-3__item-user-name">
																			<a href="#" class="m-link m-link--metal m-timeline-3__item-link">
																				By Aziko
																			</a>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<!--End::Timeline 3 -->
													</div>
												</div>
											</div>
										</div>
										<!--End::Portlet-->
									</div>
								</div>
								<!--End::Section-->

<!--Begin::Section-->
								<div class="row">
									<div class="col-xl-8">
										<!--begin:: Widgets/Application Sales-->
										<div class="m-portlet m-portlet--full-height  m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															Application Sales
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
																Last Month
															</a>
														</li>
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
																All Time
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="tab-content">
													<div class="tab-pane active" id="m_widget11_tab1_content">
														<!--begin::Widget 11-->
														<div class="m-widget11">
															<div class="table-responsive">
																<!--begin::Table-->
																<table class="table">
																	<!--begin::Thead-->
																	<thead>
																		<tr>
																			<td class="m-widget11__label">
																				#
																			</td>
																			<td class="m-widget11__app">
																				Application
																			</td>
																			<td class="m-widget11__sales">
																				Sales
																			</td>
																			<td class="m-widget11__change">
																				Change
																			</td>
																			<td class="m-widget11__price">
																				Avg Price
																			</td>
																			<td class="m-widget11__total m--align-right">
																				Total
																			</td>
																		</tr>
																	</thead>
																	<!--end::Thead-->

							<!--begin::Tbody-->
																	<tbody>
																		<tr>
																			<td>
																				<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																					<input type="checkbox">
																					<span></span>
																				</label>
																			</td>
																			<td>
																				<span class="m-widget11__title">
																					Vertex 2.0
																				</span>
																				<span class="m-widget11__sub">
																					Vertex To By Again
																				</span>
																			</td>
																			<td>
																				19,200
																			</td>
																			<td>
																				<div class="m-widget11__chart" style="height:50px; width: 100px">
																					<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																					<canvas id="m_chart_sales_by_apps_1_1" style="display: block; width: 100px; height: 50px;" width="100" height="50"></canvas>
																				</div>
																			</td>
																			<td>
																				$63
																			</td>
																			<td class="m--align-right m--font-brand">
																				$14,740
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																					<input type="checkbox">
																					<span></span>
																				</label>
																			</td>
																			<td>
																				<span class="m-widget11__title">
																					Metronic
																				</span>
																				<span class="m-widget11__sub">
																					Powerful Admin Theme
																				</span>
																			</td>
																			<td>
																				24,310
																			</td>
																			<td>
																				<div class="m-widget11__chart" style="height:50px; width: 100px">
																					<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																					<canvas id="m_chart_sales_by_apps_1_2" style="display: block; width: 100px; height: 50px;" width="100" height="50"></canvas>
																				</div>
																			</td>
																			<td>
																				$39
																			</td>
																			<td class="m--align-right m--font-brand">
																				$16,010
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																					<input type="checkbox">
																					<span></span>
																				</label>
																			</td>
																			<td>
																				<span class="m-widget11__title">
																					Apex
																				</span>
																				<span class="m-widget11__sub">
																					The Best Selling App
																				</span>
																			</td>
																			<td>
																				9,076
																			</td>
																			<td>
																				<div class="m-widget11__chart" style="height:50px; width: 100px">
																					<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																					<canvas id="m_chart_sales_by_apps_1_3" style="display: block; width: 100px; height: 50px;" width="100" height="50"></canvas>
																				</div>
																			</td>
																			<td>
																				$105
																			</td>
																			<td class="m--align-right m--font-brand">
																				$37,200
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																					<input type="checkbox">
																					<span></span>
																				</label>
																			</td>
																			<td>
																				<span class="m-widget11__title">
																					Cascades
																				</span>
																				<span class="m-widget11__sub">
																					Design Tool
																				</span>
																			</td>
																			<td>
																				11,094
																			</td>
																			<td>
																				<div class="m-widget11__chart" style="height:50px; width: 100px">
																					<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																					<canvas id="m_chart_sales_by_apps_1_4" style="display: block; width: 100px; height: 50px;" width="100" height="50"></canvas>
																				</div>
																			</td>
																			<td>
																				$16
																			</td>
																			<td class="m--align-right m--font-brand">
																				$8,520
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Tbody-->
																</table>
																<!--end::Table-->
															</div>
															<div class="m-widget11__action m--align-right">
																<button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
																	Generate Report
																</button>
															</div>
														</div>
														<!--end::Widget 11-->
													</div>
													<div class="tab-pane" id="m_widget11_tab2_content">
														<!--begin::Widget 11-->
														<div class="m-widget11">
															<div class="table-responsive">
																<!--begin::Table-->
																<table class="table">
																	<!--begin::Thead-->
																	<thead>
																		<tr>
																			<td class="m-widget11__label">
																				#
																			</td>
																			<td class="m-widget11__app">
																				Application
																			</td>
																			<td class="m-widget11__sales">
																				Sales
																			</td>
																			<td class="m-widget11__change">
																				Change
																			</td>
																			<td class="m-widget11__price">
																				Avg Price
																			</td>
																			<td class="m-widget11__total m--align-right">
																				Total
																			</td>
																		</tr>
																	</thead>
																	<!--end::Thead-->

							<!--begin::Tbody-->
																	<tbody>
																		<tr>
																			<td>
																				<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																					<input type="checkbox">
																					<span></span>
																				</label>
																			</td>
																			<td>
																				<span class="m-widget11__title">
																					Loop
																				</span>
																				<span class="m-widget11__sub">
																					CRM System
																				</span>
																			</td>
																			<td>
																				19,200
																			</td>
																			<td>
																				<div class="m-widget11__chart" style="height:50px; width: 100px">
																					<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																					<canvas id="m_chart_sales_by_apps_2_1" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
																				</div>
																			</td>
																			<td>
																				$63
																			</td>
																			<td class="m--align-right m--font-brand">
																				$34,740
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																					<input type="checkbox">
																					<span></span>
																				</label>
																			</td>
																			<td>
																				<span class="m-widget11__title">
																					Selto
																				</span>
																				<span class="m-widget11__sub">
																					Powerful Website Builder
																				</span>
																			</td>
																			<td>
																				24,310
																			</td>
																			<td>
																				<div class="m-widget11__chart" style="height:50px; width: 100px">
																					<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																					<canvas id="m_chart_sales_by_apps_2_2" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
																				</div>
																			</td>
																			<td>
																				$39
																			</td>
																			<td class="m--align-right m--font-brand">
																				$46,010
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																					<input type="checkbox">
																					<span></span>
																				</label>
																			</td>
																			<td>
																				<span class="m-widget11__title">
																					Jippo
																				</span>
																				<span class="m-widget11__sub">
																					The Best Selling App
																				</span>
																			</td>
																			<td>
																				9,076
																			</td>
																			<td>
																				<div class="m-widget11__chart" style="height:50px; width: 100px">
																					<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																					<canvas id="m_chart_sales_by_apps_2_3" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
																				</div>
																			</td>
																			<td>
																				$105
																			</td>
																			<td class="m--align-right m--font-brand">
																				$67,800
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
																					<input type="checkbox">
																					<span></span>
																				</label>
																			</td>
																			<td>
																				<span class="m-widget11__title">
																					Verto
																				</span>
																				<span class="m-widget11__sub">
																					Web Development Tool
																				</span>
																			</td>
																			<td>
																				11,094
																			</td>
																			<td>
																				<div class="m-widget11__chart" style="height:50px; width: 100px">
																					<iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
																					<canvas id="m_chart_sales_by_apps_2_4" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
																				</div>
																			</td>
																			<td>
																				$16
																			</td>
																			<td class="m--align-right m--font-brand">
																				$18,520
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Tbody-->
																</table>
																<!--end::Table-->
															</div>
															<div class="m-widget11__action m--align-right">
																<button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
																	Generate Report
																</button>
															</div>
														</div>
														<!--end::Widget 11-->
													</div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Application Sales-->
									</div>
									<div class="col-xl-4">
										<!--begin:: Widgets/Latest Updates-->
										<div class="m-portlet m-portlet--full-height m-portlet--fit  m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															Latest Updates
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="m-portlet__nav">
														<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
															<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
																Today
															</a>
															<div class="m-dropdown__wrapper">
																<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
																<div class="m-dropdown__inner">
																	<div class="m-dropdown__body">
																		<div class="m-dropdown__content">
																			<ul class="m-nav">
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-share"></i>
																						<span class="m-nav__link-text">
																							Activity
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-chat-1"></i>
																						<span class="m-nav__link-text">
																							Messages
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-info"></i>
																						<span class="m-nav__link-text">
																							FAQ
																						</span>
																					</a>
																				</li>
																				<li class="m-nav__item">
																					<a href="" class="m-nav__link">
																						<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																						<span class="m-nav__link-text">
																							Support
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="m-widget4 m-widget4--chart-bottom" style="min-height: 350px">
													<div class="m-widget4__item">
														<div class="m-widget4__ext">
															<a href="#" class="m-widget4__icon m--font-brand">
																<i class="flaticon-interface-3"></i>
															</a>
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__text">
																Make Metronic Great Again
															</span>
														</div>
														<div class="m-widget4__ext">
															<span class="m-widget4__number m--font-accent">
																+500
															</span>
														</div>
													</div>
													<div class="m-widget4__item">
														<div class="m-widget4__ext">
															<a href="#" class="m-widget4__icon m--font-brand">
																<i class="flaticon-folder-4"></i>
															</a>
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__text">
																Green Maker Team
															</span>
														</div>
														<div class="m-widget4__ext">
															<span class="m-widget4__stats m--font-info">
																<span class="m-widget4__number m--font-accent">
																	-64
																</span>
															</span>
														</div>
													</div>
													<div class="m-widget4__item">
														<div class="m-widget4__ext">
															<a href="#" class="m-widget4__icon m--font-brand">
																<i class="flaticon-line-graph"></i>
															</a>
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__text">
																Make Apex Great Again
															</span>
														</div>
														<div class="m-widget4__ext">
															<span class="m-widget4__stats m--font-info">
																<span class="m-widget4__number m--font-accent">
																	+1080
																</span>
															</span>
														</div>
													</div>
													<div class="m-widget4__item m-widget4__item--last">
														<div class="m-widget4__ext">
															<a href="#" class="m-widget4__icon m--font-brand">
																<i class="flaticon-diagram"></i>
															</a>
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__text">
																A Programming Language
															</span>
														</div>
														<div class="m-widget4__ext">
															<span class="m-widget4__stats m--font-info">
																<span class="m-widget4__number m--font-accent">
																	+19
																</span>
															</span>
														</div>
													</div>
													<div class="m-widget4__chart m-portlet-fit--sides m--margin-top-20 m-portlet-fit--bottom1" style="height:120px;">
														<canvas id="m_chart_latest_updates"></canvas>
													</div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Latest Updates-->
									</div>
								</div>
								<!--End::Section-->

<!--Begin::Section-->
								<div class="row">
									<div class="col-xl-4">
										<!--begin:: Widgets/Audit Log-->
										<div class="m-portlet m-portlet--full-height  m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															Audit Log
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
																Today
															</a>
														</li>
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab2_content" role="tab">
																Week
															</a>
														</li>
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab3_content" role="tab">
																Month
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<div class="tab-content">
													<div class="tab-pane active" id="m_widget4_tab1_content">
														<div class="m-scrollable" data-scrollable="true" data-max-height="400" style="height: 400px; overflow: hidden;">
															<div class="m-list-timeline m-list-timeline--skin-light">
																<div class="m-list-timeline__items">
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																		<span class="m-list-timeline__text">
																			12 new users registered
																		</span>
																		<span class="m-list-timeline__time">
																			Just now
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
																		<span class="m-list-timeline__text">
																			System shutdown
																			<span class="m-badge m-badge--success m-badge--wide">
																				pending
																			</span>
																		</span>
																		<span class="m-list-timeline__time">
																			14 mins
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
																		<span class="m-list-timeline__text">
																			New invoice received
																		</span>
																		<span class="m-list-timeline__time">
																			20 mins
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
																		<span class="m-list-timeline__text">
																			DB overloaded 80%
																			<span class="m-badge m-badge--info m-badge--wide">
																				settled
																			</span>
																		</span>
																		<span class="m-list-timeline__time">
																			1 hr
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
																		<span class="m-list-timeline__text">
																			System error -
																			<a href="#" class="m-link">
																				Check
																			</a>
																		</span>
																		<span class="m-list-timeline__time">
																			2 hrs
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
																		<span class="m-list-timeline__text">
																			Production server down
																		</span>
																		<span class="m-list-timeline__time">
																			3 hrs
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
																		<span class="m-list-timeline__text">
																			Production server up
																		</span>
																		<span class="m-list-timeline__time">
																			5 hrs
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																		<span href="" class="m-list-timeline__text">
																			New order received
																			<span class="m-badge m-badge--danger m-badge--wide">
																				urgent
																			</span>
																		</span>
																		<span class="m-list-timeline__time">
																			7 hrs
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																		<span class="m-list-timeline__text">
																			12 new users registered
																		</span>
																		<span class="m-list-timeline__time">
																			Just now
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
																		<span class="m-list-timeline__text">
																			System shutdown
																			<span class="m-badge m-badge--success m-badge--wide">
																				pending
																			</span>
																		</span>
																		<span class="m-list-timeline__time">
																			14 mins
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
																		<span class="m-list-timeline__text">
																			New invoice received
																		</span>
																		<span class="m-list-timeline__time">
																			20 mins
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
																		<span class="m-list-timeline__text">
																			DB overloaded 80%
																			<span class="m-badge m-badge--info m-badge--wide">
																				settled
																			</span>
																		</span>
																		<span class="m-list-timeline__time">
																			1 hr
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
																		<span class="m-list-timeline__text">
																			New invoice received
																		</span>
																		<span class="m-list-timeline__time">
																			20 mins
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
																		<span class="m-list-timeline__text">
																			DB overloaded 80%
																			<span class="m-badge m-badge--info m-badge--wide">
																				settled
																			</span>
																		</span>
																		<span class="m-list-timeline__time">
																			1 hr
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
																		<span class="m-list-timeline__text">
																			System error -
																			<a href="#" class="m-link">
																				Check
																			</a>
																		</span>
																		<span class="m-list-timeline__time">
																			2 hrs
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
																		<span class="m-list-timeline__text">
																			Production server down
																		</span>
																		<span class="m-list-timeline__time">
																			3 hrs
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
																		<span class="m-list-timeline__text">
																			Production server up
																		</span>
																		<span class="m-list-timeline__time">
																			5 hrs
																		</span>
																	</div>
																	<div class="m-list-timeline__item">
																		<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																		<span href="" class="m-list-timeline__text">
																			New order received
																			<span class="m-badge m-badge--danger m-badge--wide">
																				urgent
																			</span>
																		</span>
																		<span class="m-list-timeline__time">
																			7 hrs
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="m_widget4_tab2_content"></div>
													<div class="tab-pane" id="m_widget4_tab3_content"></div>
												</div>
											</div>
										</div>
										<!--end:: Widgets/Audit Log-->
									</div>
									<div class="col-xl-8">
										<div class="m-portlet m-portlet--mobile  m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<h3 class="m-portlet__head-text">
															Exclusive Datatable Plugin
														</h3>
													</div>
												</div>
												<div class="m-portlet__head-tools">
													<ul class="m-portlet__nav">
														<li class="m-portlet__nav-item">
															<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
																<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
																	<i class="la la-ellipsis-h m--font-brand"></i>
																</a>
																<div class="m-dropdown__wrapper">
																	<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
																	<div class="m-dropdown__inner">
																		<div class="m-dropdown__body">
																			<div class="m-dropdown__content">
																				<ul class="m-nav">
																					<li class="m-nav__section m-nav__section--first">
																						<span class="m-nav__section-text">
																							Quick Actions
																						</span>
																					</li>
																					<li class="m-nav__item">
																						<a href="" class="m-nav__link">
																							<i class="m-nav__link-icon flaticon-share"></i>
																							<span class="m-nav__link-text">
																								Create Post
																							</span>
																						</a>
																					</li>
																					<li class="m-nav__item">
																						<a href="" class="m-nav__link">
																							<i class="m-nav__link-icon flaticon-chat-1"></i>
																							<span class="m-nav__link-text">
																								Send Messages
																							</span>
																						</a>
																					</li>
																					<li class="m-nav__item">
																						<a href="" class="m-nav__link">
																							<i class="m-nav__link-icon flaticon-multimedia-2"></i>
																							<span class="m-nav__link-text">
																								Upload File
																							</span>
																						</a>
																					</li>
																					<li class="m-nav__section">
																						<span class="m-nav__section-text">
																							Useful Links
																						</span>
																					</li>
																					<li class="m-nav__item">
																						<a href="" class="m-nav__link">
																							<i class="m-nav__link-icon flaticon-info"></i>
																							<span class="m-nav__link-text">
																								FAQ
																							</span>
																						</a>
																					</li>
																					<li class="m-nav__item">
																						<a href="" class="m-nav__link">
																							<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																							<span class="m-nav__link-text">
																								Support
																							</span>
																						</a>
																					</li>
																					<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
																					<li class="m-nav__item m--hide">
																						<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
																							Submit
																						</a>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="m-portlet__body">
												<!--begin: Datatable -->
												<div class="m_datatable" id="m_datatable_latest_orders"></div>
												<!--end: Datatable -->
											</div>
										</div>
									</div>
								</div>
								<!--End::Section-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- begin::Body -->