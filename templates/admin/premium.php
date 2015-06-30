<style>
    .section{
        margin-left: -20px;
        margin-right: -20px;
        font-family: "Raleway",san-serif;
    }
    .section h1{
        text-align: center;
        text-transform: uppercase;
        color: #808a97;
        font-size: 35px;
        font-weight: 700;
        line-height: normal;
        display: inline-block;
        width: 100%;
        margin: 50px 0 0;
    }
    .section ul{
        list-style-type: disc;
        padding-left: 15px;
    }
    .section:nth-child(even){
        background-color: #fff;
    }
    .section:nth-child(odd){
        background-color: #f1f1f1;
    }
    .section .section-title img{
        display: table-cell;
        vertical-align: middle;
        width: auto;
        margin-right: 15px;
    }
    .section h2,
    .section h3 {
        display: inline-block;
        vertical-align: middle;
        padding: 0;
        font-size: 24px;
        font-weight: 700;
        color: #808a97;
        text-transform: uppercase;
    }

    .section .section-title h2{
        display: table-cell;
        vertical-align: middle;
    }

    .section-title{
        display: table;
    }

    .section h3 {
        font-size: 14px;
        line-height: 28px;
        margin-bottom: 0;
        display: block;
    }

    .section p{
        font-size: 13px;
        margin: 25px 0;
    }
    .section ul li{
        margin-bottom: 4px;
    }
    .landing-container{
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
        padding: 50px 0 30px;
    }
    .landing-container:after{
        display: block;
        clear: both;
        content: '';
    }
    .landing-container .col-1,
    .landing-container .col-2{
        float: left;
        box-sizing: border-box;
        padding: 0 15px;
    }
    .landing-container .col-1 img{
        width: 100%;
    }
    .landing-container .col-1{
        width: 55%;
    }
    .landing-container .col-2{
        width: 45%;
    }
    .premium-cta{
        background-color: #808a97;
        color: #fff;
        border-radius: 6px;
        padding: 20px 15px;
    }
    .premium-cta:after{
        content: '';
        display: block;
        clear: both;
    }
    .premium-cta p{
        margin: 7px 0;
        font-size: 14px;
        font-weight: 500;
        display: inline-block;
        width: 60%;
    }
    .premium-cta a.button{
        border-radius: 6px;
        height: 60px;
        float: right;
        background: url(<?php echo YITH_YWQA_URL?>assets/images/upgrade.png) #ff643f no-repeat 13px 13px;
        border-color: #ff643f;
        box-shadow: none;
        outline: none;
        color: #fff;
        position: relative;
        padding: 9px 50px 9px 70px;
    }
    .premium-cta a.button:hover,
    .premium-cta a.button:active,
    .premium-cta a.button:focus{
        color: #fff;
        background: url(<?php echo YITH_YWQA_URL?>assets/images/upgrade.png) #971d00 no-repeat 13px 13px;
        border-color: #971d00;
        box-shadow: none;
        outline: none;
    }
    .premium-cta a.button:focus{
        top: 1px;
    }
    .premium-cta a.button span{
        line-height: 13px;
    }
    .premium-cta a.button .highlight{
        display: block;
        font-size: 20px;
        font-weight: 700;
        line-height: 20px;
    }
    .premium-cta .highlight{
        text-transform: uppercase;
        background: none;
        font-weight: 800;
        color: #fff;
    }

    @media (max-width: 768px) {
        .section{margin: 0}
        .premium-cta p{
            width: 100%;
        }
        .premium-cta{
            text-align: center;
        }
        .premium-cta a.button{
            float: none;
        }
    }

    @media (max-width: 480px){
        .wrap{
            margin-right: 0;
        }
        .section{
            margin: 0;
        }
        .landing-container .col-1,
        .landing-container .col-2{
            width: 100%;
            padding: 0 15px;
        }
        .section-odd .col-1 {
            float: left;
            margin-right: -100%;
        }
        .section-odd .col-2 {
            float: right;
            margin-top: 65%;
        }
    }

    @media (max-width: 320px){
        .premium-cta a.button{
            padding: 9px 20px 9px 70px;
        }

        .section .section-title img{
            display: none;
        }
    }
