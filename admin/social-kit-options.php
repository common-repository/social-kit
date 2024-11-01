<?php
// Register Menus
function sk_get_registered_widgets() {
      return [
         'Social popup' => ['popup', 'https://www.dvizhenia.com/social-popup/'],
         'Social Icons' => ['social-icons', 'dvizhenia.com/social-icon/'],
         'Social Bar' => ['social-bar', 'https://www.dvizhenia.com/social-bar/'],
         'Twitch Livestream' => ['twitch', 'https://www.dvizhenia.com/twitch/'],
         'Linkedin Post' => ['Linkedin', 'https://www.dvizhenia.com/linkedin/'],
         // 'Tiktok Video' => ['tiktok', 'https://www.dvizhenia.com/tiktok-widget/'],
         // 'Airbnb Widget' => ['airbnb', 'https://www.dvizhenia.com/airbnb/'],
         'Call Now' => ['call-now', 'https://www.dvizhenia.com/call-now/'],
      ];
   }
function socialkit_add_admin_menu() {
	add_menu_page( 'Social Kit', 'Social Kit', 'manage_options', 'social-kit', 'social_kit_addons_settings_page', 'dashicons-buddicons-activity', '58.6' );
}
add_action( 'admin_menu', 'socialkit_add_admin_menu' );

function social_kit_addons_settings_page() {?>
<div class="sk-wrapper">
   <div class="sk-admin-header">
   <div class="sk-credentials">
      <h1 class="sk-heading">Social Kit</h1>
      <p class="sk-p">Must have Social Kit for Elementor</p>
   </div>
   <div class="sk-admin-buttons">
   <button class="sk-admin-button sk-admin-button-pro -salmon" id="sk-wporg"><a href="<?php echo esc_url('https://wordpress.org/plugins/social-kit/'); ?>">Help Us Improve!</a></button>
   <button class="sk-admin-button skl" id="sk-hwts"><a href="<?php echo esc_url('https://www.dvizhenia.com/social-kit/');?>">Widget Demos</a></button>
   <?php function gopro_sk(){
   echo '<button class="sk-admin-button -oceana" id="sk-hwts"><i class="fas fa-rocket"></i>Go Pro</button>';
   }
   //gopro_sk(); // tu pro araa gaajmeine if/else
   ?>

   </div>
   <div class="grid-wrapper">
         <?php 
       foreach ( sk_get_registered_widgets() as $title => $data ) {
        $slug = $data[0];
        $url  = $data[1];
        echo '<div class="grid-item">';
                echo '<h3>'. esc_html($title) .'</h3>';
                echo ( '' !== esc_attr($url)) ? '<a href="'. esc_url($url) .'" target="_blank" class="elite-admin-button">'. esc_html('View Widget Demo', 'social-kit') .'</a>' : '';
            echo '</div>';
    }
    ?>
        <!---- End Grid Wrapper-->
      </div>
<section id="contact-cta-section" class="contact-cta-section">
  <div class="wrapper-full">
    <div class="cta-wrapper">
      <div class="details-wrapper">
        <h2>More Updates To Come!</h2>
        <p>Subscribe To Our Mailing List To never Miss out On Updates</p>
      </div>
      <a class="blue-cta-button" href="<?php echo esc_url('https://www.dvizhenia.com/support/')?>" target="_blank">Subscribe</a>
      <div class="clearfix"></div>
    </div>
  </div>
</section>
</div>

<?php
}