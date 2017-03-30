<?php ?>

<!doctype html>

<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <?php wp_head(); ?>
    </head>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' ); ?>

    <body style="background-image:url('<?php echo $background[0]; ?>');">

        <header>
            <a href="/"><img class="logo" src="<?php the_field('header_logo'); ?>" alt=""></a>
            <?php the_field('intro_copy'); ?>
        </header>

        <div class="overlay"></div>

        <div class="content">

            <div class="accordion">
                <h2>Find Your Routine</h2>
                <?php if( have_rows('routines') ): ?>
                    <div class="accordion-content">
                        <?php while ( have_rows('routines') ): the_row(); ?>
                            <div class="col-lg-3 accordion-item">
                                <h3><?php the_sub_field('routine_title'); ?></h3>
                                <img src="<?php the_sub_field('routine_image'); ?>" alt="">
                                <div class="accordion-details">
                                    <h3><?php echo the_sub_field('routine_title'); ?></h3>
                                    <?php if ( have_rows('routine_bullet_points') ): ?>
                                        <ul>
                                            <?php while ( have_rows('routine_bullet_points') ): the_row(); ?>
                                                <li><?php echo get_sub_field('routine_bullet'); ?></li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>        
                            </div>
                        <?php endwhile; ?>
                        <div class="clearfix"></div>
                    </div>
                <?php endif; ?>
                <div class="list-container">
                    <div class="close-details"><i class="fa fa-arrow-circle-left"></i>Back To Grid</div>
                    <div id="appended-list"></div>
                </div>
            </div>
            
            <?php if( get_field('show_form') ): ?>
                <div class="accordion">
                    <h2>Enter To Win</h2>
                    <div id="sweepstakes-form" class="accordion-content">
                        <?php if ( get_field('form_image') ): ?>
                            <div class="col-md-4 form-image">
                                <img src="<?php the_field('form_image'); ?>" alt="">
                            </div>
                            <div class="col-md-8 form-image-text">
                                <p><?php the_field('form_image_text'); ?></p>
                                <?php $rules = get_field('rules'); ?>
                                <p>For official rules, click <a target="_blank" href="<?php echo $rules['url']; ?>">here</a></p>
                            </div>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                        <?php gravity_form(1, false, false, false, '', true, 12); ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="accordion">
                <h2>#RockYourRoutine</h2>
                <div id="social" class="accordion-content">
                    <?php if( have_rows('social') ): ?>
                        <?php while ( have_rows('social') ): the_row(); ?>
                            <div class="col-md-4 social-image">
                                <a target="_blank" href="<?php the_sub_field('social_link'); ?>"><img src="<?php the_sub_field('social_image'); ?>" /></a>
                            </div>
                        <?php endwhile; ?>
                        <div class="clearfix"></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="accordion">
                <a href="https://www.uchealth.org/locations/" target="_blank"><h2>Get a Routine Check-Up</h2></a>
            </div>

        </div>

    <?php endwhile; endif; ?>

    </body>
    
    <footer>
        <ul>
            <li><a href=""></a></li>
            <li><a target="_blank" href="https://www.uchealth.org/privacy-policy/">Privacy Policy</a></li>
            <li><a target="_blank" href="https://www.uchealth.org/disclaimer/">Disclaimer</a></li>
        </ul>
        <div class="clearfix"></div>
    </footer>

<?php wp_footer(); ?>

</html>