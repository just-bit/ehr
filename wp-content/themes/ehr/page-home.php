<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<main class="main">
	<div class="section section-main">
		<img src="<?= get_template_directory_uri() ?>/images/bg-main.png" loading="lazy" alt="">
		<div class="main-top">
			<div class="container">
				<div class="main-top__container">
            <?php $main = get_field('main'); ?>
            <?php if (!empty($main['title'])): ?>
							<h1> <?= $main['title'] ?></h1>
            <?php endif; ?>
            <?php if (!empty($main['description'])): ?>
							<div class="main-top__description"><?= $main['description'] ?></div>
            <?php endif; ?>
            <?php $main_tags = $main['tags'] ?>
            <?php if (!empty($main_tags)): ?>
							<ul class="main-top__tags">
                  <?php if (!empty($main_tags)) { ?>
                      <?php foreach ($main_tags as $item) { ?>
                          <?php if (!empty($item['name'])): ?>
												<li>
                            <?= $item['icon'] ?>
                            <?= $item['name'] ?>
												</li>
                          <?php endif; ?>
                      <?php } ?>
                  <?php } ?>
							</ul>
            <?php endif; ?>
					<a href="<?= $main['button']['url'] ?>" class="btn"><?= $main['button']['title'] ?></a>
				</div>
			</div>
		</div>
		<div class="main-marquee">
			<div class="main-marquee__inner">
          <?php $marquee = get_field('marquee'); ?>
          <?php if (!empty($marquee)) { ?>
              <?php foreach (range(1, 3) as $i) { ?>
                  <?php foreach ($marquee as $item) { ?>
                      <?php if (!empty($item)): ?>
                          <?php $marquee_row_1 = $item['row_1'] ?>
									<div class="slide">
										<div class="slide-variation-01">
                        <?php $marquee_row_text_1 = $marquee_row_1['text'] ?>
											<div class="num-block">
                          <?php if (!empty($marquee_row_text_1['text_1'])): ?>
														<span><?= $marquee_row_text_1['text_1'] ?></span>
                          <?php endif; ?>
                          <?php if (!empty($marquee_row_text_1['text_2'])): ?>
														<small><?= $marquee_row_text_1['text_2'] ?></small>
                          <?php endif; ?>
											</div>
                        <?php if (!empty($marquee_row_1['image'])): ?>
													<div class="pic-block">
														<img src="<?= $marquee_row_1['image'] ?>" loading="lazy" alt="">
													</div>
                        <?php endif; ?>
										</div>
									</div>
                          <?php $marquee_row_2 = $item['row_2'] ?>
									<div class="slide">
										<div class="slide-variation-02">
                        <?php if (!empty($marquee_row_2['image'])): ?>
													<div class="pic-block">
														<img src="<?= $marquee_row_2['image'] ?>" loading="lazy" alt="">
													</div>
                        <?php endif; ?>
										</div>
									</div>
                          <?php $marquee_row_3 = $item['row_3'] ?>
									<div class="slide">
										<div class="slide-variation-03">
											<div class="col">
												<div class="num-block">
													<span><?= $marquee_row_3['text_1']['text_1'] ?></span>
													<small><?= $marquee_row_3['text_1']['text_2'] ?></small>
												</div>
											</div>
											<div class="col">
                          <?php if (!empty($marquee_row_3['image'])): ?>
														<div class="pic-block">
															<img src="<?= $marquee_row_3['image'] ?>" loading="lazy" alt="">
														</div>
                          <?php endif; ?>
											</div>
											<div class="col">
												<div class="num-block">
													<span><?= $marquee_row_3['text_2']['text_1'] ?></span>
													<small><?= $marquee_row_3['text_2']['text_2'] ?></small>
												</div>
											</div>
											<div class="col">
												<div class="num-block">
													<span><?= $marquee_row_3['text_3']['text_1'] ?></span>
													<small><?= $marquee_row_3['text_3']['text_2'] ?></small>
												</div>
											</div>
										</div>
									</div>
                          <?php $marquee_row_4 = $item['row_4'] ?>
									<div class="slide">
										<div class="slide-variation-04">
											<div class="logo-block">
                          <?php if (!empty($marquee_row_4['logo'])): ?>
                              <?= $marquee_row_4['logo'] ?>
                          <?php endif; ?>
                          <?php if (!empty($marquee_row_4['logo_mobile'])): ?>
														<img src=" <?= $marquee_row_4['logo_mobile'] ?>" loading="lazy" alt="">
                          <?php endif; ?>
											</div>
                        <?php if (!empty($marquee_row_4['image'])): ?>
													<div class="pic-block">
														<img src="<?= $marquee_row_4['image'] ?>" loading="lazy" alt="">
													</div>
                        <?php endif; ?>
										</div>
									</div>
                          <?php $marquee_row_5 = $item['row_5'] ?>
									<div class="slide">
										<div class="slide-variation-05">
                        <?php if (!empty($marquee_row_5['image'])): ?>
													<div class="pic-block">
														<img src="<?= $marquee_row_5['image'] ?>" loading="lazy" alt="">
													</div>
                        <?php endif; ?>
											<div class="num-block">
												<span><?= $marquee_row_5['text']['text_1'] ?></span>
												<small><?= $marquee_row_5['text']['text_2'] ?></small>
											</div>
										</div>
									</div>
                      <?php endif; ?>
                  <?php } ?>
              <?php } ?>
          <?php } ?>
			</div>
		</div>
	</div>
	<div class="section section-ete">
		<div class="container">
        <?php $end_to_end = get_field('end_to_end'); ?>
			<div class="section-title"><?= $end_to_end['title'] ?></div>
			<div class="section-description"><?= $end_to_end['description'] ?></div>
        <?php $end_to_end_list = $end_to_end['list'] ?>
        <?php if (!empty($end_to_end_list)) { ?>
					<div class="row ete-wrapper">
              <?php foreach ($end_to_end_list as $item) { ?>
                  <?php if (!empty($item)): ?>
									<div class="col<?= $item['width'] == '50%' ? '-md-6' : ($item['width'] == '33%' ? '-md-4' : '-12') ?>">
										<a href="<?= $item['link'] ?>" class="ete-item">
											<div class="ete-item__title">
                          <?= $item['title'] ?>
												<i><?= $item['icon'] ?></i>
											</div>
											<div class="ete-item__description"><?= $item['description'] ?></div>
											<ul class="ete-item__tags">
                          <?php $item_tags = $item['tags'] ?>
                          <?php foreach ($item_tags as $item1) { ?>
                              <?php if ($item1['value'] == 'Automation'): ?>
															<li class="automation">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
																     fill="none">
																	<path
																		d="M8.60417 3.5975C8.95917 2.13417 11.0408 2.13417 11.3958 3.5975C11.4491 3.81733 11.5535 4.02148 11.7006 4.19333C11.8477 4.36518 12.0332 4.49988 12.2422 4.58645C12.4512 4.67303 12.6776 4.70904 12.9032 4.69156C13.1287 4.67407 13.3469 4.60359 13.54 4.48583C14.8258 3.7025 16.2983 5.17417 15.515 6.46083C15.3974 6.65388 15.327 6.87195 15.3096 7.09731C15.2922 7.32267 15.3281 7.54897 15.4146 7.75782C15.5011 7.96666 15.6356 8.15215 15.8073 8.29921C15.9789 8.44627 16.1829 8.55075 16.4025 8.60417C17.8658 8.95917 17.8658 11.0408 16.4025 11.3958C16.1827 11.4491 15.9785 11.5535 15.8067 11.7006C15.6348 11.8477 15.5001 12.0332 15.4135 12.2422C15.327 12.4512 15.291 12.6776 15.3084 12.9032C15.3259 13.1287 15.3964 13.3469 15.5142 13.54C16.2975 14.8258 14.8258 16.2983 13.5392 15.515C13.3461 15.3974 13.1281 15.327 12.9027 15.3096C12.6773 15.2922 12.451 15.3281 12.2422 15.4146C12.0333 15.5011 11.8479 15.6356 11.7008 15.8073C11.5537 15.9789 11.4492 16.1829 11.3958 16.4025C11.0408 17.8658 8.95917 17.8658 8.60417 16.4025C8.5509 16.1827 8.44648 15.9785 8.29941 15.8067C8.15233 15.6348 7.96676 15.5001 7.75779 15.4135C7.54882 15.327 7.32236 15.291 7.09685 15.3084C6.87133 15.3259 6.65313 15.3964 6.46 15.5142C5.17417 16.2975 3.70167 14.8258 4.485 13.5392C4.60258 13.3461 4.67296 13.1281 4.6904 12.9027C4.70785 12.6773 4.67187 12.451 4.58539 12.2422C4.49892 12.0333 4.36438 11.8479 4.19273 11.7008C4.02107 11.5537 3.81714 11.4492 3.5975 11.3958C2.13417 11.0408 2.13417 8.95917 3.5975 8.60417C3.81733 8.5509 4.02148 8.44648 4.19333 8.29941C4.36518 8.15233 4.49988 7.96676 4.58645 7.75779C4.67303 7.54882 4.70904 7.32236 4.69156 7.09685C4.67407 6.87133 4.60359 6.65313 4.48583 6.46C3.7025 5.17417 5.17417 3.70167 6.46083 4.485C7.29417 4.99167 8.37417 4.54333 8.60417 3.5975Z"
																		stroke="white" stroke-width="1.25" stroke-linecap="round"
																		stroke-linejoin="round"/>
																	<path
																		d="M7.5 10C7.5 10.663 7.76339 11.2989 8.23223 11.7678C8.70107 12.2366 9.33696 12.5 10 12.5C10.663 12.5 11.2989 12.2366 11.7678 11.7678C12.2366 11.2989 12.5 10.663 12.5 10C12.5 9.33696 12.2366 8.70107 11.7678 8.23223C11.2989 7.76339 10.663 7.5 10 7.5C9.33696 7.5 8.70107 7.76339 8.23223 8.23223C7.76339 8.70107 7.5 9.33696 7.5 10Z"
																		stroke="white" stroke-width="1.25" stroke-linecap="round"
																		stroke-linejoin="round"/>
																</svg>
																Automation
															</li>
                              <?php endif; ?>
                              <?php if ($item1['value'] == 'AI Tools'): ?>
															<li class="ai">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
																     fill="none">
																	<path
																		d="M5 4.99967C5 4.55765 5.17559 4.13372 5.48816 3.82116C5.80072 3.5086 6.22464 3.33301 6.66667 3.33301H13.3333C13.7754 3.33301 14.1993 3.5086 14.5118 3.82116C14.8244 4.13372 15 4.55765 15 4.99967V8.33301C15 8.77503 14.8244 9.19896 14.5118 9.51152C14.1993 9.82408 13.7754 9.99967 13.3333 9.99967H6.66667C6.22464 9.99967 5.80072 9.82408 5.48816 9.51152C5.17559 9.19896 5 8.77503 5 8.33301V4.99967Z"
																		stroke="white" stroke-width="1.25" stroke-linecap="round"
																		stroke-linejoin="round"/>
																	<path d="M10 1.66699V3.33366" stroke="white" stroke-width="1.25"
																	      stroke-linecap="round" stroke-linejoin="round"/>
																	<path d="M7.5 10V17.5" stroke="white" stroke-width="1.25" stroke-linecap="round"
																	      stroke-linejoin="round"/>
																	<path d="M12.5 10V17.5" stroke="white" stroke-width="1.25" stroke-linecap="round"
																	      stroke-linejoin="round"/>
																	<path d="M4.1665 13.3337L7.49984 11.667" stroke="white" stroke-width="1.25"
																	      stroke-linecap="round" stroke-linejoin="round"/>
																	<path d="M12.5 11.667L15.8333 13.3337" stroke="white" stroke-width="1.25"
																	      stroke-linecap="round" stroke-linejoin="round"/>
																	<path d="M7.5 15H12.5" stroke="white" stroke-width="1.25" stroke-linecap="round"
																	      stroke-linejoin="round"/>
																	<path d="M8.3335 6.66699V6.67366" stroke="white" stroke-width="1.25"
																	      stroke-linecap="round" stroke-linejoin="round"/>
																	<path d="M11.6665 6.66699V6.67366" stroke="white" stroke-width="1.25"
																	      stroke-linecap="round" stroke-linejoin="round"/>
																</svg>
																AI Tools
															</li>
                              <?php endif; ?>
                          <?php } ?>
											</ul>
										</a>
									</div>
                  <?php endif; ?>
              <?php } ?>
					</div>
        <?php } ?>

        <?php $accordion = get_field('accordion'); ?>
			<ul class="ete-accordion">
          <?php if (!empty($accordion)) { ?>
              <?php foreach ($accordion as $i => $item) { ?>
                  <?php if (!empty($item)): ?>
								<li class="accordion-item<?= $i == 0 ? ' active' : '' ?>">
									<div class="accordion-item__head">
                      <?php if (!empty($item['icon'])): ?>
												<i><?= $item['icon'] ?></i>
                      <?php endif; ?>
                      <?php if (!empty($item['title'])): ?>
												<div><?= $item['title'] ?></div>
                      <?php endif; ?>
										<span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.209209 0.183059C0.488155 -0.061019 0.940416 -0.061019 1.21936 0.183059L5 3.49112L8.78064 0.183058C9.05958 -0.0610193 9.51184 -0.0610194 9.79079 0.183058C10.0697 0.427136 10.0697 0.822864 9.79079 1.06694L5.50508 4.81694C5.22613 5.06102 4.77387 5.06102 4.49492 4.81694L0.209209 1.06694C-0.0697367 0.822865 -0.0697367 0.427136 0.209209 0.183059Z"
                                      fill="#383838"/>
                            </svg>
                        </span>
									</div>
                    <?php if (!empty($item['text'])): ?>
											<div class="accordion-item__body" <?= $i != 0 ? ' style="display:none;"' : '' ?>><?= $item['text'] ?></div>
                    <?php endif; ?>
								</li>
                  <?php endif; ?>
              <?php } ?>
          <?php } ?>
			</ul>

			<div class="ete-logos">
          <?php $logos = get_field('logos'); ?>
          <?php if (!empty($logos['title'])): ?>
						<div class="ete-logos__title"><?= $logos['title'] ?></div>
          <?php endif; ?>
				<div class="ete-logos__wrapper">
            <?php if (!empty($logos['gallery'])) { ?>
							<div class="ete-logos__slider slick-slider"
							     data-slick='{"speed": 6000, "autoplay": true, "autoplaySpeed": 0, "centerMode": true, "cssEase": "linear", "slidesToShow": 1, "slidesToScroll": 1, "variableWidth": true, "infinite": true, "initialSlide": 1, "arrows": false, "buttons": false}'>
                  <?php foreach ($logos['gallery'] as $item) { ?>
                      <?php if (!empty($item['url'])): ?>
											<div class="slide">
												<img src="<?= $item['url'] ?>" loading="lazy" alt="">
											</div>
                      <?php endif; ?>
                  <?php } ?>
							</div>
            <?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="section section-settings">
		<div class="container">
			<div class="section-title">Built for Every Care Setting</div>
			<div class="row settings-wrapper">
				<div class="col-md-6">
					<div class="settings-item">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
							     fill="none">
								<path
									d="M6.6665 13.3337V10.0003C6.6665 9.11627 7.01769 8.26842 7.64281 7.6433C8.26794 7.01818 9.11578 6.66699 9.99984 6.66699H13.3332"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M6.6665 26.667V30.0003C6.6665 30.8844 7.01769 31.7322 7.64281 32.3573C8.26794 32.9825 9.11578 33.3337 9.99984 33.3337H13.3332"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M26.6665 6.66699H29.9998C30.8839 6.66699 31.7317 7.01818 32.3569 7.6433C32.982 8.26842 33.3332 9.11627 33.3332 10.0003V13.3337"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M26.6665 33.3337H29.9998C30.8839 33.3337 31.7317 32.9825 32.3569 32.3573C32.982 31.7322 33.3332 30.8844 33.3332 30.0003V26.667"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M14.3385 16.0166C14.655 15.6941 15.0327 15.4379 15.4493 15.263C15.866 15.0881 16.3133 14.998 16.7652 14.998C17.2171 14.998 17.6644 15.0881 18.0811 15.263C18.4977 15.4379 18.8754 15.6941 19.1919 16.0166L20.0002 16.6666L20.8335 16.0066C21.1498 15.6876 21.5263 15.4347 21.9411 15.2624C22.356 15.0901 22.8009 15.0019 23.2501 15.003C23.6993 15.0041 24.1438 15.0944 24.5578 15.2687C24.9719 15.443 25.3471 15.6978 25.6619 16.0183C26.3061 16.674 26.667 17.5565 26.667 18.4758C26.667 19.395 26.3061 20.2775 25.6619 20.9333L20.0002 26.6666L14.3385 20.9333C13.6938 20.2774 13.3325 19.3946 13.3325 18.4749C13.3325 17.5553 13.6938 16.6724 14.3385 16.0166Z"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</i>
						<span>Behavioral Health Organizations</span>
						<ul>
							<li>Outpatient mental health clinics</li>
							<li>Psychiatry and psychology practices</li>
							<li>Community mental health centers (CMHCs)</li>
							<li>Certified Community Behavioral Health Clinics (CCBHCs)</li>
							<li>Counseling and therapy group practices</li>
							<li>Telepsychiatry providers</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="settings-item">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
							     fill="none">
								<path
									d="M17.4915 10.8415L20.8249 7.50813C22.3773 5.98677 24.4674 5.13952 26.6409 5.1505C28.8145 5.16147 30.8959 6.02979 32.4329 7.56676C33.9699 9.10373 34.8382 11.1852 34.8492 13.3587C34.8601 15.5323 34.0129 17.6224 32.4915 19.1748L29.1582 22.5081M25.8249 25.8415L19.1582 32.5081C17.6058 34.0295 15.5157 34.8767 13.3421 34.8658C11.1685 34.8548 9.08713 33.9865 7.55016 32.4495C6.01319 30.9125 5.14487 28.8311 5.13389 26.6575C5.12292 24.484 5.97017 22.3939 7.49153 20.8415L14.1582 14.1748"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M14.1665 14.167L25.8332 25.8337" stroke="#0A5BB8" stroke-width="2"
								      stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M5 5L35 35" stroke="#0A5BB8" stroke-width="2" stroke-linecap="round"
								      stroke-linejoin="round"/>
							</svg>
						</i>
						<span>Addiction Treatment Facilities</span>
						<ul>
							<li>Substance abuse treatment centers</li>
							<li>Residential treatment programs</li>
							<li>Intensive Outpatient Programs (IOP)</li>
							<li>Partial Hospitalization Programs (PHP)</li>
							<li>Medication-Assisted Treatment (MAT) clinics</li>
							<li>Detox and withdrawal management centers</li>
							<li>Sober living facilities</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="settings-item">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
							     fill="none">
								<path
									d="M21.6669 5C22.1089 5 22.5329 5.17559 22.8454 5.48816C23.158 5.80072 23.3336 6.22464 23.3336 6.66667V14.225L29.8802 10.4467C30.263 10.2257 30.7179 10.1658 31.1449 10.2802C31.5719 10.3946 31.9359 10.6739 32.1569 11.0567L33.8236 13.9433C34.0446 14.3261 34.1045 14.781 33.9901 15.208C33.8757 15.635 33.5964 15.999 33.2136 16.22L26.6686 20L33.2136 23.7817C33.5964 24.0027 33.8757 24.3667 33.9901 24.7937C34.1045 25.2206 34.0446 25.6755 33.8236 26.0583L32.1569 28.945C31.9359 29.3278 31.5719 29.6071 31.1449 29.7215C30.7179 29.8359 30.263 29.776 29.8802 29.555L23.3336 25.7733V33.3333C23.3336 33.7754 23.158 34.1993 22.8454 34.5118C22.5329 34.8244 22.1089 35 21.6669 35H18.3336C17.8915 35 17.4676 34.8244 17.1551 34.5118C16.8425 34.1993 16.6669 33.7754 16.6669 33.3333V25.7733L10.1202 29.5533C9.73744 29.7743 9.28252 29.8342 8.85557 29.7198C8.42861 29.6054 8.06459 29.3261 7.84357 28.9433L6.1769 26.0567C5.9559 25.6739 5.89601 25.219 6.0104 24.792C6.1248 24.365 6.40411 24.001 6.7869 23.78L13.3319 20L6.7869 16.22C6.40411 15.999 6.1248 15.635 6.0104 15.208C5.89601 14.781 5.9559 14.3261 6.1769 13.9433L7.84357 11.0567C8.06459 10.6739 8.42861 10.3946 8.85557 10.2802C9.28252 10.1658 9.73744 10.2257 10.1202 10.4467L16.6669 14.225V6.66667C16.6669 6.22464 16.8425 5.80072 17.1551 5.48816C17.4676 5.17559 17.8915 5 18.3336 5H21.6669Z"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</i>
						<span>Medical & Integrated Care</span>
						<ul>
							<li>Primary care practices with behavioral health integration</li>
							<li>Federally Qualified Health Centers (FQHCs)</li>
							<li>Internal medicine practices</li>
							<li>Family medicine clinics</li>
							<li>Pediatric practices with behavioral health</li>
							<li>Hospital outpatient departments</li>
							<li>Multi-specialty medical groups</li>
							<li>School-based health centers</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="settings-item">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
							     fill="none">
								<path d="M5 35H35" stroke="#0A5BB8" stroke-width="2" stroke-linecap="round"
								      stroke-linejoin="round"/>
								<path
									d="M8.3335 35V8.33333C8.3335 7.44928 8.68469 6.60143 9.30981 5.97631C9.93493 5.35119 10.7828 5 11.6668 5H28.3335C29.2176 5 30.0654 5.35119 30.6905 5.97631C31.3156 6.60143 31.6668 7.44928 31.6668 8.33333V35"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M15 35V28.3333C15 27.4493 15.3512 26.6014 15.9763 25.9763C16.6014 25.3512 17.4493 25 18.3333 25H21.6667C22.5507 25 23.3986 25.3512 24.0237 25.9763C24.6488 26.6014 25 27.4493 25 28.3333V35"
									stroke="#0A5BB8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M16.6665 15H23.3332" stroke="#0A5BB8" stroke-width="2" stroke-linecap="round"
								      stroke-linejoin="round"/>
								<path d="M20 11.667V18.3337" stroke="#0A5BB8" stroke-width="2" stroke-linecap="round"
								      stroke-linejoin="round"/>
							</svg>
						</i>
						<span>Residential & Inpatient Facilities</span>
						<ul>
							<li>Psychiatric hospitals</li>
							<li>Medical hospitals with psychiatric units</li>
							<li>Residential treatment centers (RTC)</li>
							<li>Group homes</li>
							<li>Crisis stabilization units</li>
							<li>Acute inpatient psychiatric units</li>
							<li>Long-term care facilities with behavioral health</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section section-approach">
		<div class="container">
			<div class="section-title">Our Differentiated Approach</div>
			<div class="section-description">Purpose-built flexibility meets enterprise-grade reliability</div>
			<div class="row approach-wrapper">
				<div class="col-md-6">
					<div class="approach-item">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
							     fill="none">
								<path
									d="M17.2083 7.195C17.9183 4.26833 22.0817 4.26833 22.7917 7.195C22.8982 7.63467 23.107 8.04296 23.4012 8.38667C23.6953 8.73037 24.0665 8.99976 24.4844 9.17291C24.9024 9.34606 25.3553 9.41808 25.8063 9.38311C26.2573 9.34814 26.6937 9.20717 27.08 8.97167C29.6517 7.405 32.5967 10.3483 31.03 12.9217C30.7948 13.3078 30.6541 13.7439 30.6192 14.1946C30.5843 14.6453 30.6563 15.0979 30.8292 15.5156C31.0022 15.9333 31.2712 16.3043 31.6145 16.5984C31.9579 16.8925 32.3657 17.1015 32.805 17.2083C35.7317 17.9183 35.7317 22.0817 32.805 22.7917C32.3653 22.8982 31.957 23.107 31.6133 23.4012C31.2696 23.6953 31.0002 24.0665 30.8271 24.4844C30.6539 24.9024 30.5819 25.3553 30.6169 25.8063C30.6519 26.2573 30.7928 26.6937 31.0283 27.08C32.595 29.6517 29.6517 32.5967 27.0783 31.03C26.6922 30.7948 26.2561 30.6541 25.8054 30.6192C25.3547 30.5843 24.9021 30.6563 24.4844 30.8292C24.0667 31.0022 23.6957 31.2712 23.4016 31.6145C23.1075 31.9579 22.8985 32.3657 22.7917 32.805C22.0817 35.7317 17.9183 35.7317 17.2083 32.805C17.1018 32.3653 16.893 31.957 16.5988 31.6133C16.3047 31.2696 15.9335 31.0002 15.5156 30.8271C15.0976 30.6539 14.6447 30.5819 14.1937 30.6169C13.7427 30.6519 13.3063 30.7928 12.92 31.0283C10.3483 32.595 7.40333 29.6517 8.97 27.0783C9.20517 26.6922 9.34592 26.2561 9.38081 25.8054C9.41569 25.3547 9.34374 24.9021 9.17079 24.4844C8.99783 24.0667 8.72877 23.6957 8.38545 23.4016C8.04214 23.1075 7.63427 22.8985 7.195 22.7917C4.26833 22.0817 4.26833 17.9183 7.195 17.2083C7.63467 17.1018 8.04296 16.893 8.38667 16.5988C8.73037 16.3047 8.99976 15.9335 9.17291 15.5156C9.34606 15.0976 9.41808 14.6447 9.38311 14.1937C9.34814 13.7427 9.20717 13.3063 8.97167 12.92C7.405 10.3483 10.3483 7.40333 12.9217 8.97C14.5883 9.98333 16.7483 9.08667 17.2083 7.195Z"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M15 20C15 21.3261 15.5268 22.5979 16.4645 23.5355C17.4021 24.4732 18.6739 25 20 25C21.3261 25 22.5979 24.4732 23.5355 23.5355C24.4732 22.5979 25 21.3261 25 20C25 18.6739 24.4732 17.4021 23.5355 16.4645C22.5979 15.5268 21.3261 15 20 15C18.6739 15 17.4021 15.5268 16.4645 16.4645C15.5268 17.4021 15 18.6739 15 20Z"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</i>
						<span>Deeply Configurable for Behavioral Health</span>
						<div>250+ behavioral health organizations trust our platform because it adapts to their
							workflows—not the other way around. Configure everything from clinical forms to billing
							rules, form forwarding to compliance holds. Our team can also build custom automation rules
							specific to your practice's unique needs.
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="approach-item">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
							     fill="none">
								<path
									d="M6.6665 8.33366C6.6665 7.89163 6.8421 7.46771 7.15466 7.15515C7.46722 6.84259 7.89114 6.66699 8.33317 6.66699H14.9998C15.4419 6.66699 15.8658 6.84259 16.1783 7.15515C16.4909 7.46771 16.6665 7.89163 16.6665 8.33366V15.0003C16.6665 15.4424 16.4909 15.8663 16.1783 16.1788C15.8658 16.4914 15.4419 16.667 14.9998 16.667H8.33317C7.89114 16.667 7.46722 16.4914 7.15466 16.1788C6.8421 15.8663 6.6665 15.4424 6.6665 15.0003V8.33366Z"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M23.3335 8.33366C23.3335 7.89163 23.5091 7.46771 23.8217 7.15515C24.1342 6.84259 24.5581 6.66699 25.0002 6.66699H31.6668C32.1089 6.66699 32.5328 6.84259 32.8453 7.15515C33.1579 7.46771 33.3335 7.89163 33.3335 8.33366V15.0003C33.3335 15.4424 33.1579 15.8663 32.8453 16.1788C32.5328 16.4914 32.1089 16.667 31.6668 16.667H25.0002C24.5581 16.667 24.1342 16.4914 23.8217 16.1788C23.5091 15.8663 23.3335 15.4424 23.3335 15.0003V8.33366Z"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M6.6665 24.9997C6.6665 24.5576 6.8421 24.1337 7.15466 23.8212C7.46722 23.5086 7.89114 23.333 8.33317 23.333H14.9998C15.4419 23.333 15.8658 23.5086 16.1783 23.8212C16.4909 24.1337 16.6665 24.5576 16.6665 24.9997V31.6663C16.6665 32.1084 16.4909 32.5323 16.1783 32.8449C15.8658 33.1574 15.4419 33.333 14.9998 33.333H8.33317C7.89114 33.333 7.46722 33.1574 7.15466 32.8449C6.8421 32.5323 6.6665 32.1084 6.6665 31.6663V24.9997Z"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M23.3335 28.333H33.3335M28.3335 23.333V33.333" stroke="#4095F6"
								      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</i>
						<span>True Single-Platform Solution</span>
						<div>Unlike competitors requiring 5-7 integrated tools, we built every module—clinical,
							operational, financial—from the ground up to work as one. This means no data silos, no
							duplicate entry, no integration failures. Just seamless workflows from intake through
							billing.
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="approach-item">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
							     fill="none">
								<path
									d="M11.0952 26.6665C6.8085 26.6665 3.3335 23.3215 3.3335 19.1948C3.3335 15.0698 6.8085 11.7248 11.0952 11.7248C11.7502 8.78814 14.0852 6.39147 17.2202 5.43647C20.3535 4.48314 23.8135 5.11481 26.2935 7.10314C28.7735 9.08647 29.8968 12.1148 29.2435 15.0515H30.8935C34.0818 15.0515 36.6668 17.6515 36.6668 20.8615C36.6668 24.0731 34.0818 26.6731 30.8918 26.6731H11.0952"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M20 26.667V35.0003" stroke="#4095F6" stroke-width="2" stroke-linecap="round"
								      stroke-linejoin="round"/>
								<path
									d="M26.6665 26.667V33.3337C26.6665 33.7757 26.8421 34.1996 27.1547 34.5122C27.4672 34.8247 27.8911 35.0003 28.3332 35.0003H34.9998"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M13.3333 26.667V33.3337C13.3333 33.7757 13.1577 34.1996 12.8452 34.5122C12.5326 34.8247 12.1087 35.0003 11.6667 35.0003H5"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</i>
						<span>Enterprise-Grade Cloud Platform</span>
						<div>Our secure, multi-tenant SaaS platform reliably scales from 10 to 100s of providers with
							consistent performance. No hardware to maintain, automatic backups, and seamless updates
							that don't disrupt your operations. Access your practice securely from anywhere.
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="approach-item">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
							     fill="none">
								<path
									d="M13.3335 11.6667C13.3335 13.4348 14.0359 15.1305 15.2861 16.3807C16.5364 17.631 18.2321 18.3333 20.0002 18.3333C21.7683 18.3333 23.464 17.631 24.7142 16.3807C25.9645 15.1305 26.6668 13.4348 26.6668 11.6667C26.6668 9.89856 25.9645 8.20286 24.7142 6.95262C23.464 5.70238 21.7683 5 20.0002 5C18.2321 5 16.5364 5.70238 15.2861 6.95262C14.0359 8.20286 13.3335 9.89856 13.3335 11.6667Z"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M10 35V31.6667C10 29.8986 10.7024 28.2029 11.9526 26.9526C13.2029 25.7024 14.8986 25 16.6667 25H17.5"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path
									d="M29.9999 36.667L35.5832 31.1937C35.9256 30.8614 36.1979 30.464 36.3842 30.0247C36.5704 29.5855 36.6668 29.1134 36.6676 28.6363C36.6683 28.1592 36.5735 27.6868 36.3887 27.2469C36.2039 26.8071 35.9328 26.4087 35.5915 26.0753C34.8951 25.3942 33.9602 25.012 32.9861 25.0102C32.0119 25.0083 31.0756 25.3869 30.3765 26.0653L30.0032 26.432L29.6315 26.0653C28.9352 25.3847 28.0006 25.0029 27.0269 25.001C26.0532 24.9991 25.1172 25.3774 24.4182 26.0553C24.0757 26.3875 23.8032 26.7849 23.6168 27.2241C23.4305 27.6632 23.3339 28.1353 23.333 28.6124C23.3321 29.0895 23.4267 29.5619 23.6114 30.0019C23.7961 30.4418 24.067 30.8402 24.4082 31.1737L29.9999 36.667Z"
									stroke="#4095F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</i>
						<span>Partnership-Driven Development</span>
						<div>Our customer success team doesn't just support—they advocate for your needs. We actively
							gather feedback from our user community and continuously enhance the platform based on
							real-world behavioral health practice needs. Your experience shapes our product evolution.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section section-faq">
		<div class="container">
			<h2 class="section-title">Frequently Asked Questions</h2>
			<div class="faq-list ete-accordion">
				<div class="accordion-item">
					<div class="accordion-item__head">
						<div>How does PCH help manage high-volume behavioral health intake?</div>
						<span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.209209 0.183059C0.488155 -0.061019 0.940416 -0.061019 1.21936 0.183059L5 3.49112L8.78064 0.183058C9.05958 -0.0610193 9.51184 -0.0610194 9.79079 0.183058C10.0697 0.427136 10.0697 0.822864 9.79079 1.06694L5.50508 4.81694C5.22613 5.06102 4.77387 5.06102 4.49492 4.81694L0.209209 1.06694C-0.0697367 0.822865 -0.0697367 0.427136 0.209209 0.183059Z"
                                      fill="#383838"/>
                            </svg>
                        </span>
					</div>
					<div class="accordion-item__body" style="display: none;">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua.</p>
					</div>
				</div>
				<div class="accordion-item">
					<div class="accordion-item__head">
						<div>What kind of data can we track and report on in PCH?</div>
						<span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.209209 0.183059C0.488155 -0.061019 0.940416 -0.061019 1.21936 0.183059L5 3.49112L8.78064 0.183058C9.05958 -0.0610193 9.51184 -0.0610194 9.79079 0.183058C10.0697 0.427136 10.0697 0.822864 9.79079 1.06694L5.50508 4.81694C5.22613 5.06102 4.77387 5.06102 4.49492 4.81694L0.209209 1.06694C-0.0697367 0.822865 -0.0697367 0.427136 0.209209 0.183059Z"
                                      fill="#383838"/>
                            </svg>
                        </span>
					</div>
					<div class="accordion-item__body" style="display: none;">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
							voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
							cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div class="accordion-item">
					<div class="accordion-item__head">
						<div>How does PCH integrate with our existing EHR workflows?</div>
						<span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.209209 0.183059C0.488155 -0.061019 0.940416 -0.061019 1.21936 0.183059L5 3.49112L8.78064 0.183058C9.05958 -0.0610193 9.51184 -0.0610194 9.79079 0.183058C10.0697 0.427136 10.0697 0.822864 9.79079 1.06694L5.50508 4.81694C5.22613 5.06102 4.77387 5.06102 4.49492 4.81694L0.209209 1.06694C-0.0697367 0.822865 -0.0697367 0.427136 0.209209 0.183059Z"
                                      fill="#383838"/>
                            </svg>
                        </span>
					</div>
					<div class="accordion-item__body" style="display: none;">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua.</p>
					</div>
				</div>
				<div class="accordion-item">
					<div class="accordion-item__head">
						<div>Can we customize PCH for our unique intake process?</div>
						<span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.209209 0.183059C0.488155 -0.061019 0.940416 -0.061019 1.21936 0.183059L5 3.49112L8.78064 0.183058C9.05958 -0.0610193 9.51184 -0.0610194 9.79079 0.183058C10.0697 0.427136 10.0697 0.822864 9.79079 1.06694L5.50508 4.81694C5.22613 5.06102 4.77387 5.06102 4.49492 4.81694L0.209209 1.06694C-0.0697367 0.822865 -0.0697367 0.427136 0.209209 0.183059Z"
                                      fill="#383838"/>
                            </svg>
                        </span>
					</div>
					<div class="accordion-item__body" style="display: none;">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
							voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
							cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div class="accordion-item">
					<div class="accordion-item__head">
						<div>How does PCH help intake coordinators manage their daily workflow?</div>
						<span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.209209 0.183059C0.488155 -0.061019 0.940416 -0.061019 1.21936 0.183059L5 3.49112L8.78064 0.183058C9.05958 -0.0610193 9.51184 -0.0610194 9.79079 0.183058C10.0697 0.427136 10.0697 0.822864 9.79079 1.06694L5.50508 4.81694C5.22613 5.06102 4.77387 5.06102 4.49492 4.81694L0.209209 1.06694C-0.0697367 0.822865 -0.0697367 0.427136 0.209209 0.183059Z"
                                      fill="#383838"/>
                            </svg>
                        </span>
					</div>
					<div class="accordion-item__body" style="display: none;">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua.</p>
					</div>
				</div>
				<div class="accordion-item">
					<div class="accordion-item__head">
						<div>How does the Activity Log help with compliance and quality assurance?</div>
						<span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.209209 0.183059C0.488155 -0.061019 0.940416 -0.061019 1.21936 0.183059L5 3.49112L8.78064 0.183058C9.05958 -0.0610193 9.51184 -0.0610194 9.79079 0.183058C10.0697 0.427136 10.0697 0.822864 9.79079 1.06694L5.50508 4.81694C5.22613 5.06102 4.77387 5.06102 4.49492 4.81694L0.209209 1.06694C-0.0697367 0.822865 -0.0697367 0.427136 0.209209 0.183059Z"
                                      fill="#383838"/>
                            </svg>
                        </span>
					</div>
					<div class="accordion-item__body" style="display: none;">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
							voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
							cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div class="accordion-item">
					<div class="accordion-item__head">
						<div>Does PCH data remain accessible after a client is admitted?</div>
						<span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.209209 0.183059C0.488155 -0.061019 0.940416 -0.061019 1.21936 0.183059L5 3.49112L8.78064 0.183058C9.05958 -0.0610193 9.51184 -0.0610194 9.79079 0.183058C10.0697 0.427136 10.0697 0.822864 9.79079 1.06694L5.50508 4.81694C5.22613 5.06102 4.77387 5.06102 4.49492 4.81694L0.209209 1.06694C-0.0697367 0.822865 -0.0697367 0.427136 0.209209 0.183059Z"
                                      fill="#383838"/>
                            </svg>
                        </span>
					</div>
					<div class="accordion-item__body" style="display: none;">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section section-certified">
		<div class="container">
			<div class="section-title">Certified & Compliant</div>
			<div class="section-description">Our platform meets the highest standards in healthcare technology and
				security.
			</div>
			<div class="certified-inner">
				<div class="row">
					<div class="col-md-7">
						<div class="certified__text">
							<p>We take compliance and security seriously. EHRYourWay is certified by trusted
								organizations to ensure our platform meets industry standards for electronic
								prescribing, data privacy, and health IT systems.</p>
							<p>These certifications reflect our ongoing commitment to patient safety, regulatory
								compliance, and secure digital healthcare delivery.</p>
						</div>
					</div>
					<div class="col-md-5">
						<div class="certified__img">
							<img src="<?= get_template_directory_uri() ?>/images/certified-1.png" loading="lazy"
							     alt="logo">
							<img src="<?= get_template_directory_uri() ?>/images/certified-2.png" loading="lazy"
							     alt="logo">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section section-capterra">
		<img src="<?= get_template_directory_uri() ?>/images/blur.png" loading="lazy" alt="logo">
		<div class="container">
			<div class="capterra-inner">
				<div class="capterra-inner__img">
					<img src="<?= get_template_directory_uri() ?>/images/capterra-logo.svg" loading="lazy" alt="logo">
				</div>
				<div class="capterra-inner__text">Capterra’s #1 ranked software in Mental Health and Patient Management
					and #2 ranked software in EMR
				</div>
				<div class="capterra-inner__rating">
					<div class="capterra-inner__rating-item">
						<span class="num">4.8 / 5</span>
						<div class="stars">
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
						</div>
						<div class="text">Ease of Use</div>
					</div>
					<div class="capterra-inner__rating-item">
						<span class="num">4.9 / 5</span>
						<div class="stars">
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
						</div>
						<div class="text">Features</div>
					</div>
					<div class="capterra-inner__rating-item">
						<span class="num">4.8 / 5</span>
						<div class="stars">
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
							<span class="active"></span>
						</div>
						<div class="text">Value for Money</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-customer">
			<div class="container">
				<div class="customer-inner">
					<div class="customer-slider slick-slider" data-slick='{
    "slidesToShow": 1,
    "slidesToScroll": 1,
    "arrows": true,
    "dots": false,
    "infinite": true,
    "adaptiveHeight": true,
    "prevArrow": ".customer-slider__prev",
    "nextArrow": ".customer-slider__next"}'>
						<div class="slide">
							<div>
								<div>“After using other EHRs, it is really hard to find something negative to say about
									EHRYourWay.”
								</div>
								<span>-- Customer Name, Designation</span>
							</div>
						</div>
						<div class="slide">
							<div>
								<div>“After using other EHRs, it is really hard to find something negative to say about
									EHRYourWay.Hide notificationHide notificationHide notificationHide notificationHide
									notificationHide notification”
								</div>
								<span>-- Customer Name, Designation</span>
							</div>
						</div>
						<div class="slide">
							<div>
								<div>“After using other EHRs, it is really hard to find something negative to say about
									EHRYourWay.”
								</div>
								<span>-- Customer Name, Designation</span>
							</div>
						</div>
					</div>
					<div class="customer-slider__arrows">
						<div class="customer-slider__prev">
							<svg width="6" height="12" viewBox="0 0 6 12" fill="none"
							     xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
								      d="M5.78033 11.7489C6.07322 11.4142 6.07322 10.8715 5.78033 10.5368L1.81066 6L5.78033 1.46323C6.07322 1.1285 6.07322 0.585785 5.78033 0.251051C5.48744 -0.0836844 5.01256 -0.0836845 4.71967 0.251051L0.21967 5.39391C-0.0732228 5.72864 -0.0732228 6.27136 0.21967 6.60609L4.71967 11.7489C5.01256 12.0837 5.48744 12.0837 5.78033 11.7489Z"
								      fill="#383838"/>
							</svg>
						</div>
						<div class="customer-slider__next">
							<svg width="6" height="12" viewBox="0 0 6 12" fill="none"
							     xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
								      d="M0.219671 11.7489C-0.0732222 11.4142 -0.0732223 10.8715 0.219671 10.5368L4.18934 6L0.21967 1.46323C-0.0732231 1.1285 -0.0732232 0.585785 0.21967 0.251051C0.512563 -0.0836844 0.987437 -0.0836845 1.28033 0.251051L5.78033 5.39391C6.07322 5.72864 6.07322 6.27136 5.78033 6.60609L1.28033 11.7489C0.987438 12.0837 0.512564 12.0837 0.219671 11.7489Z"
								      fill="#383838"/>
							</svg>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
