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
                    <?php endif;?>
                    <?php if(!empty($main['button'])){ ?>    
                        <a href="<?= $main['button']['url'] ?>" class="btn"><?= $main['button']['title'] ?></a>
                    <?php } ?>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 20 20"
                                                         fill="none">
                                                        <path
                                                                d="M8.60417 3.5975C8.95917 2.13417 11.0408 2.13417 11.3958 3.5975C11.4491 3.81733 11.5535 4.02148 11.7006 4.19333C11.8477 4.36518 12.0332 4.49988 12.2422 4.58645C12.4512 4.67303 12.6776 4.70904 12.9032 4.69156C13.1287 4.67407 13.3469 4.60359 13.54 4.48583C14.8258 3.7025 16.2983 5.17417 15.515 6.46083C15.3974 6.65388 15.327 6.87195 15.3096 7.09731C15.2922 7.32267 15.3281 7.54897 15.4146 7.75782C15.5011 7.96666 15.6356 8.15215 15.8073 8.29921C15.9789 8.44627 16.1829 8.55075 16.4025 8.60417C17.8658 8.95917 17.8658 11.0408 16.4025 11.3958C16.1827 11.4491 15.9785 11.5535 15.8067 11.7006C15.6348 11.8477 15.5001 12.0332 15.4135 12.2422C15.327 12.4512 15.291 12.6776 15.3084 12.9032C15.3259 13.1287 15.3964 13.3469 15.5142 13.54C16.2975 14.8258 14.8258 16.2983 13.5392 15.515C13.3461 15.3974 13.1281 15.327 12.9027 15.3096C12.6773 15.2922 12.451 15.3281 12.2422 15.4146C12.0333 15.5011 11.8479 15.6356 11.7008 15.8073C11.5537 15.9789 11.4492 16.1829 11.3958 16.4025C11.0408 17.8658 8.95917 17.8658 8.60417 16.4025C8.5509 16.1827 8.44648 15.9785 8.29941 15.8067C8.15233 15.6348 7.96676 15.5001 7.75779 15.4135C7.54882 15.327 7.32236 15.291 7.09685 15.3084C6.87133 15.3259 6.65313 15.3964 6.46 15.5142C5.17417 16.2975 3.70167 14.8258 4.485 13.5392C4.60258 13.3461 4.67296 13.1281 4.6904 12.9027C4.70785 12.6773 4.67187 12.451 4.58539 12.2422C4.49892 12.0333 4.36438 11.8479 4.19273 11.7008C4.02107 11.5537 3.81714 11.4492 3.5975 11.3958C2.13417 11.0408 2.13417 8.95917 3.5975 8.60417C3.81733 8.5509 4.02148 8.44648 4.19333 8.29941C4.36518 8.15233 4.49988 7.96676 4.58645 7.75779C4.67303 7.54882 4.70904 7.32236 4.69156 7.09685C4.67407 6.87133 4.60359 6.65313 4.48583 6.46C3.7025 5.17417 5.17417 3.70167 6.46083 4.485C7.29417 4.99167 8.37417 4.54333 8.60417 3.5975Z"
                                                                stroke="white" stroke-width="1.25"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                        <path
                                                                d="M7.5 10C7.5 10.663 7.76339 11.2989 8.23223 11.7678C8.70107 12.2366 9.33696 12.5 10 12.5C10.663 12.5 11.2989 12.2366 11.7678 11.7678C12.2366 11.2989 12.5 10.663 12.5 10C12.5 9.33696 12.2366 8.70107 11.7678 8.23223C11.2989 7.76339 10.663 7.5 10 7.5C9.33696 7.5 8.70107 7.76339 8.23223 8.23223C7.76339 8.70107 7.5 9.33696 7.5 10Z"
                                                                stroke="white" stroke-width="1.25"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                    </svg>
                                                    Automation
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($item1['value'] == 'AI Tools'): ?>
                                                <li class="ai">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 20 20"
                                                         fill="none">
                                                        <path
                                                                d="M5 4.99967C5 4.55765 5.17559 4.13372 5.48816 3.82116C5.80072 3.5086 6.22464 3.33301 6.66667 3.33301H13.3333C13.7754 3.33301 14.1993 3.5086 14.5118 3.82116C14.8244 4.13372 15 4.55765 15 4.99967V8.33301C15 8.77503 14.8244 9.19896 14.5118 9.51152C14.1993 9.82408 13.7754 9.99967 13.3333 9.99967H6.66667C6.22464 9.99967 5.80072 9.82408 5.48816 9.51152C5.17559 9.19896 5 8.77503 5 8.33301V4.99967Z"
                                                                stroke="white" stroke-width="1.25"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                        <path d="M10 1.66699V3.33366" stroke="white" stroke-width="1.25"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M7.5 10V17.5" stroke="white" stroke-width="1.25"
                                                              stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                        <path d="M12.5 10V17.5" stroke="white" stroke-width="1.25"
                                                              stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                        <path d="M4.1665 13.3337L7.49984 11.667" stroke="white"
                                                              stroke-width="1.25"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M12.5 11.667L15.8333 13.3337" stroke="white"
                                                              stroke-width="1.25"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M7.5 15H12.5" stroke="white" stroke-width="1.25"
                                                              stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                        <path d="M8.3335 6.66699V6.67366" stroke="white"
                                                              stroke-width="1.25"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M11.6665 6.66699V6.67366" stroke="white"
                                                              stroke-width="1.25"
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
    <?php $built_for = get_field('built_for'); ?>
    <div class="section section-settings">
        <div class="container">
            <div class="section-title"><?= $built_for['title'] ?></div>
            <?php if(!empty($built_for['cards'])){ ?>
            <div class="row settings-wrapper">
                <?php foreach ($built_for['cards'] as $card) { ?>
                    <div class="col-md-6">
                        <div class="settings-item">
                            <i><?= $card['icon'] ?></i>
                            <span><?= $card['title'] ?></span>
                            <?= $card['description'] ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php $our_approach = get_field('our_approach'); ?>
    <div class="section section-approach">
        <div class="container">
            <div class="section-title"><?= $our_approach['title'] ?></div>
            <div class="section-description"><?= $our_approach['subtitle'] ?></div>
            <?php if(!empty($our_approach['blocks'])) { ?>
            <div class="row approach-wrapper">
                <?php foreach ($our_approach['blocks'] as $block) { ?>
                    <div class="col-md-6">
                        <div class="approach-item">
                            <i><?= $block['icon'] ?></i>
                            <span><?= $block['title'] ?></span>
                            <div><?= $block['description'] ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php $faq = get_field('faq'); ?>
    <div class="section section-faq">
        <div class="container">
            <h2 class="section-title"><?= $faq['title'] ?>></h2>
            <?php if(!empty($faq['questions'])){ ?>
            <div class="faq-list ete-accordion">
                <?php foreach ($faq['questions'] as $question) { ?>
                    <div class="accordion-item">
                        <div class="accordion-item__head">
                            <div><?= $question['question'] ?></div>
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
                            <p><?= $question['answer'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php $certified = get_field('certified'); ?>
    <div class="section section-certified">
        <div class="container">
            <div class="section-title"><?= $certified['title'] ?></div>
            <div class="section-description"><?= $certified['subtitle'] ?></div>
            <div class="certified-inner">
                <div class="row">
                    <div class="col-md-7">
                        <div class="certified__text"><?= $certified['description'] ?></div>
                    </div>
                    <div class="col-md-5">
                        <div class="certified__img">
                            <img src="<?= $certified['image_1'] ?>" loading="lazy" alt="logo">
                            <img src="<?= $certified['image_2'] ?>" loading="lazy" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $capterra = get_field('capterra'); ?>
    <div class="section section-capterra">
        <img src="<?= get_template_directory_uri() ?>/images/blur.png" loading="lazy" alt="logo">
        <div class="container">
            <div class="capterra-inner">
                <div class="capterra-inner__img">
                    <img src="<?= $capterra['image'] ?>" loading="lazy" alt="logo">
                </div>
                <div class="capterra-inner__text"><?= $capterra['title'] ?>
                </div>
                <?php if(!empty($capterra['ratings'])){ ?>
                <div class="capterra-inner__rating">
                    <?php foreach ($capterra['ratings'] as $rating) { ?>
                        <div class="capterra-inner__rating-item">
                            <span class="num"><?= $rating['rating'] ?> / 5</span>
                            <div class="stars">
                                <?php for ($i = 0; $i < round($rating['rating']); $i++) { ?>
                                    <span class="active"></span>
                                <?php } ?>
                            </div>
                            <div class="text"><?= $rating['text'] ?></div>
                        </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="section-customer">
            <div class="container">
                <div class="customer-inner">
                    <?php if(!empty($capterra['comments'])){ ?>
                    <div class="customer-slider slick-slider" data-slick='{
    "slidesToShow": 1,
    "slidesToScroll": 1,
    "arrows": true,
    "dots": false,
    "infinite": true,
    "adaptiveHeight": true,
    "prevArrow": ".customer-slider__prev",
    "nextArrow": ".customer-slider__next"}'>
                        <?php foreach ($capterra['comments'] as $comments) { ?>
                            <div class="slide">
                                <div>
                                    <div>“<?= $comments['text'] ?>”
                                    </div>
                                    <span>-- <?= $comments['name'] ?>, <?= $comments['designation'] ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
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