</style>
<div class="landing">
    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce Questions and Answers%2$s to benefit from all features!','ywqa'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo YWQA_Plugin_FW_Loader::get_instance()->get_premium_landing_uri(); ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','ywqa');?></span>
                    <span><?php _e('to the premium version','ywqa');?></span>
                </a>
            </div>
        </div>
    </div>
    <div class="section section-even clear" style="background: url(<?php echo YITH_YWQA_URL ?>assets/images/01-bg.png) no-repeat #fff; background-position: 85% 75%">
        <h1><?php _e('Premium Features','ywqa');?></h1>
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_YWQA_URL ?>assets/images/01.png" alt="" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWQA_URL ?>assets/images/01-icon.png" alt=""/>
                    <h2><?php _e('Number of answers ','ywqa');?></h2>
                </div>
                <p>
                    <?php echo sprintf( __('The more followers has a question, the more answers are likely to be left for it. If you do not want your product page
                     to get extremely long, enable %1$sanswer pagination%2$s by specifying the number of elements you want to show at a time.', 'ywqa'), '<b>', '</b>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="section section-odd clear" style="background: url(<?php echo YITH_YWQA_URL ?>assets/images/02-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWQA_URL ?>assets/images/02-icon.png" alt="icon 02" />
                    <h2><?php _e('Voting system','ywqa');?></h2>
                </div>
                <p>
                    <?php echo sprintf( __( 'Increase and improve interaction between users and your shop. With the premium version of the plugin, you will be able to allow all registered users to leave a %1$spositive or negative vote%2$s to questions and answers of each product.
                    A very good strategy to highlight questions and answers that can be useful to other customers.','ywqa'),  '<b>', '</b>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_YWQA_URL ?>assets/images/02.png" alt="" />
            </div>
        </div>
    </div>
    <div class="section section-even clear" style="background: url(<?php echo YITH_YWQA_URL ?>assets/images/03-bg.png) no-repeat #fff; background-position: 85% 100%">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_YWQA_URL ?>assets/images/03.png" alt="" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWQA_URL ?>assets/images/03-icon.png" alt="icon 03" />
                    <h2><?php _e( 'Email notification','ywqa');?></h2>
                </div>
                <p>
                    <?php echo sprintf( __( 'Keep always up-to-date about what users write in your shop. Enable %1$semail notification%2$s to be informed any time a new question is added
                    to one of your products and read the content of it in the email message you get. With the option %1$s"User notification"%2$s,
                    you can notify users as soon as an answer is given to the question they have previously posed.','ywqa' ),'<b>','</b>' );?>
                </p>
            </div>
        </div>
    </div>



    <div class="section section-odd clear" style="background: url(<?php echo YITH_YWQA_URL ?>assets/images/04-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWQA_URL ?>assets/images/04-icon.png" alt="icon 04" />
                    <h2><?php _e('Inappropriate content','ywqa');?></h2>
                </div>
                <p>
                    <?php echo sprintf( __( 'There might always be someone in the web, who wants to disturb or leave offensive, inappropriate or simply unsuitable answers.
                    With the premium version of the plugin, your users will be able to "monitor" this kind of answers on
                    their own and report questions and/or answers that are inappropriate. %1$sThese answers will be automatically removed%2$s if
                     a specific number of users that you can set in your plugin reports them as an abuse.','ywqa' ),'<b>','</b>' );?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_YWQA_URL ?>assets/images/04.png" alt="" />
            </div>
        </div>
    </div>
    <div class="section section-even clear" style="background: url(<?php echo YITH_YWQA_URL ?>assets/images/05-bg.png) no-repeat #fff; background-position: 85% 100%">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_YWQA_URL ?>assets/images/05.png" alt="" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWQA_URL?>assets/images/05-icon.png" alt="icon 05" />
                    <h2><?php _e('Incognito mode','ywqa');?></h2>
                </div>
                <p>
                    <?php echo sprintf( __('Working principles are always the same. Each question will get its own answers. The only difference is that the name
                    of users who have posed a question or given an answer will not be shown and they will be %1$sanonymous%2$s to users of the shop, either they are registered or not.','ywqa'),'<b>','</b>' );?></p>
            </div>
        </div>
    </div>
    <div class="section section-odd clear" style="background: url(<?php echo YITH_YWQA_URL ?>assets/images/06-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWQA_URL ?>assets/images/06-icon.png" alt="icon 04" />
                    <h2><?php _e('Invite to answer','ywqa');?></h2>
                </div>
                <p>
                    <?php echo sprintf( __( 'Who may better answer to a new question than those who have purchased a product? 
                    With this innovative feature, you will be able to automatically %1$ssend an email to customers that have purchased a product%2$s on 
                    which a question has been added and invite them to answer. You can choose to send an email to all customers or let the plugin select only some of them randomly. ','ywqa' ),'<b>','</b>' );?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_YWQA_URL ?>assets/images/06.png" alt="" />
            </div>
        </div>
    </div>

    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce Questions and Answers%2$s to benefit from all features!','ywqa'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo YWQA_Plugin_FW_Loader::get_instance()->get_premium_landing_uri(); ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','ywqa');?></span>
                    <span><?php _e('to the premium version','ywqa');?></span>
                </a>
            </div>
        </div>
    </div>
</div>